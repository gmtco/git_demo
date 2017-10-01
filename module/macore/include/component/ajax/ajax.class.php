<?php

defined('PHPFOX') or exit('NO DICE!');

class Macore_Component_Ajax_Ajax extends Phpfox_Ajax
{
	public function getOnlineFriends()
	{
		Phpfox::getBlock('macore.friendonline');
		
		$this->call('$(\'#js_block_border_macore_friendonline\').find(\'.content:first\').html(\'' . $this->getContent() . '\');');
		$this->call('$Core.loadInit();');
	}

	public function playInFeed()
	{ 
		$aSong = Phpfox::getService('music')->getSong($this->get('id'));
		
		if (!isset($aSong['song_id']))
		{
			$this->alert(Phpfox::getPhrase('music.unable_to_find_the_song_you_are_trying_to_play'));
			return false;
		}
		
		Phpfox::getService('music.process')->play($aSong['song_id']);
		
		$sSongPath = $aSong['song_path'];

		$this->call('$(\'#js_controller_music_play_'.$aSong['song_id'].'\').html(\'<audio style="width:100%;height:100%;" autoplay="autoplay" controls="controls"><source src="'.$sSongPath.'" type="audio/mpeg"></audio>\');');
//<a href="#" onclick="$.ajaxCall(\'music.playInFeed\', \'id={$aFeed.song.song_id}\', \'GET\'); $(this).hide(); return false;" title="Play">Play</a>
	}



	public function play()
	{
		$aVideo = Phpfox::getService('video')->getVideo($this->get('id'));

		// only for youtube video
		if (!empty($aVideo['youtube_video_url']))
		{
			$video_url = $aVideo['youtube_video_url'];
			$this->setTitle($aVideo['title']);

			// html5 video player?
			if (Phpfox::getParam('macore.mac_enable_mediaelement')){
				echo '<div class="t_center">';
				echo '
				<video width="640" height="360" id="mac-youtube-player" style="width: 100%; height: 100%;">
				    <source type="video/youtube" src="http://www.youtube.com/watch?v='.$video_url.'" />
				</video>';
				echo '</div>';
				$this->call('<script type=\'text/javascript\'>$Core.macCore.initMediaElement(\'mejs-ted\');</script>');
			} else {
				echo '<div class="t_center">';
				echo '<iframe width="560" height="315" src="//www.youtube.com/embed/'.$video_url.'" frameborder="0" allowfullscreen></iframe>';
				echo '</div>';
			}

		}

		// other stream video
		elseif ($aVideo['is_stream'])
		{
			$sEmbedCode = $aVideo['embed_code'];
			if ($this->get('popup'))
			{
				$this->setTitle($aVideo['title']);
				echo '<div class="t_center">';
				echo $sEmbedCode;
				echo '</div>';
			}
			elseif ($this->get('feed_id'))
			{
				$this->call('$(\'#js_item_feed_' . $this->get('feed_id') . '\').find(\'.activity_feed_content_link:first\').html(\'' . str_replace("'", "\\'", $sEmbedCode) . '\');');
			}
			else 
			{
				$this->html('#js_global_link_id_' . $this->get('id'), str_replace("'", "\\'", $sEmbedCode));
			}				
		}

		// others video
		else
		{
			$sVideoPath = (preg_match("/\{file\/videos\/(.*)\/(.*)\.flv\}/i", $aVideo['destination'], $aMatches) ? Phpfox::getParam('core.path') . str_replace(array('{', '}'), '', $aMatches[0]) : Phpfox::getParam('video.url') . $aVideo['destination']);
			if (Phpfox::getParam('core.allow_cdn') && !empty($aVideo['server_id']))
			{
				$sVideoPath = Phpfox::getLib('cdn')->getUrl($sVideoPath, $aVideo['server_id']);	
			}
			if ($aVideo['custom_v_id'] && !$aVideo['in_process'])
			{
				preg_match('/\{([0-9]+)\}(.*)/i', $sVideoPath, $aMatches);
				$iCnt = 0;
				$sCustomUrl = '';
				foreach (Phpfox::getParam('video.convert_servers') as $sServer)
				{
					$iCnt++;
					if ($iCnt === (int) $aMatches[1])
					{
						$sCustomUrl = $sServer;
						break;
					}
				}
				$sVideoPath = $sCustomUrl . 'view/' . $aMatches[2] . '.flv';
			}

			$sDivId = 'js_tmp_video_player_' . $aVideo['video_id'];

			$this->setTitle($aVideo['title']);
			if (Phpfox::getParam('video.vidly_support') && !empty($aVideo['vidly_url_id']))
			{
				echo '<iframe frameborder="0" width="640" height="390" name="vidly-frame" src="http://s.vid.ly/embeded.html?link=' . $aVideo['vidly_url_id'] . '&amp;width=640&amp;height=390&autoplay=false"></iframe>';
			}
			else
			{

				// html5 video player?
				if (Phpfox::getParam('macore.mac_enable_mediaelement')){

					echo '<div class="t_center">';
					echo '
					<video width="640" height="360" style="width: 100%; height: 100%;">
					    <source type="video/youtube" src="'.$sVideoPath.'" />
					</video>';
					echo '</div>';
					$this->call('<script type=\'text/javascript\'>$Core.macCore.initMediaElement(\'mejs-ted\');</script>');
				
				} else {

					$this->call('<script type="text/javascript">$Core.loadStaticFile(\'' . $this->template()->getStyle('static_script', 'player/' . Phpfox::getParam('core.default_music_player') . '/core.js') . '\');</script>');
					echo '<div class="t_center">';
					echo '<div id="' . $sDivId . '" style="width:640px; height:390px; margin:auto;"></div>';
					echo '</div>';
					$this->call('<script type="text/javascript">$Core.player.load({id: \'' . $sDivId . '\', auto: true, type: \'video\', play: \'' . $sVideoPath . '\'});</script>');
					
				}
			}

		}
	}


	public function megaMenuBlockTest()
	{
		$type = $this->get('type');
		$this->call('$(\'#video\').html(\'Hello world by '.$type.'\')');
	}
	
	public function megaMenuBlock()
	{
		//Phpfox::isUser(true);
		$type = $this->get('type');//blog
		$filter = $this->get('filter');//latestshared
		
		Phpfox::getBlock('macore.mmblocks', 
			array(
				'filter' => $filter,
				'type' => $type, 
				'loadone' => 0
				));		
		$this->html('#'.$type, $this->getContent(false));
		$this->call('$Core.loadInit();');
	}

	public function megaMenuBlockLoadMore()
	{
		//Phpfox::isUser(true);
		$type = $this->get('type');//blog
		$filter = $this->get('filter');//latestshared
		Phpfox::getBlock('macore.mmblocks', 
			array(
				'filter' => $filter,
				'type' => $type, 
				'loadone' => 1
				));	
		$this->html('#'.$filter, $this->getContent(false));
		$this->call('$Core.loadInit();');
	}

	public function mainBrowse()
	{
		Phpfox::getComponent('user.browse', array(), 'controller');

		echo $this->getContent(false);			
	}
	


   /**
     * Displays the photo index page using the pagination.
     *
     */
    public function photoBrowse()
    {

    	// TO DO:: check this double

		if (!defined('PHPFOX_IS_AJAX_CONTROLLER')) define('PHPFOX_IS_AJAX_CONTROLLER', true);
		Phpfox::getLib('module')->getComponent('photo.index', $this->getAll(), 'controller');
		$this->call('$(".pager_container, .moderation_holder").remove();');
		
		//$this->call('$(\'#mac-isotope2\').append(\'' . $this->getContent() . '\').isotope(\'layout\');');

		$this->call('$(\'#mac-isotope2\').append(\'' . $this->getContent() . '\');$(\'#mac-isotope2\').after($(\'.pager_container\'));$(\'#mac-isotope2\').isotope(\'layout\');');

		$this->call('$Core.loadInit();');
    }




	
	public function share_post()
	{
		$aPost = $this->get('val');		
		
		if ($aPost['post_type'] == '2')
		{
			if (!isset($aPost['friends']) || (isset($aPost['friends']) && !count($aPost['friends'])))
			{
				Phpfox_Error::set('Select a friend to share this with.');
			}
			else
			{
				$iCnt = 0;
				foreach ($aPost['friends'] as $iFriendId)
				{
					$aVals = array(
						'user_status' => $aPost['post_content'],
						'parent_user_id' => $iFriendId,
						'parent_feed_id' => $aPost['parent_feed_id'],
						'parent_module_id' => $aPost['parent_module_id']
					);
					
					if (Phpfox::getService('user.privacy')->hasAccess($iFriendId, 'feed.share_on_wall') && Phpfox::getUserParam('profile.can_post_comment_on_profile'))
					{	
						$iCnt++;
						
						Phpfox::getService('feed.process')->addComment($aVals);
					}				
				}			

				$sMessage = '<div class="message">' . str_replace("'", "\\'", Phpfox::getPhrase('feed.successfully_shared_this_item_on_your_friends_wall')) . '</div>';
				if (!$iCnt)
				{
					$sMessage = '<div class="error_message">' . str_replace("'", "\\'", Phpfox::getPhrase('user.unable_to_share_this_post_due_to_privacy_settings')) . '</div>';
				}
				$this->call('$(\'#\' + tb_get_active()).find(\'.js_box_content:first\').html(\'' . $sMessage . '\');');
				if ($iCnt)
				{
					$this->call('setTimeout(\'tb_remove();\', 2000);');
				}
			}
			
			return;
		}
		
		$aVals = array(
			'user_status' => $aPost['post_content'],
			'privacy' => '0',
			'privacy_comment' => '0',
			'parent_feed_id' => $aPost['parent_feed_id'],
			'parent_module_id' => $aPost['parent_module_id']
		);		
		
		if (($iId = Phpfox::getService('user.process')->updateStatus($aVals)))
		{
			$this->call('$(\'#\' + tb_get_active()).find(\'.js_box_content:first\').html(\'<div class="message">' . str_replace("'", "\\'", Phpfox::getPhrase('feed.successfully_shared_this_item')) . '</div>\'); setTimeout(\'tb_remove();\', 2000);');
		}
	}
	



}

?>	
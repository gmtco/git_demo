<?php
/*
bootstrapped by
 __  __
|  \/  | __ _  ___ __ _  __ _  ___  _ __ __ _  __ _  __ _ 
| |\/| |/ _` |/ __/ _` |/ _` |/ _ \| '__/ _` |/ _` |/ _` |
| |  | | (_| | (_| (_| | (_| | (_) | | | (_| | (_| | (_| |
|_|  |_|\__,_|\___\__,_|\__, |\___/|_|  \__,_|\__, |\__,_|
                        |___/                 |___/  
*/
defined('PHPFOX') or exit('NO DICE!');
?>
<div class="mac-user-profile-pic">
	<div class="row">
		<div class="col-lg-12">
			{img user=$aGlobalUser suffix='' class="img-responsive"}
		</div>
		<div class="col-lg-12 mac-mrg-tp">
      <div class="btn-group btn-group-justified">
  			<a class="btn btn-default" href="{url link='user.profile'}" rel="tooltip" data-placement="bottom" data-original-title="{phrase var='core.edit_profile'}">
  				<i class="icon-edit"></i>
  			</a>
  			<a class="btn btn-default" href="{url link='user.photo'}" data-original-title="{phrase var='user.edit_profile_picture'}" rel="tooltip" data-placement="bottom">
  				<i class="icon-picture"></i> 
  			</a>
  			<a class="btn btn-default" href="{url link='user.setting'}" data-original-title="{phrase var='user.account_settings'}" data-placement="bottom" rel="tooltip">
  				<i class="icon-cogs"></i>
  			</a>
  			<a class="btn btn-default" href="{url link='user.privacy'}" data-original-title="{phrase var='user.privacy_settings'}" rel="tooltip" data-placement="bottom">
  				<i class="icon-eye-open"></i>
  			</a>
      </div>
		</div>
	</div>
	{if false && Phpfox::getParam('macore.mac_bootstrap_enable_tour') && !Phpfox::isMobile()}
	<br>
	<div id="mac-start-tour">
		<a href="#start" id="start" class="dont-unbind btn btn-default btn-xs btn-block">{phrase var='macore.start_tour'} <i class="icon-play"></i></a>
	</div>
	{/if}
</div>

{module name='macore.userinfo'}
<br class="clear">

<ul class="mac-list-share-links list-group">

{if Phpfox::isModule('photo')}
<li class="list-group-item"><a href="{url link='photo.add'}"><i class="icon-camera"></i> {phrase var='photo.upload_photo_s'}</a></li>
{/if}
{if Phpfox::isModule('video')}
<li class="list-group-item"><a href="{url link='video.add'}"><i class="icon-facetime-video"></i> {phrase var='video.upload_videos'}</a></li>
{/if}
{if Phpfox::isModule('quiz')}
<li class="list-group-item"><a href="{url link='quiz.add'}"><i class="icon-question"></i> {phrase var='quiz.add_new_quiz'}</a></li>
{/if}
{if Phpfox::isModule('poll')}
<li class="list-group-item"><a href="{url link='poll.add'}"><i class="icon-tasks"></i> {phrase var='poll.add_a_new_poll'}</a></li>
{/if}
{if Phpfox::isModule('event')}
<li class="list-group-item"><a href="{url link='event.add'}"><i class="icon-calendar"></i> {phrase var='event.create_new_event'}</a></li>
{/if}
{if Phpfox::isModule('blog')}
<li class="list-group-item"><a href="{url link='blog.add'}"><i class="icon-comments"></i> {phrase var='blog.add_new_blog'}</a></li>
{/if}
{if Phpfox::isModule('music')}
<li class="list-group-item"><a href="{url link='music.upload'}"><i class="icon-music"></i> {phrase var='music.upload_a_song'}</a></li>
{/if}
{if Phpfox::isModule('marketplace')}
<li class="list-group-item"><a href="{url link='marketplace.add'}"><i class="icon-shopping-cart"></i> {phrase var='marketplace.create_a_listing'}</a></li>
{/if}
{if Phpfox::isModule('pages')}
<li class="list-group-item"><a href="{url link='pages.add'}"><i class="icon-star"></i> {phrase var='pages.create_a_page'}</a></li>
{/if}

</ul>

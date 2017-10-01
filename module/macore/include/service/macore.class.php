<?php

/*
 by macagoraga.com
*/

defined('PHPFOX') or exit('NO DICE!');

class Macore_Service_Macore extends Phpfox_Service
{

  public function __construct()
  {

  }

  public function getRecentLoggedInUsers($iLimit = 12)
  {
    if (Phpfox::getParam('user.cache_recent_logged_in') > 0)
    {
      $sCacheId = $this->cache()->set(array('user', 'recentloggedin'));
    }
    
    if (Phpfox::getParam('user.cache_recent_logged_in') > 0 && ($aUsers = $this->cache()->get($sCacheId, Phpfox::getParam('user.cache_recent_logged_in'))))
    {
            
    }
    else
    {
      $iFriendsOnly = (int) Phpfox::getComponentSetting(Phpfox::getUserId(), 'log.user_login_display_limit', 0);
      
      if ($iFriendsOnly === 1)
      {
        $aUsers = $this->database()->select(Phpfox::getUserField())
          ->from(Phpfox::getT('friend'), 'f')
          ->join(Phpfox::getT('user'), 'u', 'u.user_id = f.friend_user_id')
          ->where('f.user_id = ' . Phpfox::getUserId() . ' AND is_invisible != 1')
          ->order('u.last_login DESC')
          ->limit($iLimit)
          ->execute('getSlaveRows');
      }
      else 
      {
        $aUsers = $this->database()->select(Phpfox::getUserField())
          ->from(Phpfox::getT('user'), 'u')
          ->order('u.last_login DESC')
          ->where('u.user_id != ' . Phpfox::getUserId() .' AND is_invisible != 1 AND u.status_id = 0 AND u.view_id = 0')
          ->limit($iLimit)
          ->execute('getSlaveRows');
      }
      
      if (Phpfox::getParam('user.cache_recent_logged_in') > 0)
      {
        $this->cache()->save($sCacheId, $aUsers);
      }
    }

    if (is_bool($aUsers))
    {
      $aUsers = array();
    }
      
    return $aUsers;
  }
  
  public function getOnlineGuests($aConds, $sSort = '', $iPage = '', $iLimit = '')
  { 
    $iCnt = $this->database()->select('COUNT(*)')
      ->from(Phpfox::getT('log_session'), 'ls')     
      ->where($aConds)
      ->order($sSort)
      ->execute('getSlaveField'); 
      
    $aItems = array();
    if ($iCnt > 0)
    {   
      $aItems = $this->database()->select('ls.*, b.ban_id')
        ->from(Phpfox::getT('log_session'), 'ls')
        ->leftJoin(Phpfox::getT('ban'), 'b', 'b.type_id = \'ip\' AND b.find_value = ls.ip_address')
                ->group('ip_address')
        ->where($aConds)
        ->order($sSort)
        ->limit($iPage, $iLimit, $iCnt)
        ->execute('getSlaveRows');  
        
      foreach ($aItems as $iKey => $aItem)
      {
        $aItems[$iKey]['ip_address_search'] = str_replace('.', '-', $aItem['ip_address']);
      }
    }
              
    return array($iCnt, $aItems);
  }


  // blocks
  public function getVideos($view = 'latestsharedvideo', $limit = 4, $useCache = true, $cacheTime = 360) { // get video for block

    $sCacheId = $this->cache()->set('macmetrotheme_cache_dashboard_block_videos_'.$view);
    $aVideos = $this->cache()->get($sCacheId, $cacheTime);

    if ($useCache && $aVideos) {
    
      return $aVideos;
    
    } else {
    
      $orderBy = 'v.time_stamp DESC';
      $extraWhere = '';

      if($view == 'mostlikedvideo'){
        $orderBy = 'v.total_like DESC';
      }
      if($view == 'mostdislikedvideo'){
        $orderBy = 'v.total_dislike DESC';
      }
      if($view == 'mostviewvideo'){
        $orderBy = 'v.total_view DESC';
      }
      if($view == 'mostcommentedvideo'){
        $orderBy = 'v.total_comment DESC';
      }
      if($view == 'myvideo'){
        $extraWhere = ' AND u.user_id = '.Phpfox::getUserId();
      }
      if($view == 'randomvideo'){
        $orderBy = 'rand()';
      }

      $aVideos = $this->database()
        ->select(
          'v.*, v.video_id as item_id, 
          v.user_id, 
          v.time_stamp, 
          v.title as item_title, 
          vt.text_parsed as item_content, ' . 
          Phpfox::getUserField()
          )
        ->from(Phpfox::getT('video'), 'v')
        ->join(Phpfox::getT('video_text'), 'vt', 'vt.video_id = v.video_id')
        ->join(Phpfox::getT('user'), 'u', 'u.user_id = v.user_id');

        if($view == 'myfriendsvideo'){
          $aVideos = $aVideos->join(Phpfox::getT('friend'), 'friends', 'friends.user_id = v.user_id AND friends.friend_user_id = ' . Phpfox::getUserId());
        }

        $aVideos = $aVideos->where('v.in_process = 0 AND v.view_id = 0 AND v.privacy = 0'.$extraWhere)
        ->limit($limit)
        ->order($orderBy)
        ->execute('getRows');

      foreach ($aVideos as $k => $v)
      {
        $aVideos[$k]['item_posted_on'] = Phpfox::getTime(Phpfox::getParam('core.global_update_time'), $v['time_stamp']);      
      }     
           
      // save on cache only if not random view and if useCache is true            
      if($view != 'randomblog' && $useCache){
        $this->cache()->save($sCacheId, $aBlogs);
      }
        
    }

  return $aVideos;
    
  }

  public function getBlogs($view = 'latestsharedblog', $limit = 4, $useCache = true, $cacheTime = 360){ // get blog for block

    $sCacheId = $this->cache()->set('macmetrotheme_cache_dashboard_block_blogs_'.$view);
    
    $aBlogs = $this->cache()->get($sCacheId, $cacheTime);

    if ($useCache && $aBlogs) {
    
      return $aBlogs;
    
    } else {
          
      $orderBy = 'b.time_stamp DESC';
      $extraWhere = '';

      if($view == 'mostlikedblog'){
        $orderBy = 'b.total_like DESC';
      }
      if($view == 'mostdislikedblog'){
        $orderBy = 'b.total_dislike DESC';
      }
      if($view == 'mostviewblog'){
        $orderBy = 'b.total_view DESC';
      }
      if($view == 'mostcommentedblog'){
        $orderBy = 'b.total_comment DESC';
      }
      if($view == 'myblog'){
        $extraWhere = ' AND u.user_id = '.Phpfox::getUserId();
      }
      if($view == 'randomblog'){
        $orderBy = 'rand()';
      }

      $aBlogs = $this->database()
        ->select(
          'b.*, b.blog_id as item_id, 
          b.user_id, 
          b.time_stamp, 
          b.title as item_title, 
          bt.text_parsed as item_content, ' . 
          Phpfox::getUserField()
          )
        ->from(Phpfox::getT('blog'), 'b')
        ->join(Phpfox::getT('blog_text'), 'bt', 'bt.blog_id = b.blog_id')
        ->join(Phpfox::getT('user'), 'u', 'u.user_id = b.user_id');

        if($view == 'myfriendsblog'){
          $aBlogs = $aBlogs->join(Phpfox::getT('friend'), 'friends', 'friends.user_id = b.user_id AND friends.friend_user_id = ' . Phpfox::getUserId());
        }

        $aBlogs = $aBlogs->where('b.is_approved = 1 AND b.privacy = 0 AND b.post_status = 1'.$extraWhere)
        ->limit($limit)
        ->order($orderBy)
        ->execute('getRows'); 

      foreach ($aBlogs as $k => $v)
      {
        $aBlogs[$k]['item_posted_on'] = Phpfox::getTime(Phpfox::getParam('core.global_update_time'), $v['time_stamp']);      
      }     
           
      // save on cache only if not random view and if useCache is true             
      if($view != 'randomblog' && $useCache){
        $this->cache()->save($sCacheId, $aBlogs);
      }

    }

    return $aBlogs;
  
  }


  public function getMedia($type, $filter, $limit, $useCache)
  {

    $return = false;

    switch($type){

      case 'blog':
      $return = $this->getBlogs($filter, $limit, $useCache);
      break;

      case 'video':
      $return = $this->getVideos($filter, $limit, $useCache);
      break;

      case 'photo':
      $return = $this->getPhotos($filter, $limit, $useCache);
      break;

      case 'pages':
      $return = $this->getPages($filter, $limit, $useCache);
      break;

      default: break;
    }
    
    return $return;
  }










  public function getPages($view = 'latestsharedpages', $limit = 4, $useCache = true, $cacheTime = 360){ // get page for block

    $sCacheId = $this->cache()->set('macmetrotheme_cache_dashboard_block_pages_'.$view);
    $aPages = $this->cache()->get($sCacheId, $cacheTime);

    if ($useCache && $aPages) {
    
      return $aPages;
    
    } else {

      $orderBy = 'p.time_stamp DESC';
      $extraWhere = '';

      if($view == 'mostlikedpages'){
       // $orderBy = 'p.total_like DESC';
      }
      if($view == 'mostdislikedpages'){
        //$orderBy = 'p.total_dislike DESC';
      }
      if($view == 'mostviewpages'){
       // $orderBy = 'p.total_view DESC';
      }
      if($view == 'mostcommentedpages'){
       // $orderBy = 'p.total_comment DESC';
      }
      if($view == 'mypages'){
        $extraWhere = ' AND u.user_id = '.Phpfox::getUserId();
      }
      if($view == 'randompages'){
       // $orderBy = 'rand()';
      }

      $aPages = $this->database()->select('
        p.*, p.page_id as item_id, p.title as item_title, p.title as item_content, pu.vanity_url, p.time_stamp as item_posted_on, 
        (SELECT name from '.Phpfox::getT('pages_category').' WHERE category_id = p.category_id) as categoryid,
        (SELECT name from '.Phpfox::getT('pages_type').' WHERE type_id = p.type_id) as typeid,
        '.Phpfox::getUserField()
        )
        ->from(Phpfox::getT('pages'), 'p')      
        ->join(Phpfox::getT('user'), 'u', 'p.user_id = u.user_id')
        ->leftJoin(Phpfox::getT('pages_url'), 'pu', 'pu.page_id = p.page_id');

        if($view == 'myfriendspages'){
          $aPages = $aPages->join(Phpfox::getT('friend'), 'friends', 'friends.user_id = p.user_id AND friends.friend_user_id = ' . Phpfox::getUserId());
        }

        $aPages = $aPages->where('p.image_path IS NOT NULL AND p.view_id != 2 AND p.app_id = 0'.$extraWhere)  
        ->order($orderBy)
        ->limit($limit)
        ->execute('getSlaveRows');
      
      foreach ($aPages as $iKey => $aRow){
        $aPages[$iKey]['link'] = $this->getUrl($aRow['page_id'], $aRow['title'], $aRow['vanity_url']);
      }
           
      // save on cache only if not random view and if useCache is true             
      if($view != 'randompages' && $useCache){
        $this->cache()->save($sCacheId, $aPages);
      }
      
    }

    return $aPages;
    
  }
  
  public function getUrl($iPageId, $sTitle = null, $sVanityUrl = null){
    if ($sTitle === null && $sVanityUrl === null){
      //$aPage = $this->getPage($iPageId);
      //$sTitle = $aPage['title'];
      //$sVanityUrl = $aPage['vanity_url'];
      $sTitle = 'title';
      $sVanityUrl = 'vanity_url';
    }
    if (!empty($sVanityUrl)){
      return Phpfox::getLib('url')->makeUrl($sVanityUrl);
    }
    return Phpfox::getLib('url')->makeUrl('pages', $iPageId);
  }

  
  /*
  public function getMembers($iPage = 0, $iPageSize = 10){
  
    $db = $this->database();

    //if (!array_key_exists('rand', $_SESSION) && (!isset($_SESSION['rand']) || empty($_SESSION['rand']))) {
    
    //  srand((float)microtime()*1000000);
    //  $rand = rand();
    //  $_SESSION['rand'] = $rand;
      
    //} else $rand = $_SESSION['rand'];

    $iCnt1 = $db
    ->select('count(p.page_id)')
    ->from(Phpfox::getT('pages'), 'p')
    ->where('p.view_id != 2 AND p.app_id = 0 AND p.category_id != 230')
    ->execute('getField');

    $iCnt2 = $db
    ->select('count(u.user_id)')
    ->from(Phpfox::getT('user'), 'u')
    ->where('u.view_id = 0')
    ->execute('getField');
    
    $iCnt = $iCnt1 + $iCnt2;

    $iPage = $iPage==0? 1 : $iPage;
    $limit1 = ($iPage - 1) * $iPageSize;
    $limit2 = $iPageSize; 
    
    $iTotPages = floor($iCnt / $iPageSize);
    $iTotPages += ($iCnt % $iPageSize != 0)? 1 : 0;

    $q1 = '
    SELECT 
    u.user_id,
    u.server_id AS user_server_id, 
    u.user_name, 
    u.full_name, 
    u.gender, 
    u.user_image,
    u.gender as categoryid
    FROM ' . Phpfox::getT('user') . ' u
    WHERE 
    u.view_id = 0
    ';
    
    $q2 = '
    SELECT 
    u.page_id AS user_id, 
    u.image_server_id AS user_server_id, 
    u.title as user_name, 
    u.title as full_name, 
    0 as gender, 
    u.image_path as user_image,
    (SELECT name from phpfox_pages_category where category_id = u.category_id) as categoryid
    FROM ' . Phpfox::getT('pages') . ' u
    WHERE 
    u.view_id != 2 AND u.app_id = 0 
    AND 
    u.category_id != 230
    ';

    $q = '
      SELECT * FROM(
        
        '.$q1.' UNION ALL '.$q2.'
      
      ) qUnion
      ORDER BY user_name
      LIMIT '.$limit1.', '.$limit2.'
    ';

    $aMembers = $db->getRows($q);

    if($iPage <= $iTotPages){
    
      return array($iCnt, $aMembers);
    
    } else Phpfox::getLib('url')->send('');

  }
  */
  
  public function getPhotos($view = 'latestsharedphoto', $limit = 4, $useCache = true, $cacheTime = 360){

    $sCacheId = $this->cache()->set('macmetrotheme_cache_dashboard_block_photos_'.$view);
    
    $aPhotos = $this->cache()->get($sCacheId, $cacheTime);

    if (!$useCache && !$aPhotos) { 

        $orderBy = 'p.time_stamp DESC';
        $extraWhere = '';

        if($view == 'mostlikedphoto'){
          $orderBy = 'p.total_like DESC';
        }
        if($view == 'mostdislikedphoto'){
          $orderBy = 'p.total_dislike DESC';
        }
        if($view == 'mostviewphoto'){
          $orderBy = 'p.total_view DESC';
        }
        if($view == 'mostcommentedphoto'){
          $orderBy = 'p.total_comment DESC';
        }
        if($view == 'myphoto'){
          $extraWhere = ' AND u.user_id = '.Phpfox::getUserId();
        }
        if($view == 'randomphoto'){
          $orderBy = 'rand()';
        }

        $aPhotos = $this->database()->select('
              p.photo_id,
              p.photo_id as item_id,
              pa.album_id,
              p.title,
              p.title as item_title,
              pa.name,
              p.server_id,
              p.destination,
              pi.description,
              p.time_stamp,
              p.total_like,
              p.total_comment,
              p.total_view,
              p.privacy,
              p.privacy_comment,
              '.Phpfox::getUserField().'
            ')
          ->from(Phpfox::getT('photo'), 'p')
          ->join(Phpfox::getT('user'), 'u', 'p.user_id = u.user_id')
          ->leftJoin(Phpfox::getT('photo_info'), 'pi', 'pi.photo_id = p.photo_id')
          ->leftJoin(Phpfox::getT('photo_album'), 'pa', 'pa.album_id = p.album_id');

          if($view == 'myfriendsphoto'){
            $aPhotos = $aPhotos->join(Phpfox::getT('friend'), 'friends', 'friends.user_id = p.user_id AND friends.friend_user_id = ' . Phpfox::getUserId());
          }

          $aPhotos = $aPhotos->where('p.mature = 0 and p.is_profile_photo = 0 and p.is_cover = 0 and p.privacy = 0'.$extraWhere)
          ->order($orderBy)
          ->limit($limit)
          ->execute('getRows');
      
        $oImgHelper = Phpfox::getLib('image.helper');
                                  
        foreach ($aPhotos as $iKey => $aPhoto) {
            
          $aPhotos[$iKey]['link'] = Phpfox::permalink('photo', $aPhoto['photo_id'], $aPhoto['title']);
          $aPhotos[$iKey]['item_posted_on'] = Phpfox::getTime(Phpfox::getParam('core.extended_global_time_stamp'), $aPhoto['time_stamp']);  
          /*
            if($this->isFriendOf($aPhoto['user_id']))
              $aPhotos[$iKey]['myfriend'] = 1;
            else
              $aPhotos[$iKey]['myfriend'] = 0;
            
            if(Phpfox::getUserId() == $aPhoto['user_id'])
              $aPhotos[$iKey]['myphoto'] = 1;
            else
              $aPhotos[$iKey]['myphoto'] = 0;
          */   
            /* prepare big photo
            $sImage = $oImgHelper->display(
                      array(
                      'title' => $aPhoto['title'],
                      'path' => 'photo.url_photo',
                      'file' => $aPhoto['destination'],
                      'suffix' => '',
                      'max_width' => 1024,
                      'max_height' => 1024
                      )
            );
            
             preg_match_all('/(src)=("[^"]*")/i',$sImage, $aImgSrc);

             $sBigImageSrc = $aImgSrc[2][0];
             
             $sBigImageSrc = str_replace('"', '', $sBigImageSrc);
             
             $aPhotos[$iKey]['bigdestination'] = $sBigImageSrc;
             */

        } // end foreach
           
        // save on cache only if not random view and if useCache is true             
        if($view != 'randomphoto' && $useCache){
          $this->cache()->save($sCacheId, $aPhotos);
        }

    }// end if

    return $aPhotos;
    /*
    if($iPage <= $iTotPages){
    
      return array($iCnt, $aPhotos);
    
    } else Phpfox::getLib('url')->send('');   // change here, add 404 page
    */
    
  }

 
  public function getVideosForBrowse($iPage, $iPageSize){

    $db = $this->database();
    
    $iCnt = $db
    ->select('count(v.video_id)')
    ->from(Phpfox::getT('video'), 'v')
    ->leftJoin(Phpfox::getT('video_text'), 'vt', 'vt.video_id = v.video_id')
    ->join(Phpfox::getT('user'), 'u', 'u.user_id = v.user_id')
    ->where('v.in_process = 0 and v.privacy = 0 and v.view_id = 0')
    ->execute('getField');

    $iTotPages = floor($iCnt / $iPageSize);
    $iTotPages += ($iCnt % $iPageSize != 0)? 1 : 0;

    $aVideos = $db
      ->select(
      '
        v.video_id,
        v.title,
        v.image_server_id,
        v.image_path,
        vt.text_parsed,
        v.time_stamp,
        v.total_like,
        v.total_comment,
        v.total_view,
        v.privacy,
        v.privacy_comment,
        '.Phpfox::getUserField().'
      '
      )
      ->from(Phpfox::getT('video'), 'v')
      ->leftJoin(Phpfox::getT('video_text'), 'vt', 'vt.video_id = v.video_id')
      ->join(Phpfox::getT('user'), 'u', 'u.user_id = v.user_id')
      ->where('v.in_process = 0 and v.privacy = 0 and v.view_id = 0')
      ->order('v.time_stamp DESC')
      ->limit($iPage, $iPageSize, $iCnt)
      ->execute('getRows');

    foreach ($aVideos as $iKey => $aVideo) {
        
      $aVideos[$iKey]['link'] = Phpfox::permalink('video', $aVideo['video_id'], $aVideo['title']);
      $aVideos[$iKey]['time_stamp'] = Phpfox::getTime(Phpfox::getParam('core.extended_global_time_stamp'), $aVideo['time_stamp']);  
    
      if($this->isFriendOf($aVideo['user_id']))
        $aVideos[$iKey]['myfriend'] = 1;
      else
        $aVideos[$iKey]['myfriend'] = 0;
      
      if(Phpfox::getUserId() == $aVideo['user_id'])
        $aVideos[$iKey]['myvideo'] = 1;
      else
        $aVideos[$iKey]['myvideo'] = 0;
        
    }
        
    if($iPage <= $iTotPages){
    
      return array($iCnt, $aVideos);
    
    } else Phpfox::getLib('url')->send('');
    
  }
  
  
  public function getBlogForBrowse($iPage, $iPageSize){

    $db = $this->database();
    
    $iCnt = $db
    ->select('count(b.blog_id)')
    ->from(Phpfox::getT('blog'), 'b')
    ->join(Phpfox::getT('blog_text'), 'bt', 'bt.blog_id = b.blog_id')
    ->join(Phpfox::getT('user'), 'u', 'u.user_id = b.user_id')
    ->where('b.is_approved = 1 AND b.privacy = 0 AND b.post_status = 1')
    ->execute('getField');

    $iTotPages = floor($iCnt / $iPageSize);
    $iTotPages += ($iCnt % $iPageSize != 0)? 1 : 0;

    $aBlogs = $db
        ->select('
          b.blog_id,
          b.title,
          bt.text_parsed,
          b.time_stamp,
          b.total_like,
          b.total_comment,
          b.total_view,
          b.privacy,
          b.privacy_comment,
          '.Phpfox::getUserField().'
        ')
        ->from(Phpfox::getT('blog'), 'b')
        ->join(Phpfox::getT('blog_text'), 'bt', 'bt.blog_id = b.blog_id')
        ->join(Phpfox::getT('user'), 'u', 'u.user_id = b.user_id')
        ->where('b.is_approved = 1 AND b.privacy = 0 AND b.post_status = 1')
        ->limit($iPage, $iPageSize, $iCnt)
        ->order('b.time_stamp DESC')
        ->execute('getRows');

    foreach ($aBlogs as $iKey => $aBlog) {
        
      $aBlogs[$iKey]['link'] = Phpfox::permalink('blog', $aBlog['blog_id'], $aBlog['title']);
      
      $aBlogs[$iKey]['posted_on'] = Phpfox::getTime(Phpfox::getParam('core.global_update_time'), $aBlog['time_stamp']);
      
      if($this->isFriendOf($aBlog['user_id']))
        $aBlogs[$iKey]['myfriend'] = 1;
      else
        $aBlogs[$iKey]['myfriend'] = 0;
      
      if(Phpfox::getUserId() == $aBlog['user_id'])
        $aBlogs[$iKey]['myblog'] = 1;
      else
        $aBlogs[$iKey]['myblog'] = 0;
        
    } 
            
    if($iPage <= $iTotPages){
    
      return array($iCnt, $aBlogs);
    
    } else Phpfox::getLib('url')->send('');
    
  }


  public function isFriendOf($userId){

      if(Phpfox::getService('friend')->isFriend(Phpfox::getUserId(), $userId)) {

        return true;

      } else {
      
        return false;  
      
      }

  }
  
  

 
  public function filterFriends($data){
  
    $return = array();
    foreach($data as $k => $v){
        if(Phpfox::getService('friend')->isFriend(Phpfox::getUserId(), $v['user_id'])) {
            $return[$k] = $v;
        }
    }
    
    return $return;
        
  }




  public function getCoversPhoto($iUserId)
  {
    $aRows = $this->database()->select('*')
      ->from(Phpfox::getT('photo'))
      ->where('user_id = ' . (int) $iUserId . ' AND is_cover = 1')
      ->execute('getSlaveRows');
    
    return $aRows;
  }

/*
  public function updateCoverPhoto($iPhotoId, $iUserId = null)
  {
    if ($iUserId === null)
    {
      $iUserId = Phpfox::getUserId();
    }
    
    $this->database()->update(Phpfox::getT('user_field'), array('cover_photo' => $iPhotoId, 'cover_photo_top' => null), 'user_id = ' . (int) $iUserId);
    
    // This function takes care of all checks and queries if needed.
    Phpfox::getService('profile.process')->clearProfileCache( (int)$iUserId );
    
    return true;
  }
*/



  
  public function getAds($limit = 1, $order = 'rand()', $sType = 'phpfox') {

    switch($sType) {
      case 'phpfox': 
      return $this->getPhpfoxAd(); 
      break;
      default: 
      return false; 
      break;
    }

  }
  
  public function getPhpfoxAd($limit = 1, $order = 'rand()'){

    $aRows = $this->database()
        ->select('a.*')
        ->from(Phpfox::getT('ad'), 'a')
        ->where('a.is_active = 1')
        ->limit($limit)
        ->order($order)
        ->execute($limit > 1 ? 'getRows' : 'getRow'); 
    return $aRows;
  }


}
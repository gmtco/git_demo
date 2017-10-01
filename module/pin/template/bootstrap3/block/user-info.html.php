<div id="mac_pin_user_info" class="row">
  <div class="profileHead" id="profileHead"> 

  <div class="col-lg-6 col-md-6 col-xs-6">

  	<div class="profile_list">
  	   <div class="small_user_box textAlignLeft" id="photo_header">
  		  <div class="user_profile_img go_left">
  		    <div class="user_square_thumb">
  		      <div class="offset_div">
  		        <div class="table_cell">
  		        <a target="_blank" href="{url link=''}{$aUserRequest.user_name}">
        				{img user=$aUserRequest 
        				suffix='_200_square' 
        				max_height='125' 
        				max_width='125'  
        				style='border-radius: 150px 150px 150px 150px;'} 
      				</a>
  		        </div>
  		      </div>
  		    </div>
  		  </div>
  		  <div class="inlineBlock" style="display: inline-block;width: 250px;">
  		    <div class="go_left">
    			  <div class="profile_user_name_main profile">     
      				<h3>
                <a href="{url link=''}{$aUserRequest.user_name}">
                  {$aUserRequest.full_name}
                </a>
              </h3>
    			   </div>
    		     <div class="twitter_screen_name">
    			     <h3>
                <a href="{url link=$aUserRequest.user_name}">@{$aUserRequest.user_name}</a>
              </h3>
    			   </div>
  		    </div>
  		  </div>
  	  </div>
  	</div>

  </div>
   
  {if Phpfox::isModule('pinfollow')} 

  <div class="col-lg-6 col-md-6 col-xs-6">
  
    <div id="following_wrapper" class="follow_me_media">

      <div class="profileSubscribeBtn">
  	  {if Phpfox::getUserId()}
  		  {if $aUserRequest.user_id != $aGlobalUser.user_id}
  		  <a href="javascript:;" onclick="$Core.box('pinfollow.addFollow', 500, 'following={$aUserRequest.user_id}&follower={$aGlobalUser.user_id}');$(this).hide();$('.sign_up_btn_splash').show();return false;" 
  		  style='margin:0;{if $aUserRequest.iFollowThis > 0}display:none{/if}' class="learn_more_btn_splash btn btn-danger">{phrase var='pinuser.follow'}</a>
  		  <a href="javascript:;" onclick="$Core.box('pinfollow.removeFollow', 500, 'following={$aUserRequest.user_id}&follower={$aGlobalUser.user_id}');$(this).hide();$('.learn_more_btn_splash').show();return false;" 
  		  style='margin:0;width:90px;{if $aUserRequest.iFollowThis == 0}display:none{/if}' class="sign_up_btn_splash btn btn-default">{phrase var='pinuser.unfollow'}</a>
  		  {else}
  		  {/if}
  	  {/if}
  	  </div>

      <div class="clearfix"></div>
      <div style="margin-top:10px;" class="follow_count_media">
        <span class="badge">{$aUserRequest.no_following} Following</span>
      </div>
      <div class="clearfix"></div>
      <div class="follow_count_media isFollowers">
        <span class="badge"><span class="isFollowers" id="mac_num_follower">{$aUserRequest.no_follower}</span> Follower</span>
      </div>
      <div class="clearfix"></div>
      <div class="follow_count_media isPost">
        <span class="badge"><span class="isPost">{$aUserRequest.no_post}</span> Post</span>
      </div>

    </div>
  
  </div>
  
  {/if}

  </div>
    
</div>

<hr class="invisible">
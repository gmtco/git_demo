<div id="chatroom_wrapper">

{if $sChatroomId}
{module name='chatrooms.chatroom'}
{else}
<div class="chatroom_header clearfix">
<span class="pull-right">
<a href="{url link='chatrooms.add'}" class="btn btn-success">{phrase var='chatrooms.add_new_chatroom'}</a>
</span>
</div>

<div class="clear" style="height:20px"></div>

  <div id="options" class="clearfix">

    <ul class="pull-left nav nav-pills" id="filters">
     <li class="{if $sView == 'all'}active{/if}"><a class="all" href="{url link='chatrooms'}"><span>{phrase var='chatrooms.filter_label_all'}</span></a></li>
     <li class="{if $sView == 'my'}active{/if}"><a class="my_comments" href="{url link='chatrooms' view='my'}"><span>{phrase var='chatrooms.filter_label_my'}</span></a></li>
     <li class="{if $sView == 'admin'}active{/if}"><a class="administrators_chatrooms" href="{url link='chatrooms' view='admin'}"><span>{phrase var='chatrooms.filter_label_admin'}</span></a></li>
     <li class="{if $sView == 'user'}active{/if}"><a class="users_chatrooms" href="{url link='chatrooms' view='user'}"><span>{phrase var='chatrooms.filter_label_user'}</span></a></li>
    </ul>

    <ul class="pull-right">
      <li>
        <div class="main_search_bar">
          <form action="{url link='chatrooms'}" method="post">
            <div class="form-group">
              <div class="input-group">
                <input class="form-control" type="text" value="" name="val[q]">
                <span class="input-group-btn"><input class="btn btn-primary" type="submit" value="{phrase var='chatrooms.search_chatroom'}"></span>
              </div>
            </div>
          </form>
        </div>
      </li>
    </ul>

  </div>


  <div class="clear"></div>

  <ul id="chatroom_lists">
    {foreach from=$aChatrooms name=chat item=aChatroom}
      <li class="chatrooms_item">
        <div class="chatroom_box">

        <h2{if $aChatroom.password!=''} class='private_chat_room'{/if}>
        {if $aChatroom.password==''}
        <a title="{$aChatroom.chatroom_title}" href="{url link='chatrooms' chatroom=$aChatroom.chatroom_id}">
            {$aChatroom.chatroom_title}
        </a>
        {else}
        <a class="inlinePopup" title="{$aChatroom.chatroom_title}" href="{url link='chatrooms'}#?call=chatrooms.getLoginForm&chatroomid={$aChatroom.chatroom_id}&height=360&width=360">{$aChatroom.chatroom_title}</a>
        {/if}

        </h2>

        <p>{$aChatroom.chatroom_description} {*by $aChatroom.user_id*}</p>
        <p>

        {if $aChatroom.user_id == Phpfox::getUserId()}
        <a class="go_left" href="{url link='chatrooms.add' edit=$aChatroom.chatroom_id}">
            <img src="{module_path}chatrooms/static/image/icon_edit.png" alt="{phrase var='chatrooms.edit_chatroom'}" />
        </a>
        {/if}
        {if $aChatroom.password==''}
        <a class="go_right" href="{url link='chatrooms' chatroom=$aChatroom.chatroom_id}">
            {phrase var='chatrooms.enter_now_on_chatroom'} &rarr;
        </a>
        {else}
        <a class="go_right inlinePopup" title="Login" href="{url link='chatrooms'}#?call=chatrooms.getLoginForm&chatroomid={$aChatroom.chatroom_id}&height=360&width=360">{phrase var='chatrooms.login_link'}</a>
        {/if}
        </p>
        <div class="clear"></div>
        </div>
      </li>
    {/foreach}
  </ul>
{/if}

</div>
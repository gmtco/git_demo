<div id="js_block_border_chatrooms_panel" class="block">
<div class="content">

{if count($aChatroomsMy) > 0}
<p style="text-transform:uppercase;font-size:10px;margin-bottom:5px;font-weight:bold">{phrase var='chatrooms.my_chatroom_title_panel'}</p>
<ul class="action">
  {foreach from=$aChatroomsMy name=chat item=aChatroom2}
  <li>
    <a href="{url link='chatrooms' chatroom=$aChatroom2.chatroom_id}">{$aChatroom2.chatroom_title}</a>
  </li>
  {/foreach}
</ul>
<div class="clear"></div>
<div class="bottom">
<ul>
<li>
<a title="Create new chatrooms" href="{url link='chatrooms.add'}">{phrase var='chatrooms.create_new_chatrooms'}</a>
</li>
</ul>
</div>
<div class="clear" style="height:20px"></div>
{/if}

{if count($aChatrooms) > 0}
<p style="text-transform:uppercase;font-size:10px;margin-bottom:5px;font-weight:bold">{phrase var='chatrooms.all_chatroom_block_title'}</p>
<ul class="action">
  {foreach from=$aChatrooms name=chat item=aChatroom}
  <li>
    <a href="{url link='chatrooms' chatroom=$aChatroom.chatroom_id}">{$aChatroom.chatroom_title}</a>
  </li>
  {/foreach}
</ul>
<div class="clear"></div>
<div class="bottom">
<ul>
<li>
<a title="View all chatrooms" href="{url link='chatrooms'}">{phrase var='chatrooms.view_all_chatrooms_link'}</a>
</li>
</ul>
</div>
<div class="clear"></div>
{/if}


</div>

</div>
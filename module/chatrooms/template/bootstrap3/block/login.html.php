<form action="{$sRootUrlMG}chatrooms/login/" method="post">

  <input type="text" name="val[password]" value="" />
  <input type="hidden" name="val[chatroomid]" value="{$sChatroomId}" />
  <input type="submit" name="val[submit]" value="{phrase var='chatrooms.join_chatrooms'}" />

</form>
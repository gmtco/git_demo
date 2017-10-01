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

{if $bMacLoadOnlyOne}
    {if isset($aItems) && count($aItems)}
    {foreach from=$aItems name=aitem item=aItem}
    {template file='macore.block.bootstrap3-mmblocks-box'}
    {/foreach}
    {unset var=$aItem}
    {unset var=$aItems}
    {else}
    <div class="alert alert-info">No more {$sMacTypeMedia} founds</div>
    {/if}
{else}

<ul class="nav nav-tabs">
<li class="active">
  <a href="#latestshared{$sMacTypeMedia}" data-toggle="tab">
    <i class="icon-time"></i> Last shared</a>
</li>
<li>
  <a href="#mostliked{$sMacTypeMedia}" data-toggle="tab">
    <i class="icon-camera"></i> Most liked
  </a>
</li>
<li>
  <a href="#mostcommented{$sMacTypeMedia}" data-toggle="tab">
    <i class="icon-facetime-video"></i> Most commented
  </a>
</li>
{if isset($aItemsFriends)}
<li>
  <a href="#myfriends{$sMacTypeMedia}" data-toggle="tab">
    <i class="icon-star"></i> Friends
  </a>
</li>
{/if}
{if isset($aItemsMy)}
<li>
  <a href="#my{$sMacTypeMedia}" data-toggle="tab">
    <i class="icon-star"></i> My
  </a>
</li>
{/if}
<li>
  <a href="#random{$sMacTypeMedia}" data-toggle="tab">
    <i class="icon-comments"></i> Random
  </a>
</li>
</ul>
<div class="tab-content">

  <div class="tab-pane active" id="latestshared{$sMacTypeMedia}">
    {if isset($aItemsLatest) && count($aItemsLatest)}
    {foreach from=$aItemsLatest name=aitem item=aItem}
    {template file='macore.block.bootstrap3-mmblocks-box'}
    {/foreach}
    {unset var=$aItem}
    {unset var=$aItemsLatest}
    {*
    <div class="clear"></div>
    <a class="mac-tab-loadmore btn btn-block btn-default" href="#" data-macajax-type="{$sMacTypeMedia}" data-macajax-filter="latestshared">
      Load more
    </a>
    *}
    {else}
    <div class="alert alert-info mac-mrg-tp">No {$sMacTypeMedia} founds</div>
    {/if}
  </div>

  <div class="tab-pane" id="mostliked{$sMacTypeMedia}">
    {if isset($aItemsLiked) && count($aItemsLiked)}
    {foreach from=$aItemsLiked name=aitem item=aItem}
    {template file='macore.block.bootstrap3-mmblocks-box'}
    {/foreach}
    {unset var=$aItem}
    {unset var=$aItemsLiked}
    {else}
    <div class="alert alert-info mac-mrg-tp">No {$sMacTypeMedia} founds</div>
    {/if}
  </div>

  <div class="tab-pane" id="mostcommented{$sMacTypeMedia}">
    {if isset($aItemsCommented) && count($aItemsCommented)}
    {foreach from=$aItemsCommented name=aitem item=aItem}
    {template file='macore.block.bootstrap3-mmblocks-box'}
    {/foreach}
    {unset var=$aItem}
    {unset var=$aItemsCommented}
    {else}
    <div class="alert alert-info mac-mrg-tp">No {$sMacTypeMedia} founds</div>
    {/if}
  </div>


  {if isset($aItemsFriends)}
  <div class="tab-pane" id="myfriends{$sMacTypeMedia}">
    {if count($aItemsFriends)}
      {foreach from=$aItemsFriends name=aitem item=aItem}
      {template file='macore.block.bootstrap3-mmblocks-box'}
      {/foreach}
      {unset var=$aItem}
      {unset var=$aItemsFriends}
    {else}
      <div class="alert alert-info mac-mrg-tp">No {$sMacTypeMedia} founds</div>
    {/if}
  </div>
  {/if}


  {if isset($aItemsMy)}
  <div class="tab-pane" id="my{$sMacTypeMedia}">
    {if count($aItemsMy)}
      {foreach from=$aItemsMy name=aitem item=aItem}
      {template file='macore.block.bootstrap3-mmblocks-box'}
      {/foreach}
      {unset var=$aItem}
      {unset var=$aItemsMy}
    {else}
      <div class="alert alert-info mac-mrg-tp">No {$sMacTypeMedia} founds</div>
    {/if}
  </div>
  {/if}

  <div class="tab-pane" id="random{$sMacTypeMedia}">

    {if isset($aItemsRandom) && count($aItemsRandom)}
    {foreach from=$aItemsRandom name=aitem item=aItem}
    {template file='macore.block.bootstrap3-mmblocks-box'}
    {/foreach}
    {unset var=$aItem}
    {unset var=$aItemsRandom}
    {else}
    <div class="alert alert-info mac-mrg-tp">No {$sMacTypeMedia} founds</div>
    {/if}

  </div>

</div>

<hr class="clear invisible">
<div class="btn-group btn-group-justified mac-mrg-tp">
<a href="{url link=$sMacTypeMedia}" class="btn btn-default btn-md">
  <i class="icon-share"></i> See all {$sMacTypeMedia}
</a>
{if Phpfox::getUserId()}
<a href="{url link=$sMacTypeMedia view='friend'}" class="btn btn-default btn-md">
  <i class="icon-heart"></i> See friends {$sMacTypeMedia}
</a>
<a href="{url link=$sMacTypeMedia view='my'}" class="btn btn-default btn-md">
  <i class="icon-user"></i> My {$sMacTypeMedia}
</a>
{/if}
<a href="{url link=$sMacTypeMedia.'.add'}" class="btn btn-danger btn-md">
  <i class="icon-plus"></i> Add new {$sMacTypeMedia}
</a>
</div>

{/if}
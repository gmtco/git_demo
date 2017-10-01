{if $bAjaxRequest == 0}

  {if !empty($sUser)}
      {template file='pin.block.user-info'}
  {/if}

  {template file='macore.block.bootpin-search-pin'}
                
{/if} 

{module name='pin.all'}

<nav id="page_nav">
  <a href="{$sAjaxFilterUrl}"{if false} class="mac-btn-next btn btn-default btn-block"{/if}>{if false}Next page{/if}</a>
</nav>
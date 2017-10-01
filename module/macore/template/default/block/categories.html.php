{if Phpfox::getLib('module')->getModuleName() == 'photo'}
{module name='macore.photocategory'}
{elseif Phpfox::getLib('module')->getModuleName() == 'video'}
{module name='macore.videocategory'}
{elseif Phpfox::getLib('module')->getModuleName() == 'pages'}
{module name='macore.pagescategory'}
{elseif Phpfox::getLib('module')->getModuleName() == 'blog'}
{module name='macore.blogcategory'}
{/if}
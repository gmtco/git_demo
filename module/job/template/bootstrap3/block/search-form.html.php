<?php
/**
 * CEOfox
 *
 * @copyright  Copyright 2011-2012 CEOfox, Inc.
 * @license    http://ceofox.com/pages/license
 * @version    $Id: search-form.html.php 72009 2013-08-17 14:44:49 $
 * @author     CEOfox, Inc.
 */
?>
<?php
defined('PHPFOX') or exit('NO DICE!');
?>
<script>
var _jcc = '';
</script>
<div class="job job-search-form">
    <form action="{url link='job.search'}" method="get">
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="input-group">
                  <span class="input-group-addon"><i class="icon-search"></i></span>
                  <input class="form-control" type="text" name="title" id="jbSearchTitle" placeholder="{phrase var='job.enter_job_title'}" value="{if isset($aSearch.title)}{$aSearch.title}{/if}"/>
                  {if !count($aSearchCategories)}
                  <button class="btn btn-primary">{phrase var='job.search_now'}</button>
                  {/if}
                </div>
            </div>

            {if count($aSearchCategories)}
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <div class="btn-group search-categories">
                <a href="javascript:void(0);" type="button" class="btn btn-default dropdown-toggle search-categories-value" data-toggle="dropdown">{phrase var='job.any_categories'} <span class="caret"></span></a>

                <ul class="dropdown-menu" role="menu">
                    <li><a href="javascript:void(0);" class="mac-link" data-id="0">{phrase var='job.any_categories'}</a></li>
                    {foreach from=$aSearchCategories item=aCategory}
                    <li>
                        <a href="javascript:void(0);" class="mac-link" data-id="{$aCategory.category_id}">
                            {phrase var=$aCategory.phrase}
                        </a>
                        {if isset($aSearch.category) && $aSearch.category == $aCategory.category_id}
                        <script>
                        _jcc = '{phrase var=$aCategory.phrase} <span class="caret"></span>';
                        </script>
                        {/if}
                    </li>
                    {if isset($aCategory.sub) && count($aCategory.sub)}
                    {foreach from=$aCategory.sub item=aSub}
                    <li>
                        <a href="javascript:void(0);" class="mac-link" data-id="{$aSub.category_id}">
                            {phrase var=$aSub.phrase}
                        </a>
                        {if isset($aSearch.category) && $aSearch.category == $aSub.category_id}
                        <script>
                        _jcc = '{phrase var=$aSub.phrase}';
                        </script>
                        {/if}
                    </li>
                    {/foreach}
                    {/if}
                    {/foreach}
                </ul>
                <input type="hidden" name="category" id="frmSearchCategory" value="{if isset($aSearch.category)}{$aSearch.category}{/if}" />
                
            </div>
            </div>
            {/if}
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
            <input type="submit" class="pull-right btn btn-primary" value="{phrase var='job.search_now'}" />
            </div>
        </div>
    </form>
</div>
<script>
var _jsu = '{url link='job.search'}';
</script>
{literal}
<script>
$Behavior.initJobSearchFrm = function()
{
    $('.search-categories .mac-link').bind('click', function() {
        $('#frmSearchCategory').val($(this).attr('data-id'));
        $('.search-categories .search-categories-value').html($(this).text() + ' <span class="caret"></span>');
    });
    $('.job-search-form form').bind('submit', function() {
        var _url = _jsu;
        var _sTitle = $('#jbSearchTitle').val();
        if (_sTitle !== '') _url += 'title_' + _sTitle.replace(/\W+/ig, ' ') + '/';

        var _iCategory = parseInt($('#frmSearchCategory').val());
        if (_iCategory > 0) _url += 'category_' + _iCategory;

        window.location = _url;
        return false;
    });
    if (_jcc !== '') $('.search-categories .search-categories-value').html(_jcc + ' <span class="caret"></span>');
};
</script>
{/literal}
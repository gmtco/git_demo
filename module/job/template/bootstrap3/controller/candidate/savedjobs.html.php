<?php
/**
 * CEOfox
 *
 * @copyright  Copyright 2011-2012 CEOfox, Inc.
 * @license    http://ceofox.com/pages/license
 * @version    $Id: savedjobs.html.php 32004 2013-08-17 14:44:49 $
 * @author     CEOfox, Inc.
 */
?>
<?php
defined('PHPFOX') or exit('NO DICE!');
?>
{module name='job.static'}
<div class="job two_cols">
    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
        <div class="txt_header">{phrase var='job.saved_jobs'}</div>
        {if $aPositions && count($aPositions)}
        <table class="tbl">
            <thead>
                <tr>
                    <th width="15%">{phrase var='job.job'}</th>
                    <th width="4%" class="c">{phrase var='job.date'}</th>
                    <th width="3%">{phrase var='job.action'}</th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$aPositions item=aPosition}
                <tr id="unsave_job_{$aPosition.position_id}">
                    <td><a class="link" href="{$aPosition.link}">{$aPosition.title}</a></td>
                    <td class="c">{$aPosition.time_stamp|date:'core.global_update_time'}</td>
                    <td class="c">
                        <a href="javascript:void(0)" onclick="$.ajaxCall('job.position.save', 'cid={$aCurrentCandidate.candidate_id}&amp;pid={$aPosition.position_id}&amp;s=0');">{phrase var='job.unsave_job'}</a>
                    </td>
                </tr>
                {/foreach}
            </tbody>
        </table>
        {else}
        <div class="alert alert-info">
            {phrase var='job.no_jobs_found'}
        </div>
        {/if}
    </div>
    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
        {module name='job.candidate-setting'}
    </div>
</div>
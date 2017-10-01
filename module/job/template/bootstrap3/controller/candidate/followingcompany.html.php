<?php
/**
 * CEOfox
 *
 * @copyright  Copyright 2011-2012 CEOfox, Inc.
 * @license    http://ceofox.com/pages/license
 * @version    $Id: followingcompany.html.php 42007 2013-08-17 14:44:49 $
 * @author     CEOfox, Inc.
 */
?>
<?php
defined('PHPFOX') or exit('NO DICE!');
?>
{module name='job.static'}
<div class="job two_cols">

    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
        <div class="txt_header">{phrase var='job.following_employers'}</div>
        {if $aEmployers && count($aEmployers)}
        <table class="tbl">
            <thead>
                <tr>
                    <th width="15%">{phrase var='job.job'}</th>
                    <th width="4%" class="c">{phrase var='job.date'}</th>
                    <th width="3%">{phrase var='job.action'}</th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$aEmployers item=aEmployer}
                <tr id="unfollow_job_{$aEmployer.employer_id}">
                    <td><a class="link" href="{$aEmployer.profile_link}">{$aEmployer.title}</a></td>
                    <td class="c">{$aEmployer.time_stamp|date:'core.global_update_time'}</td>
                    <td class="c">
                        <a href="javascript:void(0);" onclick="$.ajaxCall('job.employer.follow', 'cid={$iCandidateId}&amp;eid={$aEmployer.employer_id}&amp;s=0');">{phrase var='job.unfollow_employer'}</a>
                    </td>
                </tr>
                {/foreach}
            </tbody>
        </table>
        {else}
        <div class="notify">
            {phrase var='job.no_employer_found'}
        </div>
        {/if}
    </div>

    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
        {module name='job.candidate-setting'}
    </div>

</div>
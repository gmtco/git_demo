<?php
/**
 * CEOfox
 *
 * @copyright  Copyright 2011-2012 CEOfox, Inc.
 * @license    http://ceofox.com/pages/license
 * @version    $Id: notification.html.php 42003 2013-08-17 14:44:49 $
 * @author     CEOfox, Inc.
 */
?>
<?php
  defined('PHPFOX') or exit('NO DICE!');
?>
{module name='job.static'}
<div class="job two_cols">

    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
        {if count($aNotifications)}
        <form action="post" onsubmit="return false;" id="job_candidate_notification">
        <div id="js_notification_holder">
            <ul class="notification_holder">
            {foreach from=$aNotifications name=notifications key=sDate item=aSubNotifications}
                <li class="notification_date">{$sDate}</li>
                {foreach from=$aSubNotifications item=aNotification}
                <li id="js_notification_{$aNotification.notification_id}" class="{if !$aNotification.is_seen} is_new{/if}">
                    <input type="checkbox" value="{$aNotification.notification_id}" name="val[notification_id][]"> &nbsp;
                    {if !empty($aNotification.icon)}
                        <a href="{$aNotification.sender_link}" target="_blank">{$aNotification.icon}</a> &nbsp;
                    {/if}
                    {$aNotification.message} - <span class="extra_info">{$aNotification.time_stamp|convert_time:'feed.feed_display_time_stamp'}</span>
                    {*
                    <span class="notification_delete">&nbsp;&nbsp;-&nbsp;&nbsp;
                        <a href="#" class="js_hover_title" onclick="$('#job_candidate_notification').ajaxCall('job.deleteNotification', 'type={$sType}&amp;item_id={$aCandidate.candidate_id}'); return false;">{img theme='misc/delete.gif' class='v_middle'}<span class="js_hover_info">{phrase var='notification.delete_this_notification'}</span></a>
                    </span></li>
                    *}
                {/foreach}
            {/foreach}
            </ul>

            <ul class="table_clear_button" id="js_notification_list_delete">
                <li id="noti_checkall"><input type="button" value="{phrase var='job.select_all'}" class="button" onclick="$Core.job.selectAllCheckBox(true);" /></li>
                <li id="noti_uncheckall" style="display: none;"><input type="button" value="{phrase var='job.unselect_all'}" class="button" onclick="$Core.job.selectAllCheckBox(false);" /></li>
                <li><input type="button" value="{phrase var='job.mark_as_read'}" class="button" onclick="$('#job_candidate_notification').ajaxCall('job.updateReadStatus', 'type={$sType}&amp;item_id={$aCandidate.candidate_id}&amp;seen=1'); return false;" /></li>
                <li><input type="button" value="{phrase var='job.mark_as_unread'}" class="button" onclick="$('#job_candidate_notification').ajaxCall('job.updateReadStatus', 'type={$sType}&amp;item_id={$aCandidate.candidate_id}&amp;seen=0'); return false;" /></li>
                <li><input type="button" value="{phrase var='job.delete_selected'}" class="button" onclick="$('#job_candidate_notification').ajaxCall('job.deleteNotification', 'type={$sType}&amp;item_id={$aCandidate.candidate_id}'); return false;" /></li>
                <li><input type="button" value="{phrase var='job.delete_all_notifications'}" class="button" onclick="$Core.processForm('#js_notification_list_delete'); $(this).ajaxCall('job.removeAllNotification', 'type={$sType}&amp;item_id={$aCandidate.candidate_id}'); return false;" /></li>
                <li class="table_clear_ajax"></li>
            </ul>
            <div class="clear"></div>
        </div>
        </form>
        {/if}

        <div id="js_no_notifications"{if count($aNotifications)} style="display:none;"{/if}>
            <div class="alert alert-info">
                {phrase var='notification.no_new_notifications'}
            </div>
            <div class="clear"></div>     
        </div>
    </div>
    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
        {module name='job.candidate-setting'}
    </div>
</div>
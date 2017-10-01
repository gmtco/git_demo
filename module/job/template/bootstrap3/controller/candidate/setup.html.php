<?php
/**
 * CEOfox
 *
 * @copyright  Copyright 2011-2012 CEOfox, Inc.
 * @license    http://ceofox.com/pages/license
 * @version    $Id: setup.html.php 12006 2013-08-17 14:44:49 $
 * @author     CEOfox, Inc.
 */
?>
<?php
  defined('PHPFOX') or exit('NO DICE!');
?>
{literal}
    <style type="text/css">
    .global_attachment
    {
        display: none;
    }
    </style>
{/literal}
{module name='job.static'}
<div class="job two_cols">
    {if !$bIsEdit}
        {module name='job.notification' title='job.setup_candidate_notification_title' content='job.setup_candidate_notification_content'}
    <div class="panel panel-primary">
    {else}

    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">

    <div class="panel panel-default">
    {/if}
        <div class="panel-heading">
            <h3 class="panel-title"><i class="icon-edit"></i> {phrase var='job.setup_candidate_form_header'}</h3>
        </div>
        {$sCreateJs}
        <div class="panel-body">
        <form class="form-horizontal" role="form" action="{url link='job.candidate.setup'}{if $bIsEdit}id_{$aForms.candidate_id}{/if}" method="post" onsubmit="{$sGetJsForm}" id="core_js_candidate_setup_form">
            {if $bIsEdit}
                <div><input type="hidden" name="val[candidate_id]" value="{$aForms.candidate_id}"></div>
            {/if}
            <div>
                <a href="javascript:void(0);" onclick="$Core.jobSetup.importUser({if isset($aForms.image_path) && !empty($aForms.image_path)}1{else}0{/if}); return false;"><i class="icon import"></i>{phrase var='job.import_from_profile'}</a>
            </div>
            <hr />
            <div class="candidate_import_info">
            {template file='job.block.candidate.info'}
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">
                    {phrase var='job.setup_form_phone'}
                </label>
                <div class="col-sm-10">
                    <input type="text" name="val[phone]" class="form-control" placeholder="{phrase var='job.setup_form_phone_placeholder'}" value="{value type='input' id='phone'}" id="phone">
                </div>
            </div>


            <div class="form-group">
                <label class="col-sm-2 control-label">
                    {phrase var='job.setup_form_visibility'}
                </label>
                <div class="col-sm-10">
                <label class="control-label">
                <input type="radio" name="val[visibility]" value="1" {value type='radio' id='visibility' default='1' selected='true'}/>
                {phrase var='job.yes'}
                </label>
                &nbsp;&nbsp;
                <label class="control-label">
                <input type="radio" name="val[visibility]" value="0" {value type='radio' id='visibility' default='0'}/> 
                {phrase var='job.no'}
                </label>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">
                    {phrase var='job.setup_form_candidate_picture'}
                </label>
                <div class="col-sm-10">
                    <span class="candidate_avatar_changer ib">
                        <span class="candidate_avatar">
                        {if $bIsEdit}
                            {if !empty($aForms.image_path)}
                                {img server_id=$aForms.server_id path='job.url_job' file=$aForms.image_path suffix='_100' max_width=100 max_height=100 title=$aForms.name}</span>
                            {else}
                                {img theme='noimage/profile_100.png'}
                            {/if}
                        {else}
                            {img theme='noimage/profile_100.png'}
                        {/if}
                        </span>
                        <span class="link" onclick="return $Core.shareInlineBox(this, 'core_js_candidate_setup_form', false, 'job.uploadImage', 500, '&type=candidate{if isset($bIsEdit) && $bIsEdit}&id={$aForms.candidate_id}{/if}');"><i class="icon add"></i>{if $bIsEdit}{phrase var='job.setup_form_change_avatar'}{else}{phrase var='job.setup_form_add_avatar'}{/if}</span>
                        {if $bIsEdit}
                            {if $aForms.image_path}
                                <span class="link" onclick="return $Core.job.deleteImage('#core_js_candidate_setup_form','candidate', {$aForms.candidate_id});" style="margin-left: 10px; color: red;"><i class="icon remove"></i>{phrase var='job.remove_avatar'}</span>
                            {/if}
                        {/if}
                    </span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">{phrase var='job.form_save'}</button>
                    <button type="button" class="btn btn-default" onclick="window.location = '{if $bIsEdit}{$sCandidateLink}{else}{url link='job'}{/if}';">{phrase var='job.form_cancel'}</button>
                </div>
            </div>
        </form>
        </div>
    </div>
    </div>

    {if !$bIsEdit}
    {else}
    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
        {module name='job.candidate-setting'}
    </div>
    {/if}

</div>
<?php
/**
 * CEOfox
 *
 * @copyright  Copyright 2011-2012 CEOfox, Inc.
 * @license    http://ceofox.com/pages/license
 * @version    $Id: setup.html.php 52004 2013-08-17 14:44:49 $
 * @author     CEOfox, Inc.
 */
?>
<?php
defined('PHPFOX') or exit('NO DICE!');
?>
{module name='job.static'}
<div class="job">
    {if !$bIsEdit}
    {module name='job.notification' title='job.setup_notification_title' content='job.setup_notification_content'}
    <div class="panel panel-primary">
    {else}

    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">

    <div class="panel panel-default">
    {/if}
        <div class="panel-heading">
            <h3 class="panel-title"><i class="icon-edit"></i> {phrase var='job.setup_form_header'}</h3>
        </div>
        {$sCreateJs}
        <div class="panel-body">
        <form class="form-horizontal" role="form" action="{$sUrlForm}" method="post" onsubmit="{$sGetJsForm}" id="core_js_employer_form">
        {if count($aMyPages)}
        <div>
            <a href="javascript:void(0)" onclick="doShowMyPages();"><i class="icon import"></i>{phrase var='job.import_from_page'}</a>
            <input type="hidden" id="import_type" value="employer">
            <p>
            <select id="import_from_page" class="hide form-control" name="val[page_id]">
                <option></option>
                {foreach from=$aMyPages item=aPage}
                <option value="{$aPage.page_id}">{$aPage.title}</option>
                {/foreach}
            </select>
            </p>
        </div>
        <hr />
        {/if}
        {if $bIsEdit}
            <input type="hidden" name="val[employer_id]" value="{$aEmployer.employer_id}" id="employer_id">
            <input type="hidden" name="val[categories]" id="js_selected_categories" value={$aEmployer.categories}>
        {/if}
        <div>

        </div>
        <div class="employer_import_info">
            {template file='job.block.employer.import-info'}
        </div>


        <div class="form-group">
            <label class="col-sm-2 control-label">
                {phrase var='job.setup_form_address'}
            </label>
            <div class="col-sm-10">
                <input type="text" name="val[address]" class="form-control" placeholder="{phrase var='job.setup_form_address_placeholder'}" value="{value type='input' id='address'}" id="address">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">
                {phrase var='job.setup_form_website'}
            </label>
            <div class="col-sm-10">
                <input type="text" name="val[website]" class="form-control" placeholder="{phrase var='job.setup_form_website_placeholder'}" value="{value type='input' id='website'}" id="website">
            </div>
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
                {phrase var='job.setup_form_mobile'}
            </label>
            <div class="col-sm-10">
                <input type="text" name="val[mobile]" class="form-control" placeholder="{phrase var='job.setup_form_mobile_placeholder'}" value="{value type='input' id='mobile'}" id="mobile">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">
                {phrase var='job.setup_form_email'}
            </label>
            <div class="col-sm-10">
                <input type="text" name="val[email]" class="form-control" placeholder="{phrase var='job.setup_form_email_placeholder'}" value="{value type='input' id='email'}" id="email" /><br />
                <span class="input-help">{phrase var='job.employer_email_intro'}</span>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">
                {phrase var='job.setup_form_size'}
            </label>
            <div class="col-sm-10">
                {if count($aSupportSizes)}
                <select name="val[size]" class="form-control">
                    {foreach from=$aSupportSizes key=sKey item=sItem}
                    <option value="{$sKey}" {if isset($aForms) && $aForms.size == $sKey}selected="selected"{/if}>{$sItem}</option>
                    {/foreach}
                </select>
                {else}
                <input type="text" name="val[size]" class="form-control" placeholder="{phrase var='job.setup_form_size_placeholder'}" value="{value type='input' id='size'}" id="size">
                {/if}
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">
                {phrase var='job.setup_form_slogan'}
            </label>
            <div class="col-sm-10">
                <input type="text" name="val[slogan]" class="form-control" placeholder="{phrase var='job.setup_form_slogan_placeholder'}" value="{value type='input' id='slogan'}" id="slogan">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">
                {phrase var='job.setup_form_logo'}
            </label>
            <div class="col-sm-10">
                <span class="company_logo_changer" style="display: inline-block">
                    {if $bIsEdit}
                        {if $aEmployer.image_path}
                            <span class="company_logo">{$aEmployer.image_link}</span>
                        {else}
                            <span class="company_no_logo">
                                <i>{phrase var='job.setup_form_nologo'}</i>
                            </span>
                        {/if}
                    {else}
                        <span class="company_no_logo">
                            <i>{phrase var='job.setup_form_nologo'}</i>
                        </span>
                    {/if}
                    <span class="link" onclick="return $Core.shareInlineBox(this, 'core_js_employer_form', false, 'job.uploadImage', 500, '&type=employer{if isset($bIsEdit) && $bIsEdit}&id={$aEmployer.employer_id}{/if}');"><i class="icon add"></i>{phrase var='job.setup_form_addlogo'}</span>
                    {if $bIsEdit}
                        {if $aEmployer.image_path}
                            <span class="link" onclick="return $Core.job.deleteImage('#core_js_employer_form','employer', {$aEmployer.employer_id});" style="margin-left: 10px; color: red;"><i class="icon remove"></i>{phrase var='job.remove_logo'}</span>
                        {/if}
                    {/if}
                </span>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">{phrase var='job.form_save'}</button>
                <button type="button" class="btn btn-default" onclick="window.location = '{if $bIsEdit}{$sEmployerLink}{else}{url link='job'}{/if}';">{phrase var='job.form_cancel'}</button>
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
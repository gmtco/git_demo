<?php
/**
 * CEOfox
 *
 * @copyright  Copyright 2011-2012 CEOfox, Inc.
 * @license    http://ceofox.com/pages/license
 * @version    $Id: setting.html.php 52008 2013-08-17 14:44:49 $
 * @author     CEOfox, Inc.
 */
?>
<?php
  defined('PHPFOX') or exit('NO DICE!');
?>
{module name='job.static'}
<div class="job two_cols">
    {if $bIsSetup && !$bIsEdit}
    {module name='job.notification' title='job.setup_candidate_setting_title' content='job.setup_candidate_setting_content'}
    <div class="panel panel-primary">
    {else}

    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">

    <div class="panel panel-default">
    {/if}
        <div class="panel-heading">
            <h3 class="panel-title"><i class="icon-edit"></i> {phrase var='job.setup_candidate_setting_form_header'}</h3>
        </div>

        {$sCreateJs}
        <div class="panel-body">
        <form class="form-horizontal" role="form" action="{url link='job.candidate.setting'}" method="post" onsubmit="{$sGetJsForm}" id="core_js_candidate_setting_form">
            {if $bIsEdit}
                <div><input type="hidden" name="val[id]" value="{$aForms.candidate_id}"></div>
            {/if}


            <div class="form-group">
                <label class="col-sm-2 control-label">
                    {phrase var='job.setup_form_visibility'}
                </label>
                <div class="col-sm-10">
                <label class="control-label">
                    <input type="radio" name="val[receive_newsletter]" value="1" {value type='radio' id='visibility' default='1'}/>
                    {phrase var='job.yes'}
                </label>
                &nbsp;&nbsp;
                <label class="control-label">
                    <input type="radio" name="val[receive_newsletter]" value="0" {value type='radio' id='visibility' default='0' selected='true'}/> 
                    {phrase var='job.no'}
                </span>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">
                    {phrase var='job.setting_form_allow_employer_search'}
                </label>
                <div class="col-sm-10">
                <label class="control-label">
                    <input type="radio" name="val[allow_employer_search]" value="1" {value type='radio' id='visibility' default='1' selected='true'}/>
                    {phrase var='job.yes'}
                </label>
                &nbsp;&nbsp;
                <label class="control-label">
                    <input type="radio" name="val[allow_employer_search]" value="0" {value type='radio' id='visibility' default='0'}/> 
                    {phrase var='job.no'}
                </span>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">
                        {phrase var='job.form_save'}
                    </button>
                    {if $bIsSetup && !$bIsEdit}
                    <button type="submit" class="btn btn-default" name="skip" value="1">
                        {phrase var='job.form_skip'}
                    </button>
                    {/if}
                </div>
            </div>

        </form>
        </div>
    </div>
    </div>

    {if $bIsSetup && !$bIsEdit}
    {else}
    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
        {module name='job.candidate-setting'}
    </div>
    {/if}

</div>
<?php
/**
 * CEOfox
 *
 * @copyright  Copyright 2011-2012 CEOfox, Inc.
 * @license    http://ceofox.com/pages/license
 * @version    $Id: info.html.php 32009 2013-08-17 14:44:49 $
 * @author     CEOfox, Inc.
 */
?>
<?php
defined('PHPFOX') or exit('NO DICE!');
?>
<div>
    <input type="hidden" name="val[image_path]" value="{value type='input' id='image_path'}" id="image_path">
    <input type="hidden" name="val[server_id]" value="{value type='input' id='server_id'}" id="server_id">
    <input type="hidden" name="val[is_import]" value="{value type='input' id='is_import'}" id="user_import">
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">
        {phrase var='job.setup_form_candidate_name'}
    </label>
    <div class="col-sm-10">
        <input type="text" name="val[name]" class="form-control" placeholder="{phrase var='job.setup_form_candidate_name_placeholder'}" value="{value type='input' id='name'}" id="name">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">
        {phrase var='job.setup_form_candidate_introduction'}
    </label>
    <div class="col-sm-10">{editor id='over_view'}</div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">
        {phrase var='job.setup_form_email'}
    </label>
    <div class="col-sm-10">
        <input type="text" name="val[email]" class="form-control" placeholder="{phrase var='job.setup_form_candidate_email_placeholder'}" title="{phrase var='job.setup_form_candidate_email_placeholder'}" value="{value type='input' id='email'}" id="email">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">
       {phrase var='job.setup_form_address'}
    </label>
    <div class="col-sm-10">
        <input type="text" name="val[address]" class="form-control" placeholder="{phrase var='job.setup_form_candidate_address_placeholder'}" value="{value type='input' id='address'}" id="address">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">
        {phrase var='job.setup_form_city'}
    </label>
    <div class="col-sm-10">
    <input type="text" name="val[city]" class="form-control" placeholder="{phrase var='job.setup_form_city_placeholder'}" value="{value type='input' id='city'}" id="city">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">
       {phrase var='job.setup_form_country'}
    </label>
    <div class="col-sm-10">
    {select_location}
    {module name='core.country-child' country_force_div=true}
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">
       {phrase var='job.setup_form_zipcode'}
    </label>
    <div class="col-sm-10">
    <input type="text" name="val[zipcode]" class="form-control" placeholder="{phrase var='job.setup_form_zipcode_placeholder'}" value="{value type='input' id='zipcode'}" id="zipcode">
    </div>
</div>
{if isset($bIsImport) && $bIsImport}
    <script type="text/javascript">
        {if !empty($aForms.image_path)}
            $('.candidate_avatar').html('{img server_id=$aForms.server_id path="core.url_user" file=$aForms.image_path suffix="_100_square" max_width=100 max_height=100 title=$aForms.name}');
        {else}
            $('.candidate_avatar').html('{img theme="noimage/profile_100.png"}');
        {/if}
    </script>
{/if]}
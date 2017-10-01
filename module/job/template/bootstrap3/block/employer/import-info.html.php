<?php
/**
 * CEOfox
 *
 * @copyright  Copyright 2011-2012 CEOfox, Inc.
 * @license    http://ceofox.com/pages/license
 * @version    $Id: import-info.html.php 12006 2013-08-17 14:44:49 $
 * @author     CEOfox, Inc.
 */
?>
<?php
  defined('PHPFOX') or exit('NO DICE!');
?>
<div>
    <input type="hidden" name="val[image_path]" value="{value type='input' id='image_path'}" id="image_path">
    <input type="hidden" name="val[current_image_path]" value="{value type='input' id='image_path'}" id="current_image_path">
    <input type="hidden" name="val[server_id]" value="{value type='input' id='server_id'}" id="server_id">
    <input type="hidden" name="val[remove_image]" value="0" id="remove_image">
    <input type="hidden" name="val[owner_id]" value="{value type='input' id='owner_id'}" id="owner_id">
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">
        {phrase var='job.setup_form_title'}
    </label>
    <div class="col-sm-10">
        <input type="text" name="val[title]" class="form-control" placeholder="{phrase var='job.setup_form_title_placeholder'}" value="{value type='input' id='title'}" id="title">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">
        {phrase var='job.setup_form_introduction'}
    </label>
    <div class="col-sm-10">
        {editor id='introduction'}
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">
        {phrase var='job.category'}
    </label>
    <div class="col-sm-10">
        <div class="label_flow label_hover labelFlowContent" style="height:150px;" id="js_category_content">
            {module name='job.employer.category'}
        </div>
    </div>
</div>

{if isset($sPageImage) && !empty($sPageImage)}
    <script type="text/javascript">
        {if isset($bIsEdit) && $bIsEdit}
            $('.company_logo').html('{$sPageImage}');
        {else}
            $('.company_no_logo').html('{$sPageImage}');  
        {/if}
    </script>
{/if]}
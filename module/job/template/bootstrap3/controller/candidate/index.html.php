<?php
/**
 * CEOfox
 *
 * @copyright  Copyright 2011-2012 CEOfox, Inc.
 * @license    http://ceofox.com/pages/license
 * @version    $Id: index.html.php 92009 2013-08-17 14:44:49 $
 * @author     CEOfox, Inc.
 */
?>
<?php
  defined('PHPFOX') or exit('NO DICE!');
?>
{module name='job.static'}
<div class="job two_cols">
    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
        {module name='job.recent-article' target=2}
    </div>
    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
        {module name='job.candidate-setting'}
    </div>
</div>
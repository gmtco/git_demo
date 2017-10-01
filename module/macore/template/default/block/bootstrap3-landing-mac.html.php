<?php
/*
bootstrapped by
 __  __
|  \/  | __ _  ___ __ _  __ _  ___  _ __ __ _  __ _  __ _ 
| |\/| |/ _` |/ __/ _` |/ _` |/ _ \| '__/ _` |/ _` |/ _` |
| |  | | (_| | (_| (_| | (_| | (_) | | | (_| | (_| | (_| |
|_|  |_|\__,_|\___\__,_|\__, |\___/|_|  \__,_|\__, |\__,_|
                        |___/                 |___/  
*/
defined('PHPFOX') or exit('NO DICE!');
?>

{if $sMacSequenceStyle == 'apple'}
{template file='macore.block.sequence-apple'}
{elseif $sMacSequenceStyle == 'parallax'}
{template file='macore.block.sequence-parallax'}
{else}
{template file='macore.block.bootstrap3-landing-classic'}
{/if}

<hr class="invisible">

<div class="container">
<div class="row">
<div class="col-xs-12">

  <div class="row">
    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
      <h1 class="text-center mac-xl-icon"><i class="icon-photo icon-large"></i></h1>
      <h2>Photos</h2>
      <p>This is an example of landing page made with bootstrap, included in this theme.</p>
      <p><a href="{url link='photo'}" class="btn btn-default">Browse photos »</a></p>
    </div><!-- /.col-lg-4 -->
    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
      <h1 class="text-center mac-xl-icon"><i class="icon-video icon-large"></i></h1>
      <h2>Videos</h2>
      <p>You can leave only top welcome box or enable also this extra content to show what you site offer.</p>
      <p><a href="{url link='video'}" class="btn btn-default">Browse videos »</a></p>
    </div><!-- /.col-lg-4 -->
    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
      <h1 class="text-center mac-xl-icon"><i class="icon-blog icon-large"></i></h1>
      <h2>Blog</h2>
      <p>There is one html file to edit for change this text, images, position, add or remove new box.</p>
      <p><a href="{url link='blog'}" class="btn btn-default">Browse blogs »</a></p>
    </div><!-- /.col-lg-4 -->
    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
      <h1 class="text-center mac-xl-icon"><i class="icon-star icon-large"></i></h1>
      <h2>Pages</h2>
      <p>It's 100% responsive, try resize your browser. Are you ready to see site inside?</p>
      <p><a href="{url link='pages'}" class="btn btn-default">Browse pages »</a></p>
    </div><!-- /.col-lg-4 -->
  </div>

  <hr class="featurette-divider">

  <div class="row featurette">
    <div class="col-xs-12 col-sm-6 col-md-7 col-lg-7">
      <h2 class="featurette-heading">Features extensions <span class="text-muted">only for bootstraphpfox</span></h2>
      <p class="lead">This theme include exclusive extension not available anywhere, for example site tour, show photos shared via feed on browse photos, html5 ajax browsing, zoom in/out photo on mobile site, theme switcher, disqus.com integration, custom blocks, and more...</p>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5">
      <h1 class="text-center mac-xxl-icon"><i class="icon-cogs icon-large"></i></h1>
    </div>
  </div>

  <hr class="featurette-divider">

  <div class="row featurette">
    <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5">
      <h1 class="text-center mac-xxl-icon"><i class="icon-mobile-phone icon-large"></i></h1>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-7 col-lg-7">
      <h2 class="featurette-heading">Mobile / Tablet ready <span class="text-muted">100% responsive</span></h2>
      <p class="lead">This theme is made using Bootstrap Framework, sleek, intuitive, and powerful mobile first front-end framework for faster and easier web development. So it's full compatible with all device and modern browser.</p>
    </div>
  </div>

  <hr class="featurette-divider">

  <div class="row featurette">
    <div class="col-xs-12 col-sm-6 col-md-7 col-lg-7">
      <h2 class="featurette-heading">Hundreds of icons <span class="text-muted">any color, any size</span></h2>
      <p class="lead">Thanks to font-awesome you have a large choice of icon, easy change color and size via css. It's font-icon, so also better for performance.</p>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5">
      <h1 class="text-center mac-xxl-icon"><i class="icon-star icon-large"></i></h1>
    </div>
  </div>

  <hr class="featurette-divider">

  <div class="row featurette">
    <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5">
      <h1 class="text-center mac-xxl-icon"><i class="icon-terminal icon-large"></i></h1>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-7 col-lg-7">
      <h2 class="featurette-heading">Clean code <span class="text-muted">css well organized in less.js files</span></h2>
      <p class="lead">Coded with latest tecnologies like html5, jquery, bootstrap, less.js and dozens of plugins all togheter integrated into one theme!</p>
    </div>
  </div>

  <hr class="featurette-divider">

  <div class="row featurette">
    <div class="col-xs-12 col-sm-6 col-md-7 col-lg-7">
      <h2 class="featurette-heading">Unlimited styles <span class="text-muted">easy style generator</span></h2>
      <p class="lead">Thanks to bootstrap theme generator available here for download: <a target="_blank" href="http://getbootstrap.com/customize">Bootstrap Theme Generator</a>, you can create any color scheme for all elements used inside theme, to fit better your own brand!</p>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5">
      <h1 class="text-center mac-xxl-icon"><i class="icon-magic icon-large"></i></h1>
    </div>
  </div>

  <hr class="featurette-divider">

  <div class="row featurette">
    <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5">
      <h1 class="text-center mac-xxl-icon"><i class="icon-code icon-large"></i></h1>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-7 col-lg-7">
      <h2 class="featurette-heading">Dozens jquery plugins <span class="text-muted">integration</span></h2>
      <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
    </div>
  </div>

  <hr class="featurette-divider">

  <div class="row featurette">
    <div class="col-xs-12 col-sm-6 col-md-7 col-lg-7">
      <h2 class="featurette-heading">And counting <span class="text-muted">new features</span></h2>
      <p class="lead">New features and improvement are added constantly, as well full support for third party addons.</p>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5">
      <h1 class="text-center mac-xxl-icon"><i class="icon-smile icon-large"></i></h1>
    </div>
  </div>


</div>
</div>
</div>
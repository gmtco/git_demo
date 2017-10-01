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
<div id="mac-map-registration-wrap" class="mac-landing-bg-cover">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 animated fadeInLeftBig">
			<h1>Connect with friends and the
			world around you on SiteName.</h1>
			<br><br>
			<p class="lead mac-mrg-tp">
			<i class="icon-camera icon-large"></i> See photos and updates from friends in News Feed.
			<br><br>
			<i class="icon-comments icon-large"></i> Share what's new in your life on your Timeline.
			<br><br>
			<i class="icon-facetime-video icon-large"></i> Share Videos, Quiz, Polls, Events and more.
			<br><br>
			<i class="icon-search icon-large"></i> Find more of what you're looking for with Search. 
			</p>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
			{module name='user.register'}
			</div>
		</div>
	</div>
</div>

{if Phpfox::isModule('userpics')}
<hr class="invisible">
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			{module name='userpics.display'}
			{*module name='user.images'*}
		</div>
	</div>
</div>
{/if}





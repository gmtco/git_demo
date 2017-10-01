<div class="navbar navbar-default mac-navbar-search">
  <div class="mac-search-forum-container">

    <!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
    <button data-target=".navbar-collapse-search" data-toggle="collapse" class="navbar-toggle" type="button">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>

    <!-- Be sure to leave the brand out there if you want it shown 
    <a href="#" class="navbar-brand">Search bar</a>-->

    <!-- main menu - collapsed when mobile -->
    <div class="navbar-collapse navbar-collapse-search collapse mac-navbar-search-filters">

		<ul class="nav navbar-nav">

			{if Phpfox::isUser()}
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					{phrase var='forum.quick_links'} <i class="icon-arrow-down"></i>
				</a>
				<ul class="dropdown-menu">
					<li><a href="{url link='forum.read'}"><i class="icon-eye"></i> {phrase var='forum.mark_forums_read'}</a></li>
					<li><a href="{url link='forum.search' view='new'}"><i class="icon-star"></i> {phrase var='forum.new_posts'}</a></li>
					<li><a href="{url link='forum.search' view='my-thread'}"><i class="icon-heart"></i> {phrase var='forum.my_threads'}</a></li>
					<li><a href="{url link='forum.search' view='subscribed'}"><i class="icon-rss"></i> {phrase var='forum.subscribed_threads'}</a></li>
					<li>
						<a href="{url link='forum.search'}">
							 <i class="icon-search"></i> {phrase var='forum.advanced_search'}</a>
						</a>
					</li>
				</ul>
			</li>
			{/if}
			
		</ul>

		<form method="post" action="{url link='forum.search'}" class="navbar-right mac-form-forum-search navbar-form" role="search">
			<div class="input-group">
				<input placeholder="{phrase var='forum.search'}" type="text" name="search[keyword]" value="" class="col-lg-8 form-control" /> 
				<span class="input-group-btn">
					<a class="btn btn-default" href="{url link='forum.search'}">
						{phrase var='forum.advanced_search'} <i class="icon-search"></i></a>
					</a>
				</span>
			</div>
		</form>

    </div><!-- /.nav-collapse -->
  </div><!-- /.container -->
</div><!-- /.navbar -->



{if !count($aForums)}
<br>
<div class="alert alert-info">
	{phrase var='forum.no_forums_have_been_created'}
	{if Phpfox::getUserParam('forum.can_add_new_forum')}
	<a class="btn btn-primary" href="{url link='admincp.forum.add'}">{phrase var='forum.create_a_new_forum'}</a>
	{/if}
</div>
{else}
{template file='forum.block.entry'}
{/if}
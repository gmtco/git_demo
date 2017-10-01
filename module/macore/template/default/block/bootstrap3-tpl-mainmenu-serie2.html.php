 <header>
      <nav class='navbar navbar-default'>
        <a class='navbar-brand' href='index.html'>
          <img width="81" height="21" class="logo" alt="Flatty" src="assets/images/logo.svg" />
          <img width="21" height="21" class="logo-xs" alt="Flatty" src="assets/images/logo_xs.svg" />
        </a>
        <a class='toggle-nav btn pull-left' href='#'>
          <i class='icon-reorder'></i>
        </a>
        <ul class='nav'>
          <li class='dropdown light only-icon'>
            <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
              <i class='icon-cog'></i>
            </a>
            <ul class='dropdown-menu color-settings'>
              <li class='color-settings-body-color'>
                <div class='color-title'>Body color</div>
                <a data-change-to='assets/stylesheets/light-theme.css' href='#'>
                  Light
                  <small>(default)</small>
                </a>
                <a data-change-to='assets/stylesheets/dark-theme.css' href='#'>
                  Dark
                </a>
                <a data-change-to='assets/stylesheets/dark-blue-theme.css' href='#'>
                  Dark blue
                </a>
              </li>
              <li class='divider'></li>
              <li class='color-settings-contrast-color'>
                <div class='color-title'>Contrast color</div>
                <a data-change-to="contrast-red" href="#"><i class='icon-cog text-red'></i>
                Red
                <small>(default)</small>
                </a>
              </li>
            </ul>
          </li>
          <li class='dropdown medium only-icon widget'>
            <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
              <i class='icon-rss'></i>
              <div class='label'>5</div>
            </a>
            <ul class='dropdown-menu'>
              <li>
                <a href='#'>
                  <div class='widget-body'>
                    <div class='pull-left icon'>
                      <i class='icon-user text-success'></i>
                    </div>
                    <div class='pull-left text'>
                      John Doe signed up
                      <small class='text-muted'>just now</small>
                    </div>
                  </div>
                </a>
              </li>
              <li class='divider'></li>
              <li>
                <a href='#'>
                  <div class='widget-body'>
                    <div class='pull-left icon'>
                      <i class='icon-inbox text-error'></i>
                    </div>
                    <div class='pull-left text'>
                      New Order #002
                      <small class='text-muted'>3 minutes ago</small>
                    </div>
                  </div>
                </a>
              </li>
              <li class='divider'></li>
              <li>
                <a href='#'>
                  <div class='widget-body'>
                    <div class='pull-left icon'>
                      <i class='icon-comment text-warning'></i>
                    </div>
                    <div class='pull-left text'>
                      America Leannon commented Flatty with veeery long text.
                      <small class='text-muted'>1 hour ago</small>
                    </div>
                  </div>
                </a>
              </li>
              <li class='divider'></li>
              <li>
                <a href='#'>
                  <div class='widget-body'>
                    <div class='pull-left icon'>
                      <i class='icon-user text-success'></i>
                    </div>
                    <div class='pull-left text'>
                      Jane Doe signed up
                      <small class='text-muted'>last week</small>
                    </div>
                  </div>
                </a>
              </li>
              <li class='divider'></li>
              <li>
                <a href='#'>
                  <div class='widget-body'>
                    <div class='pull-left icon'>
                      <i class='icon-inbox text-error'></i>
                    </div>
                    <div class='pull-left text'>
                      New Order #001
                      <small class='text-muted'>1 year ago</small>
                    </div>
                  </div>
                </a>
              </li>
              <li class='widget-footer'>
                <a href='#'>All notifications</a>
              </li>
            </ul>
          </li>
          <li class='dropdown dark user-menu'>
            <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
              <img width="23" height="23" alt="Mila Kunis" src="assets/images/avatar.jpg" />
              <span class='user-name'>Mila Kunis</span>
              <b class='caret'></b>
            </a>
            <ul class='dropdown-menu'>
              <li>
                <a href='user_profile.html'>
                  <i class='icon-user'></i>
                  Profile
                </a>
              </li>
            </ul>
          </li>
        </ul>
        <form action='search_results.html' class='navbar-form navbar-right hidden-xs' method='get'>
          <button class='btn btn-link icon-search' name='button' type='submit'></button>
          <div class='form-group'>
            <input value="" class="form-control" placeholder="Search..." autocomplete="off" id="q_header" name="q" type="text" />
          </div>
        </form>
      </nav>
    </header>
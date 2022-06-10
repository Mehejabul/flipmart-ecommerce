  <!-- ========== Left Sidebar Start ========== -->
  <div class="vertical-menu">
      <div data-simplebar class="h-100">
          <!--- Sidemenu -->
          <div id="sidebar-menu">
              <!-- Left Menu Start -->
              <ul class="metismenu list-unstyled" id="side-menu">
                  <li>
                      <a href="index.html">
                          <i data-feather="home"></i>
                          <span data-key="t-dashboard">Dashboard</span>
                      </a>
                  </li>
                  <li>
                      <a href="javascript: void(0);" class="has-arrow">
                          <i data-feather="users"></i>
                          <span data-key="t-apps">User</span>
                      </a>
                      <ul class="sub-menu" aria-expanded="false">
                          <li>
                              <a href="{{ route('user.index') }}">
                                  <i data-feather="user"></i>
                                  <span data-key="t-calendar">All User</span>
                              </a>
                          </li>
                          <li>
                              <a href="{{ route('user.create') }}">
                                  <i data-feather="user-plus"></i>
                                  <span data-key="t-chat">Add User</span>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li>
                      <a href="javascript: void(0);" class="has-arrow">
                          <i data-feather="shopping-cart"></i>
                          <span data-key="t-apps">Product</span>
                      </a>
                      <ul class="sub-menu" aria-expanded="false">
                          <li>
                              <a href="{{ route('product.create') }}">
                                  <span data-key="t-calendar">Add New Prodact</span>
                              </a>
                          </li>
                          <li>
                              <a href="{{ route('product.index') }}">
                                  <span data-key="t-chat">All Product</span>
                              </a>
                          </li>
                          <li>
                              <a href="{{ route('product.category.index') }}">
                                  <span data-key="t-chat">Category</span>
                              </a>
                          </li>
                          <li>
                              <a href="{{ route('brand.index') }}">
                                  <span data-key="t-chat">Brand</span>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li>
                      <a href="javascript: void(0);" class="has-arrow">
                          <i data-feather="monitor"></i>
                          <span data-key="t-apps">Banner</span>
                      </a>
                      <ul class="sub-menu" aria-expanded="false">
                          <li>
                              <a href="{{ route('banner.index') }}">
                                  <span data-key="t-calendar">All Banner</span>
                              </a>
                          </li>
                          <li>
                              <a href="{{ route('banner.create') }}">
                                  <span data-key="t-chat">Add Banner</span>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li>
                      <a href="javascript: void(0);" class="has-arrow">
                          <i data-feather="settings"></i>
                          <span data-key="t-apps">Setting</span>
                      </a>
                      <ul class="sub-menu" aria-expanded="false">
                          <li>
                              <a href="{{ route('manage.basic.index') }}">
                                  <i data-feather="tool"></i>
                                  <span data-key="t-calendar">Basic Setting</span>
                              </a>
                          </li>
                          <li>
                              <a href="{{ route('manage.contact.index') }}">
                                  <i data-feather="info"></i>
                                  <span data-key="t-chat">Contact Information</span>
                              </a>
                          </li>
                          <li>
                              <a href="{{ route('manage.social.index') }}">
                                  <i data-feather="info"></i>
                                  <span data-key="t-chat">Social Information</span>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li>
                      <a href="layouts-horizontal.html">
                          <i data-feather="layout"></i>
                          <span data-key="t-horizontal">Horizontal</span>
                      </a>
                  </li>
                  <li>
                      <a href="javascript: void(0);" class="has-arrow">
                          <i data-feather="user"></i>
                          <span data-key="t-partner">Partner</span>
                      </a>
                      <ul class="sub-menu" aria-expanded="false">
                          <li>
                              <a href="{{ route('partner.index') }}">
                                  <span data-key="t-chat">All Partner</span>
                              </a>
                          </li>
                          <li>
                              <a href="{{ route('partner.create') }}">
                                  <span data-key="t-chat">Add Partner</span>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li>
                      <a class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                          <i data-feather="log-out"></i>
                          <span data-key="t-horizontal">Logout</span>
                      </a>
                  </li>
              </ul>
          </div>
          <!-- Sidebar -->
      </div>
  </div>
  <!-- Left Sidebar End -->

  <!-- Right Sidebar -->
  <div class="right-bar">
      <div data-simplebar class="h-100">
          <div class="rightbar-title d-flex align-items-center bg-dark p-3">

              <h5 class="m-0 me-2 text-white">Theme Customizer</h5>

              <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                  <i class="mdi mdi-close noti-icon"></i>
              </a>
          </div>

          <!-- Settings -->
          <hr class="m-0" />

          <div class="p-4">
              <h6 class="mb-3">Layout</h6>
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="layout" id="layout-vertical" value="vertical">
                  <label class="form-check-label" for="layout-vertical">Vertical</label>
              </div>
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="layout" id="layout-horizontal" value="horizontal">
                  <label class="form-check-label" for="layout-horizontal">Horizontal</label>
              </div>

              <h6 class="mt-4 mb-3 pt-2">Layout Mode</h6>

              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="layout-mode" id="layout-mode-light" value="light">
                  <label class="form-check-label" for="layout-mode-light">Light</label>
              </div>
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="layout-mode" id="layout-mode-dark" value="dark">
                  <label class="form-check-label" for="layout-mode-dark">Dark</label>
              </div>

              <h6 class="mt-4 mb-3 pt-2">Layout Width</h6>

              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="layout-width" id="layout-width-fuild" value="fuild"
                      onchange="document.body.setAttribute('data-layout-size', 'fluid')">
                  <label class="form-check-label" for="layout-width-fuild">Fluid</label>
              </div>
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="layout-width" id="layout-width-boxed" value="boxed"
                      onchange="document.body.setAttribute('data-layout-size', 'boxed')">
                  <label class="form-check-label" for="layout-width-boxed">Boxed</label>
              </div>

              <h6 class="mt-4 mb-3 pt-2">Layout Position</h6>

              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="layout-position" id="layout-position-fixed"
                      value="fixed" onchange="document.body.setAttribute('data-layout-scrollable', 'false')">
                  <label class="form-check-label" for="layout-position-fixed">Fixed</label>
              </div>
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="layout-position" id="layout-position-scrollable"
                      value="scrollable" onchange="document.body.setAttribute('data-layout-scrollable', 'true')">
                  <label class="form-check-label" for="layout-position-scrollable">Scrollable</label>
              </div>

              <h6 class="mt-4 mb-3 pt-2">Topbar Color</h6>

              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="topbar-color" id="topbar-color-light" value="light"
                      onchange="document.body.setAttribute('data-topbar', 'light')">
                  <label class="form-check-label" for="topbar-color-light">Light</label>
              </div>
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="topbar-color" id="topbar-color-dark" value="dark"
                      onchange="document.body.setAttribute('data-topbar', 'dark')">
                  <label class="form-check-label" for="topbar-color-dark">Dark</label>
              </div>

              <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Size</h6>

              <div class="form-check sidebar-setting">
                  <input class="form-check-input" type="radio" name="sidebar-size" id="sidebar-size-default"
                      value="default" onchange="document.body.setAttribute('data-sidebar-size', 'lg')">
                  <label class="form-check-label" for="sidebar-size-default">Default</label>
              </div>
              <div class="form-check sidebar-setting">
                  <input class="form-check-input" type="radio" name="sidebar-size" id="sidebar-size-compact"
                      value="compact" onchange="document.body.setAttribute('data-sidebar-size', 'md')">
                  <label class="form-check-label" for="sidebar-size-compact">Compact</label>
              </div>
              <div class="form-check sidebar-setting">
                  <input class="form-check-input" type="radio" name="sidebar-size" id="sidebar-size-small" value="small"
                      onchange="document.body.setAttribute('data-sidebar-size', 'sm')">
                  <label class="form-check-label" for="sidebar-size-small">Small (Icon View)</label>
              </div>

              <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Color</h6>

              <div class="form-check sidebar-setting">
                  <input class="form-check-input" type="radio" name="sidebar-color" id="sidebar-color-light"
                      value="light" onchange="document.body.setAttribute('data-sidebar', 'light')">
                  <label class="form-check-label" for="sidebar-color-light">Light</label>
              </div>
              <div class="form-check sidebar-setting">
                  <input class="form-check-input" type="radio" name="sidebar-color" id="sidebar-color-dark" value="dark"
                      onchange="document.body.setAttribute('data-sidebar', 'dark')">
                  <label class="form-check-label" for="sidebar-color-dark">Dark</label>
              </div>
              <div class="form-check sidebar-setting">
                  <input class="form-check-input" type="radio" name="sidebar-color" id="sidebar-color-brand"
                      value="brand" onchange="document.body.setAttribute('data-sidebar', 'brand')">
                  <label class="form-check-label" for="sidebar-color-brand">Brand</label>
              </div>

              <h6 class="mt-4 mb-3 pt-2">Direction</h6>

              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="layout-direction" id="layout-direction-ltr"
                      value="ltr">
                  <label class="form-check-label" for="layout-direction-ltr">LTR</label>
              </div>
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="layout-direction" id="layout-direction-rtl"
                      value="rtl">
                  <label class="form-check-label" for="layout-direction-rtl">RTL</label>
              </div>

          </div>

      </div> <!-- end slimscroll-menu-->
  </div>
  <!-- /Right-bar -->

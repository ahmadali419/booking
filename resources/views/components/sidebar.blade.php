  <!-- BEGIN: Main Menu-->
  <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
      <div class="navbar-header">
          <ul class="nav navbar-nav flex-row">
              <li class="nav-item me-auto"><a class="navbar-brand" href=""><span class="brand-logo">
                          <img class="img-fluid logo-img" src="{{ asset('admin/assets/cms/logo.jpg') }}" style="height:72px"></span>
                  </a></li>
              <li class="nav-item nav-toggle text-white"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
          </ul>
      </div>
      <div class="shadow-bottom"></div>
      <div class="main-menu-content" style="margin-top: 15px;!important">

          <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
              <li class=" nav-item"><a class="d-flex align-items-center bg-secondary text-white" target="_blank" href="{{ route('front') }}"><i class="fa fa-left-right"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Go To Website</span></a>
              </li>
              <li class=" nav-item"><a class="d-flex align-items-center " href=""><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                          <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                          <polyline points="9 22 9 12 15 12 15 22"></polyline>
                      </svg><span class="menu-title text-truncate" data-i18n="Dashboards">Dashboard</span></a>

              </li>
          
              <li class=" navigation-header"><span data-i18n="Apps &amp; Pages"></span>
              </li>

              {{-- <li class="nav-item"><a class="d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-in">
                          <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
                          <polyline points="10 17 15 12 10 7"></polyline>
                          <line x1="15" y1="12" x2="3" y2="12"></line>
                      </svg><span class="menu-title text-truncate" data-i18n="Typography">Logout</span></a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST">
                      @csrf
                  </form>
              </li> --}}
              <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Postal Codes</span><i data-feather="more-horizontal"></i>
              </li>
              <li class=" nav-item {{ Request::url() == route('postalcode.list') ? 'open' : '' }}">
                  <a class="d-flex align-items-center" href="#">
                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase">
                          <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                          <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                      </svg>
                      <span class="menu-title text-truncate" data-i18n="User">Postal Codes</span></a>
                  <ul class="menu-content">
    
                      <li>
                          <a class="d-flex align-items-center {{ Request::url() == route('postalcode.list') ? 'active' : '' }}" href="{{ route('postalcode.list') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">
                                 Postal code list</span>
                          </a>
                      </li>
                  </ul>
                   
              </li>
              <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Services</span><i data-feather="more-horizontal"></i>
              </li>
              <li class=" nav-item {{ Request::url() == route('service.list') ? 'open' : '' }}">
                  <a class="d-flex align-items-center" href="#">
                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase">
                          <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                          <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                      </svg>
                      <span class="menu-title text-truncate" data-i18n="User">Services</span></a>
                  <ul class="menu-content">
    
                      <li>
                          <a class="d-flex align-items-center {{ Request::url() == route('service.list') ? 'active' : '' }}" href="{{ route('service.list') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">
                                 Service list</span>
                          </a>
                      </li>
                  </ul>
                   
              </li>
              <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Items</span><i data-feather="more-horizontal"></i>
              </li>
              <li class=" nav-item {{ Request::url() == route('item.list') ? 'open' : '' }}">
                  <a class="d-flex align-items-center" href="#">
                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase">
                          <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                          <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                      </svg>
                      <span class="menu-title text-truncate" data-i18n="User">Items</span></a>
                  <ul class="menu-content">
    
                      <li>
                          <a class="d-flex align-items-center {{ Request::url() == route('item.list') ? 'active' : '' }}" href="{{ route('item.list') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">
                                 Items list</span>
                          </a>
                      </li>
                      <li>
                          <a class="d-flex align-items-center {{ Request::url() == route('item-menu.list') ? 'active' : '' }}" href="{{ route('item-menu.list') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">
                                 Item Menu list</span>
                          </a>
                      </li>
                  </ul>
                   
              </li>
              <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Bookings</span><i data-feather="more-horizontal"></i>
              </li>
              <li class=" nav-item {{ Request::url() == route('time-slot.create') ? 'open' : '' }}">
                  <a class="d-flex align-items-center" href="#">
                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase">
                          <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                          <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                      </svg>
                      <span class="menu-title text-truncate" data-i18n="User">Bookings</span></a>
                  <ul class="menu-content">
    
                      <li>
                          <a class="d-flex align-items-center {{ Request::url() == route('time-slot.create') ? 'active' : '' }}" href="{{ route('time-slot.create') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">
                                 Time Slot</span>
                          </a>
                      </li>
                     
                  </ul>
                   
              </li>
             
          </ul>

      </div>
  </div>
  <!-- END: Main Menu-->
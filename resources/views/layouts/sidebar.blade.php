@yield('sidebar')    
        <!-- Page Sidebar Start-->
        <header class="main-nav">
          <!-- <div class="sidebar-user text-center"><a class="setting-primary" href="javascript:void(0)"><i data-feather="settings"></i></a><img class="img-90 rounded-circle" src="{{url('/assets/images/dashboard/1.png')}}" alt="">
            <div class="badge-bottom"><span class="badge badge-primary">New</span></div><a href="user-profile.html">
              <h6 class="mt-3 f-14 f-w-600"></h6></a>
            <p class="mb-0 font-roboto"></p>
          </div> -->
          <nav>
            <div class="main-navbar">
              <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
              <div id="mainnav">           
                <ul class="nav-menu custom-scrollbar">
                  <li class="back-btn">
                    <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                  </li>
                  <li class="sidebar-main-title">
                    <div>
                      <h6>Menu             </h6>
                    </div>
                  </li>
                  
                    <li class="dropdown"><a class="nav-link menu-title link-nav" id="undian" href="{{route('undianIndex')}}"><i data-feather="bell"></i><span>Undian</span></a></li>
                    <li class="dropdown"><a class="nav-link menu-title link-nav" href="{{route('inputPeriodeUndianIndex')}}"><i data-feather="file-plus"></i><span>Input Periode Undian</span></a></li>
                    <li class="dropdown"><a class="nav-link menu-title link-nav {{ isset($activeMenu) ? 'active' : '' }}" href="{{route('riwayatUndianIndex')}}"><i data-feather="clipboard"></i><span>History Undian</span></a></li>                  
                </ul>
              </div>
              <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </div>
          </nav>
        </header>
        <!-- Page Sidebar Ends-->
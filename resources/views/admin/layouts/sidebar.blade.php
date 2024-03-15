<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

  <div class="slimscroll-menu">

    <!--- Sidemenu -->
    <div id="sidebar-menu">
      <ul class="metismenu" id="side-menu">

        <li>
          <a href="{{route('place.index')}}" class="waves-effect">
            <i class="ion-md-speedometer"></i>
            <span> Địa điểm </span>
            {{-- <span class="menu-arrow"></span> --}}
            {{-- <span class="badge badge-info badge-pill float-right"> 3 </span> --}}
          </a>
        </li>

        <li>
          <a href="{{route('hotel.index')}}" class="waves-effect">
            <i class="ion-md-speedometer"></i>
            <span> Khách sạn </span>
            {{-- <span class="menu-arrow"></span> --}}
            {{-- <span class="badge badge-info badge-pill float-right"> 3 </span> --}}
          </a>
        </li>

        <li>
          <a href="{{route('tour.index')}}" class="waves-effect">
            <i class="ion-md-speedometer"></i>
            <span> Tour du lịch </span>
            {{-- <span class="menu-arrow"></span> --}}
            {{-- <span class="badge badge-info badge-pill float-right"> 3 </span> --}}
          </a>
        </li>

        <li>
          <a href="{{route('admin.log')}}" class="waves-effect">
            <i class="ion-md-speedometer"></i>
            <span> Lịch sử hoạt động </span>
          </a>
        </li>

        <li>
          <a href="{{route('admin.library')}}" class="waves-effect">
            <i class="ion-md-speedometer"></i>
            <span> Thư viện ảnh </span>
            <span class="menu-arrow"></span>
            {{-- <span class="badge badge-info badge-pill float-right"> 3 </span> --}}
          </a>
          <ul class="nav-second-level" aria-expanded="false">
            <li><a href="{{route('admin.image')}}">Tải hình ảnh</a></li>
          </ul>
        </li>

        {{-- <li>
          <a href="javascript: void(0);" class="waves-effect">
            <i class="mdi mdi-share-variant"></i>
            <span> Multi Level </span>
            <span class="menu-arrow"></span>
          </a>
          <ul class="nav-second-level nav" aria-expanded="false">
            <li>
              <a href="javascript: void(0);">Level 1.1</a>
            </li>
            <li>
              <a href="javascript: void(0);" aria-expanded="false">Level 1.2
                <span class="menu-arrow"></span>
              </a>
              <ul class="nav-third-level nav" aria-expanded="false">
                <li>
                  <a href="javascript: void(0);">Level 2.1</a>
                </li>
                <li>
                  <a href="javascript: void(0);">Level 2.2</a>
                </li>
              </ul>
            </li>
          </ul>
        </li> --}}
      </ul>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
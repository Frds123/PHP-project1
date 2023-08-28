<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0
      border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5
          position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" {{ route('admin.index') }} ">
            <img src="{{ asset('ui/frontend-ui/assets') }}/img/nub.png" class="navbar-brand-img h-100" alt="main_logo">
            {{-- <img src="{{ asset('ui/frontend-ui/assets') }}/img/nub.png"> --}}
            <span class="ms-1 font-weight-bold text-white">NUB</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse w-auto h-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
          <li class="nav-item mb-2 mt-0">
            <a data-bs-toggle="collapse" href="#ProfileNav"
              class="nav-link text-white"
              aria-controls="ProfileNav" role="button"
              aria-expanded="false">
              @if (Auth::user()->profile->profile_pic)
              <img src="{{ asset('storage/profile/'.Auth::user()->profile->profile_pic)}}" class="avatar">
              @else
              <img src="{{ asset('storage/profile/user.png')}}" class="avatar">
              @endif

              <span class="nav-link-text ms-2 ps-1">{{ Auth::user()->name }}</span>
            </a>
            <div class="collapse" id="ProfileNav" style="">
              <ul class="nav ">
                    <li class="nav-item">
                    <a class="nav-link text-white"
                        href="{{ route('profiles.show', Auth::id())}}">
                        <span class="sidenav-normal ms-3 ps-1">
                        My Profile </span>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-white"
                        href="{{ route('change-password')}}">
                        <span class="sidenav-normal ms-3 ps-1">
                        Change Password </span>
                    </a>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link text-white">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();"> {{ __('Log Out') }} </x-dropdown-link>
                            </form>
                        </span>
                    </li>
                </ul>
            </div>
        @can('aside_btn')
        </li>
        <hr class="horizontal light mt-0">
        <li class="nav-item mt-3">
            <a class="nav-link text-white " href=" {{ route('admin.index') }} ">
                <i class="material-icons-round opacity-10">dashboard</i>
                <span class="sidenav-normal ms-2 ps-1">
                    Dashboard </span>
            </a>
        </li>
        <li class="nav-item mt-3">
            <a class="nav-link text-white " href="{{ route('payment.index') }}">
                <i class="material-icons opacity-10">receipt_long</i>
                <span class="sidenav-normal ms-2 ps-1">
                    Payments </span>
            </a>
        </li>

    @can('aside')
    <li class="nav-item mt-3">
        <a data-bs-toggle="collapse" href="#reports" class="nav-link text-white" aria-controls="#reports"
            role="button" aria-expanded="false">
            <i class="material-icons opacity-10">receipt</i>
            <span class="nav-link-text ms-2 ps-1">Reports</span>
        </a>
        <div class="collapse" id="reports" style="">
            <ul class="nav ">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('reunionreports.index') }}">
                        <span class="sidenav-normal ms-3 ps-1">
                            Reunion Reports</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="{{ route('welfarereports.index') }}">
                        <span class="sidenav-normal ms-3 ps-1">
                            Welfare Reports</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>

    <li class="nav-item mt-3">
        <a class="nav-link text-white " href="{{ route('member-list')}}">
            <i class="material-icons opacity-10">receipt_long</i>
            <span class="sidenav-normal ms-2 ps-1">
                Members </span>
        </a>
    </li>
        <li class="nav-item mt-3">
            <a class="nav-link text-white " href="{{ route('committee.index') }}">
                <i class="material-icons opacity-10">view_in_ar</i>
                <span class="sidenav-normal ms-2 ps-1">
                    Committee</span>
            </a>
        </li>
        <li class="nav-item mt-3">
            <a class="nav-link text-white " href="{{ route('events.index') }}">
                <i class="material-icons opacity-10">event</i>
                <span class="sidenav-normal ms-2 ps-1">
                    Events</span>
            </a>
        </li>
        <li class="nav-item mt-3">
            <a class="nav-link text-white " href="{{ route('galleries.index') }}">
                <i class="material-icons opacity-10">photo</i>
                <span class="sidenav-normal ms-2 ps-1">
                    Galleries</span>
            </a>
        </li>
        <li class="nav-item mt-3">
            <a class="nav-link text-white " href="{{ route('faculties.index') }}">
                <i class="material-icons opacity-10">photo</i>
                <span class="sidenav-normal ms-2 ps-1">
                    Faculties</span>
            </a>
        </li>
        <li class="nav-item mt-3">
            <a class="nav-link text-white " href="{{ route('notices.index') }}">
                <i class="material-icons opacity-10">view_in_ar</i>
                <span class="sidenav-normal ms-2 ps-1">
                    Notices</span>
            </a>
        </li>
        @endcan
        @endcan
        <li class="nav-item mt-3">
            <a class="nav-link text-white " href=" {{ route('index') }} ">
                <i class="material-icons-round opacity-10">dashboard</i>
                <span class="sidenav-normal ms-2 ps-1">
                   Home Page </span>
            </a>
        </li>
    </ul>


    </div>
    </div>
</aside>

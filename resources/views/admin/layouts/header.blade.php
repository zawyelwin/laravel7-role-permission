<header class="c-header c-header-light c-header-fixed c-header-with-subheader">
    <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show">
        <i class="fa fa-bars"></i>
    </button>

    <a class="c-header-brand d-lg-none" href="#">
        <img src="https://ubuntu-mm.net/wp-content/uploads/2019/03/ujpeg-1.png" height="50" alt="Logo" >
    </a>

    <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
        <i class="fa fa-bars"></i>
    </button>

    <ul class="c-header-nav d-md-down-none">
      <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="#">Dashboard</a></li>
      <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="#">Users</a></li>
      <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="#">Settings</a></li>
    </ul>
    <ul class="c-header-nav ml-auto mr-4">

      <li class="c-header-nav-item dropdown">
        <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <div class="c-avatar">
                <img class="c-avatar-img" src="/admin/img/avatar.png" alt="avatar">
            </div>
        </a>

        <div class="dropdown-menu dropdown-menu-right pt-0">
                <div class="dropdown-header bg-light py-2"><strong>Account</strong></div>
                <a class="dropdown-item">
                    {{ Auth::user()->name }}
                    {{-- <small class="text-muted">{{ Auth::user()->email }}</small> --}}
                </a>
                
                @if(auth()->user()->hasRole('Admin'))
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/admin/password">
                    <i class="fas fa-key mr-1"></i> Change Password
                </a>
                @endif

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt mr-1"></i> {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
      </li>
    </ul>
    {{-- <div class="c-subheader px-3">
      <!-- Breadcrumb-->
      <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="#">Admin</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
        <!-- Breadcrumb Menu-->
      </ol>
    </div> --}}
  </header>
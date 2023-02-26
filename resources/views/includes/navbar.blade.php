<header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">
    <div class="m-header">
        <a class="mobile-menu d-sm-block d-md-none" id="mobile-collapse" href="#!"><span></span></a>
        <a href="#!" class="b-brand">
            <!-- ========   change your logo hear   ============ -->
            <h5 class="logo text-white">Manga Admin</h5>
            {{-- <img src="/assets/images/logo.png" alt="" class="logo">
            <img src="/assets/images/logo-icon.png" alt="" class="logo-thumb"> --}}
        </a>
        {{-- <a href="#!" class="mob-toggler">
            <i class="feather icon-more-vertical"></i>
        </a> --}}
    </div>
    <div class="collapse navbar-collapse bg-white">
        <ul class="navbar-nav ml-auto">
            <li>
                <div class="dropdown drp-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="feather icon-user text-dark"></i>
                        <span class="text-dark">{{ Auth::user()->name }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-notification">
                        <div class="pro-head">
                            <img src="/assets/images/user/avatar-1.jpg" class="img-radius" alt="User-Profile-Image">
                            <span>{{ Auth::user()->name }}</span>
                        </div>
                        <ul class="pro-body">
                            <li><a href="user-profile.html" class="dropdown-item"><i class="feather icon-user"></i>
                                    Profile</a></li>
                            <li><a href="email_inbox.html" class="dropdown-item"><i class="feather icon-mail"></i>
                                    My Messages</a></li>
                            <li><a href="auth-signin.html" class="dropdown-item"><i class="feather icon-lock"></i>
                                    Lock Screen</a></li>
                        </ul>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-block" title="Logout">
                                <i class="feather icon-log-out"></i>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</header>
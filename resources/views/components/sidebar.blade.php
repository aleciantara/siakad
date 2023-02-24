<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            @if(Auth::user())
                @if (Auth::user()->role_id == 1)
                    <li class="menu-header">Dashboard</li>
                    <li class="nav-item dropdown ">
                        <a href="/dashboard"
                            class="nav-link "><i class="fas fa-fire"></i><span>Dashboard</span></a>
                    </li>
                    <li class="menu-header">CRUD Data</li>
                    <li class="nav-item dropdown ">
                        <a href="/dosen"
                            class="nav-link "><i class="fas fa-chalkboard-teacher"></i><span>Dosen</span></a>
                    </li>
                    <li class="nav-item dropdown ">
                        <a href="/mahasiswa"
                            class="nav-link "><i class="fas fa-user-graduate"></i><span>Mahasiswa</span></a>
                    </li>
                    <li class="nav-item dropdown ">
                        <a href="/matakuliah"
                            class="nav-link "><i class="fas fa-book"></i><span>Matakuliah</span></a>
                    </li>
                @elseif (Auth::user()->role_id == 2)
                    <li class="menu-header">Dashboard</li>
                        <li class="nav-item dropdown ">
                            <a href="/dashboard"
                                class="nav-link "><i class="fas fa-fire"></i><span>Dashboard</span></a>
                        </li>
                        <li class="nav-item dropdown ">
                        <a href="/profile-dosen"
                            class="nav-link"><i class="fas fa-user"></i></i><span>Profile</span></a>
                        </li>
                        <li class="nav-item dropdown ">
                        <a href="/matkul-dosen"
                            class="nav-link"><i class="fas fa-book"></i></i><span>Matakuliah</span></a>
                        </li>
                @elseif (Auth::user()->role_id == 3)
                    <li class="menu-header">Dashboard</li>
                        <li class="nav-item dropdown ">
                            <a href="/dashboard"
                                class="nav-link "><i class="fas fa-fire"></i><span>Dashboard</span></a>
                        </li>

                        <li class="nav-item dropdown ">
                        <a href="/profile-mahasiswa"
                            class="nav-link"><i class="fas fa-user"></i></i><span>Profile</span></a>
                        </li>

                        <li class="nav-item dropdown ">
                        <a href="/matkul-mahasiswa"
                            class="nav-link"><i class="fas fa-book"></i></i><span>Matakuliah</span></a>
                        </li>
                @endif
            @else
                <li class="menu-header">Dashboard</li>
                    <li class="nav-item dropdown ">
                        <a href="/admin-dashboard"
                            class="nav-link "><i class="fas fa-fire"></i><span>Dashboard</span></a>
                    </li>
                <li class="menu-header">Authentication</li>
                    <li class="nav-item dropdown ">
                        <a href="/login"
                            class="nav-link "><i class="fas fa-login"></i><span>Login</span></a>
                    </li>
                    <li class="nav-item dropdown ">
                        <a href="/register"
                            class="nav-link "><i class="fas fa-register"></i><span>Register</span></a>
                    </li>
            @endif
        </ul>

        <div class="hide-sidebar-mini mt-4 mb-4 p-3">
            <a href="https://getstisla.com/docs"
                class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div>
    </aside>
</div>

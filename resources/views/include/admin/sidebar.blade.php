<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        @if (Auth::user()->role == 0)
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <span class="menu-title">Dashboard</span>
                    <i class="mdi mdi-home menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#general-settings" aria-expanded="false"
                    aria-controls="ui-basic">
                    <span class="menu-title">General Settings</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="general-settings">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ route('user.navbar') }}">NavBar</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('user.home') }}">Home</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('user.footer') }}">Footer</a></li>
                    </ul>
                </div>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="{{ route('create.post') }}">
                    <span class="menu-title">Add Post</span>
                    <i class="mdi mdi-upload menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('index.post') }}">
                    <span class="menu-title">Edit Post</span>
                    <i class="mdi mdi-upload menu-icon"></i>
                </a>
            </li>
        @else
        @endif
    </ul>
</nav>

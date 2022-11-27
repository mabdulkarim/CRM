<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('home') }}" class="brand-link text-center">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2 me-auto">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @include('layouts.menu')
            </ul>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="dropdown-item text-secondary text-bold">Logout</button>
            </form>
        </nav>
    </div>
</aside>

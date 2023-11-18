<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.partials.head')
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <x-Admin.Navbar></x-Admin.Navbar>
            <div class="main-sidebar">
                <x-Admin.Sidebar></x-Admin.Sidebar>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                @yield('content')
            </div>
            <x-Admin.Footer></x-Admin.Footer>
        </div>
    </div>

    @include('admin.layouts.partials.scripts')
</body>

</html>

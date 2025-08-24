
<header class="main-header">
<!-- Logo -->
<a href="{{ route('admin.dashboard') }}" class="logo">
<!-- mini logo for sidebar mini 50x50 pixels -->
<span class="logo-lg">Dashboard</span>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top">
<!-- Sidebar toggle button-->
<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</a>
{{-- @includeIf('admin.include.hot_menu_top') --}}
<div class="navbar-custom-menu">
<ul class="nav navbar-nav">

<li><a href="#" title="">{{ date('d-M-Y') }}</a></li>
<li><a href="{{ route('admin.logout.get') }}" title="">Logout</a></li>


<!-- Control Sidebar Toggle Button -->

</ul>
</div>
</nav>
</header>

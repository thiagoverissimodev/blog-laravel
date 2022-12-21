<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard.home')}}">
        {{-- <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div> --}}
        <img src="{!! asset('assets/image/aeternum.png')!!}" alt="Logo Aeternum" class="logo-in-sidebar">  
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('dashboard.home')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{!! route('dashboard.section') !!}">
            <i class="fas fa-chart-bar"></i>
            <span>Seções</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{!! route('dashboard.content') !!}">
            <i class="fas fa-newspaper"></i>
            <span>Conteúdo</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{!! route('dashboard.pages') !!}">
            <i class="fas fa-newspaper"></i>
            <span>Páginas</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{!! route('dashboard.articles') !!}">
            <i class="fas fa-newspaper"></i>
            <span>Artigos</span></a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-chart-bar"></i>
            <span>Seções</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-gray-600 py-2 collapse-inner rounded">
                <h6 class="collapse-header">Seções do site:</h6>
                <a class="collapse-item" href="buttons.html">Menu</a>
                <a class="collapse-item" href="cards.html">Sessões do site</a>
            </div>
        </div>
    </li> --}}

    <!-- Nav Item - Utilities Collapse Menu -->
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="utilities-color.html">Colors</a>
                <a class="collapse-item" href="utilities-border.html">Borders</a>
                <a class="collapse-item" href="utilities-animation.html">Animations</a>
                <a class="collapse-item" href="utilities-other.html">Other</a>
            </div>
        </div>
    </li> --}}

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Imagens
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{!! route('dashboard.category') !!}">
            <i class="far fa-list-alt"></i>
            <span>Categorias</span></a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-images"></i>
            <span>Galeria</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-gray-600 py-2 collapse-inner rounded">
                <h6 class="collapse-header">Arquivos do site:</h6>
                <a class="collapse-item" href="{!! route('dashboard.gallery') !!}">Galeria</a>
                <a class="collapse-item" href="{!! route('dashboard.image') !!}">Imagens</a>
                <a class="collapse-item" href="{!! route('dashboard.video') !!}">Vídeos</a>
                {{-- <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item" href="blank.html">Blank Page</a> --}}
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{!! route('dashboard.user') !!}">
            <i class="fas fa-users"></i>
            <span>Usuários</span></a>
    </li>
    <!-- Nav Item - Charts -->
    {{-- <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li> --}}

    <!-- Nav Item - Tables -->
    {{-- <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li> --}}

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <br />

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
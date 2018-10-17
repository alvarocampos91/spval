<!DOCTYPE html>
<html lang="en" data-ng-app="alumnoApp">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>Laravel</title>

    <!-- Vendor styles -->
    {{HTML::style('vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css')}}
    {{HTML::style('vendors/bower_components/animate.css/animate.min.css')}}
    {{HTML::style('vendors/bower_components/jquery.scrollbar/jquery.scrollbar.css')}}

    <!-- App styles -->
    {{HTML::style('css/app.min.css')}}
</head>

<body data-sa-theme="1">
    <main class="main">
        <div class="page-loader">
            <div class="page-loader__spinner">
                <svg viewBox="25 25 50 50">
                    <circle cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
                </svg>
            </div>
        </div>

        <header class="header">
            <div class="navigation-trigger hidden-xl-up" data-sa-action="aside-open" data-sa-target=".sidebar">
                <i class="zmdi zmdi-menu"></i>
            </div>

            <div class="logo hidden-sm-down">
                <h1><a href="index-2.html">Super Admin 2.0</a></h1>
            </div>

            <form class="search">
                <div class="search__inner">
                    <!--input type="text" class="search__text" placeholder="Search for people, files, documents...">
                    <i class="zmdi zmdi-search search__helper" data-sa-action="search-close"></i-->
                </div>
            </form>

            <ul class="top-nav">
            </ul>
        </header>

        <aside class="sidebar">
            <div class="scrollbar-inner">

                <div class="user">
                    <div class="user__info" data-toggle="dropdown">
                        <img class="user__img" src="demo/img/profile-pics/8.jpg" alt="">
                        <div>
                            <div class="user__name">Malinda Hollaway</div>
                            <div class="user__email">Administrador</div>
                        </div>
                    </div>

                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Ver perfil</a>
                        <a class="dropdown-item" href="#">Configuración</a>
                        <a class="dropdown-item" href="#">Cerrar sesión</a>
                    </div>
                </div>

                <ul class="navigation">
                    <li class="@@indexactive"><a href="index-2.html"><i class="zmdi zmdi-home"></i> Inicio</a></li>

                    <li class="navigation__sub" ui-sref-active='active'>
                        <a href="#"><i class="zmdi zmdi-view-week"></i> Alumnos</a>

                        <ul>
                            <li ui-sref-active='active'><a ui-sref="alumnos()">Ver lista de alumnos</a></li>
                            <li ui-sref-active='active'><a ui-sref="newAlumno">Agregar alumno</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </aside>

        <section class="content">
            <header class="content__title">
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Library</li>
                    </ol>
                </nav>
            </header>

            <div ui-view></div>

            <footer class="footer hidden-xs-down">
                <p>© Super Admin Responsive. All rights reserved.</p>

                <ul class="nav footer__nav">
                    <a class="nav-link" href="#">Homepage</a>

                    <a class="nav-link" href="#">Company</a>

                    <a class="nav-link" href="#">Support</a>

                    <a class="nav-link" href="#">News</a>

                    <a class="nav-link" href="#">Contacts</a>
                </ul>
            </footer>
        </section>
    </main>

    <!-- Javascript -->
    <!-- Vendors -->
    {{HTML::script('vendors/bower_components/jquery/dist/jquery.min.js')}}
    {{HTML::script('vendors/bower_components/popper.js/dist/umd/popper.min.js')}}
    {{HTML::script('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js')}}
    {{HTML::script('vendors/bower_components/jquery.scrollbar/jquery.scrollbar.min.js')}}
    {{HTML::script('vendors/bower_components/jquery-scrollLock/jquery-scrollLock.min.js')}}

    <!-- App functions and actions -->
    {{HTML::script('js/app.min.js')}}

    {{HTML::script('lib/angular.min.js')}}
    {{HTML::script('js/dirPagination.js')}}
    {{HTML::script('js/app_administrador.js')}}
    {{HTML::script('js/controllers_administrador.js')}}
    {{HTML::script('js/services_administrador.js')}}
    {{HTML::script('lib/angular-ui-router.min.js')}}
    {{HTML::script('lib/angular-resource.min.js')}}
</body>
</html>
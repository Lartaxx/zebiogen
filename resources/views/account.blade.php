<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Zebiogen">
    <meta name="author" content="Lartaxx">
    

    <title>Zebiogen - {{ Auth::user()->name }}</title>

    <!-- Custom fonts for this template-->
    <script src="https://kit.fontawesome.com/0017d4f378.js" crossorigin="anonymous"></script>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ url("css/sb-admin-2.min.css") }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ url("images/favicon.png") }}" />

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Zebiogen v<sup>1.0</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="buttons.html">Buttons</a>
                        <a class="collapse-item" href="cards.html">Cards</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
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
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            @if(Auth::user()->is_admin === 1)
             <!-- Heading -->
             <div class="sidebar-heading">
                 Menu Administrateur
             </div>
 
             <!-- Nav Item - Pages Collapse Menu -->
             <li class="nav-item">
                 <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                     aria-expanded="true" aria-controls="collapseThree">
                     <i class="fas fa-fw fa-cog"></i>
                     <span>Name 1</span>
                 </a>
                 <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                     <div class="bg-white py-2 collapse-inner rounded">
                         <h6 class="collapse-header">Custom Components:</h6>
                         <a class="collapse-item" href="buttons.html">Buttons</a>
                         <a class="collapse-item" href="cards.html">Cards</a>
                     </div>
                 </div>
             </li>
 
             <!-- Nav Item - Utilities Collapse Menu -->
             <li class="nav-item">
                 <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitiesTwo"
                     aria-expanded="true" aria-controls="collapseUtilitiesTwo">
                     <i class="fas fa-fw fa-wrench"></i>
                     <span>Utilities</span>
                 </a>
                 <div id="collapseUtilitiesTwo" class="collapse" aria-labelledby="headingUtilities"
                     data-parent="#accordionSidebar">
                     <div class="bg-white py-2 collapse-inner rounded">
                         <h6 class="collapse-header">Custom Utilities:</h6>
                         <a class="collapse-item" href="utilities-color.html">Colors</a>
                         <a class="collapse-item" href="utilities-border.html">Borders</a>
                         <a class="collapse-item" href="utilities-animation.html">Animations</a>
                         <a class="collapse-item" href="utilities-other.html">Other</a>
                     </div>
                 </div>
             </li>
 
             <!-- Divider -->
             <hr class="sidebar-divider">

             @endif


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                   

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                           
                        </li>
                       
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ asset("images/undraw_profile.svg") }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Mon profil
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ url("/logout") }}" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Se déconnecter
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @if($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible  show" role="alert">
                            {{ $error }}
                            <button type="button" class="close" data-dismiss="alert" >
                                <span aria-hidden="true">x</span>
                              </button>
                        </div>
                    @endforeach
                @endif
                    @if (session('success.account_created'))
                        <div class="alert alert-success alert-dismissible show" role="alert">
                            {{ session('success.account_created') }}
                            <button type="button" class="close" data-dismiss="alert" >
                                <span aria-hidden="true">x</span>
                            </button>
                        </div>
                    @elseif(session('success.account_find'))
                        <div class="alert alert-success alert-dismissible show" role="alert">
                            {{ session('success.account_find') }}
                            <button type="button" class="close" data-dismiss="alert" >
                                <span aria-hidden="true">x</span>
                            </button>
                        </div>
                    @endif
                    

                    <div class="container">

                        <!-- Outer Row -->
                        <div class="row justify-content-center">
                
                            <div class="col-xl-10 col-lg-12 col-md-9">
                
                                <div class="card o-hidden border-0 shadow-lg my-5">
                                    <div class="card-body p-0">
                                        <!-- Nested Row within Card Body -->
                                        <div class="row">
                                            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                                            <div class="col-lg-6">
                                                <div class="p-5">
                                                    <div class="text-center">
                                                        @if (session('success.account_modified'))
                                                        <div class="alert alert-success alert-dismissible show" role="alert">
                                                            {{ session('success.account_modified') }}
                                                            <button type="button" class="close" data-dismiss="alert" >
                                                                <span aria-hidden="true">x</span>
                                                            </button>
                                                        </div>
                                                        @endif
                                                        <h1 class="h4 text-gray-900 mb-2">Modifier votre compte</h1>
                                                        <p class="mb-4">{{ Auth::user()->name }}, vous pouvez voir et modifier certaines données de votre compte ici.</p>
                                                    </div>
                                                    <form class="user" method="POST" action={{ url('/my-account') }}>
                                                        @method("post")
                                                        @csrf
                                                        <div class="form-group">
                                                            <label>Pseudo :</label>
                                                            <input type="text" class="form-control form-control-user"
                                                                id="exampleInputEmail" aria-describedby="pseudo" name="pseudo"
                                                                placeholder="Entrer votre email" value={{ Auth::user()->name }}>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Email :</label>
                                                            <input type="email" class="form-control form-control-user" name="email"
                                                                id="exampleInputEmail" aria-describedby="email"
                                                                 value={{ Auth::user()->email }} disabled>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Administrateur :</label>
                                                            @if (Auth::user()->is_admin === 1)
                                                            <input type="checkbox" class="form-control form-control-user"
                                                                id="exampleInputEmail" aria-describedby="admin"
                                                                disabled checked>
                                                            @else
                                                            <input type="checkbox" class="form-control form-control-user"
                                                                id="exampleInputEmail" aria-describedby="admin"
                                                                 disabled>
                                                            @endif
                                                        </div>
                                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                                            Enregister les modifications
                                                        </button>
                                                    </form>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                
                            </div>
                
                        </div>
                
                    </div>
                
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Zebiogen {{ date('Y') }}</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Voulez-vous vraiment vous déconnecter ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">{{ Auth::user()->name }}, pour vous déconnecter appuyer sur <b>Se déconnecter</b></div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Retour</button>
                    <a class="btn btn-primary" href="{{ url("/logout") }}">Se déconnecter</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>    

    <!-- Core plugin JavaScript-->

    <!-- Custom scripts for all pages-->
    <script src="{{ url("js/sb-admin-2.min.js") }}"></script>

</body>

</html>
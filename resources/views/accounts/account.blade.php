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
                <a class="nav-link" href="{{ route("home") }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Générateur
            </div>

          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="far fa-user"></i>
                <span>Catégories</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Voici les catégories : {{ \App\Models\Account::distinct()->count("category") }}</h6>
                    @foreach (\App\Models\Account::distinct()->get("category") as $category)
                    <a class="collapse-item" href="{{ strtolower(url("accounts/{$category['category']}")) }}">{{ $category['category'] }}</a>
                    @endforeach
                </div>
            </div>
        </li>

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
                    <span>Comptes</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Voir les actions :</h6>
                        <a class="collapse-item" href="{{ route("admin.add_account") }}">Ajouter un compte</a>
                        <a class="collapse-item" href="{{ url("/see-accounts") }}">Voir les comptes</a>
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
                                <a class="dropdown-item" href="{{ url("/my-account") }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Mon profil
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route("claimed_accounts") }}">
                                    <i class="fas fa-exclamation-circle fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Mes comptes réclamés
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
                    @elseif(session("error.not_admin"))
                        <div class="alert alert-danger alert-dismissible show" role="alert">
                            {{ session('error.not_admin') }}
                            <button type="button" class="close" data-dismiss="alert" >
                                <span aria-hidden="true">x</span>
                            </button>
                        </div>
                    @elseif(session("error.not_category"))
                        <div class="alert alert-danger alert-dismissible show" role="alert">
                            {{ session('error.not_category') }}
                            <button type="button" class="close" data-dismiss="alert" >
                                <span aria-hidden="true">x</span>
                            </button>
                        </div>
                    @endif
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">
                        Bonjour {{ Auth::user()->name }}, voici les données de Zebiogen le {{ date('j/m/Y') }} à {{ date("H:i") }}
                    </h1>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary" style="color: {{ $color }} !important;"><img src={{ $image_logo }} style="width:25px;height:25px;"> | Comptes {{ $name }} ({{ \App\Models\Account::where("category", $name)->count() }})</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered"  id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Numéro</th>
                                            <th>Email / Nom</th>
                                            <th>Mot de passe</th>
                                            <th>Fonctionnement</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Numéro</th>
                                            <th>Email / Nom</th>
                                            <th>Mot de passe</th>
                                            <th>Fonctionnement</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       @foreach (\App\Models\Account::where("category", $name)->get() as $account)
                                       <tr>
                                           <td>{{ $account["id"] }}</td>
                                           <td>{{ $account["email"] }}</td>
                                           <td>{{ $account["password"] }}</td>
                                           <td>
                                            <a href="{{ url("/claim-accounts/{$account['id']}") }}" class="btn btn-success btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="text">Réclamer ce compte</span>
                                            </a>
                                            <a href="{{ url("/delete-claim-accounts/{$account['id']}") }}" class="btn btn-danger btn-icon-split" style="float: right;">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                            <span class="text">Compte non fonctionnel</span>
                                            </a>
                                        </td>
                                        </tr>
                                       @endforeach
                                    </tbody>
                                </table>
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
    <script src="https://kit.fontawesome.com/0017d4f378.js" crossorigin="anonymous"></script>
    <script src="{{ url("js/jquery.dataTables.min.js") }}"></script>
    <script src="{{ url("js/dataTables.bootstrap4.min.js") }}"></script>    <script>// Call the dataTables jQuery plugin
        $(document).ready(function() {
          $('#dataTable').DataTable();
        });
</script>        


<style>

.page-item.active .page-link {
    color: rgb(232, 230, 227) !important;
    background-color: #5F0276 !important;
    border-color: #5F0276 !important;
}

.bg-gradient-primary {
    background-color: #5F0276 !important;
    background-image: linear-gradient(#5F0276 10%, #9204b6) 100% !important);
}

</style>
</body>

</html>
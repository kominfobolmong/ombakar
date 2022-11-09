 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="{{ route('dashboard') }}" class="brand-link">
         <img src="/template/backend/dist/img/AdminLTELogo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
         <span class="brand-text font-weight-light">OMBAKAR</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="{{ auth()->user()->gravatar() }}" class="img-circle elevation-2" alt="User Image">
             </div>
             <div class="info">
                 <a href="{{ route('user.edit', auth()->user()->id) }}" class="d-block">{{ auth()->user()->name }}</a>
             </div>
         </div>
         @auth
         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                 @can('dashboard-list')
                 <li class="nav-item">
                     <a href="{{ route('dashboard') }}" class="nav-link">
                         <i class="nav-icon fas fa-angle-right"></i>
                         <p>
                             Dashboard
                         </p>
                     </a>
                 </li>
                 @endcan

                 @can('penyalur-list')
                 <li class="nav-item">
                     <a href="{{ route('penyalur.index') }}" class="nav-link">
                         <i class="nav-icon fas fa-angle-right"></i>
                         <p>
                             Penyalur
                         </p>
                     </a>
                 </li>
                 @endcan

                 @can('kapal-list')
                 <li class="nav-item">
                     <a href="{{ route('kapal.index') }}" class="nav-link">
                         <i class="nav-icon fas fa-angle-right"></i>
                         <p>
                             Kapal
                         </p>
                     </a>
                 </li>
                 @endcan

                 @can('surat-permohonan-list')
                 <li class="nav-item">
                     <a href="{{ route('surat_permohonan.index') }}" class="nav-link">
                         <i class="nav-icon fas fa-angle-right"></i>
                         <p>
                             Surat Permohonan
                         </p>
                     </a>
                 </li>
                 @endcan

                 @can('surat-rekomendasi-list')
                 <li class="nav-item">
                     <a href="{{ route('surat_rekomendasi.index') }}" class="nav-link">
                         <i class="nav-icon fas fa-angle-right"></i>
                         <p>
                             Surat Rekomendasi
                         </p>
                     </a>
                 </li>
                 @endcan

                 @can('role-list')
                 <li class="nav-item">
                     <a href="{{ route('roles.index') }}" class="nav-link">
                         <i class="nav-icon fas fa-angle-right"></i>
                         <p>
                             Roles
                         </p>
                     </a>
                 </li>
                 @endcan

                 @can('user-list')
                 <li class="nav-item">
                     <a href="{{ route('user.index') }}" class="nav-link">
                         <i class="nav-icon fas fa-angle-right"></i>
                         <p>
                             Users
                         </p>
                     </a>
                 </li>
                 @endcan

                 <li class="nav-item">
                     <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                         <i class="nav-icon fas fa-angle-right"></i>
                         <p>
                             {{ __('Logout') }}
                         </p>
                     </a>

                 </li>
             </ul>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                 @csrf
             </form>
         </nav>
         <!-- /.sidebar-menu -->
         @endauth
     </div>
     <!-- /.sidebar -->
 </aside>
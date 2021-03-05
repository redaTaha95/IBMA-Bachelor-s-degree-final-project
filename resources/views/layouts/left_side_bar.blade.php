<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li>
                    <a href="{{url('/')}}">
                        <i data-feather="airplay"></i>
                        <span> Tableau de bord </span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i data-feather="calendar"></i>
                        <span> Calendrier </span>
                    </a>
                </li>

                <li>
                    <a href="#sidebarEcommerce" data-toggle="collapse">
                        <i class="fe-layers"></i>
                        <span> Gestion RH </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEcommerce">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{url('employees')}}">
                                    <i class="fas fa-user-tie"></i>
                                    <span>  {{ __('employee.employee_folder') }}  </span>
                                </a>
                            </li>
                            <li>
                                <a href="ecommerce-products.html">
                                    <i class="fas fa-search"></i>
                                    <span> Demande de recrutement </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('candidates')}}">
                                    <i class="fas fa-user-check"></i>
                                    <span> Candidats </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="{{url('clients')}}">
                        <i data-feather="users"></i>
                        <span> Clients </span>
                    </a>
                </li>

                <li>
                    <a href="{{url('projects')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
                        <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                        <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                        <span> Projects </span>
                    </a>
                </li>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>

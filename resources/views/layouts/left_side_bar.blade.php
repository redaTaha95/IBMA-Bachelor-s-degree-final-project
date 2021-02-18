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
                                    <span>  Employées  </span>
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
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= URL_ADMIN ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-books"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Biblio Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?= URL_ADMIN ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Tableau de bord</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Modules
            </div>

            <!-- Nav Item - Livre Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLivre"
                    aria-expanded="true" aria-controls="collapseLivre">
                    <i class="fas fa-book"></i>
                    <span>Livres</span>
                </a>
                <div id="collapseLivre" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Gestion livres :</h6>
                        <a class="collapse-item" href="<?= URL_ADMIN ?>livre/index.php">Liste des livres</a>
                        <a class="collapse-item" href="<?= URL_ADMIN ?>livre/add.php">Ajouter un livre</a>
                    </div>
                </div>
            </li>
            <!-- End Nav Item - Livre Collapse Menu -->

            <!-- Nav Item - Usager Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsager"
                    aria-expanded="true" aria-controls="collapseUsager">
                    <i class="fas fa-users"></i>
                    <span>Usagers</span>
                </a>
                <div id="collapseUsager" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Gestion des usagers :</h6>
                        <a class="collapse-item" href="<?= URL_ADMIN ?>usager/index.php">Liste des usagers</a>
                        <a class="collapse-item" href="<?= URL_ADMIN ?>usager/add.php">Ajouter un usager</a>
                    </div>
                </div>
            </li>
            <!-- End Nav Item - Usager Collapse Menu -->

            <!-- Nav Item - Location Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLocation"
                    aria-expanded="true" aria-controls="collapseLocation">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Location</span>
                </a>
                <div id="collapseLocation" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Gestion des locations :</h6>
                        <a class="collapse-item" href="<?= URL_ADMIN ?>location/index.php">Liste des locations</a>
                        <a class="collapse-item" href="<?= URL_ADMIN ?>location/add.php">Ajouter un location</a>
                    </div>
                </div>
            </li>
            <!-- End Nav Item - Location Collapse Menu -->


            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Catégories Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategories"
                    aria-expanded="true" aria-controls="collapseCategories">
                    <i class="fas fa-list"></i>
                    <span>Catégories</span>
                </a>
                <div id="collapseCategories" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Gestion des catégories :</h6>
                        <a class="collapse-item" href="<?= URL_ADMIN ?>categorie/index.php">Liste des catégories</a>
                        <a class="collapse-item" href="<?= URL_ADMIN ?>categorie/add.php">Ajouter un catégorie</a>
                    </div>
                </div>
            </li>
            <!-- End Nav Item - Catégories Collapse Menu -->

            <!-- Nav Item - Editeur Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEditeur"
                    aria-expanded="true" aria-controls="collapseEditeur">
                    <i class="fas fa-user-edit"></i>
                    <span>Editeurs</span>
                </a>
                <div id="collapseEditeur" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Gestion des Editeurs :</h6>
                        <a class="collapse-item" href="<?= URL_ADMIN ?>categorie/index.php">Liste des editeurs</a>
                        <a class="collapse-item" href="<?= URL_ADMIN ?>categorie/add.php">Ajouter un editeur</a>
                    </div>
                </div>
            </li>
            <!-- End Nav Item - Auteurs Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAuteur"
                    aria-expanded="true" aria-controls="collapseAuteur">
                    <i class="fas fa-pen"></i>
                    <span>Auteurs</span>
                </a>
                <div id="collapseAuteur" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Gestion des Auteurs :</h6>
                        <a class="collapse-item" href="<?= URL_ADMIN ?>auteur/index.php">Liste des auteurs</a>
                        <a class="collapse-item" href="<?= URL_ADMIN ?>auteur/add.php">Ajouter un auteur</a>
                    </div>
                </div>
            </li>
            <!-- End Nav Item - Auteurs Collapse Menu -->
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>
            <!-- Nav Item - Prise de contact -->
            <li class="nav-item">
                <a class="nav-link" href="<?= URL_ADMIN ?>contact/">
                    <i class="fas fa-address-card"></i>
                    <span>Prise de contacts</span></a>
            </li>
            <!-- End Nav Item - Prise de contact -->
        
            <!-- ************************************ -->
            <!-- AFFICHER SEULEMENT SI ADMINISTRATEUR -->
            <!-- Nav Item - Utilisateur -->
            <li class="nav-item">
                <a class="nav-link" href="<?= URL_ADMIN ?>utilisateur/">
                    <i class="fas fa-user"></i>
                    <span>Utilisateur</span></a>
            </li>
            <!-- End Nav Item - Utilisateur -->
            <!-- FIN AFFICHER SEULEMENT SI ADMINISTRATEUR -->
            <!-- ************************************ -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>

        <!-- End of Sidebar -->
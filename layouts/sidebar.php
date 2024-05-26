<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.php" class="logo logo-dark">
            <span class="logo-sm">
                <img src="assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="assets/images/logo-dark.png" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.php" class="logo logo-light">
            <span class="logo-sm">
                <img src="assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="assets/images/logo-light.png" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="index.php" role="button" aria-controls="sidebarDashboards">
                        <i class="ri-dashboard-2-line"></i>Tableau de bord</span>
                    </a>
                    <a class="nav-link menu-link" href="apps-calendar.php" role="button" aria-controls="sidebarDashboards">
                        <i class="ri-dashboard-2-line"></i>Calenderier</span>
                    </a>
                </li> <!-- end Dashboard Menu -->

                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="">CRM</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarCRM" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCRM">
                        <i class="ri-account-circle-line"></i> <span data-key="">Gestion des visiteurs</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarCRM">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="ajouter-un-visiteur" class="nav-link"> Enregistrer un visiteur</a>
                            </li>
                            <li class="nav-item">
                                <a href="liste-des-visiteurs" class="nav-link">Liste des visites</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">Mes relances</a>
                            </li>
                            <li class="nav-item">
                                <a href="liste-des-preinscrits.php" class="nav-link">Liste des préinscrits</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarGestionContact" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarGestionContact">
                        <i class="ri-pages-line"></i> <span>Gestion des contacts</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarGestionContact">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="ajouter-un-contact" class="nav-link"> Ajouter un contact </a>
                            </li>

                            <li class="nav-item">
                                <a href="liste-des-contacts" class="nav-link"> Liste des contacts </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="">Finance</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#paiement" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="paiement">
                        <i class="ri-account-circle-line"></i> <span data-key="">Gestion des paiements</span>
                    </a>
                    <div class="collapse menu-dropdown" id="paiement">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="attente-de-paiement.php" class="nav-link"> Attente de paiement</a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="paiements-effectuer.php" class="nav-link"> Paiements effectué</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="">Gestion de la scolarité</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarAuth" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAuth">
                        <!-- <i class="ri-account-circle-line"></i> <span data-key="t-authentication">Authentication</span> -->
                        <i class="ri-account-circle-line"></i> <span data-key="">Gestion des etudiants</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarAuth">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="liste-des-etudiants" class="nav-link" role="button">Liste des étudiants</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarGestionGroupe" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages">
                        <i class="ri-pages-line"></i> <span>Gestion des groupes</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarGestionGroupe">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="liste-des-groupes.php" class="nav-link"> Liste des groupes </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarGestionFormations" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarGestionFormations">
                        <i class="ri-pages-line"></i> <span>Gestion des formations</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarGestionFormations">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="liste-des-formations.php" class="nav-link"> Liste des formations </a>
                            </li>
                            <li class="nav-item">
                                <a href="liste-des-specialitees.php" class="nav-link"> Liste des spécilitées </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="">Gestion des stages</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarGesStageAtSucPro" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarGesStageAtSucPro">
                        <!-- <i class="ri-account-circle-line"></i> <span data-key="t-authentication">Authentication</span> -->
                        <i class="ri-account-circle-line"></i> <span data-key="">Attestation succés provisoires</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarGesStageAtSucPro">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="" class="nav-link" role="button">Nouvelle attestation</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link" role="button">Liste des attestations</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarGesStageAtCurTeo" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarGesStageAtCurTeo">
                        <!-- <i class="ri-account-circle-line"></i> <span data-key="t-authentication">Authentication</span> -->
                        <i class="ri-account-circle-line"></i> <span data-key="">Attestation cursus theorique</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarGesStageAtCurTeo">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="" class="nav-link" role="button">Nouvelle attestation</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link" role="button">Liste des attestations</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarGesStageAtValCurTeo" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarGesStageAtValCurTeo">
                        <!-- <i class="ri-account-circle-line"></i> <span data-key="t-authentication">Authentication</span> -->
                        <i class="ri-account-circle-line"></i> <span data-key="">Attestation validation cursus theorique</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarGesStageAtValCurTeo">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="" class="nav-link" role="button">Nouvelle attestation</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link" role="button">Liste des attestations</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarGesStagequitusstage" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarGesStagequitusstage">
                        <!-- <i class="ri-account-circle-line"></i> <span data-key="t-authentication">Authentication</span> -->
                        <i class="ri-account-circle-line"></i> <span data-key="">Quitus de passage en stage</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarGesStagequitusstage">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="" class="nav-link" role="button">Nouveau quitus</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link" role="button">Liste des quitus</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarGesStageAuthDepMem" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarGesStageAuthDepMem">
                        <!-- <i class="ri-account-circle-line"></i> <span data-key="t-authentication">Authentication</span> -->
                        <i class="ri-account-circle-line"></i> <span data-key="">Autorisation dépot mémoire</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarGesStageAuthDepMem">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="" class="nav-link" role="button">Nouveau quitus</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link" role="button">Liste des quitus</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="">Gestion des examens</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarGesExams" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarGesExams">
                        <!-- <i class="ri-account-circle-line"></i> <span data-key="t-authentication">Authentication</span> -->
                        <i class="ri-account-circle-line"></i> <span data-key="">Sessions d'examens</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarGesExams">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="" class="nav-link" role="button">Nouvelle session</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link" role="button">Liste des sessions</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarGesExamsResult" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarGesExamsResult">
                        <!-- <i class="ri-account-circle-line"></i> <span data-key="t-authentication">Authentication</span> -->
                        <i class="ri-account-circle-line"></i> <span data-key="">Resultats d'examens</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarGesExamsResult">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="" class="nav-link" role="button">Résultats par session</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link" role="button">Resultats individuel</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link" role="button">Builletins des notes</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="">Paramètres & Configuration</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarConfCRM" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarConfCRM">
                        <!-- <i class="ri-account-circle-line"></i> <span data-key="t-authentication">Authentication</span> -->
                        <i class="ri-account-circle-line"></i> <span data-key="">CRM</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarConfCRM">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="" class="nav-link" role="button">Réglage des qualifications</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link" role="button">Réglage type de visiteur</a>
                            </li>
                            <li class="nav-item">
                                <a href="ajouter-un-motif-de-viste" class="nav-link" role="button">Réglage motifs de visites</a>
                            </li>
                            <li class="nav-item">
                                <a href="liste-des-tags" class="nav-link" role="button">Réglage des tags</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarConfUser" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarConfUser">
                        <!-- <i class="ri-account-circle-line"></i> <span data-key="t-authentication">Authentication</span> -->
                        <i class="ri-account-circle-line"></i> <span data-key="">Gestion des utilisateurs</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarConfUser">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="" class="nav-link" role="button">Ajouter un utilisateur</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link" role="button">Liste des utilisateurs</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link" role="button">Autorisations</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarConfGrpUser" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarConfGrpUser">
                        <!-- <i class="ri-account-circle-line"></i> <span data-key="t-authentication">Authentication</span> -->
                        <i class="ri-account-circle-line"></i> <span data-key="">Groupe d'utilisateur</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarConfGrpUser">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="" class="nav-link" role="button">Créer un groupe</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link" role="button">Liste des groupe</a>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
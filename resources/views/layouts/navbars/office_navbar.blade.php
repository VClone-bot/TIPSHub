<!-- BARRE DE NAVIGATION RÉSERVÉE AU BUREAU -->

@if(Session::get('LoggedUser') && Session::get('IS_OFFICE') && !Session::get('IS_ADMIN')) 

<link href="/css/navbars/private_navbar.css" rel="stylesheet">
<nav class="navbar navbar-icon-top navbar-expand-lg navbar-dark" style="background-color:#1b1b1b;">
    <!-- Logo TIPS Hub -->
    <a class="navbar-brand" href="">
        <img alt="logo_tips" src="/img/logo_tips.png" width="90px" height="90px" />
    </a>
    <a class="navbar-brand" href="">
        <div class="TIPSHub_logo">
            <span>TIPS</span>
            <span>hub</span>
        </div>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <!-- Home Navlink Item -->
            <li class="nav-item">
                <a class="nav-link" href="/"><i class="fa fa-newspaper-o"></i> News</a>
            </li>
            <!-- Calendar Navlink Item -->
            <li class="nav-item">
                <a class="nav-link" href="calendrier"><i class="fa fa-calendar-o"></i> Calendrier</a>
            </li>
            <!-- Teaching Navlink Item -->
            <li class="nav-item">
                <a class="nav-link" href="cours"><i class ="fa fa-graduation-cap"></i> Cours</a>
            </li>
            <!-- Teams Navlink Item -->
            <li class="nav-item">
                <a class="nav-link" href="equipes"><i class="fa fa-star"></i> Équipes</a>
            </li>
            <!-- Office Gazette Navlink Item -->
            <li class="nav-item">
                <a class="nav-link" href="gazette"><i class="fa fa-commenting-o"></i> La Gazette</a>
            </li>
            <!-- Office Infos Navlink Item -->
            <li class="nav-item">
                <a class="nav-link" href="office_infos"><i class="fa fa-exclamation-circle"></i> Infos bureau</a>
            </li>
            <!-- Manage Events Navlink Item -->
            <li class="nav-item">
                <a class="nav-link" href="manage_events"><i class="fa fa-folder-open-o"></i> Gérer les événements</a>
            </li>
            <!-- Archived Events Navlink Item -->
            <li class="nav-item">
                <a class="nav-link" href="archived_events"><i class="fa fa-archive"></i> Événements archivés</a>
            </li>
            <!-- Settings Navlink Item -->
            <li class="nav-item">
                <a class="nav-link" href="settings"><i class="fa fa-cogs"></i> Paramètres</a>
            </li>
            <!-- Logout Navlink Item -->
            <li class="nav-item">
                <a class="nav-link" href="logout"><i class="fa fa-window-close-o"></i> Déconnexion</a>
            </li>
        </ul>
    </div>
</nav>

@endif
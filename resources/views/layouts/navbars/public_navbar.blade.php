<!-- BARRE DE NAVIGATION POUR LE GRAND PUBLIC -->

@if(!Session::get('LoggedUser')) 

    <link href="/css/navbars/public_navbar.css" rel="stylesheet">
    <nav class="navbar navbar-icon-top navbar-expand-lg navbar-dark" style="background-color:#1b1b1b;">
        <!-- Logo TIPS Hub -->
        <a class="navbar-brand" href="">
            <img alt="logo_tips" src="/img/logo_tips.png" width="90px" height="90px" />
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
                    <a class="nav-link" href="dates"><i class="fa fa-calendar-o"></i> Spectacles et dates</a>
                </li>
                <!-- Contacts Navlink Item -->
                <li class="nav-item">
                    <a class="nav-link" href="contacts"><i class="fa fa-envelope"></i> Contacts</a>
                </li>
                <!-- Alert Subscription Navlink Item -->
                <li class="nav-item">
                    <a class="nav-link" href="alert_sub"><i class="fa fa-bell"></i> Alertes mail</a>
                </li>
                <!-- Login Navlink Item -->
                <li class="nav-item">
                    <a class="nav-link" href="login"><i class="fa fa-user-circle-o"></i> Connexion</a>
                </li>
            </ul>
        </div>
    </nav>
@endif
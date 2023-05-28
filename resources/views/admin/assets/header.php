<header>
    <div class="header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-10">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="/">
                                <img src="tulogo" alt="logo" width="90" class="img-fluid">
                            </a>
                            <button class="navbar-toggler text-white border-white mt-4 mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <i class="bi bi-list"></i>
                            </button>
                            <div class="collapse navbar-collapse mt-lg-0 text-center" id="navbarNav">
                                <ul class="navbar-nav text-uppercase gap-0 gap-lg-3 me-auto">
                                    <li class="nav-item">
                                        <a class="nav-link" href="/<?= FOLDER_ADMIN ?>">Home</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Blog</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="/<?= FOLDER_ADMIN ?>post">Posts</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item" href="/<?= FOLDER_ADMIN ?>category">Categor&iacute;as</a></li>
                                        </ul>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a class="nav-link" href="/contact">Configuracion</a>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="col-lg-2 text-center">
                    <form action="/<?= FOLDER_ADMIN ?>logout" method="post">
                        <button type="submit" class="btn text-white"><i class="bi bi-box-arrow-left"></i> Cerrar sesi&oacute;n</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
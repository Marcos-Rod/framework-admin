<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->metas['title'] ?></title>

    <meta name="author" content="Marcos Rodriguez" />
    <meta name="title" content="<?= $this->metas['title'] ?>">
    <meta name="DC.Title" content="<?= $this->metas['title'] ?>">
    <meta http-equiv="title" content="<?= $this->metas['title'] ?>">
    <meta name="rating" content="General" />
    <meta name="abstract" content="<?= $this->metas['description'] ?>" />
    <meta name="description" content="<?= $this->metas['description'] ?>">
    <meta http-equiv="description" content="<?= $this->metas['description'] ?>">
    <meta http-equiv="DC.Description" content="<?= $this->metas['description'] ?>">
    <meta name="keywords" content="<?= $this->metas['keywords'] ?>">
    <meta http-equiv="keywords" content="<?= $this->metas['keywords'] ?>">
    <meta name="Revisit" content="30">
    <meta name="REVISIT-AFTER" content="30">
    <meta http-equiv="Content-Language" content="es" />

    <meta name="ROBOTS" content="INDEX,FOLLOW" />
    <meta name="distribution" content="global">
    <meta name="resource-type" content="document">
    <meta http-equiv="Pragma" content="cache">

    <meta property="og:title" content="<?= $this->metas['title'] ?>" />
    <meta property="og:description" content="<?= $this->metas['description'] ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:site_name" content="<?= $this->project ?>" />
    <meta property="og:image" content="<?= $this->metas['image'] ?>" />
    <meta property="og:url" content="<?= $this->url . '/' . $this->metas['canonical_url'] ?? null ?>" />

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="<?= $this->project ?>" />
    <meta name="twitter:description" content="<?= $this->metas['description'] ?>" />
    <meta name="twitter:image" content="<?= $this->metas['image'] ?>" />

    <link rel="canonical" href="<?= $this->url . '/' . $this->metas['canonical_url'] ?? null ?>" />

    <link rel="stylesheet" href="/libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/libs/aos-master/dist/aos.css">
    <link rel="stylesheet" href="/libs/animate/css/animate.css">
    <link rel="stylesheet" href="/libs/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="/css/user.css">

</head>

<body>

    <?php
    include_once(URL_SERVIDOR . "/resources/views/assets/header.php");

    if (file_exists(URL_SERVIDOR . "resources/views/" . $this->metas['file'] . ".php")) {
        include_once(URL_SERVIDOR  . "resources/views/" . $this->metas['file'] . ".php");
    } else {
        echo '<div class="not-found py-5">
            <div class="container">
                <div class="row">
                    <h1 class="text-center fw-bold">Error 404</h1>
                    <h2 style="text-align:center">P&aacute;gina no encontrada :(</h2>
                </div>
            </div>
        </div>';
    }

    include_once(URL_SERVIDOR . "/resources/views/assets/footer.php");
    ?>


    <script src="/libs/jquery/jquery-3.6.0.min.js"></script>
    <script src="/libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="/libs/jquery-validate/dist/jquery.validate.js"></script>
    <script src="/libs/jquery-validate/src/additional/phoneUS.js"></script>
    <script src="/libs/aos-master/dist/aos.js"></script>
    <script type="text/javascript" src="/libs/animate/js/animate.js"></script>
    <script type="text/javascript" src="/libs/swiper/swiper-bundle.min.js"></script>
    <script src="/js/user.js"></script>

    <?
    if ($this->metas['slug'] == 'inicio' || $this->metas['slug'] == 'contacto') {
        echo '<script src="/js/validate.js"></script>';
    }
    ?>

</body>

</html>
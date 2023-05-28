<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="/resources/css/admin/admin.css">
</head>

<body>

    <div class="vh-100 vw-100 d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row ">
                <div class="login-form offset-md-3 col-md-6 offset-lg-4 col-lg-4 card py-5 px-4">
                    <p class="text-center mb-5"><img src="" alt="Administrador" class="img-fluid" width="100"></p>
                    <form action="/<?= FOLDER_ADMIN ?>login" method="POST" id="login">
                        <div class="input-group mb-3">
                            <label for="mail">
                                <i class="bi bi-envelope-fill fs-4 px-2"></i>
                            </label>
                            <input type="email" name="email" id="email" placeholder="Correo" class="form-control" value="<?= $authMessages['email'] ?? null ?>" />
                        </div>
                        <div class="input-group mb-4">
                            <label for="folio">
                                <i class="bi bi-lock fs-4 px-2"></i>
                            </label>
                            <input type="password" name="password" id="password" placeholder="Contraseña" class="form-control" />
                        </div>
                        <?php if (isset($authMessages)) : ?>
                            <p class="<?= $authMessages['status'] ?> mb-0"><?= $authMessages['message'] ?></p>
                        <? endif; ?>
                        <div class="input-group text-center justify-content-center">
                            <input type="submit" value="Iniciar sesión" class="btn btn-form text-white" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="/<?= FOLDER_ADMIN ?>libs/jquery-3.6.3/jquery-3.6.3.min.js"></script>
    <script src="/<?= FOLDER_ADMIN ?>libs/jquery-validation-1.19.5/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="/resources/js/admin/validate.js"></script>
</body>

</html>
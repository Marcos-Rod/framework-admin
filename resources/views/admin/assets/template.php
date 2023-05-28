<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $metas['title'] ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="/libs/admin/DataTables/datatables.min.css" />
    <link rel="stylesheet" href="/resources/css/admin/admin.css">

</head>

<body>

    <?php
    include_once(URL_SERVIDOR . "resources/views/admin/assets/header.php");

    if (file_exists(URL_SERVIDOR . "resources/views/admin/" . $metas['file'] . ".php")) {
        include_once(URL_SERVIDOR  . "resources/views/admin/" . $metas['file'] . ".php");
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

    include_once(URL_SERVIDOR . "resources/views/admin/assets/footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="/libs/admin/jquery-3.6.3/jquery-3.6.3.min.js"></script>
    <script src="/libs/admin/jquery-validation-1.19.5/dist/jquery.validate.min.js"></script>
    <script src="/libs/admin/jquery-validation-1.19.5/src/additional/accept.js"></script>
    <script src="/libs/admin/jquery-validation-1.19.5/src/additional/maxsize.js"></script>
    <script src="/libs/admin/jquery-validation-1.19.5/src/additional/time.js"></script>
    <script src="/libs/admin/DataTables/datatables.min.js"></script>
    <script src="/libs/admin/ckeditor/ckeditor.js"></script>
    <script src="/libs/admin/ckfinder/ckfinder.js"></script>
    <script src="/resources/js/admin/validate.js"></script>
    <script src="/resources/js/admin/user.js"></script>
    <script>
        $(document).ready(function() {
            $('#data-table').DataTable();
        });
    </script>

    <? if ($metas['file'] == 'post/create'
            || $metas['file'] == 'post/edit') : ?>
        <script>
            window.onload = function() {
                editor = CKEDITOR.replace('body');

                CKFinder.setupCKEditor(editor, '../../libs/admin/ckfinder/');

            }
        </script>
    <? endif ?>
</body>

</html>
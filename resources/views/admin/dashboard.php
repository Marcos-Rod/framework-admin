<div class="container my-5">
    <div class="row gy-4">
        <h2 class="text-center w-100 mb-5">Bienvenido <?= $_SESSION['admin_name'] ?></h2>

        <div class="col-md-3 text-center">
            <div class="shadow p-4">
                <p class="fs-1 text-secondary"><a href="/admin/post"><i class="bi bi-file-post"></i></a></p>
                <h4><a href="/admin/post">Entradas</a></h4>
            </div>
        </div>
        <div class="col-md-3 text-center">
            <div class="shadow p-4">
                <p class="fs-1 text-secondary"><a href="/admin/category"><i class="bi bi-tags-fill"></i></a></p>
                <h4><a href="/admin/category">Categor&iacute;as</a></h4>
            </div>
        </div>
    </div>
</div>
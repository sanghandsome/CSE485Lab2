<?php
//require_once __DIR__ . '/../../../controllers/NewsController.php';
//$servername = "localhost";
//$username = "root";
//$password = "";
//$dbname = "tlunews";
//
//try {
//    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
//    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//} catch (PDOException $e) {
//    die("Kết nối cơ sở dữ liệu thất bại: " . $e->getMessage());
//}
//$controller = new NewsController($conn);
//$newsList = $controller->index();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Quản lí</title>
</head>
<body>
<header>
    <div class="container mt-4">
        <div class="d-flex">
            <a href="/tlunews/views/admin/login.php" class="btn btn-danger ms-auto">Log out</a>
        </div>
    </div>
</header>
<main class="container">
    <h2 class="text-center text-uppercase text-success my-3">Danh sách bài viết</h2>
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="bi bi-plus-square"></i>
        Thêm bài viết
    </button>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Tiêu Đề</th>
            <th scope="col">Nội Dung</th>
            <th scope="col">Hình Ảnh</th>
            <th scope="col">Ngày Tạo</th>
            <th scope="col">Thể Loại</th>
            <th scope="col">Sửa</th>
            <th scope="col">Xóa</th>
        </tr>
        </thead>
        <tbody>
        <?php $cnt = 1 ?>
        <?php foreach ($news as $new): ?>
            <tr>
                <th scope="row"><?= $cnt ?></th>
                <td><?=  $new['title'] ?></td>
                <td><?=  $new['content'] ?></td>
                <td><?=  $new['image'] ?></td>
                <td><?=  $new['create_at'] ?></td>
                <td><?=  $new['category_name'] ?></td>

                <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Sua" onclick="selectedID()" >
                        <i class="bi bi-pencil"></i>
                    </button>
                </td>
                <td>
                    <button  type="button" id="Delete" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmModal" onclick="selectedID(<?= $flower['id']?>//)">
                     <i class="bi bi-trash3"></i>
                    </button>
             </td>
                <?php $cnt++ ?>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>


    <!-- Modal them bai viet-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm bài viết</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="create.php" method="post">
                        <div class="mb-3">
                            <label for="name" class="col-form-label">Tên thể loại</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal xóa-->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">xóa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    Bạn có chắc chắn muôn xóa không
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="confirmDelete()">Đồng ý</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal sua bai viet-->
    <div class="modal fade" id="Sua" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Sửa bài viết</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Tên thể loại</label>
                            <input type="text" class="form-control" id="recipient-name" value="">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" >Sửa</button>
                </div>
            </div>
        </div>
    </div>
    <nav aria-label="Page navigation example" class="d-flex justify-content-center">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Trước</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Sau</a></li>
        </ul>
    </nav>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

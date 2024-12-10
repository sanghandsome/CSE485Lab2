<?php
    require_once(__DIR__ . '/../../../models/user.php');
    $data [] = new User();
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
    <h2 class="text-center text-uppercase text-success my-3">Danh sách người dùng</h2>
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="bi bi-plus-square"></i>
        Thêm người dùng
    </button>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Tài Khoản</th>
            <th scope="col">Mật Khẩu</th>
            <th scope="col">Vai Trò</th>
            <th scope="col">Sửa</th>
            <th scope="col">Xóa</th>
        </tr>
        </thead>
        <tbody>
        <?php $cnt = 1 ?>
        <?php foreach ($users as $user): ?>
            <tr>
                <th scope="row"><?= $cnt ?></th>
                <td><?=  $user['username'] ?></td>
                <td><?=  $user['password'] ?></td>
                <td><?=  $user['role_name'] ?></td>
                <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Sua" onclick="setData1('<?= $user['id'] ?>', '<?= $user['username'] ?>', '<?= $user['password'] ?>', '<?= $user['role'] ?>')">
                        <i class="bi bi-pencil"></i>
                    </button>
                </td>
                <td>
                    <button type="button" id="Delete" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmModal" onclick="selectedID(<?= $user['id'] ?>)">
                        <i class="bi bi-trash3"></i>
                    </button>
               </td>
               <?php $cnt++ ?>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>


    <!-- Modal them bai viet--
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
    <-- Modal xóa-->
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
    <!-- Modal sua-->
    <div class="modal fade" id="Sua" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Sửa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="admin/users/edit.php" method="post">
                        <div class="mb-3">
                            <label for="updateID" class="col-form-label">Ma</label>
                            <input type="text" class="form-control" name="updateID"  id="updateID" required />
                            <label for="usernameUpdate" class="col-form-label">Tài Khoản</label>
                            <input type="text" class="form-control" name="updateUsername" id="usernameUpdate" required />
                            <label for="passwordUpdate" class="col-form-label">Mật khẩu</label>
                            <input type="text" class="form-control" name="updatePassword" id="passwordUpdate" required />
                            <label for="roleUpdate" class="col-form-label">Chuc nang</label>
                            <input type="text" class="form-control" name="roleUpdate" id="roleUpdate" required />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary" onclick="confirmUpdate()">Sửa</button>
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
<script>
    function selectedID(id){
        deleteID = id;
    }
    function confirmDelete(){
        window.location.href = 'http://localhost/tlunews/views/admin/users/delete.php?id='+deleteID;
    }
    function setData1(id,name,pass,role){
        updateID = id;
        document.getElementById("updateID").value = id;
        document.getElementById("usernameUpdate").value = name;
        document.getElementById("passwordUpdate").value =pass;
        document.getElementById("roleUpdate").value = role;
    }
    function confirmUpdate() {

        var username = document.getElementById("usernameUpdate").value;
        var password = document.getElementById("passwordUpdate").value;
        var updateID = document.getElementById("updateID").value;
        var role = document.getElementById("roleUpdate").value;


        document.getElementById("updateID").value = updateID;
        document.getElementById("usernameUpdate").value = username;
        document.getElementById("passwordUpdate").value = password;
        document.getElementById("roleUpdate").value = role;


        document.forms[0].submit();
    }
</script>
</body>
</html>

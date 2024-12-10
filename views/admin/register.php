<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký Tài Khoản</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php if (!empty($_SESSION['error'])):?>
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thông Báo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?= $_SESSION['error'] ?>
                    <?php unset($_SESSION['error']) ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Đăng Ký Tài Khoản</h3>
                </div>
                <div class="card-body">
                    <form id="registerForm" action="/tlunews/controllers/RegisterController.php" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Tài Khoản</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Nhập tài khoản" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mật Khẩu</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirm-password" class="form-label">Xác Nhận Mật Khẩu</label>
                            <input type="password" class="form-control" id="confirm-password" placeholder="Xác nhận mật khẩu" required>
                        </div>
                        <div id="password-error" class="text-danger mt-2" style="display: none;">Mật khẩu không khớp</div>
                        <div id="password-error1" class="text-danger mt-2" style="display: none;">Mật khẩu phải dài hơn 3 ký tự</div>
                        <?php if(!empty($_SESSION['error'])): ?>
                            <div id="password-error1" class="text-danger mt-2" style="display: none;"><?=$_SESSION['error'] ?></div>
                        <?php endif; ?>
                        <button type="submit" class="btn btn-primary w-100">Đăng Ký</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('registerForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Ngừng gửi form mặc định

        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirm-password').value;
        const passwordError = document.getElementById('password-error');
        const passwordError1 = document.getElementById('password-error1')

        if(password.length < 3){
            passwordError1.style.display = 'block';
        }
        if (password !== confirmPassword) {
            passwordError.style.display = 'block';
        }
        else if (password.length > 3) {
            passwordError.style.display = 'none';
            this.submit();
        }
    });
    window.onload = function() {
        var myModal = new bootstrap.Modal(document.getElementById('myModal'));
        myModal.show();
    }

</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>


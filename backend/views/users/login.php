<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
            <div class="col-lg-6">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Chào mừng bạn đến với trang quản trị của TUANCLOTHES!</h1>
                    </div>
                    <?php require_once 'views/layouts/error.php'; ?>
                    <form class="user" method="post" action="">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control form-control-user"
                                   id="exampleInputEmail" aria-describedby="emailHelp"
                                   placeholder="Nhập email...">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control form-control-user"
                                   id="exampleInputPassword" placeholder="Nhập mật khẩu...">
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox small">
                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                <label class="custom-control-label" for="customCheck">Lưu đăng nhập</label>
                            </div>
                        </div>
                        <input type="submit" name="submit" class="btn btn-primary btn-user btn-block" value="Đăng nhập">
                        <hr>
                        <a href="" class="btn btn-google btn-user btn-block">
                            <i class="fab fa-google fa-fw"></i> Đăng nhập bằng tài khoản Google
                        </a>
                        <a href="" class="btn btn-facebook btn-user btn-block">
                            <i class="fab fa-facebook-f fa-fw"></i> Đăng nhập bằng tài khoản Facebook
                        </a>
                    </form>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="">Quên mật khẩu?</a>
                    </div>
                    <div class="text-center">
                        <a class="small" href="">Đăng ký!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
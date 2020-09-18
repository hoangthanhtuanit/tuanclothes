<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4 text-right">
                        <a href="index.php?controller=user&action=index" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-chevron-left fa-sm text-white-50"></i> Quay lại</a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong>Thêm mới</strong> người dùng
                        </div>
                        <div class="card-body card-block">
                            <?php require_once 'views/layouts/error.php'; ?>
                            <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                                <!--                                <input type="hidden" name="_token" value="{{csrf_token()}}">-->
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Email (<span
                                                    style="color: red;">*</span>)</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" placeholder="Email"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Mật khẩu (<span
                                                    style="color: red;">*</span>)</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="password" id="text-input" name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>" placeholder="Mật khẩu"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Họ tên (<span
                                                    style="color: red;">*</span>)</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="full_name" value="<?php echo isset($_POST['full_name']) ? $_POST['full_name'] : '' ?>" placeholder="Họ tên"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Số điện thoại (<span
                                                    style="color: red;">*</span>)</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="phone_number" value="<?php echo isset($_POST['phone_number']) ? $_POST['phone_number'] : '' ?>" placeholder="Số điện thoại"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Địa chỉ (<span
                                                    style="color: red;">*</span>)</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="address" value="<?php echo isset($_POST['address']) ? $_POST['address'] : '' ?>" placeholder="Địa chỉ"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Ảnh đại diện (<span
                                                    style="color: red;">*</span>)</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="file" id="text-input" name="avatar" value="" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="select" class=" form-control-label">Phân quyền</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="level" id="select" class="form-control">
                                            <option value="0">Khách hàng</option>
                                            <option value="1">Quản trị viên</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="select" class=" form-control-label">Trạng thái</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="status" id="select" class="form-control">
                                            <option value="0">Disable</option>
                                            <option value="1">Active</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12 text-center">
                                        <input type="submit" class="btn btn-primary btn-xs" name="submit"
                                               value="Thêm mới">
                                        <input type="reset" class="btn btn-danger btn-xs" name="reset" value="Nhập lại">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

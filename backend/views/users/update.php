<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4 text-right">
                        <a href="index.php?controller=user&action=index"
                           class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-chevron-left fa-sm text-white-50"></i> Quay lại</a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong>Cập nhật</strong> người dùng
                        </div>
                        <div class="card-body card-block">
                            <?php if (empty($user)) : ?>
                                <h3>Không tồn tại bản ghi</h3>
                            <?php else : ?>
                                <?php require_once 'views/layouts/error.php'; ?>
                                <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                                    <!--                                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">-->
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Email (<span
                                                        style="color: red;">*</span>)</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="email" placeholder="Email"
                                                   value="<?php echo isset($_POST['email']) ? $_POST['email'] : $user['email']; ?>"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Mật khẩu (<span
                                                        style="color: red;">*</span>)</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="password" id="text-input" name="password" placeholder="Mật khẩu"
                                                   value="<?php echo isset($_POST['password']) ? $_POST['password'] : $user['password']; ?>"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Họ tên (<span
                                                        style="color: red;">*</span>)</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="full_name" placeholder="Họ tên"
                                                   value="<?php echo isset($_POST['full_name']) ? $_POST['full_name'] : $user['full_name']; ?>"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Số điện thoại (<span
                                                        style="color: red;">*</span>)</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="phone_number" placeholder="Số điện thoại"
                                                   value="<?php echo isset($_POST['phone_number']) ? $_POST['phone_number'] : $user['phone_number']; ?>"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Địa chỉ (<span
                                                        style="color: red;">*</span>)</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="address" placeholder="Địa chỉ"
                                                   value="<?php echo isset($_POST['address']) ? $_POST['address'] : $user['address']; ?>"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Ảnh đại diện (<span
                                                    style="color: red;">*</span>)</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="text-input" name="avatar" class="form-control"><br>
                                            <img height="200" src="assets/uploads/users/<?php echo $user['avatar']; ?>" alt="">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Phân quyền</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <?php
                                            $selected_active = '';
                                            $selected_disabled = 'selected';
                                            if ($user['level'] == 1) {
                                                $selected_active = 'selected';
                                            }
                                            if (isset($_POST['level'])) {
                                                switch ($_POST['level']) {
                                                    case 0:
                                                        $selected_disabled = 'selected';
                                                        break;
                                                    case 1:
                                                        $selected_active = 'selected';
                                                        break;
                                                }
                                            }
                                            ?>
                                            <select name="level" id="select" class="form-control">
                                                <option value="0" <?php echo $selected_disabled ?>>Khách hàng</option>
                                                <option value="1" <?php echo $selected_active ?>>Quản trị viên</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Trạng thái</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <?php
                                            $selected_active = '';
                                            $selected_disabled = 'selected';
                                            if ($user['status'] == 1) {
                                                $selected_active = 'selected';
                                            }
                                            if (isset($_POST['status'])) {
                                                switch ($_POST['status']) {
                                                    case 0:
                                                        $selected_disabled = 'selected';
                                                        break;
                                                    case 1:
                                                        $selected_active = 'selected';
                                                        break;
                                                }
                                            }
                                            ?>
                                            <select name="status" id="select" class="form-control">
                                                <option value="0" <?php echo $selected_disabled ?>>Disable</option>
                                                <option value="1" <?php echo $selected_active ?>>Active</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-12 text-center">
                                            <input type="submit" class="btn btn-primary btn-xs" name="submit"
                                                   value="Lưu">
                                            <input type="reset" class="btn btn-danger btn-xs" name="reset"
                                                   value="Nhập lại">
                                        </div>
                                    </div>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
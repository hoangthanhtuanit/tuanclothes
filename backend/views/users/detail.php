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
                            <strong>Chi tiết</strong> người dùng
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="dataTable" width="100%" cellspacing="0">
                                    <tr>
                                        <td>ID</td>
                                        <td><?php echo $user['id']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><?php echo $user['email']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Họ tên</td>
                                        <td><?php echo $user['full_name']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Số điện thoại</td>
                                        <td><?php echo $user['phone_number']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Địa chỉ</td>
                                        <td><?php echo $user['address']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Ảnh đại diện</td>
                                        <td><img width="200" src="assets/uploads/users/<?php echo $user['avatar']; ?>" alt=""></td>
                                    </tr>
                                    <tr>
                                        <td>Quyền</td>
                                        <td>
                                            <?php
                                            $customer_text = '';
                                            $admin_text = '';
                                            switch ($user['level']) {
                                                case 0:
                                                    $customer_text = 'Khách hàng';
                                                    break;
                                                case 1:
                                                    $admin_text = 'Quản trị viên';
                                                    break;
                                            }
                                            ?>
                                            <span class="badge badge-info"><?php echo $admin_text; ?></span>
                                            <span class="badge badge-primary"><?php echo $customer_text; ?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Trạng thái</td>
                                        <td>
                                            <?php
                                            $active_text = '';
                                            $disable_text = '';
                                            switch ($user['status']) {
                                                case 0:
                                                    $disable_text = 'Disable';
                                                    break;
                                                case 1:
                                                    $active_text = 'Active';
                                                    break;
                                            }
                                            ?>
                                            <span class="badge badge-success"><?php echo $active_text; ?></span>
                                            <span class="badge badge-secondary"><?php echo $disable_text; ?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Ngày tạo</td>
                                        <td><?php echo date('d/m/Y H:i:s', strtotime($user['created_at'])); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Ngày cập nhật</td>
                                        <td><?php echo !empty($user['updated_at']) ? date('d/m/Y H:i:s', strtotime($user['updated_at'])) : '---' ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
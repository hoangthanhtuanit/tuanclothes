<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4 text-right">
                        <a href="index.php?controller=user&action=create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-plus fa-sm text-white-50"></i> Thêm mới</a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong>Danh sách</strong> người dùng
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr style="text-align: center;">
                                        <th>ID</th>
                                        <th>Họ tên</th>
                                        <th>Điện thoại</th>
                                        <th>Địa chỉ</th>
                                        <th>Trạng thái</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($users as $user) : ?>
                                        <tr style="text-align: center;">
                                            <td><?php echo $user['id']; ?></td>
                                            <td>
                                                <?php echo $user['full_name']; ?><br>
                                                <?php
                                                $customer_text = '';
                                                $admin_text = '';
                                                switch ($user['level']) {
                                                    case 0:
                                                        $customer_text = 'Customer';
                                                        break;
                                                    case 1:
                                                        $admin_text = 'Admin';
                                                        break;
                                                }
                                                ?>
                                                <span class="badge badge-info"><?php echo $admin_text; ?></span>
                                                <span class="badge badge-primary"><?php echo $customer_text; ?></span>
                                            </td>
                                            <td><?php echo $user['phone_number']; ?></td>
                                            <td><?php echo $user['address']; ?></td>
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
                                            <td>
                                                <div class="table-data-feature text-center">
                                                    <div class="btn-group mb-1">
                                                        <button type="button" class="btn btn-primary">Xử lý</button>
                                                        <button type="button"
                                                                class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                            <span class="sr-only">Xử lý</span>
                                                        </button>
                                                        <div class="dropdown-menu" x-placement="bottom-start"
                                                             style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(81px, 38px, 0px);">
                                                            <?php if ($user['status'] == 0) : ?>
                                                                <a class="dropdown-item"
                                                                   href="">Kích hoạt</a>
                                                            <?php else : ?>
                                                                <a class="dropdown-item"
                                                                   href="">Vô hiệu hoá</a>
                                                            <?php endif; ?>
                                                            <a class="dropdown-item"
                                                               href="index.php?controller=user&action=detail&id=<?php echo $user['id'] ?>">Xem chi tiết</a>
                                                            <a class="dropdown-item"
                                                               href="index.php?controller=user&action=update&id=<?php echo $user['id'] ?>">Cập nhật</a>
                                                            <a class="dropdown-item"
                                                               onclick="return confirm('Bạn có muốn tiếp tục xóa không?')"
                                                               href="index.php?controller=user&action=delete&id=<?php echo $user['id'] ?>">Xóa</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
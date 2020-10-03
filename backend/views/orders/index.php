<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4 text-right">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong>Danh sách</strong> sản phẩm
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr style="text-align: center;">
                                        <th>ID</th>
                                        <th>Khách hàng</th>
                                        <th>Tổng tiền</th>
                                        <th>Trạng thái</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($orders as $order) : ?>
                                        <tr style="text-align: center;">
                                            <td><?php echo $order['id']; ?></td>
                                            <td class="text-left">
                                                <ul style="list-style: none;">
                                                    <li>Họ tên: <?php echo $order['full_name']; ?></li>
                                                    <li>SĐT: <?php echo $order['phone_number']; ?></li>
                                                    <li>Email: <?php echo $order['email']; ?></li>
                                                    <li>Địa chỉ: <?php echo $order['address']; ?></li>
                                                </ul>
                                            </td>
                                            <td>$<?php echo number_format($order['price_total'], 0, '.', '.') ?></td>
                                            <td>
                                                <?php
                                                $status_a = '';
                                                $status_b = '';
                                                $status_c = '';
                                                $status_d = '';
                                                switch ($order['status']) {
                                                    case 0:
                                                        $status_a = 'Chờ xử lý';
                                                        break;
                                                    case 1:
                                                        $status_b = 'Đang chuyển hàng';
                                                        break;
                                                    case 2:
                                                        $status_c = 'Đã nhận hàng';
                                                        break;
                                                    case 3:
                                                        $status_d = 'Đã huỷ';
                                                        break;
                                                }
                                                ?>
                                                <span class="badge badge-warning"><?php echo $status_a; ?></span>
                                                <span class="badge badge-info"><?php echo $status_b; ?></span>
                                                <span class="badge badge-success"><?php echo $status_c; ?></span>
                                                <span class="badge badge-danger"><?php echo $status_d; ?></span>
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
                                                            <?php if ($order['status'] == 0) : ?>
                                                                <a class="dropdown-item" href="index.php?controller=order&action=update&id=<?php echo $order['id']; ?>&status=process">Chuyển hàng</a>
                                                                <a class="dropdown-item" href="index.php?controller=order&action=update&id=<?php echo $order['id']; ?>&status=success">Đã nhận hàng</a>
                                                                <a class="dropdown-item" href="index.php?controller=order&action=update&id=<?php echo $order['id']; ?>&status=cancel">Hủy</a>
                                                                <div class="dropdown-divider"></div>
                                                            <?php elseif ($order['status'] == 1) : ?>
                                                                <a class="dropdown-item" href="index.php?controller=order&action=update&id=<?php echo $order['id']; ?>&status=success">Đã nhận hàng</a>
                                                                <a class="dropdown-item" href="index.php?controller=order&action=update&id=<?php echo $order['id']; ?>&status=cancel">Hủy</a>
                                                                <div class="dropdown-divider"></div>
                                                            <?php endif; ?>
                                                            <a class="dropdown-item"
                                                               href="index.php?controller=order&action=detail&id=<?php echo $order['id'] ?>">Xem chi tiết</a>
                                                            <a class="dropdown-item"
                                                               onclick="return confirm('Bạn có muốn tiếp tục xóa không?')"
                                                               href="index.php?controller=order&action=delete&id=<?php echo $order['id'] ?>">Xóa</a>
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
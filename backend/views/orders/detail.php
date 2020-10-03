<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4 text-right">
                        <a href="index.php?controller=order&action=index"
                           class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                    class="fas fa-chevron-left fa-sm text-white-50"></i> Quay lại</a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong>Chi tiết</strong> đơn hàng
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr style="text-align: center;">
                                        <th>ID</th>
                                        <th>Khách hàng</th>
                                        <th>Ảnh</th>
                                        <th>Đơn giá</th>
                                        <th>Số lượng</th>
                                        <th>Khuyến mãi</th>
                                        <th>Kích thước</th>
                                        <th>Màu</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($order_details as $order_detail) : ?>
                                        <tr style="text-align: center;">
                                            <td><?php echo $order_detail['id']; ?></td>
                                            <td><?php echo $order_detail['full_name']; ?></td>
                                            <td>
                                                <?php if (!empty($order_detail['image'])): ?>
                                                    <img width="100" height="150" src="assets/uploads/products/<?php echo $order_detail['image'] ?>"/>
                                                <?php endif; ?>
                                            </td>
                                            <td>$<?php echo number_format($order_detail['price'], 0 ,'.', '.'); ?></td>
                                            <td><?php echo $order_detail['quantity']; ?></td>
                                            <td><?php echo $order_detail['discount']; ?>%</td>
                                            <td><?php echo $order_detail['size']; ?></td>
                                            <td><?php echo $order_detail['color']; ?></td>
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
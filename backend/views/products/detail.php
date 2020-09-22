<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4 text-right">
                        <a href="index.php?controller=product&action=index" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-chevron-left fa-sm text-white-50"></i> Quay lại</a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong>Chi tiết</strong> sản phẩm
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="dataTable" width="100%" cellspacing="0">
                                    <tr>
                                        <td>ID</td>
                                        <td><?php echo $product['id']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tên sản phẩm</td>
                                        <td><?php echo $product['name']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Ảnh sản phẩm</td>
                                        <td><img width="200" src="assets/uploads/products/<?php echo $product['image']; ?>" alt=""></td>
                                    </tr>
                                    <tr>
                                        <td>Màu</td>
                                        <td><?php echo $product['color']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Giá</td>
                                        <td>$<?php echo number_format($product['price'], 0, '.', '.') ?></td>
                                    </tr>
                                    <tr>
                                        <td>Giảm giá</td>
                                        <td><?php echo $product['discount']; ?>%</td>
                                    </tr>
                                    <tr>
                                        <td>Số lượng trong kho</td>
                                        <td><?php echo $product['quantity_in_stock']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Mô tả</td>
                                        <td><?php echo $product['summary']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Chi tiết sản phẩm</td>
                                        <td><?php echo $product['description']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Trạng thái</td>
                                        <td>
                                            <?php
                                            $active_text = '';
                                            $disable_text = '';
                                            switch ($product['status']) {
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
                                        <td><?php echo date('d/m/Y H:i:s', strtotime($product['created_at'])); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Ngày cập nhật</td>
                                        <td><?php echo !empty($product['updated_at']) ? time('d/m/Y H:i:s', strtotime($product['updated_at'])) : '---'; ?></td>
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
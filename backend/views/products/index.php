<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4 text-right">
                        <a href="index.php?controller=product&action=create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-plus fa-sm text-white-50"></i> Thêm mới</a>
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
                                        <th>Tên sản phẩm</th>
                                        <th>Ảnh sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Trạng thái</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($products as $product) : ?>
                                        <tr style="text-align: center;">
                                            <td><?php echo $product['id']; ?></td>
                                            <td>
                                                <?php echo $product['name']; ?>
                                            </td>
                                            <td>
                                                <?php if (!empty($product['image'])): ?>
                                                    <img height="200" src="assets/uploads/products/<?php echo $product['image'] ?>"/>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo number_format($product['price'], 0, '.', '.') ?> VNĐ</td>
                                            <td><?php echo $product['quantity_in_stock']; ?></td>
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
                                                            <?php if ($product['status'] == 0) : ?>
                                                                <a class="dropdown-item"
                                                                   href="">Kích hoạt</a>
                                                            <?php else : ?>
                                                                <a class="dropdown-item"
                                                                   href="">Vô hiệu hoá</a>
                                                            <?php endif; ?>
                                                            <a class="dropdown-item"
                                                               href="index.php?controller=product&action=detail&id=<?php echo $product['id'] ?>">Xem chi tiết</a>
                                                            <a class="dropdown-item"
                                                               href="index.php?controller=product&action=update&id=<?php echo $product['id'] ?>">Cập nhật</a>
                                                            <a class="dropdown-item"
                                                               onclick="return confirm('Bạn có muốn tiếp tục xóa không?')"
                                                               href="index.php?controller=product&action=delete&id=<?php echo $product['id'] ?>">Xóa</a>
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
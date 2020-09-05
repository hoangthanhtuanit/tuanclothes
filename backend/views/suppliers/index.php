<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4 text-right">
                        <a href="index.php?controller=supplier&action=create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-plus fa-sm text-white-50"></i> Thêm mới</a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong>Danh sách</strong> nhà cung cấp
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr style="text-align: center;">
                                        <th>ID</th>
                                        <th>Tên nhà cung cấp</th>
                                        <th>SĐT</th>
                                        <th>Địa chỉ</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($suppliers as $supplier) : ?>
                                        <tr style="text-align: center;">
                                            <td><?php echo $supplier['id']; ?></td>
                                            <td><?php echo $supplier['name']; ?></td>
                                            <td><?php echo $supplier['phone_number']; ?></td>
                                            <td><?php echo $supplier['address']; ?></td>
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
                                                            <a class="dropdown-item"
                                                               href="index.php?controller=category&action=update&id=<?php echo $supplier['id'] ?>">Cập nhật</a>
                                                            <a class="dropdown-item"
                                                               onclick="return confirm('Bạn có muốn tiếp tục xóa không?')"
                                                               href="index.php?controller=category&action=delete&id=<?php echo $supplier['id'] ?>">Xóa</a>
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
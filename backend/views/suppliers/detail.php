<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4 text-right">
                        <a href="index.php?controller=supplier&action=index" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-chevron-left fa-sm text-white-50"></i> Quay lại</a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong>Chi tiết</strong> nhà cung cấp
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="dataTable" width="100%" cellspacing="0">
                                    <tr>
                                        <td>ID</td>
                                        <td><?php echo $supplier['id']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tên nhà cung cấp</td>
                                        <td><?php echo $supplier['name']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Số điện thoại</td>
                                        <td><?php echo $supplier['phone_number']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Địa chỉ</td>
                                        <td><?php echo $supplier['address']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><?php echo $supplier['email']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Ngày tạo</td>
                                        <td><?php echo date('d/m/Y H:i:s', strtotime($supplier['created_at'])); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Ngày cập nhật</td>
                                        <td><?php echo !empty($supplier['updated_at']) ? time('d/m/Y H:i:s', strtotime($supplier['updated_at'])) : '---'; ?></td>
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
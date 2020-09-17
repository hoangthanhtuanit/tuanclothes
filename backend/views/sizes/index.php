<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4 text-right">
                        <a href="index.php?controller=size&action=create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-plus fa-sm text-white-50"></i> Thêm mới</a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong>Danh sách</strong> kích thước
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr style="text-align: center;">
                                        <th>ID</th>
                                        <th>Kích thước</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($sizes as $size) : ?>
                                        <tr style="text-align: center;">
                                            <td><?php echo $size['id']; ?></td>
                                            <td><?php echo $size['size']; ?></td>
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
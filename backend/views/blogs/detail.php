<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4 text-right">
                        <a href="index.php?controller=blog&action=index" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-chevron-left fa-sm text-white-50"></i> Quay lại</a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong>Chi tiết</strong> tin tức
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="dataTable" width="100%" cellspacing="0">
                                    <tr>
                                        <td>ID</td>
                                        <td><?php echo $blog['id']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tiêu đề tin</td>
                                        <td><?php echo $blog['title']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Ảnh</td>
                                        <td><img width="200" src="assets/uploads/blogs/<?php echo $blog['image']; ?>" alt=""></td>
                                    </tr>
                                    <tr>
                                        <td>Mô tả ngắn</td>
                                        <td><?php echo $blog['summary']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nội dung tin</td>
                                        <td><?php echo $blog['description'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Trạng thái</td>
                                        <td>
                                            <?php
                                            $active_text = '';
                                            $disable_text = '';
                                            switch ($blog['status']) {
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
                                        <td><?php echo date('d/m/Y H:i:s', strtotime($blog['created_at'])); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Ngày cập nhật</td>
                                        <td><?php echo !empty($blog['updated_at']) ? date('d/m/Y H:i:s', strtotime($blog['updated_at'])) : '---'; ?></td>
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
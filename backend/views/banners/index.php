<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4 text-right">
                        <a href="index.php?controller=banner&action=create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-plus fa-sm text-white-50"></i> Thêm mới</a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong>Danh sách</strong> banner
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr style="text-align: center;">
                                        <th>ID</th>
                                        <th>Tiêu đề</th>
                                        <th>Ảnh</th>
                                        <th>Trạng thái</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($banners as $banner) : ?>
                                        <tr style="text-align: center;">
                                            <td><?php echo $banner['id']; ?></td>
                                            <td><?php echo $banner['title']; ?></td>
                                            <td>
                                                <?php if (!empty($banner['image'])): ?>
                                                    <img height="150" src="assets/uploads/<?php echo $banner['image'] ?>"/>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php
                                                $active_text = '';
                                                $disable_text = '';
                                                switch ($banner['status']) {
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
                                                            <?php if ($banner['status'] == 0) : ?>
                                                                <a class="dropdown-item"
                                                                   href="">Kích hoạt</a>
                                                            <?php else : ?>
                                                                <a class="dropdown-item"
                                                                   href="">Vô hiệu hoá</a>
                                                            <?php endif; ?>
                                                            <a class="dropdown-item"
                                                               href="index.php?controller=banner&action=update&id=<?php echo $banner['id'] ?>">Cập nhật</a>
                                                            <a class="dropdown-item"
                                                               onclick="return confirm('Bạn có muốn tiếp tục xóa không?')"
                                                               href="index.php?controller=banner&action=delete&id=<?php echo $banner['id'] ?>">Xóa</a>
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
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4 text-right">
                        <a href="index.php?controller=banner&action=index"
                           class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-chevron-left fa-sm text-white-50"></i> Quay lại</a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong>Cập nhật</strong> banner
                        </div>
                        <div class="card-body card-block">
                            <?php if (empty($banner)) : ?>
                                <h2>Không tồn tại bản ghi</h2>
                            <?php else : ?>
                                <?php require_once 'views/layouts/error.php'; ?>
                                <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                                    <!--                                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">-->
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Tiêu đề (<span
                                                    style="color: red;">*</span>)</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="title" placeholder="Tiêu đề"
                                                   value="<?php echo isset($_POST['title']) ? $_POST['title'] : $banner['title']; ?>"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Mô tả (<span
                                                    style="color: red;">*</span>)</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="summary" placeholder="Mô tả"
                                                   value="<?php echo isset($_POST['summary']) ? $_POST['summary'] : $banner['summary']; ?>"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Ảnh (<span
                                                    style="color: red;">*</span>)</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="text-input" name="image" class="form-control"><br>
                                            <img height="200" src="assets/uploads/banners/<?php echo $banner['image'] ?>" alt="">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Trạng thái</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <?php
                                            $selected_active = '';
                                            $selected_disabled = 'selected';
                                            if ($banner['status'] == 1) {
                                                $selected_active = 'selected';
                                            }
                                            if (isset($_POST['status'])) {
                                                switch ($_POST['status']) {
                                                    case 0:
                                                        $selected_disabled = 'selected';
                                                        break;
                                                    case 1:
                                                        $selected_active = 'selected';
                                                        break;
                                                }
                                            }
                                            ?>
                                            <select name="status" id="select" class="form-control">
                                                <option value="0" <?php echo $selected_disabled ?>>Disable</option>
                                                <option value="1" <?php echo $selected_active ?>>Active</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-12 text-center">
                                            <input type="submit" class="btn btn-primary btn-xs" name="submit"
                                                   value="Lưu">
                                            <input type="reset" class="btn btn-danger btn-xs" name="reset"
                                                   value="Nhập lại">
                                        </div>
                                    </div>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
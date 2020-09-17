<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4 text-right">
                        <a href="index.php?controller=size&action=index" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-chevron-left fa-sm text-white-50"></i> Quay lại</a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong>Thêm mới</strong> kích thước
                        </div>
                        <div class="card-body card-block">
                            <?php require_once 'views/layouts/error.php'; ?>
                            <form action="" method="post" class="form-horizontal">
                                <!--                                <input type="hidden" name="_token" value="{{csrf_token()}}">-->
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Kích thước (<span
                                                style="color: red;">*</span>)</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="size" value="<?php isset($_POST['size']) ? $_POST['size'] : '' ?>" placeholder="Kích thước"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12 text-center">
                                        <input type="submit" class="btn btn-primary btn-xs" name="submit"
                                               value="Thêm mới">
                                        <input type="reset" class="btn btn-danger btn-xs" name="reset" value="Nhập lại">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

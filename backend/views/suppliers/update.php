<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4 text-right">
                        <a href="index.php?controller=supplier&action=index"
                           class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-chevron-left fa-sm text-white-50"></i> Quay lại</a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong>Cập nhật</strong> nhà cung cấp
                        </div>
                        <div class="card-body card-block">
                            <?php if (empty($supplier)) : ?>
                                <h2>Không tồn tại bản ghi</h2>
                            <?php else : ?>
                                <?php require_once 'views/layouts/error.php'; ?>
                                <form action="" method="post" class="form-horizontal">
                                    <!--                                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">-->
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Tên nhà cung cấp
                                                (<span
                                                    style="color: red;">*</span>)</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="name" placeholder="Tên danh mục"
                                                   value="<?php echo isset($_POST['name']) ? $_POST['name'] : $supplier['name']; ?>"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Số điện thoại
                                                (<span
                                                    style="color: red;">*</span>)</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="phone_number" placeholder="Số điện thoại nhà cung cấp"
                                                   value="<?php echo isset($_POST['phone_number']) ? $_POST['phone_number'] : $supplier['phone_number']; ?>"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Địa chỉ
                                                (<span
                                                    style="color: red;">*</span>)</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="address" placeholder="Địa chỉ"
                                                   value="<?php echo isset($_POST['address']) ? $_POST['address'] : $supplier['address']; ?>"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Email
                                                (<span
                                                    style="color: red;">*</span>)</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="email" placeholder="Email"
                                                   value="<?php echo isset($_POST['email']) ? $_POST['email'] : $supplier['email']; ?>"
                                                   class="form-control">
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
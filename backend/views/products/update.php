<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4 text-right">
                        <a href="index.php?controller=product&action=index"
                           class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-chevron-left fa-sm text-white-50"></i> Quay lại</a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong>Cập nhật</strong> sản phẩm
                        </div>
                        <div class="card-body card-block">
                            <?php if (empty($product)) : ?>
                                <h3>Không tồn tại bản ghi</h3>
                            <?php else : ?>
                                <?php require_once 'views/layouts/error.php'; ?>
                                <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                                    <!--                                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">-->
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Tên sản phẩm (<span
                                                    style="color: red;">*</span>)</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="name" placeholder="Tiêu đề"
                                                   value="<?php echo isset($_POST['name']) ? $_POST['name'] : $product['name']; ?>"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Danh mục (<span
                                                        style="color: red;">*</span>)</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="category_id" id="select" class="form-control">
                                                <?php foreach ($categories as $category):
                                                    $selected = '';
                                                    if ($category['id'] == $product['category_id']) {
                                                        $selected = 'selected';
                                                    }
                                                    if (isset($_POST['category_id']) && $category['id'] == $_POST['category_id']) {
                                                        $selected = 'selected';
                                                    }
                                                    ?>
                                                    <option value="<?php echo $category['id'] ?>" <?php echo $selected; ?>>
                                                        <?php echo $category['name'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Nhà cung cấp (<span
                                                        style="color: red;">*</span>)</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="supplier_id" id="select" class="form-control">
                                                <?php foreach ($suppliers as $supplier):
                                                    $selected = '';
                                                    if ($supplier['id'] == $product['supplier_id']) {
                                                        $selected = 'selected';
                                                    }
                                                    if (isset($_POST['supplier_id']) && $supplier['id'] == $_POST['supplier_id']) {
                                                        $selected = 'selected';
                                                    }
                                                    ?>
                                                    <option value="<?php echo $supplier['id'] ?>" <?php echo $selected; ?>>
                                                        <?php echo $supplier['name'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Ảnh (<span
                                                    style="color: red;">*</span>)</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="text-input" name="image" class="form-control"><br>
                                            <img height="200" src="assets/uploads/products/<?php echo $product['image'] ?>" alt="">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Màu (<span
                                                        style="color: red;">*</span>)</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="color" placeholder="Màu"
                                                   value="<?php echo isset($_POST['color']) ? $_POST['color'] : $product['color']; ?>"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Giá sản phẩm (<span
                                                        style="color: red;">*</span>)</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="price" placeholder="Giá sản phẩm"
                                                   value="<?php echo isset($_POST['price']) ? $_POST['price'] : $product['price']; ?>"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Giảm giá (<span
                                                        style="color: red;">*</span>)</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="discount" placeholder="Giảm giá"
                                                   value="<?php echo isset($_POST['discount']) ? $_POST['discount'] : $product['discount']; ?>"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Số lượng (<span
                                                        style="color: red;">*</span>)</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="quantity_in_stock" placeholder="Số lượng"
                                                   value="<?php echo isset($_POST['quantity_in_stock']) ? $_POST['quantity_in_stock'] : $product['quantity_in_stock']; ?>"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Mô tả ngắn (<span
                                                        style="color: red;">*</span>)</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="summary" placeholder="Mô tả"
                                                   value="<?php echo isset($_POST['summary']) ? $_POST['summary'] : $product['summary']; ?>"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Chi tiết sản phẩm (<span
                                                        style="color: red;">*</span>)</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <textarea name="description" id="description" rows="10"><?php echo isset($_POST['description']) ? $_POST['description'] : $product['description']; ?></textarea>
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
                                            if ($product['status'] == 1) {
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
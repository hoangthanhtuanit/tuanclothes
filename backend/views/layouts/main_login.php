<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>
        <?php echo $this->title_page; ?>
    </title>
    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/toastr.css"/>
</head>
<body class="bg-gradient-primary">
<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9" style="padding-top: 120px;">
            <?php echo $this->content; ?>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="assets/js/toastr.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="assets/js/sb-admin-2.min.js"></script>
<script src="assets/ckeditor/ckeditor.js"></script>
<!-- DataTable JavaScript-->
<script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<!-- My JavaScript-->
<script src="assets/js/myadmin-js.js"></script>
<script type="text/javascript">
    <?php if (isset($_SESSION['success'])) : ?>
    toastr.success("<?php echo Helper::flash('success') ?>");
    <?php elseif (isset($_SESSION['error'])) : ?>
    toastr.error("<?php echo Helper::flash('error') ?>");
    <?php endif; ?>
</script>

</body>

</html>
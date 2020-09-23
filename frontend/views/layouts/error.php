<?php if (isset($this->error) && !empty($this->error)) : ?>
<div class="alert alert-danger help-block">
    <span><?php echo $this->error; ?></span><br>
</div>
<?php endif; ?>


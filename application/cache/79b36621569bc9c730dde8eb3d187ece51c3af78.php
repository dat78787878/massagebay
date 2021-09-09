<?php $__env->startSection("css"); ?>
<link rel="stylesheet" href="theme/frontend/scss/style_danh_muc.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>

        <div class="col-12 col-sm-12 col-md-5 text-center pt-3" style="margin:0 auto;">
            <p class="fs-5">Quảng bá spa Việt Nam</p>
            <p class="fs-5">Địa chỉ: <?php echo $this->CI->Dindex->getSettings('ADDRESS'); ?></p>
            <p class="fs-5">Tel:  <?php echo $this->CI->Dindex->getSettings('TEL'); ?>   Mobile: <?php echo $this->CI->Dindex->getSettings('MOBILE'); ?></p>
            <p class="fs-5">Email: <?php echo $this->CI->Dindex->getSettings('EMAIL'); ?></p>
            <p class="fs-5">Web khách sạn: <?php echo $this->CI->Dindex->getSettings('WEB'); ?></p>
            <p class="fs-5">Web VietNam hotel: <?php echo $this->CI->Dindex->getSettings('WEB'); ?></p>
            <p class="fs-5">Đối tác khách sạn</p>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("index", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
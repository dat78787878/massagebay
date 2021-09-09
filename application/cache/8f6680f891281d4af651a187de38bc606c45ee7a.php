<section class="introduce">
    <div class="container">
        <div class="row py-4">
            <div class="col-6 col-sm-6 col-md-3">
                <?php $arr = $this->CI->Dindex->recursiveTable("*","menu","parent","id","0",array(array('key'=>'act','compare'=>'=','value'=>'1'),array('key'=>'group_id','compare'=>'=','value'=>'2'))); ?><?php printMenu($arr,array()); ?>
            </div>
            <div class="col-6 col-sm-6 col-md-4">
                <?php $arr = $this->CI->Dindex->recursiveTable("*","menu","parent","id","0",array(array('key'=>'act','compare'=>'=','value'=>'1'),array('key'=>'group_id','compare'=>'=','value'=>'3'))); ?><?php printMenu($arr,array()); ?>
            </div>
            <div class="col-12 col-sm-12 col-md-5">
                <p class="fs-5">Quảng bá spa Việt Nam</p>
                <p class="fs-5">Địa chỉ: <?php echo $this->CI->Dindex->getSettings('ADDRESS'); ?></p>
                <p class="fs-5">Tel: <?php echo $this->CI->Dindex->getSettings('TEL'); ?> Mobile: <?php echo $this->CI->Dindex->getSettings('MOBILE'); ?></p>
                <p class="fs-5">Email: <?php echo $this->CI->Dindex->getSettings('EMAIL'); ?></p>
                <p class="fs-5">Web khách sạn: <?php echo $this->CI->Dindex->getSettings('WEB'); ?></p>
                <p class="fs-5">Web VietNam hotel: <?php echo $this->CI->Dindex->getSettings('WEB'); ?></p>
                <p class="fs-5">Đối tác khách sạn</p>
            </div>
        </div>
    </div>
</section>
<!--  -->
<footer class="">
    <div class="container text-center">
        <p class="fs-5">Địa chỉ: <?php echo $this->CI->Dindex->getSettings('ADDRESS'); ?></p>
        <p class="fs-5">Điện thoại: <?php echo $this->CI->Dindex->getSettings('TEL'); ?> ; Fax: <?php echo $this->CI->Dindex->getSettings('FAX'); ?> ; Di động: <?php echo $this->CI->Dindex->getSettings('MOBILE'); ?></p>
        <p class="fs-5">Email: <?php echo $this->CI->Dindex->getSettings('EMAIL'); ?> ; Website: <?php echo $this->CI->Dindex->getSettings('WEB'); ?> ; <?php echo $this->CI->Dindex->getSettings('WEB_2'); ?></p>
        <p class="fs-5">Số ĐKKD: 0103003424; Ngày cấp: 02/1/2004; Giám dốc : <?php echo $this->CI->Dindex->getSettings('MANAGE'); ?></p>

    </div>
</footer>
<section class="header">
    <div class="header-top">
        <div class="container pt-4 pb-1 text-center">
            <a href=""><img src="<?php echo $this->CI->Dindex->getSettingImage('LOGO',1,'-1',false); ?>" alt="<?php echo $this->CI->Dindex->getSettingImage('LOGO#ALT',false,'',false); ?>" title="<?php echo $this->CI->Dindex->getSettingImage('LOGO#TITLE',false,'',false); ?>" class="img_logo pb-3"></a>
        </div>
    </div>
    <!------------------------menu--------------------->
    <div class="container d-flex align-center justify-content-center">
        <div class="menu_wrapper">
            <?php $arr = $this->CI->Dindex->recursiveTable("*","menu","parent","id","0",array(array('key'=>'act','compare'=>'=','value'=>'1'),array('key'=>'group_id','compare'=>'=','value'=>'1'))); ?><?php printMenu($arr,array()); ?>
        </div>
        <div id="button_menu" class="d-lg-none justify-content-end">
            <div id="pencet">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
</section>
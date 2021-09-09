<section class="news pb-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center pt-5">
                <div class="news_text fw-bold" style="color: #7b0200;font-family:'font_strong';">Tin tức mới nhất</div>
                <img src="theme/frontend/images/icon1.png " style=" margin: 0 auto" class="" alt="">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php
            $arrnews4 = $this->CI->Dindex->getDataDetail(
                array(
                    'input'=>"*",
                    'table'=>'news',
                    'order'=>'ord asc,id desc',
                    'where'=>array(array('key'=>'act','compare'=>'=','value'=>'1'),array('key'=>'hot','compare'=>'=','value'=>'1')),
                    'limit'=>'0,3',
                    'pivot'=>[]
                )
            );
         ?><?php $countnews4 = count($arrnews4);
     for ($inews4=0; $inews4 < $countnews4; $inews4++) { $itemnews4=$arrnews4[$inews4]; ?>
            <div class="col-6 col-sm-6 col-md-4">
                <div class="news--content">
                    <div class="news--content__detail">
                        <div class="detail-image">
                            <a href="<?php echom($itemnews4,'slug',1); ?>"><img src="<?php echo imgv2($itemnews4,'img','-1',false) ; ?>" alt="<?php echom($itemnews4,'#i#img#alt',1); ?>" title="<?php echom($itemnews4,'#i#img#title',1); ?>" class="detail-image__news"></a>
                        </div>
                        <div class="news--content__detail__bottom pb-5">
                            <a href="<?php echom($itemnews4,'slug',1); ?>">
                                <p class="news--content__detail_text fw-bolder" style="color: #7b0200"><?php echom($itemnews4,'name',1); ?></p>
                            </a>
                            <span class="news--content__detail_text_1"><?php echo e(wlimit($itemnews4['short_content'],100)); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <?php }; ?>
            <div class="col-sm-12 col-md-4">
            </div>
            <div class="col-sm-12 col-md-4 py-4">
                <button type="submit" style="width: 100%;background: transparent;" class="news_btn"><a href="danh-muc">XEM TẤT CẢ</a></button>
            </div>
            <div class="col-sm-12 col-md-4">
            </div>
        </div>
    </div>
</section>
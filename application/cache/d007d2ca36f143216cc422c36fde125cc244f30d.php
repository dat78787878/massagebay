<div class="search__title ml-1 mt-1 mr-1 justify-content-center text-center">CHỦ ĐỀ NỔI BẬT</div>
    <div class="row">
         <?php
            $arrnews2 = $this->CI->Dindex->getDataDetail(
                array(
                    'input'=>"*",
                    'table'=>'news',
                    'order'=>' create_time desc',
                    'where'=>array(array('key'=>'act','compare'=>'=','value'=>'1'),array('key'=>'parent','compare'=>'=','value'=>'5')),
                    'limit'=>'0,4',
                    'pivot'=>[]
                )
            );
         ?><?php $countnews2 = count($arrnews2);
     for ($inews2=0; $inews2 < $countnews2; $inews2++) { $itemnews2=$arrnews2[$inews2]; ?>
        <div class="col-12 col-lg-12 col-xl-12">
           <div class="card my-2 pl-2" style="max-width: 540px; background-color: #000000;">
                <div class="row no-gutters">
                    <div class="col-5">
                        <a href="<?php echom($itemnews2,'slug',1); ?>"><img src="<?php echo imgv2($itemnews2,'img','-1',false) ; ?>" alt="<?php echom($itemnews2,'#i#img#alt',1); ?>" title="<?php echom($itemnews2,'#i#img#title',1); ?>" class="content_img"></a>
                    </div>
                    <div class="col-7">
                        <div class="card-body">
                            <a href="<?php echom($itemnews2,'slug',1); ?>">
                            <div class="news_l_text_1 block-ellipsis fs-2"><?php echom($itemnews2,'name',1); ?></div>
                            </a>
                            <div class="news_l_text_2 block-ellipsis fs-2"><?php echo e(wlimit($itemnews2['short_content'],100)); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
        <?php }; ?> 
</div>
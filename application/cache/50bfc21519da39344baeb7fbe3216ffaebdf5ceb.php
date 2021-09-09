<?php $__env->startSection("css"); ?>
<link rel="stylesheet" href="theme/frontend/scss/style_danh_muc.css">
<Style>
    .content_detail>p {
        display: block;
        display: -webkit-box;
        max-width: 100%;

        margin: 0 auto;

        line-height: 1;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .news_l_text_2 {
        display: block;
        display: -webkit-box;
        max-width: 100%;
        padding-top: 5px;
        margin: 0 auto;

        line-height: 1;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .news_l_text_1 {
        display: block;
        display: -webkit-box;
        max-width: 100%;

        margin: 0 auto;

        line-height: 1;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .news_1 .card .a:hover {
        text-decoration: none;
        list-style: none;
        border: none;
    }
</Style>

<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
<section class="content">
    <div class="container">
        <?php $this->CI->Dindex->getBreadcrumb((isset($datatable)&& array_key_exists("table_parent", $datatable))?$datatable["table_parent"]:array(),@$dataitem["parent"]?$dataitem["parent"]:0,echor($dataitem,"name","1")); ?>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-8 col-xl-9">
                <div class="swiper-container mySwiper">
                    <div class="swiper-wrapper">

                        <?php
            $arrslide1 = $this->CI->Dindex->getDataDetail(
                array(
                    'input'=>"*",
                    'table'=>'slide',
                    'order'=>'ord asc,id desc',
                    'where'=>array(array('key'=>'act','compare'=>'=','value'=>'1')),
                    'limit'=>'',
                    'pivot'=>[]
                )
            );
         ?><?php $countslide1 = count($arrslide1);
     for ($islide1=0; $islide1 < $countslide1; $islide1++) { $itemslide1=$arrslide1[$islide1]; ?>
                        <div class="swiper-slide">
                            <img src="<?php echo imgv2($itemslide1,'img','-1',false) ; ?>" width="100%" class="img_slide">
                            <div class="detail_slide">
                                <div class="container-fluid">
                                    <div class="text_slide_top fs-2 detail_slide_text">NỔI BẬT TRÊN KHÔNG GIAN LÀNG QUÊ YÊN TĨNH,TRÀNG AN LUXURY</div>
                                    <div class="text_slide_bottom fs-3 detail_slide_text">là một trong những khách sạn nổi bật nhất của TRÀNG AN LUXURY,là một trong những khách sạn nổi bật nhất của TRÀNG AN LUXURY,là một trong những khách sạn nổi bật nhất của TRÀNG AN LUXURY</div>
                                </div>
                            </div>
                        </div>
                        <?php }; ?>

                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>

                <h1 class="mt-3 content_title" style="font-family:font_strong; color: #841311;">Tin tức mới nhất</h1>
                <div class="row">
                    <?php
            $arrnews1 = $this->CI->Dindex->getDataDetail(
                array(
                    'input'=>"*",
                    'table'=>'news',
                    'order'=>' create_time desc',
                    'where'=>array(array('key'=>'act','compare'=>'=','value'=>'1'),array('key'=>'parent','compare'=>'=','value'=>'4')),
                    'limit'=>'0,4',
                    'pivot'=>[]
                )
            );
         ?><?php $countnews1 = count($arrnews1);
     for ($inews1=0; $inews1 < $countnews1; $inews1++) { $itemnews1=$arrnews1[$inews1]; ?>
                    <div class="col-12 my-3">
                        <div class="row">
                            <div class="col-5 col-md-5 content_image content_image">
                                <a href="<?php echom($itemnews1,'slug',1); ?>"><img src="<?php echo imgv2($itemnews1,'img','-1',false) ; ?>" width="100%" class="img_slide content_img"></a>
                            </div>
                            <div class="col-7 col-md-7 pl-6">
                                <div class="content_detail">
                                    <a href="<?php echom($itemnews1,'slug',1); ?>">
                                        <div class="content_detail_title"><?php echom($itemnews1,'name',1); ?></div>
                                    </a>
                                    <div class="content_detail_top d-flex">
                                        <div class="rate">
                                            <span class="rating-box" data-action="http://127.0.0.1:5501/index.html">
                                                <i class="star fa fa-star" data-id="12" data-link="nuoc-hoa-nu-charme-queen-eau-de-parfum-100ml" data-score="1"></i>
                                                <i class="star fa fa-star" data-id="12" data-link="nuoc-hoa-nu-charme-queen-eau-de-parfum-100ml" data-score="2"></i>
                                                <i class="star fa fa-star" data-id="12" data-link="nuoc-hoa-nu-charme-queen-eau-de-parfum-100ml" data-score="3"></i>
                                                <i class="star fa fa-star" data-id="12" data-link="nuoc-hoa-nu-charme-queen-eau-de-parfum-100ml" data-score="4"></i>
                                                <i class="star fa fa-star" data-id="12" data-link="nuoc-hoa-nu-charme-queen-eau-de-parfum-100ml" data-score="5"></i>
                                                <!-- <span style="width: 80%;" data-width="100%"> <i class="star fa fa-star"></i> <i class="star fa fa-star"></i> <i class="star fa fa-star"></i> <i class="star fa fa-star"></i> <i class="star fa fa-star"></i> </span>  -->
                                            </span>
                                        </div>
                                        <p class="content_detail_top_address font-italic"><?php echom($itemnews1,'address',1); ?></p>
                                    </div>
                                    <p class="content_detail_top_address block-ellipsis"><?php echo e(wlimit($itemnews1['short_content'],100)); ?></p>
                                    <div>
                                        <i class="far fa-clock content_detail_top_address_clock"> <?php echom($itemnews1,'create_time',1); ?></i>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }; ?>

                </div>
                <!-- <div class="pagination">
              <div class="container">
                <div class="row">
                  <div class="col-sm-12 col-md-4 mt-3">
                    <nav aria-label="Page navigation example">
                      <ul class="pagination">
                        <li class="">
                          <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                          </a>
                        </li>
                        <li class=""><a class="active" href="#">1</a></li>
                        <li class=""><a class="" href="#">2</a></li>
                        <li class=""><a class="" href="#">3</a></li>
                        <li class=""><a class="" href="#">4</a></li>
                        <li class=""><a class="" href="#">5</a></li>
                        <li class="">
                          <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                          </a>
                        </li>
                      </ul>
                    </nav>
                  </div>
                </div>
              </div>
            </div> -->
                <div class="pagination">
                    <?php  echo $this->CI->pagination->create_links(); ?>
                </div>

            </div>
            <!-- ben phai -->
            <div class="col-sm-12 col-lg-4 col-xl-3">
                <div class="row">
                    <div class="col-md-6 col-lg-12 col-xl-12 pb-4">
                        <div class="search">
                            <div class="row">
                                <div class="col-12 col-lg-12 col-xl-12">
                                    <?php echo $__env->make("general.search", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-12 col-xl-12 pb-4">
                        <div class="news_l ">
                            <div class="row">
                                <div class="col-12 col-lg-12">
                                    <?php echo $__env->make("general.theme", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
            $arrnews3 = $this->CI->Dindex->getDataDetail(
                array(
                    'input'=>"*",
                    'table'=>'news',
                    'order'=>' create_time desc',
                    'where'=>array(array('key'=>'act','compare'=>'=','value'=>'1'),array('key'=>'parent','compare'=>'=','value'=>'6')),
                    'limit'=>'0,2',
                    'pivot'=>[]
                )
            );
         ?><?php $countnews3 = count($arrnews3);
     for ($inews3=0; $inews3 < $countnews3; $inews3++) { $itemnews3=$arrnews3[$inews3]; ?>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-12 col-xl-12 pb-4">
                        <a href="https://vnexpress.net/"><img src="<?php echo imgv2($itemnews3,'img','-1',false) ; ?>" alt="<?php echom($itemnews3,'#i#img#alt',1); ?>" title="<?php echom($itemnews3,'#i#img#title',1); ?>" class="hd-img"> </a>
                    </div>
                    <?php }; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection("js"); ?>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("index", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
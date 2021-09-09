<div class="content_background">
    <div class="row">
        <div class="col-12">
            <a href="<?php echom($item,'slug',1); ?>"><img src="<?php echo imgv2($item,'img','-1',false) ; ?>" alt="<?php echom($item,'#i#img#alt',1); ?>" title="<?php echom($item,'#i#img#title',1); ?>" class="content_img"></a>
        </div>
        <div class="col-12">
            <div class="content_detail">
                <div class="content_detail_top d-flex px-2 pt-2">
                    <a href="<?php echom($item,'slug',1); ?>">
                        <div class="content_detail_title"><?php echom($item,'name',1); ?></div>
                    </a>
                    <p class="content_detail_top_address px-2 font-italic"><?php echom($item,'address',1); ?></p>
                </div>
                <div class="rate px-2">
                    <span class="rating-box" data-action="http://127.0.0.1:5501/index.html">
                        <i class="star fa fa-star" data-id="12" data-link="nuoc-hoa-nu-charme-queen-eau-de-parfum-100ml" data-score="1"></i>
                        <i class="star fa fa-star" data-id="12" data-link="nuoc-hoa-nu-charme-queen-eau-de-parfum-100ml" data-score="2"></i>
                        <i class="star fa fa-star" data-id="12" data-link="nuoc-hoa-nu-charme-queen-eau-de-parfum-100ml" data-score="3"></i>
                        <i class="star fa fa-star" data-id="12" data-link="nuoc-hoa-nu-charme-queen-eau-de-parfum-100ml" data-score="4"></i>
                        <i class="star fa fa-star" data-id="12" data-link="nuoc-hoa-nu-charme-queen-eau-de-parfum-100ml" data-score="5"></i>
                        <!-- <span style="width: 80%;" data-width="100%"> <i class="star fa fa-star"></i> <i class="star fa fa-star"></i> <i class="star fa fa-star"></i> <i class="star fa fa-star"></i> <i class="star fa fa-star"></i> </span>  -->
                    </span>
                </div>
                <p class="content_detail_top_address px-2"><?php echom($item,'short_content',1); ?></p>
            </div>

        </div>
    </div>
</div>
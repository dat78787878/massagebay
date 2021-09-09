<div class="col-sm-6 col-md-6 col-lg-4">
    <div class="representative__detail">
        <div class="row">
            <div class="col-6">
                <div class="representative__detail__image">
                    <a href="<?php echom($item,'slug',1); ?>"><img src="<?php echo imgv2($item,'img','-1',false) ; ?>" alt="<?php echom($item,'#i#img#alt',1); ?>" title="<?php echom($item,'#i#img#title',1); ?>" class="content_img"></a>
                </div>
            </div>
            <div class="col-6">
                <div class="representative__detail__text">
                    <a href="<?php echom($item,'slug',1); ?>">
                        <p class="representative__detail__text_1"><?php echom($item,'name',1); ?></p>
                    </a>
                    <p class="representative__detail__text_2"><?php echom($item,'address',1); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
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
            <!--DBS-loop.news.4|where:act = 1,hot = 1|limit:0,3-->
            <div class="col-6 col-sm-6 col-md-4">
                <div class="news--content">
                    <div class="news--content__detail">
                        <div class="detail-image">
                            <a href="{(itemnews4.slug)}"><img src="[[itemnews4.img.-1]]" alt="{(itemnews4.#i#img#alt)}" title="{(itemnews4.#i#img#title)}" class="detail-image__news"></a>
                        </div>
                        <div class="news--content__detail__bottom pb-5">
                            <a href="{(itemnews4.slug)}">
                                <p class="news--content__detail_text fw-bolder" style="color: #7b0200">{(itemnews4.name)}</p>
                            </a>
                            <span class="news--content__detail_text_1">{{wlimit($itemnews4['short_content'],100)}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <!--DBE-loop.news.4-->
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
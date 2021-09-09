@extends("index")
@section("css")
<link rel="stylesheet" href="theme/frontend/scss/style_chi_tiet.css">
<style>
    .news_l_text_2>p {
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

        margin: 0 auto;
        padding-top: 5px;
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
</style>
@stop
@section("content")


<section class="content">
    <div class="container">
        {%BREADCRUMB%}
    </div>
    <div class="container d-flex">
        <div class="row">

            <div class="col-sm-12 col-lg-8 col-xl-9">
                <div class="content_time">{(update_time)}</div>
                <div class="content_text" style="color: #841311;"> {(name)}</div>
                <div class="s-content">{(content)}</div>
                <div class="d-flex" style="align-items: center; margin:10px 0; ">
                    <span class="rating-box flex-1" data-action="http://127.0.0.1:5501/index.html" style="min-width: max-content ; margin-right: 15px;  display:block;">
                        <i class="star fa fa-star" data-id="12" data-link="nuoc-hoa-nu-charme-queen-eau-de-parfum-100ml" data-score="1" \></i>
                        <i class="star fa fa-star" data-id="12" data-link="nuoc-hoa-nu-charme-queen-eau-de-parfum-100ml" data-score="2"></i>
                        <i class="star fa fa-star" data-id="12" data-link="nuoc-hoa-nu-charme-queen-eau-de-parfum-100ml" data-score="3"></i>
                        <i class="star fa fa-star" data-id="12" data-link="nuoc-hoa-nu-charme-queen-eau-de-parfum-100ml" data-score="4"></i>
                        <i class="star fa fa-star" data-id="12" data-link="nuoc-hoa-nu-charme-queen-eau-de-parfum-100ml" data-score="5"></i>
                        <!-- <span style="width: 80%;" data-width="100%"> <i class="star fa fa-star"></i> <i class="star fa fa-star"></i> <i class="star fa fa-star"></i> <i class="star fa fa-star"></i> <i class="star fa fa-star"></i> </span>  -->
                    </span>

                    <ul>
                        <li><i class="fab fa-facebook-square "></i><a> Like</a></li>
                        <li><a>Share</a></li>
                    </ul>

                    <a link href=""><img src="theme/frontend/images/zalo.jpg" class="zalo"></a>
                </div>
                <div class="justify-content-between d-flex ">
                    <div>0 bình luận</div>
                    <div>Sắp xếp theo<button type="button" class="btn_sx">Cũ nhất <i class="fas fa-caret-down"></i></button></div>
                </div>
                <div class="content_comment pt-2 pb-2 mt-2">
                    <div class="row g-3 align-items-center ">
                        <div class="col-1">
                            <img src="theme/frontend/images/comment_avata.jpg" alt="anh logo" class="">
                        </div>
                        <div class="col-11 content_comment_right">
                            <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" placeholder="Thêm bình luận">
                        </div>
                    </div>
                </div>
                <div class="pt-2 d-flex justify-content-start">
                    <i class="fab fa-facebook-square "></i>
                    <div class="content_bottom pl-1 pb-3" style="color:#5c7fca">Facebook Comments Plugins</div>
                </div>
            </div>

            <div class="col-sm-12 col-lg-4 col-xl-3">
                <div class="row">
                    <div class="col-md-6 col-lg-12 col-xl-12 pb-4">
                        @include("general.search")
                    </div>
                    <div class="col-md-6 col-lg-12 col-xl-12">
                        <div class="news_l ">
                            <div class="row">
                                <div class="col-12 col-lg-12">
                                    @include("general.theme")
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--DBS-loop.news.3|where:act = 1,parent = 6|order: create_time desc|limit:0,1-->
                    <div class="col-6 col-sm-6 col-md-6 col-lg-12 col-xl-12 pb-4 pt-3">
                        <a href="https://vnexpress.net/"><img src="[[itemnews3.img.-1]]" alt="{(itemnews3.#i#img#alt)}" title="{(itemnews3.#i#img#title)}" class="hd-img"></a>
                    </div>
                    <!--DBE-loop.news.3-->
                </div>
            </div>
        </div>
    </div>
</section>

@include("general.news")

@stop
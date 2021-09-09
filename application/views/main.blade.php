@extends("index")
@section("css")
<link rel="stylesheet" href="theme/frontend/scss/style_home.css">
<style>
    .news--content__detail_text_1>p {
        display: block;
        display: -webkit-box;
        max-width: 100%;
        height: 30px;
        margin: 0 auto;
        font-size: 14px;
        line-height: 1;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .news--content__detail a:hover {
        color: #000000;
    }
</style>
@stop
@section("content")

<section class="content">
    <div class="container mt-3">
        <div class="row">
            <div class="col-12 col-sm-8 col-lg-9 pb-4">
                <div class="justify-content-between d-flex fs-1 content1">
                    <p style="font-family:'font_strong';">Spa uy tín</p>
                    <div class="content_tab">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a href="#tab1" data-toggle="tab" class="nav-link active">MIỀN BẮC</a>
                            </li>
                            <li class="nav-item">
                                <a href="#tab2" data-toggle="tab" class="nav-link">MIỀN TRUNG</a>
                            </li>
                            <li class="nav-item">
                                <a href="#tab3" data-toggle="tab" class="nav-link">MIỀN NAM</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="tab-content">
                    <div class="tab-pane active container-fluid" id="tab1" onclick="active_tab_pane()">
                        <div class="row">
                            <!--DBS-loop.news.1|where:act = 1,parent = 7|limit:0,9-->
                            <div class="col-6 col-sm-6 col-md-6 col-lg-4 py-3 pl-2">
                                @include('news.item',['item'=>$itemnews1])
                            </div>
                            <!--DBE-loop.news.1-->
                        </div>
                    </div>
                    <div class="tab-pane container fade" id="tab2" onclick="active_tab_pane()">
                        <div class="row">
                            <!--DBS-loop.news.2|where:act = 1,parent = 8|limit:0,9-->
                            <div class="col-6 col-sm-6 col-md-6 col-lg-4 py-3 pl-2">
                                @include('news.item',['item'=>$itemnews2])
                            </div>
                            <!--DBE-loop.news.2-->
                        </div>
                    </div>
                    <div class="tab-pane container fade" id="tab3" onclick="active_tab_pane()">
                        </p>Thử thay đổi gì đó khi chuyển tab.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-4 col-lg-3 pb-4">
                <div class="row">
                    <div class="col-sm-12">
                        @include("general.search")
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-6 col-sm-12 col-lg-12 pt-3">
                                <a href="https://vnexpress.net/"><img src="theme/frontend/images/quang_cao1.jpg" class="hd-img"></a>
                            </div>

                            <div class="col-6 col-sm-12 col-lg-12 pt-4">
                                <a href="https://vnexpress.net/"><img src="theme/frontend/images/quang_cao2.jpg" class="hd-img"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="representative pb-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="news_text fw-bold" style="color: #ffb628;font-family:'font_strong';">Spa tiêu biểu</div>
                <a href="" title="" class=""></a>
                <img src="theme/frontend/images/icon.png " style=" margin: 0 auto" class="" alt="">
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <!--DBS-loop.news.3|where:act = 1,parent = 10|limit:0,6-->
            @include('news.news',['item'=>$itemnews3])
            <!--DBE-loop.news.3-->
        </div>
</section>

@include("general.news")





@stop
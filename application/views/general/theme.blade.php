<div class="search__title ml-1 mt-1 mr-1 justify-content-center text-center">CHỦ ĐỀ NỔI BẬT</div>
    <div class="row">
         <!--DBS-loop.news.2|where:act = 1,parent = 5|order: create_time desc|limit:0,4-->
        <div class="col-12 col-lg-12 col-xl-12">
           <div class="card my-2 pl-2" style="max-width: 540px; background-color: #000000;">
                <div class="row no-gutters">
                    <div class="col-5">
                        <a href="{(itemnews2.slug)}"><img src="[[itemnews2.img.-1]]" alt="{(itemnews2.#i#img#alt)}" title="{(itemnews2.#i#img#title)}" class="content_img"></a>
                    </div>
                    <div class="col-7">
                        <div class="card-body">
                            <a href="{(itemnews2.slug)}">
                            <div class="news_l_text_1 block-ellipsis fs-2">{(itemnews2.name)}</div>
                            </a>
                            <div class="news_l_text_2 block-ellipsis fs-2">{{wlimit($itemnews2['short_content'],100)}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
        <!--DBE-loop.news.2--> 
</div>
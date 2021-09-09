@extends('index')

@section('css')


<link rel="stylesheet" href="theme/frontend/scss/style_home.css">

<link rel="stylesheet" href="theme/frontend/scss/style_danh_muc.css">


@stop

@section('content')

<div class="container">

	{%BREADCRUMB%}

</div>

<section class="tour-country container">
	<div class="row">
		<div class="col-lg-9 col-12">

			<h1 class="title-pages _italic text-uppercase text-lg-left" id="key" data-key="{{$key}}">Tìm kiếm với từ khóa: {{$key}}</h1>

			<p class="fs-18 mb-lg-3 mb-2 clmain title_search color-blues">SPA</p>

			<div class="list_tour_result mb-4">

			</div>
			<!-- 
				<p class="fs-18 mb-lg-3 mb-2 clmain title_search color-blues">Vourcher/Combo</p>

				<div class="list_combo_result">

					

				</div> -->

		</div>
		<div class="col-lg-3 col-12">
			<div class="row">
				<div class="col-md-6 col-lg-12 col-xl-12 pb-4">
					<div class="search">
						<div class="row">
							<div class="col-12 col-lg-12 col-xl-12">
								@include("general.search")
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-12 col-xl-12 pb-4">
					<div class="news_l ">
						<div class="row">
							<div class="col-12 col-lg-12">
								@include("general.theme")
							</div>
						</div>
					</div>
				</div>
				<!--DBS-loop.news.3|where:act = 1,parent = 6|order: create_time desc|limit:0,2-->
				<div class="col-6 col-sm-6 col-md-6 col-lg-12 col-xl-12 pb-4">
					<a href="https://vnexpress.net/"><img src="[[itemnews3.img.-1]]" alt="{(itemnews3.#i#img#alt)}" title="{(itemnews3.#i#img#title)}" class="hd-img"> </a>
				</div>
				<!--DBE-loop.news.3-->
			</div>
		</div>
	</div>
</section>

@stop
<div class="row row-5">
	@if (isset($pagination))
		{@ $list_data = $pagination->getItems(); @}
		@if (count($list_data) > 0)
			@foreach ($pagination->getItems() as $item)
				<div class="col-lg-4 col-6">
					@include('combos.item')
				</div>
			@endforeach
		@else
			<div class="col-12">
				<p class="fs-16 no_result">Không có kết quả nào phù hợp</p>
			</div>
		@endif
	@endif
</div>
<div class="pagination">
	{%PAGINATION%}
</div>	
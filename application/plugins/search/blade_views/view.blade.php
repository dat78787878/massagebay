@if(count($list_data) > 0)
	<div class="list_auto">
		@foreach($list_data as $item)
			<h3>{(item.name)}</h3>
		@endforeach
	</div>
@else
	<p class="clmain p-3">Không có kết quả nào phù hợp cho: '{{$keyword}}'</p>
@endif
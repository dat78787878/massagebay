# ci_plugins
Ci Version Plugin
Codeigniter dạng Plugin, cho phép can thiệp tối ưu code
Update 20.11
+ Cập nhật Codeigniter hỗ trợ PHP V7
+ Cập nhật File manager
+ Cập nhật webp
<br />
Update 28

+ Chú ý khi Sử dụng dữ liệu truy vấn nhiều lần, 
ví dụ như lấy tên danh mục trong vòng lặp, hãy sử dụng đối tượng Container
dạng như sau
<br />
Container::setData(TU_KHOA_LUU_TRU,function(){
		$CI = &get_instance();
		$results = $CI->db->get(TU_KHOA_LUU_TRU)->result_array();
		$data = [];
		foreach ($results as $k => $item) {
			$data[$item['id']] = $item;
		}
		return $data;
	});

Điều này sẽ làm tăng tốc độ truy vấn
+ Đã cập nhật cho phép select DB qua pivot
Xem thêm bảng pivots để truy vấn
+ Cập nhật vòng lặp 


DBS-loop.pro.7|where:act = 1|ptable:pro_categories|pvalue:10|pfield:parent

DBE-loop.pro.7

pvalue: có thể là số, string hoặc []/array()
ptable: Bảng map
pfield: map qua trường parent

Trong Quản trị sử dụng kiểu dữ liệu PIVOT_MULTI các thông tin khác như MULTISELECT

<br />
+ Cập nhật hàm GetDataDetail, có thể thêm pivot
$this->Dindex->getDataDetail(array(
            'table'=>$table,
            'limit'=>$limit,
            'where' =>$where,
            'order'=>'ord asc, id desc',
            'pivot'=>['field'=>'parent','ptable'=>'pro_categories','value'=>[1,2,3,4,5]]
        ));
<br/>
Relate sản phẩm, tin được cập nhật
{%RELATED.6.['ptable'=>'pro_categories','value'=>'','field'=>'parent']%}	
Nếu sử dụng Find in set thì 
{%RELATED.6.%}	

</br>
Update 2019.12.10
+ Update Media
+ Update core
+ Chỉnh sửa lỗi hiệu năng
+ Update code từ quản trị
</br>
Update 2019.12.18

+ Update custom control trong Plugin</br>
khi đó đặt type = TEN_PLUGIN.TEN_VIEW</br>
+ View custom đặt trong thư mục: plugins/TEN_PLUGIN/view hoặc view_edit hoặc view_search</br>
+ Update header</br>
Chỉ cần gọi </br>
    {%HEADER%}   
  

 {!!$\_meta_noindex or ''!!}
</br>
Cập nhật thêm các trường THEME_COLOR, BACKGROUND_COLOR,FBAPPID trong bảng config

Update 2019.12.25</br>
- Cập nhật core, fix bug </br>
- RULE: Bắt buộc phải thêm trường lang trong bảng config</br>
Hiện tại cho phép cấu hình, 1 trường config cho nhiều ngôn ngữ, hoặc mỗi ngôn ngữ 1 config</br>



Big Update 2020.01.20
+ config/support.php
$config['profiler_enable']=true;
Để hiện debug: Query, Memory...
+ Cập nhật code core
Nhắc lại việc tái sử dụng object nhiều lần, query sử dụng nhiều lần như sau: http://bit.ly/38mQE91
Tái sử dụng để hạn chế query, tăng tốc độ truy vấn website



<div id="Breadcrumb" class="Block Breadcrumb ui-widget-content ui-corner-top ui-corner-bottom">
	<ul>
		<li class="home"><a href="<?php echo base_url(''); ?>Techsystem"><i class="icon-home" style="font-size:14px;"></i> <?php echo alang("HOME") ?></a></li>
		<li class="SecondLast"><a href="Techsystem/plugins">Plugin</a></li>
	</ul>
</div>

<div id="cph_Main_ContentPane " class="plugins">
	<div class="row">
		<ul class="col-xs-12 nav-plugins">
			<li class="active"><a href="Techsystem/plugins">Plugin đã cài</a></li>
			<li><a href="Techsystem/install">Cài Plugin mới</a></li>
		</ul>
		<?php foreach ($plugins as $k => $plugin) :?>
			<div class="col-md-3 col-xs-12">
				<div class="item" data-name="<?php echo $plugin->data['name'] ?>" data-version="<?php echo $plugin->data['version'] ?>">
					<h3><?php echo $plugin->data['title'] ?></h3>
					<div class="content">
						<p class="desc">Mô tả: <?php echo isset($plugin->data['description'])?$plugin->data['description']:'' ?></p>
						<p>Tác giả: <?php echo isset($plugin->data['author'])?$plugin->data['author']:'' ?></p>
						<p>Phiên bản: <?php echo isset($plugin->data['version'])?$plugin->data['version']:'' ?></p>
						<div class="function">
							<?php if(isset($plugin->hasAdmin) && $plugin->hasAdmin): ?>
								<a class="btnactive view" href="Techsystem/view_plugins/<?php echo $plugin->data['name'] ?>"><?php echo alang("PLUGIN_MANAGER") ?></a>
							<?php endif; ?>
							<a class="<?php  echo $plugin->data['act']==1?'btndeactive':'btnactive'?>" onclick="return confirm('Bạn muốn Active/Deactive Plugin này?');" href="Techsystem/plugins/<?php echo $plugin->data['name'] ?>"><?php echo isset($plugin->data['act']) && $plugin->data['act']==1?alang('DEACTIVE'):alang('ACTIVE') ?></a>
						</div>
					</div>
					<?php if($plugin->data["act"]==0): ?>
						<a onclick="return confirm('Bạn muốn xóa Plugin này? Trước khi xóa chú ý HỦY KÍCH HOẠT Plugin!');" href="Techsystem/deletePlugins/<?php echo $plugin->data['name'] ?>" class="delete"><i class="icon-trash"></i></a>
					<?php endif; ?>
				</div>
			</div> 
		<?php endforeach ?>
	</div>
</div>
</div>
<script type="text/javascript">
	$(function() {
		var items = $('.plugins .item');
		var names = [];
		for (var i = 0; i < items.length; i++) {
			var item = $(items[i]);
			names.push(item.data('name'));
		}
		$.ajax({
			url: 'Techsystem/pluginVersion',
			type: 'GET',
			dataType: 'JSON',
			data: {name: names.join(',')},
		})
		.done(function(data) {
			for (var i = 0; i < data.length; i++) {
				var item = data[i];
				var plugin = $('.plugins .item[data-name='+item.name+']');

				if(plugin.length>0){
					var currentVersion = plugin.data('version');
					if(currentVersion!=item.version){
						var html ='<a class="update" href="Techsystem/install/'+item.name+'" title="Cập nhật Phiên bản Plugin mới"><i class="icon-refresh"></i></a>';
						plugin.find('h3').css({'background':'#cdcdcd'});
						plugin.append(html);
					}
				}
			}
		})
		.fail(function() {
			console.log('fail');
		})
		.always(function() {
			console.log('always');
		});
		
	});
</script>
<style type="text/css">
.plugins .item{
	background: #fff;
	position: relative;
	padding: 0;
}
.plugins .item h3{
	color: #00923f;
	font-size: 16px;
	padding: 10px 5px;
	margin: 0;
	background: #f1f1f1;
}
.plugins .item p{
	margin:0;
}
.plugins .item p.desc{
	height: 50px;
	overflow: hidden;
}
.plugins .item .content{
	padding: 0px 5px;
}
.plugins .item .btndeactive,
.plugins .item .btnactive{
	display: block;
	background: #00923f;
	text-align: center;
	text-transform: uppercase;
	color: #fff;
}
.plugins .item .btndeactive{
	background: #ccc;
}
.plugins .function{
	display: flex;
}
.plugins .function a{
	flex-grow: 1;
	flex-basis: 0;
}
.plugins .function .btnactive.view{
	background: #be7317;
}
.nav-plugins li {
	display: inline-block;
	text-transform: uppercase;
	background: #ccc;
	color: #fff;
}
.nav-plugins li.active {
	display: inline-block;
	text-transform: uppercase;
	background: #00923f;
	color: #fff;
}
.nav-plugins li a {
	color: #fff;
	padding: 5px 10px;
	display: inline-block;
}
.plugins .item .delete{
	position: absolute;
	z-index: 999;
	top: 0;
	right: 0;
	background: red;
	color: #fff;
	padding: 5px;
	cursor: pointer;
}
.plugins .item .update{
	    display: inline-block;
    background: #fff;
    color: #ecb416;
    border: 1px solid;
    padding: 2px;
    position: absolute;
    top: 0;
    right: 22px;
    font-size: 16px;
}
</style>

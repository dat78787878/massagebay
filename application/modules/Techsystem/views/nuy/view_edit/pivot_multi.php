<?php 
$value = $field;
$defaultData = $value['default_data'];
$defaultData = json_decode($defaultData,true);
$source = $defaultData['data']['source'];
$config = $defaultData['config'];
$currentTable = $table['name'];
		?>
<?php 
$valueDb = isset($dataitem)? $dataitem[$field['name']]:"";
 ?>
<div class="row margin0">
	<div class="col-md-2 col-xs-12">
		<span><?php echo __('note',$field); ?>: </span>
	</div>
	<div class="col-md-10 col-xs-12">
		
		<textarea name="<?php echo $field['name'] ?>" class="hidden"><?php echo $valueDb; ?></textarea>
		<input type="text" class="search<?php echo $field['name'] ?>" style="max-width: 500px" placeholder="Gõ để tìm kiếm">
		<button type="button" class="hidden btnadmin choose<?php echo $field['name'] ?>">Bỏ chọn</button>
		<ul class="listitem multiselect padding0 listitem<?php echo $field['name'] ?>">
			<?php 
				
				if($source==="static"){
					
				}
				else if($source==="database"){
					$valueDb = json_decode($valueDb,true);
					$valueDb = @$valueDb?$valueDb:[];
					$values = $defaultData['data']['value'];
					$input = array_key_exists('select', $values) ?$values['select']:"";
					$table = array_key_exists('table', $values) ?$values['table']:"";
					$fieldjson = array_key_exists('field', $values) ?$values['field']:"";
					$basefield = array_key_exists('base_field', $values) ?$values['base_field']:"";
					$where = array_key_exists('where', $values) ?$values['where']:"";
					$fieldValue =array_key_exists('field_value', $values) ?$values['field_value']:"";
					$w = array();
					foreach ($where as $itemwhere) {
						foreach ($itemwhere as $swhere =>$svalue) {
							$w[$swhere]= $svalue;
						}
					}
					/*Rewrite SQL*/
					$itemPivots = $this->Admindao->pivotGetData($input,$table,$fieldjson,$basefield,$fieldValue,$w,"parent");
					$valueput = array_key_exists("data", $valueDb)?$valueDb["data"]:[];
					$realValuePuts = [];
					foreach ($valueput as $kp => $vp) {
						array_push($realValuePuts, $vp['val']);
					}
					recursivePivotPrint($itemPivots,$realValuePuts);
					
				}
			 ?>
		</ul>
		<script type="text/javascript">
			$(function() {
				function build<?php echo $field["name"] ?>(){
					var tableParent ='<?php echo $table ?>';
					var currentTable ='<?php echo $currentTable ?>';
					var arr = $('.listitem<?php echo $field["name"] ?> li input:checked');
					$('.listitem<?php echo $field["name"] ?> li').removeClass("choose");
					var obj ={};
					obj.data = {};
					for (var i = 0; i < arr.length; i++) {
						var item = arr[i];
						var li = $(item).closest('li');
						li.addClass('choose');
						var level = li.data('level');
						var val = $(item).val();
						obj.data[val] = {};
						obj.data[val]['lv'] = level;
						obj.data[val]['val'] = val;
					}
					obj.currentTable = currentTable;
					obj.tableParent = tableParent;
					return JSON.stringify(obj);
				}
				if($('textarea[name=<?php echo $field["name"] ?>]').val().length>0){
					$(".choose<?php echo $field["name"] ?>").removeClass('hidden');
				}
				else{
					$(".choose<?php echo $field["name"] ?>").addClass('hidden');
				}
				function checkedAllParentByChild<?php echo $field["name"] ?>(parent,level){
					while(level>0){
						level --;
						var parentLevelClass = '.level-'+level;
						var parentLevel = parent.prevAll(parentLevelClass).first();
						var input = parentLevel.find('input').first();
						if(!input.prop('checked')){
							input.prop('checked',true);
						}
					}
				}
				function unCheckedParentIfNoChildChecked<?php echo $field["name"] ?>(parent,level){
					while(level>0){
						level --;
						var parentLevelClass = '.level-'+level;
						var parentLevel = parent.prevAll(parentLevelClass).first();
						var parentLevelIndex = parentLevel.index();
						var parentLevelIndexByClass = parentLevel.index(parentLevelClass);

						var nextParent = $(parentLevelClass).eq(parentLevelIndexByClass+1);
						var lies = parentLevel.parent().find('li');
						var nextIndex = lies.length;
						if(nextParent.length>0) {
							nextIndex = nextParent.index();
						}
						var needUncheckParent = false;
						for (var i = parentLevelIndex+1; i < nextIndex; i++) {
							var input = lies.eq(i).find('input').first();
							if(input.prop('checked')){
								needUncheckParent = true;
								break;
							}
						}
						if(!needUncheckParent){
							var parentInput = parentLevel.find('input').first();
							parentInput.prop('checked',false);
						}
					}
				}
				function checkedParent<?php echo $field["name"] ?>(element){
					var currentValue = $(element).is(':checked');
					var parent = $(element).parents('li');
					var level = parent.data('level');
					level = parseInt(level);
					if(currentValue){
						checkedAllParentByChild<?php echo $field["name"] ?>(parent,level);
					}
					else{
						unCheckedParentIfNoChildChecked<?php echo $field["name"] ?>(parent,level);
					}
				}
				$('body').on('click', '.listitem<?php echo $field["name"] ?> li input', function(event) {
					checkedParent<?php echo $field["name"] ?>(this);
					var str = build<?php echo $field["name"] ?>();
					$('textarea[name=<?php echo $field["name"] ?>]').val(str);
					if(str.length>0){
						$(".choose<?php echo $field["name"] ?>").removeClass('hidden');
					}
					else{
						$(".choose<?php echo $field["name"] ?>").addClass('hidden');
					}
				});
				$('.choose<?php echo $field['name'] ?>').click(function(event) {
					event.preventDefault();
					var arr = $('.listitem<?php echo $field["name"] ?> li input').prop("checked",false);
					$('.listitem<?php echo $field["name"] ?> li').removeClass("choose");
					$('textarea[name=<?php echo $field["name"] ?>]').val('');
					$(this).addClass('hidden');
				});
				$('.listitem<?php echo $field["name"] ?> li span.expand').click(function(event) {
					event.preventDefault();
					var text = $(this).text();
					var liparent = $(this).parents('li');
					var level = liparent.data('level');
					var idx = liparent.index('.level-'+level);
					var iidx =liparent.index();
					var nitem = $('.level-'+level).eq(idx+1);
					if(nitem.length>0){
						var nidx =nitem.index();
						var pitem = liparent.next('.level-'+(level-1));
						var pidx = pitem.index();
						nidx = nidx>pidx && pidx!=-1 ?pidx:nidx;
						for (var i = iidx+1; i <nidx ; i++) {
							if(text=='+'){
								$('.listitem<?php echo $field["name"] ?> li').eq(i).show();
								$('.listitem<?php echo $field["name"] ?> li').eq(i).find('span.expand').text('-');
							}
							else{
								$('.listitem<?php echo $field["name"] ?> li').eq(i).hide();
								$('.listitem<?php echo $field["name"] ?> li').eq(i).find('span.expand').text('+');
							}
						}
					}
					if(text=='+') $(this).text('-');
					else $(this).text('+');
				});
				$('body').on('input', '.search<?php echo $field['name'] ?>', function(event) {
					event.preventDefault();
					var val = $(this).val().toLowerCase();
					if(val ==""){
						$(this).next().next().find("li").show();	
					}
					else{
						var lis = $(this).next().next().find("li");
						for (var i = 0; i < lis.length; i++) {
							var li = $(lis[i]);
							var text = li.text().toLowerCase();
							if(text.indexOf(val)!=-1){
								li.show();
							}
							else{
								li.hide();
							}
						}
					}
					
				});
			});
		</script>
	</div>
</div>
<style type="text/css">
.listitem<?php echo $field["name"] ?>{
	overflow: scroll !important;
}
.listitem<?php echo $field["name"] ?> li:nth-child(odd){
			background: #f8f7f7;
		}
	.listitem<?php echo $field["name"] ?> li.choose{
		    background: #d9d9d9ab;
	}
		.listitem<?php echo $field["name"] ?> li{
			position: relative;
		}
		
.listitem<?php echo $field["name"] ?> span.expand{
	    position: absolute;
    right: 0;
    background: #00923f;
    color: #fff;
    font-size: 18px;
    width: 24px;
    text-align: center;
    cursor: pointer;
    user-select: none;
}
</style>
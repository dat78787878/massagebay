<?php $value = isset($dataitem)? $dataitem[$field['name']]:'' ?>
<div class="row margin0">
	<div class="col-md-2 col-xs-12">
		<?php echo __('note',$field) ?>
	</div>
	<div class="col-md-10 col-xs-12">
		<?php $paths = file_exists(APPPATH.'views/pages')? array_diff(scandir(APPPATH.'views/pages'), array('..', '.','normal.php','normal.blade.php')):[]; 
		$finalPath = [];
		foreach ($paths as $key => $valuePath) {
			$templateValue = @explode('.', $valuePath)[0];
			$templateName =$templateValue;
			$source = file_get_contents( APPPATH.'views/pages/'.$valuePath );
			preg_match('/\/\*(.+)\*\//smi', $source, $matches);
			if(count($matches)>0){
			    list($key,$valuePath) = explode(':', $matches[1]);
			    if(strtolower(trim($key))=='name'){
			        $templateName = $valuePath;
			    }
			}
			$finalPath[$templateValue] = trim($templateName);
		}
		?>
		<select class="form-control" id="select2<?php echo $field['name'] ?>" name="<?php echo $field['name'] ?>">
			<option value="normal">Mặc định</option>
			<?php foreach ($finalPath as $path => $pathName) :?>
				<option <?php echo $value==$path?'selected':'' ?> value="<?php echo $path ?>"><?php echo $pathName ?></option>
			<?php endforeach ?>
		</select>
	</div>
</div>
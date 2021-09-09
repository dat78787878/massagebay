<div class="row row-5">



	 <?php if(isset($pagination)): ?>



		<?php  $list_data = $pagination->getItems();  ?>



		<?php if(count($list_data) > 0): ?>



			<?php foreach($pagination->getItems() as $item): ?>



				<div class="col-lg-4 col-6 pb-3">



					<?php echo $__env->make('news.item', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>



				</div>



			<?php endforeach; ?>



		<?php else: ?> 



			<div class="col-12">



				<p class="fs-16 no_result">Không có kết quả nào phù hợp</p>



			</div>



		 <?php endif; ?>



	<?php endif; ?> 



</div>



<div class="pagination">



	<?php  echo $this->CI->pagination->create_links(); ?>



</div>
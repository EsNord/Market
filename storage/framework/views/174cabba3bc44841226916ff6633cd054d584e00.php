

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Flash sale Products</h6>
    </div>
    <div class="card-body">

      <div class="mb-3">
          <div class="form-group">
            <label for="">Select all</label>
            <input type="checkbox" class="selectall">
          </div>
          <a href="<?php echo e(route('flashSale.create')); ?>" class="btn btn-sm btn-primary">Add product</a>
      </div>
      <form action="" method="POST" id="selectorForm">
        <?php echo csrf_field(); ?>
        <div class="table-responsive">
          <table class="table table-hover table-bordered small" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Select</th>
                <th>Product title</th>
                <th>Product price</th>
                <th>flash price</th>
                <th>Created at</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </form>
    </div>
  </div>

</div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('js'); ?>
<script>
$(document).ready(function(){
  $('#dataTable').dataTable({
  processing:true,
  serverSide:true,
  ajax:"<?php echo e(route('flashSale.all')); ?>",
    columns:[
      {data:'select',orderable:false,searchable:false},
      {data:'product_title',orderable:false},
      {data:'product_price'},
      {data:'flash_price'},
      {data:'created_at'},
      {data:'action'},
    ]
  });

	$('.selectall').click(function(){
		$('.selectbox').prop('checked', $(this).prop('checked'));
	})

	$('.selectbox').change(function(){
		var total = $('.selectbox').length;
		var number = $('.selectbox:checked').length;
		if(total == number){
			$('.selectall').prop('checked', true);
		} else{
			$('.selectall').prop('checked', false);
		}
	})

  $('#showSelected').click(function(){
    if($('.selectbox:checked').length < 1){
      alert('Please select atleast one of the row!');
      return;
    }else{
      $('#selectorForm').submit();
    }
  })

})

</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\emad\Desktop\final-final-project\resources\views/admin/flash-sale/index.blade.php ENDPATH**/ ?>


<?php $__env->startSection('content'); ?>
<style>
    .image-product {
        max-width: 100px;
        max-height: 100%;
    }

    .pen {
        cursor: pointer;
        margin-right: 10px;
    }
</style>
<div class="container">
    <button class="btn btn-primary mb-2" style="float: right;" onclick="window.open('product/create','_self')">create</button>

    <table class="table text-center table-bordered">
        <tr>
            <th>No.</th>
            <th>name</th>
            <th>description</th>
            <th>category</th>
            <th>image</th>
            <th>action</th>
        </tr>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$x): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($k+1); ?></td>
            <td><?php echo e($x->name); ?></td>
            <td><?php echo e($x->description); ?></td>
            <td><?php echo e($x->category); ?></td>
            <td><img class="image-product" src="<?php echo e(url('/').'/image/'.$x->image); ?>"></img></td>
            <td>
                <a href="product/<?php echo e($x->id); ?>/edit">
                    <i class="fa-solid fa-pen pen" style="cursor: pointer;"></i>
                </a>

                <i class="fa-solid fa-trash" style="cursor: pointer;" onclick="con('<?php echo e($x->id); ?>')"></i>

            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>



</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
<script type="text/javascript">
    function con(id){
        var result = confirm("Want to delete?");
                if (result) {
                    destroy1(id);
                }
    }
    
    function destroy1(id) {
        var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        // console.log(token);
        $.ajax({
            url: "product/" + id,
            type: 'POST',
            data: {
                _method: "DELETE",
                "id": id,
                "_token": token,
            },
            success: function() {

                console.log("it Works");
                location.reload();

            }
        });
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Bootstrap\resources\views/products/index.blade.php ENDPATH**/ ?>
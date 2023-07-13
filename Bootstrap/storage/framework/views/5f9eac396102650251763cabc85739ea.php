

<?php $__env->startSection('content'); ?>
<style>
    textarea {
        resize: none;
        height: 200px;
    }

    .img-product {
        max-width: 100%;
        max-height: 500px;
    }
</style>

<div class="container">
    
    <?php if(isset($product)): ?>
    <form method="POST" action="<?php echo e(route('product.update',$product->id)); ?>" enctype="multipart/form-data">
    <?php echo e(method_field('PATCH')); ?>

    <?php else: ?>
    <form method="POST" action="<?php echo e(route('product.store')); ?>" enctype="multipart/form-data">
    <?php endif; ?>    
    <?php echo csrf_field(); ?>
        <div class="row mb-3">
            <div class="col">
                <span>name</span>
                <input type="text" name="name" aria-label="First name" class="form-control" value="<?php echo e(isset($product)?$product->name:''); ?>">
            </div>
            <div class="col">
                <?php
                $arr = [1, 2, 3, 4]
                ?>

                <span>category</span>
                <select class="form-select" name="category" aria-label="Default select example">
                    <?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($a); ?>" <?php echo e(isset($product)&&$product->category == $a?'selected':''); ?>><?php echo e($a); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </select>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col">
                <span>description</span>
                <div class="input-group">
                    <textarea class="form-control" name="description" aria-label="With textarea"><?php echo e(isset($product)?$product->description:''); ?></textarea>
                    
                </div>
            </div>
            <div class="col">
                <span>image</span>
                <div class="mb-3">
                    <input accept="image/" name="images" type="file" onchange="File(event)">
                    <img src="<?php echo e(isset($product)?url('/image/').'/'.$product->image:''); ?>" alt="" class="img-product" id="preview" />
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col offset-6">
                <button type="submit" class="btn btn-primary"> Submit</button>
            </div>

        </div>
    </form>
</div>
<script>
    function File(event) {
        var input = event.target;
        var image = new FileReader();
        image.onload = function() {
            var dataURL = image.result;
            var output = document.getElementById('preview');
            output.src = dataURL;
        }
        image.readAsDataURL(input.files[0]);
    }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Bootstrap\resources\views/products/create.blade.php ENDPATH**/ ?>
<?php $__env->startSection("content"); ?>
<div class="container">


    <?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

    <div class="col-md-6">
<div class="row">


<div class="card text">
  <img class="card-img-top" src="holder.js/100px180/" alt="">
  <div class="card-body">

    <h3 class="card-title">Title : <?php echo e($post["title"]); ?></h3>
    <h4 class="card-text">Body : <?php echo e($post["body"]); ?></h4>
    <h4 class="card-text">Created At : <?php echo e($post["created_at"]); ?></h4>

    <img center class="img-thumbnail" src="<?php echo e(asset('/images/cat.png')); ?>" alt="cat">
  </div>
</div>
</div>


</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blog\resources\views/posts/show.blade.php ENDPATH**/ ?>
<?php $__env->startSection('content'); ?>

<div class="container">
    <form method="POST" action=" <?php echo e(Route("posts.update", $id )); ?> ">

        <h2>Post #<?php echo e($id); ?> </h2>

        <?php echo csrf_field(); ?>

        <a title="All Posts" name="button" id="button" class="btn btn-primary float-end mb-2" href="<?php echo e(route('posts.index')); ?> " role="button">
            All Posts
         </a>

        <!-- /resources/views/post/create.blade.php -->
<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

<?php if(session()->has('success')): ?>
<div class="alert alert-success alert-dismissible fade show">
    <?php echo e(session()->get('success')); ?>

</div>
<?php endif; ?>

<!-- Create Post Form -->

        <div class="mb-3 mt-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" id="title" name="title" value="<?php echo e($post["title"]); ?>">
        </div>
        <div class="mb-3">
          <label for="body" class="form-label">Body</label>
          <textarea class="form-control" rows="5" id="body" name="body"><?php echo e($post["body"]); ?></textarea>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>

      </form>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blog\resources\views/posts/edit.blade.php ENDPATH**/ ?>
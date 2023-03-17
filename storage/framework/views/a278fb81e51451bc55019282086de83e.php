<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Trashed Posts</h1>

        <?php if(session()->has('success')): ?>
        <div class="alert alert-success alert-dismissible fade show">
            <?php echo e(session()->get('success')); ?>

        </div>
        <?php endif; ?>


        <a title="All Posts" name="button" id="button" class="btn btn-primary float-end m-2" href="<?php echo e(route('posts.index')); ?> " role="button">
            All Posts
         </a>

         <a title="Restore All Posts" name="button" id="button" class="btn btn-primary float-end m-2" href="<?php echo e(route('posts.restoreall')); ?> " role="button">
            <i class="fa fa-undo" aria-hidden="true"></i>
         </a>

    <table class="table table-striped">
       <thead>
        <tr>
            <th>Title</th>
            <th>Body</th>
            <th></th>
        </tr>
       </thead>
       <tbody>
<?php $__currentLoopData = $trashedposts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
            <td> <?php echo e($post['title']); ?> </td>
            <td> <?php echo e($post['body']); ?> </td>

            <td>
                <a title="restore Post" name="button" id="button" class="btn btn-warning float-end mb-2" href="<?php echo e(route('posts.restore',$post['id'])); ?>"   role="button">
                    <i class="fa fa-undo" aria-hidden="true"></i>
                 </a>
            </td>
            <td>
                <a title="Soft delete Post" name="button" id="button" class="btn btn-danger float-end mb-2" href="<?php echo e(route('posts.delete',$post['id'])); ?>"   role="button">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                 </a>
            </td>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


       </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blog\resources\views/posts/trashed.blade.php ENDPATH**/ ?>
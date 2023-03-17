<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Posts</h1>


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

<a title="Create New Post" name="button" id="button" class="btn btn-primary float-end m-2" href="<?php echo e(route('posts.create')); ?> " role="button">
   <i class="fa fa-plus" aria-hidden="true"></i>
</a>

<a title="Trashed Post" name="button" id="button" class="btn btn-primary float-end m-2" href="<?php echo e(route('posts.trashed')); ?> " role="button">
    Trashed Posts
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
<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
            <td> <?php echo e($post['title']); ?> </td>
            <td> <?php echo e($post['body']); ?> </td>


                <td>
                <a title="Show Post" name="button" id="button" class="btn btn-primary float-end mb-2" href="<?php echo e(route('posts.show',$post['id'])); ?>"   role="button">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                 </a>
</td>

<td>
    <a title="edit Post" name="button" id="button" class="btn btn-warning float-end mb-2" href="<?php echo e(route('posts.edit',$post['id'])); ?>"   role="button">
        <i class="fa fa-pencil" aria-hidden="true"></i>
     </a>
</td>

<td>
    <a title="delete Post" name="button" id="button" class="btn btn-danger float-end mb-2" href="<?php echo e(route('posts.softdelete',$post['id'])); ?>"   role="button">
        <i class="fa fa-trash" aria-hidden="true"></i>
     </a>
</td>


</tr>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


       </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blog\resources\views/posts/index.blade.php ENDPATH**/ ?>
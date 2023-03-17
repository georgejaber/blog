<?php $__env->startSection('content'); ?>

    <div class="container">
        <h2>Edit User Profile</h2>

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

        <form method="Post" action="<?php echo e(route('profile.update')); ?> " enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('Put'); ?>
            <div class="mb-3 mt-3">
                <label for="address" class="form-label">Address:</label>
                <input value="<?php echo e($user['address']); ?>" type="text" class="form-control" id="address" placeholder="Enter Address" name="address">
            </div>
            <div class="mb-3">
                <label  for="moblie" class="form-label">Mobile:</label>
                <input  value="<?php echo e($user['mobile']); ?>" type="text" class="form-control" id="mobile" placeholder="Enter mobile" name="mobile">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image:</label>
                <input type="file" class="form-control" id="image" placeholder="insert image" name="image">
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blog\resources\views/profile/edit.blade.php ENDPATH**/ ?>
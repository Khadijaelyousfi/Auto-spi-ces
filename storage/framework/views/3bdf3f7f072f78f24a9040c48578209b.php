<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="<?php echo e(asset('logo.jpg')); ?>">
    <title>Auto pièces Market</title>
</head>
<body>


<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h2>Ajouter une catégorie</h2>

    <form action="<?php echo e(route('categories.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label>Nom</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-secondary">Ajouter</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

</body>
</html>

<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\khadija\Desktop\project\resources\views/admin/categories/create.blade.php ENDPATH**/ ?>
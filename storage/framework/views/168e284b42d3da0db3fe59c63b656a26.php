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
    <h2>Modifier le produit</h2>

    <form method="POST" action="<?php echo e(route('products.update', $product)); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="form-group">
            <label>Nom</label>
            <input type="text" name="name" class="form-control" value="<?php echo e($product->name); ?>" required>
        </div>

        <div class="form-group">
            <label>Catégorie</label>
            <select name="category_id" class="form-control" required>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->id); ?>" <?php echo e($product->category_id == $category->id ? 'selected' : ''); ?>>
                        <?php echo e($category->name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="form-group">
            <label>Prix</label>
            <input type="number" name="price" step="0.01" class="form-control" value="<?php echo e($product->price); ?>" required>
        </div>

        <div class="form-group">
            <label>Stock</label>
            <input type="number" name="stock" class="form-control" value="<?php echo e($product->stock); ?>" required>
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control"><?php echo e($product->description); ?></textarea>
        </div>

        <div class="form-group">
            <label for="image">Changer l’image</label>
            <input type="file" name="image" class="form-control-file">
        </div>

        <?php if($product->image): ?>
            <p>Image actuelle :</p>
            <img src="<?php echo e(asset('storage/products/' . $product->image)); ?>" width="120" alt="image">
        <?php endif; ?>

        <button type="submit" class="btn btn-secondary">Mettre à jour</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

</body>
</html>
<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\khadija\Desktop\project\resources\views/admin/products/edit.blade.php ENDPATH**/ ?>
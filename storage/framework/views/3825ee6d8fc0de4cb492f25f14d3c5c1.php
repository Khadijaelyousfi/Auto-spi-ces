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
    <h2>Liste des produits</h2>
    <a href="<?php echo e(route('products.create')); ?>" class="btn btn-primary mb-3">Ajouter un produit</a>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Image</th>
                <th>Nom</th>
                <th>Catégorie</th>
                <th>Prix</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>
                <?php if($product->image): ?>
                    <img src="<?php echo e(asset('storage/products/' . $product->image)); ?>" width="60" alt="image">
                <?php else: ?>
                    -
                <?php endif; ?>
                </td>
                <td><?php echo e($product->name); ?></td>
                <td><?php echo e($product->category->name ?? 'Aucune'); ?></td>
                <td><?php echo e($product->price); ?> DH</td>
                <td><?php echo e($product->stock); ?></td>
                <td>
                    <a href="<?php echo e(route('products.edit', $product)); ?>" class="btn btn-sm btn-warning">Modifier</a>
                    <form action="<?php echo e(route('products.destroy', $product)); ?>" method="POST" style="display:inline-block;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button onclick="return confirm('Supprimer ce produit ?')" class="btn btn-sm btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

</body>
</html>
<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\khadija\project\resources\views/admin/products/index.blade.php ENDPATH**/ ?>
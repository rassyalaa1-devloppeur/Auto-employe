<!DOCTYPE html>
<html>
<head>
    <title>Import Excel</title>
</head>
<body>

    <h2>Import Employés Excel</h2>

    <?php if(session('success')): ?>
        <p style="color:green;"><?php echo e(session('success')); ?></p>
    <?php endif; ?>

    <?php if($errors->any()): ?>
        <ul style="color:red;">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endif; ?>

    <form action="<?php echo e(route('employes.import')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        <label>Choisir fichier Excel :</label>
        <input type="file" name="file" required>

        <button type="submit">Importer</button>
    </form>

</body>
</html><?php /**PATH C:\Users\HP\gestionemployé\resources\views/import.blade.php ENDPATH**/ ?>


<?php $__env->startSection('content'); ?>

<style>
    .form-card {
        background: var(--bg-primary);
        border: 0.5px solid var(--border);
        border-radius: var(--radius-lg);
        padding: 1.5rem;
        max-width: 680px;
    }
    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: .875rem;
    }
    .form-grid .full { grid-column: 1 / -1; }
    .section-divider {
        font-size: 11px;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: .06em;
        color: var(--text-secondary);
        padding: .5rem 0 .25rem;
        border-bottom: 0.5px solid var(--border);
        margin: .5rem 0 .75rem;
        grid-column: 1 / -1;
    }
    .form-actions {
        display: flex;
        gap: 8px;
        align-items: center;
        margin-top: 1.25rem;
        padding-top: 1rem;
        border-top: 0.5px solid var(--border);
    }
    .error-msg { font-size: 11px; color: var(--text-danger); margin-top: 4px; }
    .emp-badge {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: .75rem 1rem;
        background: var(--bg-secondary);
        border-radius: var(--radius-md);
        margin-bottom: 1.25rem;
    }
    .avatar-lg {
        width: 42px; height: 42px;
        border-radius: 50%;
        background: var(--bg-info);
        color: var(--text-info);
        display: flex; align-items: center; justify-content: center;
        font-size: 14px; font-weight: 500;
        flex-shrink: 0;
    }
    @media (max-width: 520px) {
        .form-grid { grid-template-columns: 1fr; }
        .form-grid .full { grid-column: 1; }
    }
</style>

<div style="margin-bottom:1.25rem;display:flex;align-items:center;gap:10px">
    <a href="<?php echo e(route('employes.index')); ?>" style="color:var(--text-secondary);text-decoration:none;font-size:13px">
        ← Retour
    </a>
    <span style="color:var(--border-md)">/</span>
    <h2 style="font-size:18px;font-weight:500">Modifier l'employé</h2>
</div>

<div class="form-card">

    
    <div class="emp-badge">
        <div class="avatar-lg">
            <?php echo e(strtoupper(substr($employe->prenom,0,1).substr($employe->nom,0,1))); ?>

        </div>
        <div>
            <div style="font-weight:500;font-size:14px"><?php echo e($employe->prenom); ?> <?php echo e($employe->nom); ?></div>
            <div style="font-size:12px;color:var(--text-secondary)">
                <?php echo e($employe->matricule); ?> · <?php echo e($employe->site); ?>

            </div>
        </div>
    </div>

    <form method="POST" action="<?php echo e(route('employes.update', $employe->id)); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="form-grid">

            <div class="section-divider">Identité</div>

            <div class="form-group">
                <label class="form-label" for="nom">Nom *</label>
                <input type="text" id="nom" name="nom" class="form-control"
                       value="<?php echo e(old('nom', $employe->nom)); ?>" required>
                <?php $__errorArgs = ['nom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="error-msg"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-group">
                <label class="form-label" for="prenom">Prénom *</label>
                <input type="text" id="prenom" name="prenom" class="form-control"
                       value="<?php echo e(old('prenom', $employe->prenom)); ?>" required>
                <?php $__errorArgs = ['prenom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="error-msg"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-group">
                <label class="form-label" for="matricule">Matricule *</label>
                <input type="text" id="matricule" name="matricule" class="form-control"
                       value="<?php echo e(old('matricule', $employe->matricule)); ?>" required>
                <?php $__errorArgs = ['matricule'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="error-msg"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-group">
                <label class="form-label" for="site">Site *</label>
                <input type="text" id="site" name="site" class="form-control"
                       value="<?php echo e(old('site', $employe->site)); ?>" required>
                <?php $__errorArgs = ['site'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="error-msg"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="section-divider">Affectation</div>

            <div class="form-group">
                <label class="form-label" for="societe">Société</label>
                <input type="text" id="societe" name="societe" class="form-control"
                       value="<?php echo e(old('societe', $employe->societe)); ?>">
                <?php $__errorArgs = ['societe'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="error-msg"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-group">
                <label class="form-label" for="departement">Département</label>
                <input type="text" id="departement" name="departement" class="form-control"
                       value="<?php echo e(old('departement', $employe->departement)); ?>">
                <?php $__errorArgs = ['departement'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="error-msg"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-group">
                <label class="form-label" for="categorie">Catégorie</label>
                <input type="text" id="categorie" name="categorie" class="form-control"
                       value="<?php echo e(old('categorie', $employe->categorie)); ?>">
                <?php $__errorArgs = ['categorie'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="error-msg"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-group">
                <label class="form-label" for="activite_fonction">Fonction</label>
                <input type="text" id="activite_fonction" name="activite_fonction" class="form-control"
                       value="<?php echo e(old('activite_fonction', $employe->activite_fonction)); ?>">
                <?php $__errorArgs = ['activite_fonction'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="error-msg"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
            <a href="<?php echo e(route('employes.index')); ?>" class="btn">Annuler</a>
        </div>

    </form>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\HP\gestionemployé\resources\views/employes/edit.blade.php ENDPATH**/ ?>
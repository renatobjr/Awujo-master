<?php $__env->startSection('conteudo-principal'); ?>
    <?php echo $__env->make('forms.form-projeto', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
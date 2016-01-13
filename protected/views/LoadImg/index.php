<?php echo CHtml::form('','post',array('enctype'=>'multipart/form-data')); ?>

<?php echo CHtml::activeFileField($model, 'image'); ?>

<?php echo CHtml::submitButton('Войти'); ?>

<?php echo CHtml::endForm(); ?>
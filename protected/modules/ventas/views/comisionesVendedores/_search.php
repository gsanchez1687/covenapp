<?php
/* @var $this ComisionesVendedoresController */
/* @var $model ComisionesVendedores */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'venta_id'); ?>
		<?php echo $form->textField($model,'venta_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'revenue'); ?>
		<?php echo $form->textField($model,'revenue',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comision_conexcel'); ?>
		<?php echo $form->textField($model,'comision_conexcel',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'base_comision'); ?>
		<?php echo $form->textField($model,'base_comision',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comision_inicial'); ?>
		<?php echo $form->textField($model,'comision_inicial'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fondo'); ?>
		<?php echo $form->textField($model,'fondo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comision_menos_fondo'); ?>
		<?php echo $form->textField($model,'comision_menos_fondo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rete_fuente'); ?>
		<?php echo $form->textField($model,'rete_fuente'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reteica'); ?>
		<?php echo $form->textField($model,'reteica'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'iva'); ?>
		<?php echo $form->textField($model,'iva'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'precomision'); ?>
		<?php echo $form->textField($model,'precomision'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'incumplimiento_legalizacion'); ?>
		<?php echo $form->textField($model,'incumplimiento_legalizacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'liquidacion'); ?>
		<?php echo $form->textField($model,'liquidacion',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
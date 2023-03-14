<?php
/* @var $this ComisionesVendedoresController */
/* @var $model ComisionesVendedores */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'comisiones-vendedores-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'venta_id'); ?>
		<?php echo $form->textField($model,'venta_id'); ?>
		<?php echo $form->error($model,'venta_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'revenue'); ?>
		<?php echo $form->textField($model,'revenue',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'revenue'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comision_conexcel'); ?>
		<?php echo $form->textField($model,'comision_conexcel',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'comision_conexcel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'base_comision'); ?>
		<?php echo $form->textField($model,'base_comision',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'base_comision'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comision_inicial'); ?>
		<?php echo $form->textField($model,'comision_inicial'); ?>
		<?php echo $form->error($model,'comision_inicial'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fondo'); ?>
		<?php echo $form->textField($model,'fondo'); ?>
		<?php echo $form->error($model,'fondo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comision_menos_fondo'); ?>
		<?php echo $form->textField($model,'comision_menos_fondo'); ?>
		<?php echo $form->error($model,'comision_menos_fondo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rete_fuente'); ?>
		<?php echo $form->textField($model,'rete_fuente'); ?>
		<?php echo $form->error($model,'rete_fuente'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reteica'); ?>
		<?php echo $form->textField($model,'reteica'); ?>
		<?php echo $form->error($model,'reteica'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'iva'); ?>
		<?php echo $form->textField($model,'iva'); ?>
		<?php echo $form->error($model,'iva'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'precomision'); ?>
		<?php echo $form->textField($model,'precomision'); ?>
		<?php echo $form->error($model,'precomision'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'incumplimiento_legalizacion'); ?>
		<?php echo $form->textField($model,'incumplimiento_legalizacion'); ?>
		<?php echo $form->error($model,'incumplimiento_legalizacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'liquidacion'); ?>
		<?php echo $form->textField($model,'liquidacion',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'liquidacion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
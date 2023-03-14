<?php
/* @var $this VentasTrazaController */
/* @var $model VentasTraza */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ventas-traza-form',
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
		<?php echo $form->labelEx($model,'cun_oportunidad_anterior'); ?>
		<?php echo $form->textField($model,'cun_oportunidad_anterior',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'cun_oportunidad_anterior'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cun_oportunidad_nuevo'); ?>
		<?php echo $form->textField($model,'cun_oportunidad_nuevo',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'cun_oportunidad_nuevo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'numero_asignado_anterior'); ?>
		<?php echo $form->textField($model,'numero_asignado_anterior',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'numero_asignado_anterior'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'numero_asignado_nuevo'); ?>
		<?php echo $form->textField($model,'numero_asignado_nuevo',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'numero_asignado_nuevo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_activacion_anterior'); ?>
		<?php echo $form->textField($model,'fecha_activacion_anterior'); ?>
		<?php echo $form->error($model,'fecha_activacion_anterior'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_activacion_nuevo'); ?>
		<?php echo $form->textField($model,'fecha_activacion_nuevo'); ?>
		<?php echo $form->error($model,'fecha_activacion_nuevo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_legalizacion_anterior'); ?>
		<?php echo $form->textField($model,'fecha_legalizacion_anterior'); ?>
		<?php echo $form->error($model,'fecha_legalizacion_anterior'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_legalizacion_nuevo'); ?>
		<?php echo $form->textField($model,'fecha_legalizacion_nuevo'); ?>
		<?php echo $form->error($model,'fecha_legalizacion_nuevo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estado_id_enterior'); ?>
		<?php echo $form->textField($model,'estado_id_enterior'); ?>
		<?php echo $form->error($model,'estado_id_enterior'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estado_id_nuevo'); ?>
		<?php echo $form->textField($model,'estado_id_nuevo'); ?>
		<?php echo $form->error($model,'estado_id_nuevo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'plataforma_id_anterior'); ?>
		<?php echo $form->textField($model,'plataforma_id_anterior'); ?>
		<?php echo $form->error($model,'plataforma_id_anterior'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'plataforma_id_nuevo'); ?>
		<?php echo $form->textField($model,'plataforma_id_nuevo'); ?>
		<?php echo $form->error($model,'plataforma_id_nuevo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pedido_root_anterior'); ?>
		<?php echo $form->textField($model,'pedido_root_anterior',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'pedido_root_anterior'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pedido_root_nuevo'); ?>
		<?php echo $form->textField($model,'pedido_root_nuevo',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'pedido_root_nuevo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'documento_id_anterior'); ?>
		<?php echo $form->textField($model,'documento_id_anterior'); ?>
		<?php echo $form->error($model,'documento_id_anterior'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'documento_id_nuevo'); ?>
		<?php echo $form->textField($model,'documento_id_nuevo'); ?>
		<?php echo $form->error($model,'documento_id_nuevo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'observacion_activacion_anterior'); ?>
		<?php echo $form->textField($model,'observacion_activacion_anterior',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'observacion_activacion_anterior'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'observacion_activacion_nuevo'); ?>
		<?php echo $form->textField($model,'observacion_activacion_nuevo',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'observacion_activacion_nuevo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'observacion_anterior'); ?>
		<?php echo $form->textField($model,'observacion_anterior',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'observacion_anterior'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'observacion_nuevo'); ?>
		<?php echo $form->textField($model,'observacion_nuevo',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'observacion_nuevo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
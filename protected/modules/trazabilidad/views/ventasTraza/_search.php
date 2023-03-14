<?php
/* @var $this VentasTrazaController */
/* @var $model VentasTraza */
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
		<?php echo $form->label($model,'cun_oportunidad_anterior'); ?>
		<?php echo $form->textField($model,'cun_oportunidad_anterior',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cun_oportunidad_nuevo'); ?>
		<?php echo $form->textField($model,'cun_oportunidad_nuevo',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'numero_asignado_anterior'); ?>
		<?php echo $form->textField($model,'numero_asignado_anterior',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'numero_asignado_nuevo'); ?>
		<?php echo $form->textField($model,'numero_asignado_nuevo',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_activacion_anterior'); ?>
		<?php echo $form->textField($model,'fecha_activacion_anterior'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_activacion_nuevo'); ?>
		<?php echo $form->textField($model,'fecha_activacion_nuevo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_legalizacion_anterior'); ?>
		<?php echo $form->textField($model,'fecha_legalizacion_anterior'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_legalizacion_nuevo'); ?>
		<?php echo $form->textField($model,'fecha_legalizacion_nuevo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estado_id_enterior'); ?>
		<?php echo $form->textField($model,'estado_id_enterior'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estado_id_nuevo'); ?>
		<?php echo $form->textField($model,'estado_id_nuevo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'plataforma_id_anterior'); ?>
		<?php echo $form->textField($model,'plataforma_id_anterior'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'plataforma_id_nuevo'); ?>
		<?php echo $form->textField($model,'plataforma_id_nuevo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pedido_root_anterior'); ?>
		<?php echo $form->textField($model,'pedido_root_anterior',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pedido_root_nuevo'); ?>
		<?php echo $form->textField($model,'pedido_root_nuevo',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'documento_id_anterior'); ?>
		<?php echo $form->textField($model,'documento_id_anterior'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'documento_id_nuevo'); ?>
		<?php echo $form->textField($model,'documento_id_nuevo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'observacion_activacion_anterior'); ?>
		<?php echo $form->textField($model,'observacion_activacion_anterior',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'observacion_activacion_nuevo'); ?>
		<?php echo $form->textField($model,'observacion_activacion_nuevo',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'observacion_anterior'); ?>
		<?php echo $form->textField($model,'observacion_anterior',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'observacion_nuevo'); ?>
		<?php echo $form->textField($model,'observacion_nuevo',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
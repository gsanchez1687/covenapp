<?php
/* @var $this ClientesController */
/* @var $modelCliente Clientes */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	

	<div class="row">
		<?php echo $form->label($modelCliente,'nombre'); ?>
		<?php echo $form->textField($modelCliente,'nombre',array('size'=>15,'maxlength'=>15,'class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($modelCliente,'apellido'); ?>
		<?php echo $form->textField($modelCliente,'apellido',array('size'=>15,'maxlength'=>15,'class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($modelCliente,'fecha_expedicion'); ?>
		<?php echo $form->textField($modelCliente,'fecha_expedicion',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($modelCliente,'fijo'); ?>
		<?php echo $form->textField($modelCliente,'fijo',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($modelCliente,'movil'); ?>
		<?php echo $form->textField($modelCliente,'movil',array('size'=>20,'maxlength'=>20,'class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($modelCliente,'direccion'); ?>
		<?php echo $form->textField($modelCliente,'direccion',array('size'=>30,'maxlength'=>30,'class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($modelCliente,'email'); ?>
		<?php echo $form->textField($modelCliente,'email',array('size'=>40,'maxlength'=>40,'class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($modelCliente,'ciudad_id'); ?>
		<?php echo $form->textField($modelCliente,'ciudad_id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($modelCliente,'fecha_nacimiento'); ?>
		<?php echo $form->textField($modelCliente,'fecha_nacimiento',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($modelCliente,'tipo_documento'); ?>
		<?php echo $form->textField($modelCliente,'tipo_documento',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($modelCliente,'tipo_cliente'); ?>
		<?php echo $form->textField($modelCliente,'tipo_cliente',array('class'=>'form-control')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::app()->params['buscar-text'], array('class' => Yii::app()->params['buscar-btn'])); ?>	     
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
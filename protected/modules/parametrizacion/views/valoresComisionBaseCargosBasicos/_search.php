<?php
/* @var $this ValoresComisionBaseCargosBasicosController */
/* @var $model ValoresComisionBaseCargosBasicos */
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
		<?php echo $form->label($model,'tipo_id'); ?>
		<?php echo $form->textField($model,'tipo_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comision'); ?>
		<?php echo $form->textField($model,'comision'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cesantia_mercantil'); ?>
		<?php echo $form->textField($model,'cesantia_mercantil',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'activo'); ?>
		<?php echo $form->textField($model,'activo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
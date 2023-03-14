<?php
/* @var $this PlanesController */
/* @var $model Planes */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>


	<div class="row">
		<?php echo $form->label($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>25,'maxlength'=>25,'class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'valor'); ?>
		<?php echo $form->textField($model,'valor',array('size'=>10,'maxlength'=>10,'class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'operador_id'); ?>
		<?php echo $form->textField($model,'operador_id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_vigencia'); ?>
		<?php echo $form->textField($model,'fecha_vigencia',array('class'=>'form-control')); ?>
	</div>

        <br/>
	<div class="row buttons">
		 <?php echo CHtml::submitButton(Yii::app()->params['buscar-text'], array('class' => Yii::app()->params['buscar-btn'])); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
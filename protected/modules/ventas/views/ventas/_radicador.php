<div class="wide form">

    <?php $form = $this->beginWidget('CActiveForm', array('action' => Yii::app()->createUrl($this->route), 'method' => 'get',)); ?>


    <div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>15,'maxlength'=>15,'class'=>'form-control')); ?>
    </div>
    
    <div class="row">
		<?php echo $form->label($model,'numero_identidad'); ?>
		<?php echo $form->textField($model,'numero_identidad',array('size'=>15,'maxlength'=>15,'class'=>'form-control')); ?>
    </div>
    
    <div class="row">
		<?php echo $form->label($model,'cedula_identidad_vendedor'); ?>
		<?php echo $form->textField($model,'cedula_identidad_vendedor',array('size'=>15,'maxlength'=>15,'class'=>'form-control')); ?>
    </div>




    <br/>
    <div class="row buttons">
        <?php echo CHtml::submitButton(Yii::app()->params['buscar-text'], array('class' => Yii::app()->params['buscar-btn'])); ?>	     
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->
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
        <?php echo $form->label($model,'rol_id'); ?>
        <?php echo $form->textField($model,'rol_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'persona_id'); ?>
        <?php echo $form->textField($model,'persona_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'username'); ?>
        <?php echo $form->textField($model,'username',array('size'=>50,'maxlength'=>50)); ?>
    </div>
   

    <div class="row">
        <?php echo $form->label($model,'coordinador_id'); ?>
        <?php echo $form->textField($model,'coordinador_id'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->

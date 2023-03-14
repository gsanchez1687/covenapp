
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'valores-comision-base-cargos-basicos-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
        
        <div class="form-group">
            <div class="col-xs-12 col-sm-3">
                <?php echo $form->labelEx($model,'tipo_id'); ?>
            </div>
            <div class="col-xs-12 col-sm-9">
                <?php echo $form->textField($model,'tipo_id',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'tipo_id'); ?>
            </div>            
        </div>
        
        <div class="form-group">
            <div class="col-xs-12 col-sm-3">
                <?php echo $form->labelEx($model,'comision'); ?>
            </div>
            <div class="col-xs-12 col-sm-9">
                <?php echo $form->textField($model,'comision',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'comision'); ?>
            </div>            
        </div>
        
        <div class="form-group">
            <div class="col-xs-12 col-sm-3">
                <?php echo $form->labelEx($model,'cesantia_mercantil'); ?>
            </div>
            <div class="col-xs-12 col-sm-9">
                <?php echo $form->textField($model,'cesantia_mercantil',array('size'=>11,'maxlength'=>11,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'cesantia_mercantil'); ?>
            </div>            
        </div>
        
        <div class="form-group">
            <div class="col-xs-12 col-sm-3">
                <?php echo $form->labelEx($model,'activo'); ?>
            </div>
            <div class="col-xs-12 col-sm-9">
               <?php
                $this->widget('application.extensions.SwitchToggle.SwitchToggle', array(
                'id' => 'ValoresComisionBaseCargosBasicos_activo',
                'attribute' => 'ValoresComisionBaseCargosBasicos[activo]',
                'state' => $model->activo,
                'type' => 'item'));
                ?>
		<?php echo $form->error($model,'activo'); ?>
            </div>            
        </div>

	<div class="row buttons">                
            <?php echo CHtml::submitButton(Yii::app()->params['save-text'], array('class' => Yii::app()->params['save-btn'])); ?>
	    <?php echo CHtml::link(Yii::app()->params['cancel-text'], Yii::app()->controller->createUrl('admin'), array('class' => Yii::app()->params['cancel-btn'])); ?>	
        </div>
	

<?php $this->endWidget(); ?>

</div><!-- form -->
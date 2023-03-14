<?php
/* @var $this RolController */
/* @var $model Roles */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'roles-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model,null,null,array('class'=>'alert alert-danger')); ?>
        
        <div class="form-group">
            <div class="col-xs-12 col-sm-3">
                <?php echo $form->labelEx($model,'name'); ?>
            </div>
            <div class="col-xs-12 col-sm-9">
                <?php echo $form->textArea($model,'name',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'name'); ?>
            </div>            
        </div>
        
        <div class="form-group">
            <div class="col-xs-12 col-sm-3">
                <?php echo $form->labelEx($model,'description'); ?>
            </div>
            <div class="col-xs-12 col-sm-9">
                <?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'description'); ?>
            </div>            
        </div>
        <br />
        <br />
        <br />
        <br />
        
        
        <div class="form-group">
            <div class="col-xs-12 col-sm-3">
                 <?php echo $form->labelEx($model,'rol'); ?>
            </div>
            <div class="col-xs-12 col-sm-9">
                <?php echo $form->labelEx($model,'active'); ?>
		<?php 
                    $this->widget(
                        'booster.widgets.TbSwitch',
                        array(
                            'attribute' => 'active',
                            'id'=>'Roles_active',
                            'model'=>$model,
                            'value'=>$model->active,                            
                            'options' => array(
                                'size' => 'normal', //null, 'mini', 'small', 'normal', 'large
                                'onColor' => 'success', // 'primary', 'info', 'success', 'warning', 'danger', 'default'
                                'offColor' => 'default',  // 'primary', 'info', 'success', 'warning', 'danger', 'default'
                                'onText'=>'SI',
                                'offText'=>'NO'
                            ),
                        )
                    );
                ?>
		<?php echo $form->error($model,'active'); ?>
            </div>            
        </div>

	


	<div class="row buttons">                            
	    <?php echo CHtml::link(Yii::app()->params['cancel-text'], Yii::app()->controller->createUrl('admin'), array('class' => Yii::app()->params['cancel-btn'])); ?>	
            <?php echo CHtml::submitButton(Yii::app()->params['save-text'], array('class' => Yii::app()->params['save-btn'])); ?>
        </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'dominios-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model,null,null,array('class'=>'alert alert-danger')); ?>
        
        <div class="form-group">
            <div class="col-xs-12 col-sm-3">
                <?php echo $form->labelEx($model,'tipo'); ?>
            </div>
            <div class="col-xs-12 col-sm-9">
                <?php echo $form->textField($model,'tipo',array('size'=>20,'maxlength'=>20,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'tipo'); ?>
            </div>            
        </div>
        
        <div class="form-group">
            <div class="col-xs-12 col-sm-3">
                <?php echo $form->labelEx($model,'parametro'); ?>
            </div>
            <div class="col-xs-12 col-sm-9">
                <?php echo $form->textField($model,'parametro',array('size'=>20,'maxlength'=>20,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'parametro'); ?>
            </div>            
        </div>
        
        <div class="form-group">
            <div class="col-xs-12 col-sm-3">
                <?php echo $form->labelEx($model,'activo'); ?>
            </div>
            <div class="col-xs-12 col-sm-9">
                <?php 
                    $this->widget(
                        'booster.widgets.TbSwitch',
                        array(
                            'attribute' => 'activo',
                            'id'=>'Dominios_activo',
                            'model'=>$model,
                            'value'=>$model->activo,                            
                            'options' => array(
                                'size' => 'normal', //null, 'mini', 'small', 'normal', 'large
                                'onColor' => 'success', // 'primary', 'info', 'success', 'warning', 'danger', 'default'
                                'offColor' => 'danger',  // 'primary', 'info', 'success', 'warning', 'danger', 'default'
                                'onText'=>'SI',
                                'offText'=>'NO'
                            ),
                        )
                    );
                ?>
		<?php echo $form->error($model,'activo'); ?>
            </div>            
        </div>


	<div class="btn-group buttons">                
            <?php echo CHtml::link(Yii::app()->params['cancel-text'], Yii::app()->controller->createUrl('admin'), array('class' => Yii::app()->params['cancel-btn'])); ?>	
            <?php echo CHtml::submitButton(Yii::app()->params['save-text'], array('class' => Yii::app()->params['save-btn'])); ?>	     
        </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
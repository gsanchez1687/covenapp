<div class="form">

        <?php $form = $this->beginWidget('CActiveForm', array('id' => 'sims-form', 'enableAjaxValidation' => false, 'htmlOptions' => array('enctype' => 'multipart/form-data'))); ?>

         <?php if(Yii::app()->user->hasFlash('app')): ?>
                <center>                        
                    <div class="alert alert-success" role="alert">

                        <?php echo Yii::app()->user->getFlash('app'); ?>

                    </div>
                </center>
            <?php endif; ?>	

	<?php echo $form->errorSummary($model,null,null,array('class'=>'alert alert-danger')); ?>
        
        <div class="form-group">
            <div class="col-xs-12 col-sm-3">
                <?php echo $form->labelEx($model, 'archivo'); ?>
            </div>
            <div class="col-xs-12 col-sm-9">
                <?php echo CHtml::activeFileField($model, 'archivo'); ?>
                <?php echo $form->error($model, 'archivo'); ?>
                <p class="help-block">Solo archivos .CSV</p>
            </div>
        </div>
	
	<div class="buttons">                
             <?php echo CHtml::link(Yii::app()->params['cancel-text'], Yii::app()->controller->createUrl('admin'), array('class' => Yii::app()->params['cancel-btn'])); ?>	
             <?php echo CHtml::submitButton(Yii::app()->params['save-text'], array('class' => Yii::app()->params['save-btn'])); ?>	 
        </div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script src="<?php echo Yii::app()->request->baseUrl ?>/js/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
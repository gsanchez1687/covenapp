<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'menus-form',
	'enableClientValidation' => false,
        'clientOptions' => array('validateOnSubmit' => false),
        'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model,null,null,array('class'=>'alert alert-danger')); ?>
        <div class="row">
            <div class="form-group-venta">
            <div class="col-xs-12 col-sm-3">
                <?php echo $form->labelEx($model,'name'); ?>
            </div>
            <div class="col-xs-12 col-sm-9">
                <?php echo $form->textField($model,'name',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'name'); ?>
            </div>
        </div>
        <div class="form-group-venta">
            <div class="col-xs-12 col-sm-3">
                <?php echo $form->labelEx($model,'icon'); ?>
            </div>
            <div class="col-xs-12 col-sm-9">
                <?php echo $form->textField($model,'icon',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'icon'); ?>
            </div>
        </div>
        <div class="form-group-venta">
            <div class="col-xs-12 col-sm-3">
                <?php echo $form->labelEx($model,'position'); ?>
            </div>
            <div class="col-xs-12 col-sm-9">
                <?php echo $form->textField($model,'position',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'position'); ?>
            </div>
        </div>
        <div class="form-group-venta">
            <div class="col-xs-12 col-sm-3">
                <?php echo $form->labelEx($model,'url'); ?>
            </div>  
            <div class="col-xs-12 col-sm-9">
                <?php echo $form->textField($model,'url',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'url'); ?>
            </div>
        </div>
        <div class="form-group-venta">
            <div class="col-xs-12 col-sm-3">
                <?php echo $form->labelEx($model,'category'); ?>
            </div>
            <div class="col-xs-12 col-sm-9">
                <?php echo $form->textField($model,'category',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'category'); ?>
            </div>
        </div>
        <div class="form-group-venta">
            <div class="col-xs-12 col-sm-3">
                <?php echo $form->labelEx($model,'parent'); ?>
            </div>
            <div class="col-xs-12 col-sm-9">
                <?php echo $form->textField($model,'parent',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'parent'); ?>
            </div>
        </div>
        <div class="form-group-venta">
            <div class="col-xs-12 col-sm-3">
                <?php echo $form->labelEx($model,'module'); ?>
            </div>
            <div class="col-xs-12 col-sm-9">
                <?php echo $form->textField($model,'module',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'module'); ?>
            </div>
        </div>
        <div class="form-group-venta">
            <div class="col-xs-12 col-sm-3">
                <?php echo $form->labelEx($model,'active'); ?>
            </div>
            <div class="col-xs-12 col-sm-9">                
                <?php echo $form->dropDownList($model, 'active',array('0' => 'Inactivo', '1' => 'Activo')); ?>
		<?php echo $form->error($model,'active'); ?>
            </div>
        </div>
</div>

	<div class="btn-group">              
	     <?php echo CHtml::link(Yii::app()->params['cancel-text'], Yii::app()->controller->createUrl('admin'), array('class' => Yii::app()->params['cancel-btn'])); ?>	
             <?php echo CHtml::submitButton(Yii::app()->params['save-text'], array('class' => Yii::app()->params['save-btn'])); ?>
        </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
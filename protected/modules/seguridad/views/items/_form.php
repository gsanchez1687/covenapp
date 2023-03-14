
<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'items-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

    <?php echo $form->errorSummary($model,null,null,array('class'=>'alert alert-danger')); ?>
    <div class="row">
        
   
    <div class="form-group-venta">
        <div class="col-xs-12 col-sm-3">
            <?php echo $form->labelEx($model, 'item'); ?>
        </div>
        <div class="col-xs-12 col-sm-9">
            <?php echo $form->textArea($model, 'item', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'item'); ?>
        </div>            
    </div>
    <div class="form-group-venta">
        <div class="col-xs-12 col-sm-3">
            <?php echo $form->labelEx($model, 'name'); ?>
        </div>
        <div class="col-xs-12 col-sm-9">
            <?php echo $form->textArea($model, 'name', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'name'); ?>
        </div>            
    </div>
    <div class="form-group-venta">
        <div class="col-xs-12 col-sm-3">
            <?php echo $form->labelEx($model, 'menu_id'); ?>
        </div>
        <div class="col-xs-12 col-sm-9">
            <?php echo FormHelper::dropDownList($form, $model, 'menu_id', Menus::model()->findAll(''), 'id', 'name', '', array('class' => 'form-control')) ?>
            <?php echo $form->error($model, 'menu_id'); ?>
        </div>            
    </div>
    <div class="form-group-venta">
        <div class="col-xs-12 col-sm-3">
            <?php echo $form->labelEx($model, 'active'); ?>
        </div>
        <div class="col-xs-12 col-sm-9">
            <?php echo $form->dropDownList($model, 'active', array('0' => 'Inactivo', '1' => 'Activo')); ?>
            <?php echo $form->error($model, 'active'); ?>
        </div>            
    </div>

 </div>
    <div class="btn-group">              
         <?php echo CHtml::link(Yii::app()->params['cancel-text'], Yii::app()->controller->createUrl('admin'), array('class' => Yii::app()->params['cancel-btn'])); ?>
        <?php echo CHtml::submitButton(Yii::app()->params['save-text'], array('class' => Yii::app()->params['save-btn'])); ?>
       	
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
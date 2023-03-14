
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'planes-form',
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
                <?php echo $form->labelEx($model,'nombre'); ?>
            </div>
            <div class="col-xs-12 col-sm-9">
                <?php echo $form->textField($model,'nombre',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'nombre'); ?>
            </div>            
        </div>
        
        <div class="form-group">
            <div class="col-xs-12 col-sm-3">
                <?php echo $form->labelEx($model,'valor'); ?>
            </div>
            <div class="col-xs-12 col-sm-9">
                <?php echo $form->textField($model,'valor',array('size'=>10,'maxlength'=>10,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'valor'); ?>
            </div>            
        </div>
        
        <div class="form-group">
            <div class="col-xs-12 col-sm-3">
                <?php echo $form->labelEx($model,'operador_id'); ?>
            </div>
            <div class="col-xs-12 col-sm-9">
                <?php
                $this->widget('ext.yii-selectize.YiiSelectize', array(
                    'name' => 'Planes[operador_id]',
                    'value'=>$model->operador_id,
                    'id' => 'Planes_operador_id',
                    'fullWidth' => true,
                    'placeholder' => '- Seleccione -',
                    'multiple' => false,                    
                    'data' => Planes::getOperador(),
                    'useWithBootstrap' => true,
                    'options' => array(
                        'plugins' => ['remove_button'],
                        'create' => false,
                        'persist' => false,
                        'valueField' => 'value',
                        'labelField' => 'text',
                        'searchField' => 'text',
                    ),
                    'htmlOptions' => array(
                        'class' => 'form-control',
                    ),
                ));
                ?>   
		<?php echo $form->error($model,'operador_id'); ?>
            </div>            
        </div>
        
        <div class="form-group">
            <div class="col-xs-12 col-sm-3">
                <?php echo $form->labelEx($model,'fecha_vigencia'); ?>
            </div>
            <div class="col-xs-12 col-sm-9">
                <?php
                    $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                        'name'=>'Planes[fecha_vigencia]',
                        'value'=>$model->fecha_vigencia,
                        'flat'=>false,//remove to hide the datepicker
                        'language' => 'es',
                        'options'=>array(                            
                            'dateFormat' => 'yy-mm-dd',
                            'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                            'changeMonth'=>true,
                            'changeYear'=>true,
                            'yearRange'=>'2000:2099',
                            'minDate' => 'now',      // Fecha manima
                            'maxDate' => '2099-12-31',      // Fecha maxima
                            
                        ),
                        'htmlOptions'=>array(
                             'class'=>'form-control',
                        ),
                    ));
                    ?>
		<?php echo $form->error($model,'fecha_vigencia'); ?>
            </div>            
        </div>
        
        <div class="form-group">
            <div class="col-xs-12 col-sm-3">
                <?php echo $form->labelEx($model,'fecha_vencimiento'); ?>
            </div>
            <div class="col-xs-12 col-sm-9">                
		<?php
                    $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                        'name'=>'Planes[fecha_vencimiento]',
                        'value'=>$model->fecha_vencimiento,
                        'flat'=>false,//remove to hide the datepicker
                        'language' => 'es',
                        'options'=>array(                            
                            'dateFormat' => 'yy-mm-dd',
                            'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                            'changeMonth'=>true,
                            'changeYear'=>true,
                            'yearRange'=>'2000:2099',
                            'minDate' => 'now',      // Fecha manima
                            'maxDate' => '2099-12-31',      // Fecha maxima
                            
                        ),
                        'htmlOptions'=>array(
                             'class'=>'form-control',
                        ),
                    ));
                    ?>
		<?php echo $form->error($model,'fecha_vencimiento'); ?>
            </div>            
        </div>


	<div class="row buttons">                         
	 <?php echo CHtml::link(Yii::app()->params['cancel-text'], Yii::app()->controller->createUrl('admin'), array('class' => Yii::app()->params['cancel-btn'])); ?>	
         <?php echo CHtml::submitButton(Yii::app()->params['save-text'], array('class' => Yii::app()->params['save-btn'])); ?>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script src="<?php echo Yii::app()->request->baseUrl ?>/js/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
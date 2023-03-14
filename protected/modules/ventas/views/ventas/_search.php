<div class="wide form">

    <?php $form = $this->beginWidget('CActiveForm', array('action' => Yii::app()->createUrl($this->route), 'method' => 'get',)); ?>
    
    <div class="row">
        <div class="col-md-4">
            <?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>15,'maxlength'=>15,'class'=>'form-control')); ?>
        </div>
        <div class="col-md-4">
            <?php echo $form->label($model,'numero_identidad'); ?>
		<?php echo $form->textField($model,'numero_identidad',array('size'=>15,'maxlength'=>15,'class'=>'form-control')); ?>
        </div>
        <div class="col-md-4">
            <?php echo $form->label($model,'cedula_identidad_vendedor'); ?>
            <?php echo $form->textField($model,'cedula_identidad_vendedor',array('size'=>15,'maxlength'=>15,'class'=>'form-control')); ?>
        </div>        
    </div>
    
    <div class="row">
        <div class="col-md-4">
            <?php echo $form->label($model,'estado_id'); ?>
            <?php echo $form->dropDownList($model,'estado_id',Ventas::getEstados(),array('class'=>'form-control','empty'=>'Seleccione'));  ?>                    	
        </div>
        <div class="col-md-4">
            <?php echo $form->label($model,'operador_id'); ?>
            <?php echo $form->dropDownList($model,'operador_id',Ventas::getOperador(),array('class'=>'form-control','empty'=>'Seleccione'));  ?>                    	
        </div>
        <div class="col-md-4">
            <?php echo $form->label($model,'tipo_venta'); ?>
            <?php echo $form->dropDownList($model,'tipo_venta',Ventas::getTipoVentas(),array('class'=>'form-control','empty'=>'Seleccione'));  ?>                    	
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-4">
            <?php echo $form->label($model,'cun_oportunidad'); ?>
            <?php echo $form->textField($model,'cun_oportunidad',array('size'=>15,'maxlength'=>15,'class'=>'form-control')); ?>            
        </div>
        <div class="col-md-4">
            <?php echo $form->label($model,'imei'); ?>
            <?php echo $form->textField($model,'imei',array('size'=>15,'maxlength'=>15,'class'=>'form-control')); ?>            
        </div>
        <div class="col-md-4">
            <?php echo $form->label($model,'iccid'); ?>
            <?php echo $form->textField($model,'iccid',array('size'=>30,'maxlength'=>30,'class'=>'form-control')); ?>            
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <?php echo $form->label($model,'fecha_ingreso_inicio'); ?>
            <?php //echo $form->textField($model,'fecha_ingreso',array('size'=>30,'maxlength'=>30,'class'=>'form-control')); ?> 
            <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'name' => 'Ventas[fecha_ingreso_inicio]',
                'value' => $model->fecha_ingreso_inicio,
                'flat' => false, //remove to hide the datepicker
                'language' => 'es',
                'options' => array(
                    'dateFormat' => 'yy-mm-dd',
                    'showAnim' => 'slide', //'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'                                           
                    'yearRange' => '1918',
                    'changeMonth' => true,
                    'changeYear' => true,
                    'maxDate' => 'NOW()', 
                ),
                'htmlOptions' => array(
                    'class' => 'form-control input-fechas',
                ),
            ));
            ?> 
        </div>
        
        <div class="col-md-6">
            <?php echo $form->label($model,'fecha_ingreso_fin'); ?>
            <?php //echo $form->textField($model,'fecha_ingreso',array('size'=>30,'maxlength'=>30,'class'=>'form-control')); ?> 
            <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'name' => 'Ventas[fecha_ingreso_fin]',
                'value' => $model->fecha_ingreso_fin,
                'flat' => false, //remove to hide the datepicker
                'language' => 'es',
                'options' => array(
                    'dateFormat' => 'yy-mm-dd',
                    'showAnim' => 'slide', //'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'                                           
                    'yearRange' => '1918',
                    'changeMonth' => true,
                    'changeYear' => true,
                    'maxDate' => 'NOW()',
                ),
                'htmlOptions' => array(
                    'class' => 'form-control input-fechas',
                ),
            ));
            ?> 
        </div>
        
    </div>
    
    <br/>
    <div class="buttons">
        <?php echo CHtml::submitButton(Yii::app()->params['buscar-text'], array('class' => Yii::app()->params['buscar-btn'])); ?>	     
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->
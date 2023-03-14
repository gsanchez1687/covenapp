<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'clientes-form',
	'enableClientValidation' => true,
        'clientOptions' => array('validateOnSubmit' => true,),
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($modelCliente,null,null,array('class'=>'alert alert-danger')); ?>     
        <center>
            <?php if (Yii::app()->user->hasFlash('app')): ?>
                <div class="alert alert-warning" role="alert">
                    <?php echo Yii::app()->user->getFlash('app'); ?>
                </div> 
            <?php endif; ?>

        </center>
        
        <div class="form-group-venta">
            <div class="col-xs-12 col-sm-4">
                <?php echo $form->labelEx($modelCliente,'nombre'); ?>
            </div>
            <div class="col-xs-12 col-sm-8">
                <?php echo $this->widget('ext.counter.GTextfield',array('model'=>$modelCliente,'attribute'=>'nombre','allowed' =>50,'htmlOptions' => array('class'=>'form-control'),),true); ?>
		<?php echo $form->error($modelCliente,'nombre'); ?>
            </div>            
        </div>        
        <div class="form-group-venta">
            <div class="col-xs-12 col-sm-4">
                <?php echo $form->labelEx($modelCliente,'segundo_nombre'); ?>
            </div>
            <div class="col-xs-12 col-sm-8">
                <?php echo $this->widget('ext.counter.GTextfield',array('model'=>$modelCliente,'attribute'=>'segundo_nombre','allowed' =>50,'htmlOptions' => array('class'=>'form-control'),),true); ?>
		<?php echo $form->error($modelCliente,'segundo_nombre'); ?>
            </div>            
        </div>        
        
        
        <div class="form-group-venta">
            <div class="col-xs-12 col-sm-4">
                <?php echo $form->labelEx($modelCliente,'apellido'); ?>
            </div>
            <div class="col-xs-12 col-sm-8">
                <?php echo $this->widget('ext.counter.GTextfield',array('model'=>$modelCliente,'attribute'=>'apellido','allowed' =>50,'htmlOptions' => array('class'=>'form-control'),),true); ?>
		<?php echo $form->error($modelCliente,'apellido'); ?>
            </div>            
        </div>
        <div class="form-group-venta">
            <div class="col-xs-12 col-sm-4">
                <?php echo $form->labelEx($modelCliente,'segundo_apellido'); ?>
            </div>
            <div class="col-xs-12 col-sm-8">
                <?php echo $this->widget('ext.counter.GTextfield',array('model'=>$modelCliente,'attribute'=>'segundo_apellido','allowed' =>50,'htmlOptions' => array('class'=>'form-control'),),true); ?>
		<?php echo $form->error($modelCliente,'segundo_apellido'); ?>
            </div>            
        </div>
        
        <div class="form-group-venta">
            <div class="col-xs-12 col-sm-4">
                <?php echo $form->labelEx($modelCliente,'fecha_expedicion'); ?>
            </div>
            <div class="col-xs-12 col-sm-8">
                <?php
                    $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                        'name'=>'Clientes[fecha_expedicion]',
                        'id' => 'Clientes_fecha_expedicion',
                        'value'=>$modelCliente->fecha_expedicion,
                        'flat'=>false,//remove to hide the datepicker
                        'language' => 'es',
                        'options'=>array(                            
                            'dateFormat' => 'yy-mm-dd',
                            'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                            'changeMonth'=>true,
                            'changeYear'=>true,
                            'yearRange'=>'1898:now',
                            'minDate' => '',      // Fecha manima
                            'maxDate' => 'now',      // Fecha maxima
                            
                        ),
                        'htmlOptions'=>array(
                             'class'=>'form-control',
                        ),
                    ));
                    ?>
		<?php echo $form->error($modelCliente,'fecha_expedicion'); ?>
            </div>            
        </div>
        
        <div class="form-group-venta">
            <div class="col-xs-12 col-sm-4">
                <?php echo $form->labelEx($modelCliente,'fijo'); ?>
            </div>
            <div class="col-xs-12 col-sm-8">
                <?php echo $this->widget('ext.counter.GTextfield',array('model'=>$modelCliente,'attribute'=>'fijo','allowed' =>8,'htmlOptions' => array('class'=>'form-control'),),true); ?>
		<?php echo $form->error($modelCliente,'fijo'); ?>
            </div>            
        </div>
        
        <div class="form-group-venta">
            <div class="col-xs-12 col-sm-4">
                <?php echo $form->labelEx($modelCliente,'movil'); ?>
            </div>
            <div class="col-xs-12 col-sm-8">
              <?php echo $this->widget('ext.counter.GTextfield',array('model'=>$modelCliente,'attribute'=>'movil','allowed' =>10,'htmlOptions' => array('class'=>'form-control'),),true); ?>
		<?php echo $form->error($modelCliente,'movil'); ?>
            </div>             
        </div>
        
        <div class="form-group-venta">
            <div class="col-xs-12 col-sm-4">
                <?php echo $form->labelEx($modelCliente,'direccion'); ?>
            </div>
            <div class="col-xs-12 col-sm-8">
                <?php echo $this->widget('ext.counter.GTextfield',array('model'=>$modelCliente,'attribute'=>'direccion','allowed' =>100,'htmlOptions' => array('class'=>'form-control'),),true); ?>
		<?php echo $form->error($modelCliente,'direccion'); ?>
            </div>            
        </div>
        
        <div class="form-group-venta">
            <div class="col-xs-12 col-sm-4">
                <?php echo $form->labelEx($modelCliente,'email'); ?>
            </div>
            <div class="col-xs-12 col-sm-8">
                <?php echo $this->widget('ext.counter.GTextfield',array('model'=>$modelCliente,'attribute'=>'email','allowed' =>50,'htmlOptions' => array('class'=>'form-control'),),true); ?>
		<?php echo $form->error($modelCliente,'email'); ?>
            </div>              
        </div>
        
        <div class="form-group-venta">
            <div class="col-xs-12 col-sm-4">
                <?php echo $form->labelEx($modelCliente,'ciudad_id'); ?>
            </div>
            <div class="col-xs-12 col-sm-8">
                <?php
                        $this->widget('ext.yii-selectize.YiiSelectize', array(
                            'name' => 'Clientes[ciudad_id]',
                            'value'=>$modelCliente->ciudad_id,
                            'id' => 'Clientes_ciudad_id',
                            'fullWidth' => true,
                            'placeholder' => '- Seleccione -',
                            'multiple' => false,                    
                            'data' => Clientes::getCiudad(),
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
		<?php echo $form->error($modelCliente,'ciudad_id'); ?>
            </div>            
        </div>
        
        <div class="form-group-venta">
            <div class="col-xs-12 col-sm-4">
                <?php echo $form->labelEx($modelCliente,'fecha_nacimiento'); ?>
            </div>
            <div class="col-xs-12 col-sm-8">
               <?php
                    $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                        'name'=>'Clientes[fecha_nacimiento]',
                        'value'=>$modelCliente->fecha_nacimiento,
                        'flat'=>false,//remove to hide the datepicker
                        'language' => 'es',
                        'options'=>array(                            
                            'dateFormat' => 'yy-mm-dd',
                            'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                            'changeMonth'=>true,
                            'changeYear'=>true,
                            'yearRange'=>'1897:2099',
                            'minDate' => '1897-01-01',      // Fecha manima
                            'maxDate' => 'now',      // Fecha maxima
                            
                        ),
                        'htmlOptions'=>array(
                             'class'=>'form-control',
                        ),
                    ));
                    ?>
		<?php echo $form->error($modelCliente,'fecha_nacimiento'); ?>
            </div>             
        </div>
        
        <div class="form-group-venta">
            <div class="col-xs-12 col-sm-4">
                <?php echo $form->labelEx($modelCliente,'tipo_documento'); ?>
            </div>
            <div class="col-xs-12 col-sm-8">
                <?php
                        $this->widget('ext.yii-selectize.YiiSelectize', array(
                            'name' => 'Clientes[tipo_documento]',
                            'value'=>$modelCliente->tipo_documento,
                            'id' => 'Clientes_tipo_documento',
                            'fullWidth' => true,
                            'placeholder' => '- Seleccione -',
                            'multiple' => false,                    
                            'data' => Clientes::getTipoDocumento(),
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
		<?php echo $form->error($modelCliente,'tipo_documento'); ?>
            </div>            
        </div>
        
        <div class="form-group-venta">
            <div class="col-xs-12 col-sm-4">
                <?php echo $form->labelEx($modelCliente,'numero_identidad'); ?>
            </div>
            <div class="col-xs-12 col-sm-8">
                <?php echo $form->textField($modelCliente,'numero_identidad',array('size'=>20,'maxlength'=>20,'class'=>'form-control')); ?>
		<?php echo $form->error($modelCliente,'numero_identidad'); ?>
            </div>            
        </div>
       
        
        
	<div class="row buttons">                            
	    <?php echo CHtml::link(Yii::app()->params['cancel-text'], Yii::app()->controller->createUrl('admin'), array('class' => Yii::app()->params['cancel-btn'])); ?>	
            <?php echo CHtml::submitButton(Yii::app()->params['save-text'], array('class' => Yii::app()->params['save-btn'])); ?>
        </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script src="<?php echo Yii::app()->request->baseUrl ?>/js/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    
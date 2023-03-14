<div class="form">
    <center>
        <?php if (Yii::app()->user->hasFlash('app')): ?>
            <div class="alert alert-info" role="alert">
                <?php echo Yii::app()->user->getFlash('app'); ?>
            </div> 
        <?php endif; ?>

    </center>
    <?php $form=$this->beginWidget('CActiveForm', array('id'=>'users-form',
    'enableClientValidation' => true,
    'clientOptions' => array('validateOnSubmit' => true),
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
    )); ?>

    <p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

    <?php echo $form->errorSummary($model,null,null,array('class'=>'alert alert-danger')); ?>
    <?php echo $form->errorSummary($modelPersonas,null,null,array('class'=>'alert alert-danger')); ?>
    
    <div class="form-group-venta">
        <div class="col-xs-12 col-sm-3">
            <?php echo $form->labelEx($model,'foto'); ?>
        </div>
        <div class="col-xs-12 col-sm-9">
           <?php echo CHtml::activeFileField($model,'foto',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
           <?php echo $form->error($model,'foto'); ?>
        </div>            
    </div>
    
    <div class="form-group-venta">
        <div class="col-xs-12 col-sm-3">
            <?php echo $form->labelEx($model,'rol_id'); ?>
        </div>
        <div class="col-xs-12 col-sm-9">
           <?php echo $form->dropDownList($model,'rol_id', Users::getRoles(), array('empty'=>'Seleccione..','class'=>'form-control')); ?>
           <?php echo $form->error($model,'rol_id'); ?>
        </div>            
    </div>
       
    <div class="form-group-venta">
        <div class="col-xs-12 col-sm-3">
            <?php echo $form->labelEx($model,'username'); ?>
        </div>
        <div class="col-xs-12 col-sm-9">
            <?php echo $this->widget('ext.counter.GTextfield',array('model'=>$model,'attribute'=>'username','allowed' => 10,'htmlOptions' => array('class'=>'form-control'),),true); ?>
            <?php echo $form->error($model,'username'); ?>
        </div>            
    </div>
    
    <?php if (!$model->isNewRecord): ?>
    <div class="form-group-venta">
        <div class="col-xs-12 col-sm-3">
            <?php echo $form->labelEx($model,'password'); ?>
        </div>
        <div class="col-xs-12 col-sm-9">
            <?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
            <?php echo $form->error($model,'password'); ?>
        </div>            
    </div>
    <?php endif; ?>    
   
    
    <div class="form-group-venta">
        <div class="col-xs-12 col-sm-3">
            <?php echo $form->labelEx($model,'coordinador_id'); ?>
        </div>
        <div class="col-xs-12 col-sm-9">
            <?php echo $form->dropDownList($model,'coordinador_id', Users::getCoordinador(), array('empty'=>'Seleccione...','class'=>'form-control')); ?>
            <?php echo $form->error($model,'coordinador_id'); ?>
        </div>            
    </div>
    
    <div class="form-group-venta">
        <div class="col-xs-12 col-sm-3">
            <?php echo $form->labelEx($model,'gerente_id'); ?>
        </div>
        <div class="col-xs-12 col-sm-9">
            <?php echo $form->dropDownList($model,'gerente_id', Users::getGerente(), array('empty'=>'Seleccione...','class'=>'form-control')); ?>
            <?php echo $form->error($model,'gerente_id'); ?>
        </div>            
    </div>
    
    <br />
    <hr>
    
    <div class="form-group-venta">
        <div class="col-xs-12 col-sm-3">
            <?php echo $form->labelEx($modelPersonas, 'nombre'); ?>
        </div>
        <div class="col-xs-12 col-sm-9">            
            <?php echo $this->widget('ext.counter.GTextfield',array('model'=>$modelPersonas,'attribute'=>'nombre','allowed' => 20,'htmlOptions' => array('class'=>'form-control'),),true); ?>
            <?php echo $form->error($modelPersonas, 'nombre'); ?>
        </div>            
    </div>
    <div class="form-group-venta">
        <div class="col-xs-12 col-sm-3">
            <?php echo $form->labelEx($modelPersonas, 'segundo_nombre'); ?>
        </div>
        <div class="col-xs-12 col-sm-9">            
            <?php echo $this->widget('ext.counter.GTextfield',array('model'=>$modelPersonas,'attribute'=>'segundo_nombre','allowed' => 20,'htmlOptions' => array('class'=>'form-control'),),true); ?>
            <?php echo $form->error($modelPersonas, 'segundo_nombre'); ?>
        </div>            
    </div>
    
    <div class="form-group-venta">
        <div class="col-xs-12 col-sm-3">
            <?php echo $form->labelEx($modelPersonas, 'apellido'); ?>
        </div>
        <div class="col-xs-12 col-sm-9">
            <?php echo $this->widget('ext.counter.GTextfield',array('model'=>$modelPersonas,'attribute'=>'apellido','allowed' => 20,'htmlOptions' => array('class'=>'form-control'),),true); ?>
            <?php echo $form->error($modelPersonas, 'apellido'); ?>
        </div>            
    </div>
    <div class="form-group-venta">
        <div class="col-xs-12 col-sm-3">
            <?php echo $form->labelEx($modelPersonas, 'segundo_apellido'); ?>
        </div>
        <div class="col-xs-12 col-sm-9">            
            <?php echo $this->widget('ext.counter.GTextfield',array('model'=>$modelPersonas,'attribute'=>'segundo_apellido','allowed' => 20,'htmlOptions' => array('class'=>'form-control'),),true); ?>
            <?php echo $form->error($modelPersonas, 'segundo_apellido'); ?>
        </div>            
    </div>
    
    <div class="form-group-venta">
        <div class="col-xs-12 col-sm-3">
            <?php echo $form->labelEx($modelPersonas, 'cedula_identidad'); ?>
        </div>
        <div class="col-xs-12 col-sm-9">            
            <?php echo $this->widget('ext.counter.GTextfield',array('model'=>$modelPersonas,'attribute'=>'cedula_identidad','allowed' => 10,'htmlOptions' => array('class'=>'form-control'),),true); ?>
            <?php echo $form->error($modelPersonas, 'cedula_identidad'); ?>
        </div>            
    </div>
    
    <div class="form-group-venta">
        <div class="col-xs-12 col-sm-3">
             <?php echo $form->labelEx($modelPersonas, 'correo'); ?>
        </div>
        <div class="col-xs-12 col-sm-9">            
            <?php echo $this->widget('ext.counter.GTextfield',array('model'=>$modelPersonas,'attribute'=>'correo','allowed' => 100,'htmlOptions' => array('class'=>'form-control'),),true); ?>
            <?php echo $form->error($modelPersonas,'correo'); ?>
        </div>            
    </div>

    <div class="form-group-venta">
        <div class="col-xs-12 col-sm-3">
             <?php echo $form->labelEx($modelPersonas,'movil'); ?>
        </div>
        <div class="col-xs-12 col-sm-9">
            <?php $this->widget("ext.maskedInput.MaskedInput", array("model" => $modelPersonas,"attribute" => "movil","mask" => '(999)999-99-99',"clientOptions" => array("autoUnmask"=> true),"defaults"=>array("removeMaskOnSubmit"=>true),))  ?>
            <?php echo $form->error($modelPersonas,'movil'); ?>
        </div>            
    </div>

    <div class="form-group-venta">
        <div class="col-xs-12 col-sm-3">
             <?php echo $form->labelEx($modelPersonas,'cargo_id'); ?>
        </div>
        <div class="col-xs-12 col-sm-9">
             <?php echo $form->dropDownList($modelPersonas,'cargo_id', Users::getCargo(), array('empty'=>'Sleccione...','class'=>'form-control')); ?>
             <?php echo $form->error($modelPersonas,'cargo_id'); ?>
        </div>            
    </div>
    

    <div class="form-group-venta">
        <div class="col-xs-12 col-sm-3">
            <?php echo $form->labelEx($modelPersonas,'fecha_ingreso'); ?>
        </div>
        <div class="col-xs-12 col-sm-9">
            <?php
                    $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                        'name'=>'Personas[fecha_ingreso]',
                        'value'=>$modelPersonas->fecha_ingreso,
                        'flat'=>false,//remove to hide the datepicker
                        'language' => 'es',
                        'options'=>array(                            
                            'dateFormat' => 'yy-mm-dd',
                            'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                            'changeMonth'=>true,
                            'changeYear'=>true,
                            'yearRange'=>'2000:2099',
                             'minDate' => '2000-01-01',      // minimum date
                             'maxDate' => '2099-12-31',  
                            
                        ),
                        'htmlOptions'=>array(
                             'class'=>'form-control',
                        ),
                    ));
                    ?>
            <?php echo $form->error($modelPersonas,'fecha_ingreso'); ?>
        </div>               
    </div>

    <div class="form-group-venta">
        <div class="col-xs-12 col-sm-3">
             <?php echo $form->labelEx($modelPersonas,'banco'); ?>
        </div>
        <div class="col-xs-12 col-sm-9">            
            <?php echo $this->widget('ext.counter.GTextfield',array('model'=>$modelPersonas,'attribute'=>'banco','allowed' => 15,'htmlOptions' => array('class'=>'form-control'),),true); ?>
            <?php echo $form->error($modelPersonas,'banco'); ?>
        </div>            
    </div>

    <div class="form-group-venta">
        <div class="col-xs-12 col-sm-3">
             <?php echo $form->labelEx($modelPersonas,'tipo_cuenta'); ?>
        </div>
        <div class="col-xs-12 col-sm-9">
             <?php echo $form->dropDownList($modelPersonas,'tipo_cuenta', Users::getTipoCuenta(), array('empty'=>'Seleccionar...','class'=>'form-control')); ?>
             <?php echo $form->error($modelPersonas,'tipo_cuenta'); ?>
        </div>            
    </div>

    <div class="form-group-venta">
        <div class="col-xs-12 col-sm-3">
            <?php echo $form->labelEx($modelPersonas,'numero_cuenta'); ?>
        </div>
        <div class="col-xs-12 col-sm-9">            
            <?php echo $this->widget('ext.counter.GTextfield',array('model'=>$modelPersonas,'attribute'=>'numero_cuenta','allowed' => 25,'htmlOptions' => array('class'=>'form-control'),),true); ?>
            <?php echo $form->error($modelPersonas,'numero_cuenta'); ?>
        </div>            
    </div>

    <div class="form-group-venta">
        <div class="col-xs-12 col-sm-3">
            <?php echo $form->labelEx($modelPersonas,'padrino_id'); ?>
        </div>
        <div class="col-xs-12 col-sm-9">
            <?php echo $form->dropDownList($modelPersonas,'padrino_id', Users::getPadrinos(), array('empty'=>'Seleccionar..','class'=>'form-control')); ?>
            <?php echo $form->error($modelPersonas,'padrino_id'); ?>
        </div>            
    </div>

    <div class="form-group-venta">
        <div class="col-xs-12 col-sm-3">
            <?php echo $form->labelEx($modelPersonas,'fin_padrino'); ?>
        </div>
        <div class="col-xs-12 col-sm-9">
           <?php
                    $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                        'name'=>'Personas[fin_padrino]',
                        'value'=>$modelPersonas->fin_padrino,
                        'flat'=>false,//remove to hide the datepicker
                        'language' => 'es',
                        'options'=>array(                            
                            'dateFormat' => 'yy-mm-dd',
                            'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                            'changeMonth'=>true,
                            'changeYear'=>true,
                            'yearRange'=>'2000:2099',
                            'minDate' => 'now',      // Fecha manima
                            'maxDate' => '+2m',      // Fecha maxima
                            
                        ),
                        'htmlOptions'=>array(
                             'class'=>'form-control',
                        ),
                    ));
                    ?>
            <?php echo $form->error($modelPersonas,'fin_padrino'); ?>
        </div>               
    </div>

    <div class="form-group-venta">
        <div class="col-xs-12 col-sm-3">
            <?php echo $form->labelEx($modelPersonas,'sucursal'); ?>
        </div>
        <div class="col-xs-12 col-sm-9">
             <?php echo $form->dropDownList($modelPersonas,'sucursal', Users::getSurcursal(),array('empty'=>'Seleccione...','class'=>'form-control')); ?>
             <?php echo $form->error($modelPersonas,'sucursal'); ?>
        </div>              
    </div>

    <div class="form-group-venta">
        <div class="col-xs-12 col-sm-3">
             <?php echo $form->labelEx($modelPersonas,'documento'); ?>
        </div>
        <div class="col-xs-12 col-sm-9">
            <?php echo $form->dropDownList($modelPersonas,'documento', Users::getDocumentacion(),array('empty'=>'Seleccione','class'=>'form-control')); ?>
            <?php echo $form->error($modelPersonas,'documento'); ?>
        </div>            
    </div>

    <div class="form-group-venta">
        <div class="col-xs-12 col-sm-3">
            <?php echo $form->labelEx($modelPersonas,'legalizacion'); ?>
        </div>
        <div class="col-xs-12 col-sm-9">
            <?php echo $form->dropDownList($modelPersonas,'legalizacion', Users::getLegalizacion(),array('empty'=>'Seleccione','class'=>'form-control')); ?>
            <?php echo $form->error($modelPersonas,'legalizacion'); ?>
        </div>            
    </div>

    <div class="form-group-venta">
        <div class="col-xs-12 col-sm-3">
              <?php echo $form->labelEx($modelPersonas,'regimen_id'); ?>
        </div>
        <div class="col-xs-12 col-sm-9">
             <?php echo $form->dropDownList($modelPersonas,'regimen_id', Users::getRegimen(), array('empty'=>'Seleccionar..','class'=>'form-control')); ?>
             <?php echo $form->error($modelPersonas,'regimen_id'); ?>
        </div>             
    </div>

    <div class="form-group-venta">
        <div class="col-xs-12 col-sm-3">
             <?php echo $form->labelEx($modelPersonas,'rete_fuente'); ?>
        </div>
        <div class="col-xs-12 col-sm-9">
            <?php echo $form->dropDownList($modelPersonas,'rete_fuente',Users::getReteFuente(),array('empty'=>'Seleccione...','class'=>'form-control')); ?>
            <?php echo $form->error($modelPersonas,'rete_fuente'); ?>
        </div>               
    </div>
    
    <div class="form-group-venta">
        <div class="col-xs-12 col-sm-3">
             <?php echo $form->labelEx($modelPersonas,'estado_id'); ?>
        </div>
        <div class="col-xs-12 col-sm-9">
            <?php echo $form->dropDownList($modelPersonas,'estado_id',Users::getEstados(),array('empty'=>'Seleccione...','class'=>'form-control')); ?>
            <?php echo $form->error($modelPersonas,'estado_id'); ?>
        </div>               
    </div>
       
    <div class="row buttons">                    
        <?php echo CHtml::link(Yii::app()->params['cancel-text'], Yii::app()->controller->createUrl('admin'), array('class' => Yii::app()->params['cancel-btn'])); ?>	
        <?php echo CHtml::submitButton(Yii::app()->params['save-text'], array('class' => Yii::app()->params['save-btn'])); ?>
    </div>

<?php $this->endWidget(); ?>

<script src="<?php echo Yii::app()->request->baseUrl ?>/js/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    
<script>
$( document ).ready(function() {

    $('input[type="password"]').val('');
    
});
</script>

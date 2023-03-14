<?php
if ($model->isNewRecord):
    $planes = 'Planes';
    $Ventas = 'Ventas';
    $VentaFija = 'VentaFija';
    $VentaMovile = 'VentMovile';
    $VentaFijaETB = 'VentaFijaETB';
else:
    $planes = '';
    $Ventas = '';
    $VentaFija = '';
    $VentaMovile = '';
    $VentaFijaETB = '';
endif;

$htmlOption = array(
                    'ajax'=>array(
                                 'url'=>$this->createUrl('planesPorOperador'),
                                 'type'=>'POST',
                                 'update'=>'#Ventas_plan_id'                                
                                 ), 
                                 'class'=>'form-control',
                                 'empty'=>'Seleccione...',
);

//$htmlEstratos = array(
//                    'ajax'=>array(
//                                 'url'=>$this->createUrl('Planesestratos'),
//                                 'type'=>'POST',
//                                 'update'=>'#PlanesEtbFijaTenologias_id'                                
//                                 ), 
//                                 'class'=>'form-control',
//                                 'empty'=>'Seleccione...',
//    
//);
//$htmlTecnologia = array(
//                    'ajax'=>array(
//                                 'url'=>$this->createUrl('Planestecnologia'),
//                                 'type'=>'POST',
//                                 'update'=>'#PlanesEtbFijaTiposFijas_id'                                
//                                 ), 
//                                 'class'=>'form-control',
//                                 'empty'=>'Seleccione...',
//);
//$htmlTipoFija = array(
//                    'ajax'=>array(
//                                 'url'=>$this->createUrl('Planestipofija'),
//                                 'type'=>'POST',
//                                 'update'=>'#PlanesEtbFijaCombos_id'                                
//                                 ), 
//                                 'class'=>'form-control',
//                                 'empty'=>'Seleccione...',
//);
//$htmlCombos = array(
//                    'ajax'=>array(
//                                 'url'=>$this->createUrl('Planescombos'),
//                                 'type'=>'POST',
//                                 'update'=>'#PlanesEtbFijaVelocidades_id'                                
//                                 ), 
//                                 'class'=>'form-control',
//                                 'empty'=>'Seleccione...',
//);
//
//$velocidades = array('class'=>'form-control');
?>

<div class="form">
    
        <center>
            <?php if (Yii::app()->user->hasFlash('app')): ?>
                <div class="alert alert-warning" role="alert">
                    <?php echo Yii::app()->user->getFlash('app'); ?>
                </div> 
            <?php endif; ?>

        </center>

        <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'ventas-form',
        'enableClientValidation' => true,
        'enableAjaxValidation'=>false,
        'clientOptions' => array('validateOnSubmit' => true),
            
        )); 
    
    ?>

    <p class="note">Los campos con <span style="color: #c0392b;">*</span> son requeridos.</p>
        
	<?php echo $form->errorSummary($model,null,null,array('class'=>'alert alert-danger')); ?>       
	<?php echo $form->errorSummary($modelVentaMovile,null,null,array('class'=>'alert alert-danger')); ?>
	<?php echo $form->errorSummary($modelVentasFijas,null,null,array('class'=>'alert alert-danger')); ?>
	<?php //echo $form->errorSummary($modelPlanesEtbFijaCombos,null,null,array('class'=>'alert alert-danger')); ?>
	<?php //echo $form->errorSummary($modelPlanesEtbFijaEstratos,null,null,array('class'=>'alert alert-danger')); ?>
	<?php //echo $form->errorSummary($modelPlanesEtbFijaTenologias,null,null,array('class'=>'alert alert-danger')); ?>
	<?php //echo $form->errorSummary($modelPlanesEtbFijaTiposFijas,null,null,array('class'=>'alert alert-danger')); ?>
	<?php //echo $form->errorSummary($modelPlanesEtbFijaVelocidades,null,null,array('class'=>'alert alert-danger')); ?>
        
        <div class="form-group">
            <div class="col-xs-12 col-sm-4">
                <?php echo $form->labelEx($model,'operador_id'); ?>
            </div>
            <div class="col-xs-12 col-sm-8">                
                <?php echo $form->dropDownList($model,'operador_id',$model->getOperador(),$htmlOption) ?>
		<?php echo $form->error($model,'operador_id'); ?>
            </div>            
        </div>
        
        <div class="panel panel-default">
                <div class="panel-body">                    
                    <h1><?php echo Yii::t('app','<i class="fa fa-address-book-o" aria-hidden="true"></i> Información'); ?></h1>
                </div>
        </div>
    
       
    <section id="<?php echo $planes ?>">
        
         <div class="form-group">
            <div class="col-xs-12 col-sm-4">
                <?php echo $form->labelEx($model,'plan_id'); ?>
            </div>
            <div class="col-xs-12 col-sm-8">
                <?php echo $form->dropDownList($model,'plan_id',array('class'=>'form-control','empty'=>'Seleccione...')) ?>         
		<?php echo $form->error($model,'plan_id'); ?>
            </div>            
        </div>
        
    </section><!--fin del select de planes--->  
    
<!--    <section id="<?php echo $VentaFijaETB; ?>">
        
        <div class="form-group">
            <div class="col-xs-12 col-sm-4">
                <?php //echo CHtml::label('Seleciona el plan','Seleciona el plan'); ?>
            </div>
            <div class="col-xs-12 col-sm-1"> 
                <p>Estratos</p>
                <?php //echo $form->dropDownList($modelPlanesEtbFijaEstratos,'id',PlanesEtbFijaEstratos::getEstratos(),$htmlEstratos) ?>  
            </div> 
            <div class="col-xs-12 col-sm-2"> 
                 <p>Tecnologias</p>
                <?php //echo $form->dropDownList($modelPlanesEtbFijaTenologias,'id',array('empty'=>'Seleccione...'),$htmlTecnologia); ?>   
            </div> 
            <div class="col-xs-12 col-sm-2"> 
                 <p>Tipo</p>
                <?php //echo $form->dropDownList($modelPlanesEtbFijaTiposFijas,'id',array('empty'=>'Seleccione...'),$htmlTipoFija) ?>      
            </div> 
            <div class="col-xs-12 col-sm-1"> 
                 <p>Combos</p>
                <?php //echo $form->dropDownList($modelPlanesEtbFijaCombos,'id',array('empty'=>'Seleccione...'),$htmlCombos) ?>  
            </div> 
            <div class="col-xs-12 col-sm-1"> 
                 <p>Velocidades</p>
                <?php //echo $form->dropDownList($modelPlanesEtbFijaVelocidades,'id',array('empty'=>'Seleccione...'),$velocidades) ?>          
            </div>                            
                       
        </div>       
        
    </section>-->
       
    <!--Individual o Corporativa-->
    <section id="<?php echo $Ventas ?>">
    
        <div class="form-group">
            <div class="col-xs-12 col-sm-4">
                <?php echo $form->labelEx($model,'tipo_venta_id'); ?>
            </div>
            <div class="col-xs-12 col-sm-8">
                <?php //echo $form->textField($model,'tipo_venta_id',array('class'=>'form-control')); ?>
                <?php
                $this->widget('ext.yii-selectize.YiiSelectize', array(
                    'name' => 'Ventas[tipo_venta_id]',
                    'value'=>$model->tipo_venta_id,
                    'id' => 'Ventas_tipo_venta_id',
                    'fullWidth' => true,
                    'placeholder' => '- Seleccione -',
                    'multiple' => false,                    
                    'data' => Ventas::getTipoVentasIndividualCorporativa(),
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
		<?php echo $form->error($model,'tipo_venta_id'); ?>
            </div>            
        </div>
        
        <!--Movil o Fija-->
        <div class="form-group">
            <div class="col-xs-12 col-sm-4">
                <?php echo $form->labelEx($model,'tipo_venta'); ?>
            </div>
            <div class="col-xs-12 col-sm-8">
                <?php //echo $form->textField($model,'tipo_venta_id',array('class'=>'form-control')); ?>
                <?php
                $this->widget('ext.yii-selectize.YiiSelectize', array(
                    'name' => 'Ventas[tipo_venta]',
                    'value'=>$model->tipo_venta_id,
                    'id' => 'Ventas_tipo_venta',
                    'fullWidth' => true,
                    'placeholder' => '- Seleccione -',
                    'multiple' => false,                    
                    'data' => Ventas::getTipoVentas(),
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
		<?php echo $form->error($model,'tipo_venta'); ?>
            </div>            
        </div>
        
        <div class="form-group">
            <div class="col-xs-12 col-sm-4">
                 <?php echo $form->labelEx($model,'cliente_id'); ?>
            </div>
            
            <div class="col-xs-12 col-sm-8">
                <?php if ($model->isNewRecord): ?>
                    <?php //echo $form->textField($model, 'cliente_id', array('maxlength'=>100,'class' => 'form-control')); ?>
                    <?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array('name' => 'Ventas_cliente_id', 'id' => 'Ventas_cliente_id', 'sourceUrl' => $this->createUrl("ventas/busquedAjaxClientes"), 'options' => array('minLength' => '2', 'showAnim' => 'fold',), 'htmlOptions' => array('class' => 'form-control','placeholder'=>'Buscar cliente...'),)); ?>
                <?php else: ?>
                    <?php echo FormHelper::dropDownList($form, $model, 'cliente_id', Clientes::model()->findAll(), 'id', 'nombre') ?>
                <?php endif; ?>
                <?php echo $form->error($model,'cliente_id'); ?>
                
                <br />
                <?php if ($model->isNewRecord): ?>
                 <div class="btn-group" >
                    <i id="preloader"></i>
                    <?php echo CHtml::link('<i class="fa fa-search" aria-hidden="true"></i> Buscar', '', array('onclick' => 'buscarCliente()', 'class' => 'btn btn-info btn-square')); ?>                                             
                    <?php $this->widget('booster.widgets.TbButton', array('label' => 'Nuevo Cliente', 'context' => 'primary', 'htmlOptions' => array('class'=>'btn btn-info btn-square','data-toggle' => 'modal', 'data-target' => '#basicModal',),)); ?>
                </div> 
                <?php endif; ?> 
                <div id="datosClientes"> 
                    <table class="table table-striped table-hover table-responsive">
                        <tr>
                            <td><?php echo Yii::t('app','Nombre') ?></td>
                            <td><?php echo Yii::t('app','Apellido') ?></td>
                            <td><?php echo Yii::t('app','N° Identidad') ?></td>
                            <td><?php echo Yii::t('app','Teléfono') ?></td>
                            <td><?php echo Yii::t('app','Ver') ?></td>
                        </tr>
                        <tr>
                            <div id="errorCliente"></div>
                            <td><div id="nombre"></div></td>
                            <td><div id="apellido"></div></td>
                            <td><div id="numero_identidad"></div></td>
                            <td><div id="movil"></div></td> 
                            <td><div id="VerCliente"></div></td>
                            
                        </tr>
                       <input maxlength="100" class="form-control" value="" name="Ventas[cliente_id]" id="HiddenVentas_cliente_id" type="hidden">
                    </table>
                </div><!--Datos clientes--> 
            </div>            
        </div>       
       
        <div class="form-group">
            <div class="col-xs-12 col-sm-4">
                <?php echo $form->labelEx($model,'habeas_data'); ?>
            </div>
            <div class="col-xs-12 col-sm-8">
                <?php echo $form->dropDownList($model, 'habeas_data', Ventas::habeasSelect(),array('empty'=>'Seleccione...','class'=>'form-control')); ?>
		<?php echo $form->error($model,'habeas_data'); ?>
            </div>            
        </div>
        <br />
       
        <div class="form-group">
            <div class="col-xs-12 col-sm-4">
                <?php echo $form->labelEx($model,'fecha_venta'); ?>
            </div>
            <div class="col-xs-12 col-sm-8">
                <?php
                    $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                        'name'=>'Ventas[fecha_venta]',
                        'value'=>$model->fecha_venta,
                        'flat'=>false,//remove to hide the datepicker
                        'language' => 'es',
                        'options'=>array(                            
                            'dateFormat' => 'yy-mm-dd',
                            'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                            'changeMonth'=>true,
                            'changeYear'=>true,
                            'yearRange'=>'2000:2099',
                            'minDate' => '-5',      // Fecha manima
                            'maxDate' => 'now',      // Fecha maxima
                            
                        ),
                        'htmlOptions'=>array(
                             'class'=>'form-control',
                        ),
                    ));
                    ?>
		<?php echo $form->error($model,'fecha_venta'); ?>
            </div>            
        </div>
        <br />
       
        <div class="form-group">
            <div class="col-xs-12 col-sm-4">
                <?php echo $form->labelEx($model,'envio_factura_id'); ?>
            </div>
            <div class="col-xs-12 col-sm-8">
                 <?php
                $this->widget('ext.yii-selectize.YiiSelectize', array(
                    'name' => 'Ventas[envio_factura_id]',
                    'value'=>$model->envio_factura_id,
                    'id' => 'Ventas_envio_factura_id',
                    'fullWidth' => true,
                    'placeholder' => '- Seleccione -',
                    'multiple' => false,                    
                    'data' => Ventas::getEnvioFactura(),
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
		<?php echo $form->error($model,'envio_factura_id'); ?>
            </div>             
        </div>
        <br />
       
        
        <div class="form-group">
            <div class="col-xs-12 col-sm-4">
                <?php echo $form->labelEx($model,'activador_inicial'); ?>
            </div>
            <div class="col-xs-12 col-sm-8">
                <?php
                $this->widget('ext.yii-selectize.YiiSelectize', array(
                    'name' => 'Ventas[activador_inicial]',
                    'value'=>$model->activador_inicial,
                    'id' => 'Ventas_activador_inicial',
                    'fullWidth' => true,
                    'placeholder' => '- Seleccione -',
                    'multiple' => false,                    
                    'data' => Ventas::getUsuarios(),
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
		<?php echo $form->error($model,'activador_inicial'); ?>
            </div>            
        </div>
        <br />
        
         
        
    </section>    
        
    <br /> 
    <section id="<?php echo $VentaFija ?>">            
            
            <div class="panel panel-default">
                <div class="panel-body">                    
                    <h1><?php echo Yii::t('app','<i class="fa fa-mobile" aria-hidden="true"></i> Ventas Fija'); ?></h1>
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-xs-12 col-sm-4">                
                    <?php // echo $form->labelEx($modelVentasFijas, 'tipo_fija_id'); ?>
                </div>
                <div class="col-xs-12 col-sm-8">                               
                    <?php
//                    $this->widget('ext.yii-selectize.YiiSelectize', array(
//                        'name' => 'VentasFijas[tipo_fija_id]',
//                        'value' => $modelVentasFijas->tipo_fija_id,
//                        'id' => 'VentasFijas_tipo_fija_id',
//                        'fullWidth' => true,
//                        'placeholder' => '- Seleccione -',
//                        'multiple' => false,
//                        'data' => Ventas::getTipoDuoMigracionNuevo(),
//                        'useWithBootstrap' => true,
//                        'options' => array(
//                            'plugins' => ['remove_button'],
//                            'create' => false,
//                            'persist' => false,
//                            'valueField' => 'value',
//                            'labelField' => 'text',
//                            'searchField' => 'text',
//                        ),
//                        'htmlOptions' => array(
//                            'class' => 'form-control',
//                        ),
//                    ));
                    ?>   
                    <?php // echo $form->error($modelVentasFijas, 'tipo_fija_id'); ?>                   
                </div>            
            </div>
            <div class="form-group">
                <div class="col-xs-12 col-sm-4">                
                    <?php echo $form->labelEx($modelVentasFijas, 'barrio'); ?>
                </div>
                <div class="col-xs-12 col-sm-8">                               
                    <?php echo $this->widget('ext.counter.GTextfield',array('model'=>$modelVentasFijas,'attribute'=>'barrio','allowed' => 30,'htmlOptions' => array('class'=>'form-control'),),true); ?>
                    <?php echo $form->error($modelVentasFijas, 'barrio'); ?>                   
                </div>            
            </div>
            
            <div class="form-group">
                <div class="col-xs-12 col-sm-4">                
                    <?php echo $form->labelEx($modelVentasFijas, 'nombre_contacto'); ?>
                </div>
                <div class="col-xs-12 col-sm-8">                               
                    <?php echo $this->widget('ext.counter.GTextfield',array('model'=>$modelVentasFijas,'attribute'=>'nombre_contacto','allowed' => 30,'htmlOptions' => array('class'=>'form-control'),),true); ?>
                    <?php echo $form->error($modelVentasFijas, 'nombre_contacto'); ?>                   
                </div>            
            </div> 
            
            <div class="form-group">
                <div class="col-xs-12 col-sm-4">                
                    <?php echo $form->labelEx($modelVentasFijas, 'telefono_contacto'); ?>
                </div>
                <div class="col-xs-12 col-sm-8">                               
                    <?php $this->widget("ext.maskedInput.MaskedInput", array("model" => $modelVentasFijas,"attribute" => "telefono_contacto","mask" => '(99)999-999-9999',"clientOptions" => array("autoUnmask"=> true),"defaults"=>array("removeMaskOnSubmit"=>true),))  ?>
                    <?php echo $form->error($modelVentasFijas, 'telefono_contacto'); ?>                   
                </div>            
            </div> 
                        
            <div class="form-group">
                <div class="col-xs-12 col-sm-4">                
                    <?php  echo $form->labelEx($modelVentasFijas, 'estrato'); ?>
                </div>
                <div class="col-xs-12 col-sm-8">
                    <?php 
                    $radio = $this->beginWidget('zii.widgets.jui.CJuiButton', array(
                        'buttonType'=>'buttonset',
                        'name'=>'VentasFijas[estrato]',   
                        'value'=>$modelVentasFijas->estrato,
                        'htmlOptions'=>array('class'=>'')
                       
                    ));
                    ?>
                    <input type="radio" id="radio6" name="VentasFijas[estrato]" value="1" ><label for="radio6">1</label>
                    <input type="radio" id="radio7" name="VentasFijas[estrato]" value="2" ><label for="radio7">2</label>                   
                    <input type="radio" id="radio8" name="VentasFijas[estrato]" value="3" ><label for="radio8">3</label>                   
                    <input type="radio" id="radio9" name="VentasFijas[estrato]" value="4" ><label for="radio9">4</label>                   
                    <input type="radio" id="radio10" name="VentasFijas[estrato]" value="5" ><label for="radio10">5</label>                   
                    <input type="radio" id="radio11" name="VentasFijas[estrato]" value="6" ><label for="radio11">6</label>                   
                    <input type="radio" id="radio12" name="VentasFijas[estrato]" value="7" ><label for="radio12">N</label>                   
                    <?php echo $form->error($modelVentasFijas, 'estrato'); ?>
                    <?php $this->endWidget();?>
                </div>            
            </div>
            
            <div class="form-group">
                <div class="col-xs-12 col-sm-4">                
                    <?php // echo $form->labelEx($modelVentasFijas, 'fecha_tentativa'); ?>
                </div>
                <div class="col-xs-12 col-sm-8">                               
                     <?php
                     
//                     $this->widget('zii.widgets.jui.CJuiDatePicker',array(
//                        'name'=>'VentasFijas[fecha_tentativa]',
//                        'value'=>$modelVentasFijas->fecha_tentativa,
//                        'flat'=>false,//remove to hide the datepicker
//                        'language' => 'es',
//                        'options'=>array(                            
//                            'dateFormat' => 'yy-mm-dd',
//                            'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
//                            'changeMonth'=>true,
//                            'changeYear'=>true,
//                            'yearRange'=>'2000:2099',
//                            'minDate' => 'now',      // Fecha Actual
//                            'maxDate' => '2099-12-31',      // Fecha maxima
//                            
//                        ),
//                        'htmlOptions'=>array(
//                             'class'=>'form-control',
//                        ),
//                    ));
                    ?>
                    <?php // echo $form->error($modelVentasFijas, 'fecha_tentativa'); ?>                   
                </div>            
            </div> 
            
       
        </section>
        
        
        
        
    <section id="<?php echo $VentaMovile ?>">
            
            <div class="panel panel-default">
                <div class="panel-body">                    
                    <h1><?php echo Yii::t('app','<i class="fa fa-mobile" aria-hidden="true"></i> Movil'); ?></h1>
                </div>
            </div>
        
            <div class="form-group">
                <div class="col-xs-12 col-sm-4">                
                    <?php echo $form->labelEx($modelVentaMovile, 'tipo_alta'); ?>
                </div>
                <div class="col-xs-12 col-sm-8">
                    <?php
                        $radio = $this->beginWidget('zii.widgets.jui.CJuiButton', array(
                        'buttonType'=>'buttonset',
                        'name'=>'VentasMoviles[tipo_alta]',   
                        'value'=>$modelVentaMovile->tipo_alta,
                        'htmlOptions'=>array('class'=>'')
                       
                    )); ?>
                    <input type="radio" id="radio1" name="VentasMoviles[tipo_alta]" value="0" ><label for="radio1">Linea Nueva</label>
                    <input type="radio" id="radio2" name="VentasMoviles[tipo_alta]" value="1" ><label for="radio2">Portabilidad</label>                   
                    <input type="radio" id="radio3" name="VentasMoviles[tipo_alta]" value="2" ><label for="radio3">Repocision</label>                   
                    <?php echo $form->error($modelVentaMovile, 'tipo_alta'); ?>
                    <?php $this->endWidget();?>
                </div>            
            </div>
            
            <div class="form-group">
                <div class="col-xs-12 col-sm-4">                
                    <?php echo $form->labelEx($modelVentaMovile, 'origen_equipo'); ?>
                </div>
                <div class="col-xs-12 col-sm-8">
                    <?php $radio = $this->beginWidget('zii.widgets.jui.CJuiButton', array(
                        'buttonType'=>'buttonset',
                        'name'=>'VentasMoviles[origen_equipo]',                       
                        'value'=>$modelVentaMovile->origen_equipo,
                        'htmlOptions'=>array('class'=>'')
                    )); ?>
                    <input type="radio" id="radio4" name="VentasMoviles[origen_equipo]" value="0" /><label for="radio4">Traido</label>
                    <input type="radio" id="radio5" name="VentasMoviles[origen_equipo]" value="1" /><label for="radio5">Vendido</label>                   
                    <?php echo $form->error($modelVentaMovile, 'origen_equipo'); ?>
                    <?php $this->endWidget();?>
                </div>            
            </div>
            
            <div class="form-group">
                <div class="col-xs-12 col-sm-4">                
                    <?php echo $form->labelEx($modelVentaMovile, 'operador_donante'); ?>
                </div>
                <div class="col-xs-12 col-sm-8">
                    <?php
                        $this->widget('ext.yii-selectize.YiiSelectize', array(
                            'name' => 'VentasMoviles[operador_donante]',
                            'value'=>$modelVentaMovile->operador_donante,
                            'id' => 'VentasMoviles_operador_donante',
                            'fullWidth' => true,
                            'placeholder' => '- Seleccione -',
                            'multiple' => false,                    
                            'data' => Ventas::getOperador(),
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
                    <?php echo $form->error($modelVentaMovile, 'operador_donante'); ?>
                </div>            
            </div>
            
            
            
            <div class="form-group">
                <div class="col-xs-12 col-sm-4">                
                    <?php echo $form->labelEx($modelVentaMovile, 'equipo'); ?>
                </div>
                <div class="col-xs-12 col-sm-8">
                    <?php echo $this->widget('ext.counter.GTextfield',array('model'=>$modelVentaMovile,'attribute'=>'equipo','allowed' => 50,'htmlOptions' => array('placeholder'=>'Equipo','class'=>'form-control'),),true); ?>
                    <?php echo $form->error($modelVentaMovile, 'equipo'); ?>
                </div>            
            </div>          
            
            <div class="form-group">
                <div class="col-xs-12 col-sm-4">                
                    <?php echo $form->labelEx($modelVentaMovile, 'Imei'); ?>
                </div>
                <div class="col-xs-12 col-sm-8">                               
                    <?php echo $this->widget('ext.counter.GTextfield',array('model'=>$modelVentaMovile,'attribute'=>'Imei','allowed' => 25,'htmlOptions' => array('placeholder'=>'Marque: *#06#','class'=>'form-control'),),true); ?>
                    <?php echo $form->error($modelVentaMovile, 'Imei'); ?>                   
                </div>            
            </div> 
            
           
-            <div class="form-group">
                <div class="col-xs-12 col-sm-4">                
                    <?php echo $form->labelEx($modelVentaMovile, 'numero_asignado'); ?>
                </div>
                <div class="col-xs-12 col-sm-8">                    
                    <?php $this->widget("ext.maskedInput.MaskedInput", array("model" => $modelVentaMovile,"attribute" => "numero_asignado","mask" => '(999)999-99-99',"clientOptions" => array("autoUnmask"=> true),"defaults"=>array("removeMaskOnSubmit"=>true),))  ?>
                    <?php echo $form->error($modelVentaMovile, 'numero_asignado'); ?>
                </div>            
            </div>
          
            
            <div class="form-group">
                <div class="col-xs-12 col-sm-4">                
                    <?php echo $form->labelEx($modelVentaMovile, 'iccId'); ?>
                </div>
                <div class="col-xs-12 col-sm-8">
                     <?php
                        $this->widget('ext.yii-selectize.YiiSelectize', array(
                            'name' => 'VentasMoviles[iccId]',
                            'value'=>$modelVentaMovile->iccId,
                            'id' => 'VentasMoviles_iccId',
                            'fullWidth' => true,
                            'placeholder' => '- Seleccione -',
                            'multiple' => false,                    
                            'data' => CHtml::listData(Sims::model()->findAll('estado_id = 69 AND usuario_id = '.Yii::app()->user->id), 'id', 'ccid'),
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
                    <?php echo $form->error($modelVentaMovile, 'iccId'); ?>
                </div>            
            </div>

        <div class="form-group">
            <div class="col-xs-12 col-sm-4">
                <?php echo $form->labelEx($model, 'observaciones'); ?>
            </div>
            <div class="col-xs-12 col-sm-8">
                <?php echo $form->textField($model, 'observaciones', array('size' => 45, 'maxlength' => 50, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'observaciones'); ?>
            </div>            
        </div>
        <br />
        <hr>
        
        
        <?php if ($model->isNewRecord): ?>
            <div class="form-group">
                <a onclick="agregarEquipo_tempVentasCorporativa()" class="btn btn-default btn-square"><i class="fa fa-chevron-down" aria-hidden="true"></i> Agregar a la Venta</a>
                <div id="preloaderAgregarVentas"></div>
            </div>  
        <?php endif; ?>
        
        
        
        
        <div id="renderPartialTempVentas">
        <?php if ($model->isNewRecord): ?>
            <?php $model = new TempVentasMoviles(); ?>
            <?php echo $this->renderPartial('../tempVentasMoviles/admin',array('model'=>$model)); ?>
        <?php endif; ?>
        </div>
        
    </section>
    
    <div class="form-group">             
             <?php echo CHtml::link(Yii::app()->params['cancel-text'], Yii::app()->controller->createUrl('admin'), array('class' => Yii::app()->params['cancel-btn'])); ?>	
             <?php echo CHtml::submitButton('Guardar venta', array('class' => Yii::app()->params['save-btn'])); ?>	
    </div>
    
    </div><!---fin del form-->

<?php $this->endWidget(); ?>



 <!-- Basic Modal -->
    <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Nuevo Cliente</h4>
                </div>
                <div class="modal-body modal-scroll">
                      <?php $modelCliente = new Clientes; ?>                
                    <div class="form">
                 
                        <center>
                                 <div id="MensajeCliente"></div>                         
                        </center>
                        
                        <div class="form-group">
                            <div class="col-xs-12 col-sm-4">
                                <?php echo $form->labelEx($modelCliente, 'nombre'); ?>
                            </div>
                            <div class="col-xs-12 col-sm-8">
                                <?php echo $this->widget('ext.counter.GTextfield', array('model' => $modelCliente, 'attribute' => 'nombre', 'allowed' => 50, 'htmlOptions' => array('class' => 'form-control'),), true); ?>
                                <?php echo $form->error($modelCliente, 'nombre'); ?>
                            </div>            
                        </div>
                        
                        <div class="form-group">
                            <div class="col-xs-12 col-sm-4">
                                <?php echo $form->labelEx($modelCliente, 'segundo_nombre'); ?>
                            </div>
                            <div class="col-xs-12 col-sm-8">
                                <?php echo $this->widget('ext.counter.GTextfield', array('model' => $modelCliente, 'attribute' => 'segundo_nombre', 'allowed' => 50, 'htmlOptions' => array('class' => 'form-control'),), true); ?>
                                <?php echo $form->error($modelCliente, 'segundo_nombre'); ?>
                            </div>            
                        </div>
                        
                        <div class="form-group">
                            <div class="col-xs-12 col-sm-4">
                                <?php echo $form->labelEx($modelCliente, 'apellido'); ?>
                            </div>
                            <div class="col-xs-12 col-sm-8">
                                <?php echo $this->widget('ext.counter.GTextfield', array('model' => $modelCliente, 'attribute' => 'apellido', 'allowed' => 50, 'htmlOptions' => array('class' => 'form-control'),), true); ?>
                                <?php echo $form->error($modelCliente, 'apellido'); ?>
                            </div>            
                        </div>
                        
                        <div class="form-group">
                            <div class="col-xs-12 col-sm-4">
                                <?php echo $form->labelEx($modelCliente, 'segundo_apellido'); ?>
                            </div>
                            <div class="col-xs-12 col-sm-8">
                                <?php echo $this->widget('ext.counter.GTextfield', array('model' => $modelCliente, 'attribute' => 'segundo_apellido', 'allowed' => 50, 'htmlOptions' => array('class' => 'form-control'),), true); ?>
                                <?php echo $form->error($modelCliente, 'segundo_apellido'); ?>
                            </div>            
                        </div>
                        
                        <div class="form-group">
                            <div class="col-xs-12 col-sm-4">
                                <?php echo $form->labelEx($modelCliente, 'fecha_expedicion'); ?>
                            </div>
                            <div class="col-xs-12 col-sm-8">       
                                <?php
                                $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                    'name'=>'Clientes[fecha_expedicion]',
                                    'value'=>$modelCliente->fecha_expedicion,
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
                                <?php echo $form->error($modelCliente, 'fecha_expedicion'); ?>
                            </div>            
                        </div>
                        
                        <div class="form-group">
                            <div class="col-xs-12 col-sm-4">
                                <?php echo $form->labelEx($modelCliente,'fijo'); ?>
                            </div>
                            <div class="col-xs-12 col-sm-8">
                                <?php $this->widget("ext.maskedInput.MaskedInput", array("model" => $modelCliente,"attribute" => "fijo","mask" => '(99)999-99-99',"clientOptions" => array("autoUnmask"=> true),"defaults"=>array("removeMaskOnSubmit"=>true),))  ?>
                                <?php echo $form->error($modelCliente,'fijo'); ?>
                            </div>            
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12 col-sm-4">
                                <?php echo $form->labelEx($modelCliente,'movil'); ?>
                            </div>
                            <div class="col-xs-12 col-sm-8">
                                <?php $this->widget("ext.maskedInput.MaskedInput", array("model" => $modelCliente,"attribute" => "movil","mask" => '(999)999-99-99',"clientOptions" => array("autoUnmask"=> true),"defaults"=>array("removeMaskOnSubmit"=>true),))  ?>
                                <?php echo $form->error($modelCliente,'movil'); ?>
                            </div>             
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12 col-sm-4">
                                <?php echo $form->labelEx($modelCliente,'direccion'); ?>
                            </div>
                            <div class="col-xs-12 col-sm-8">
                                <?php echo $this->widget('ext.counter.GTextfield',array('model'=>$modelCliente,'attribute'=>'direccion','allowed' =>30,'htmlOptions' => array('class'=>'form-control'),),true); ?>
                                <?php echo $form->error($modelCliente,'direccion'); ?>
                            </div>            
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12 col-sm-4">
                                <?php echo $form->labelEx($modelCliente,'email'); ?>
                            </div>
                            <div class="col-xs-12 col-sm-8">
                                <?php echo $this->widget('ext.counter.GTextfield',array('model'=>$modelCliente,'attribute'=>'email','allowed' =>50,'htmlOptions' => array('class'=>'form-control'),),true); ?>
                                <?php echo $form->error($modelCliente,'email'); ?>
                            </div>              
                        </div>

                        <div class="form-group">
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

                        <div class="form-group">
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
                                        'yearRange'=>'2000:2099',
                                        'minDate' => '1898-01-01',      // Fecha manima
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

                        <div class="form-group">
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
                        
                        
                        
                        <div class="form-group">
                                <div class="col-xs-12 col-sm-4">
                                    <?php echo $form->labelEx($modelCliente, 'numero_identidad'); ?>
                                </div>
                                <div class="col-xs-12 col-sm-8">
                                    <?php echo $form->textField($modelCliente, 'numero_identidad', array('size' => 20, 'maxlength' => 20, 'class' => 'form-control')); ?>
                                    <?php echo $form->error($modelCliente, 'numero_identidad'); ?>
                                </div>            
                        </div>
                        
                        <div id="preloaderGuardarCliente"></div>
                       
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div style="margin-right: 40px" class="btn-group pull-right">                            
                                    <button type="button" class="btn btn-info btn-square" data-dismiss="modal">Cerrar</button>
                                    <a class="btn btn-info btn-square" onclick="GuardarCliente()">Guardar Cliente</a>
                                </div>  
                            </div>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
        
    </div>
    <!-- End Basic Modal -->


<script src="<?php echo Yii::app()->request->baseUrl ?>/js/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    
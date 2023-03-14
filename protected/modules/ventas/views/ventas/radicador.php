<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#ventas-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

?>
<section id="ventas-grid2">
<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-primary">
            <div class="panel-heading">                         
                 <h3 class="panel-title"><?php echo Yii::t('app', '<i class="fa fa-cogs"></i> Administrador de ventas para radicadores'); ?></h3> 
            </div>
            
            <div id="busqueda">
                 
                        <div>
                            <?php $this->renderPartial('_search', array('model' => $model,));  ?>
                        </div><!-- search-form -->
                        
                        <?php //if (Yii::app()->authRBAC->checkAccess('ventas_create')): ?>
                        <center>
                                <?php echo CHtml::link(Yii::app()->params['iconoNuevo'].Yii::t('app','Nueva Venta'), array('ventas/create'), array('class' => 'btn btn-info btn-square')); ?>  
                                <?php echo CHtml::link(Yii::app()->params['iconoGraficos'].Yii::t('app','Mostrar Gráficos'), array('ventas/graficos'), array('class' => 'btn btn-info btn-square')); ?>  
                                <?php echo CHtml::link(Yii::app()->params['generar'].'Generar','',array('onclick'=>'generar()','class'=>'btn btn-info btn-square')); ?>
                                <label id="randon"></label>
                                <span id="mensaje"></span>
                                <span id="preloader"></span>            
                        </center>                       
                        
                        <div class="row">                                                       
                            <div class="col-md-2 col-md-offset-4">                                    
                                <input type="text" id="numeroRadicacion" placeholder="numero radicacion"  class="form-control">                                                               
                            </div>
                            <div class="col-md-2">
                                <?php echo CHtml::link(Yii::app()->params['generar'] . 'Radicar', '', array('onclick' => 'cambiarNumeroRadicacion()', 'class' => 'btn btn-info btn-square')); ?>
                            </div>
                        </div>                           
                        <?php //endif; ?>                                                 
                </div>
            
            <div class="panel-body">
                <div class="table-responsive">      
                    <div id="altoanchopantalla">
                    <div>                    
                    <?php
                        $this->widget('zii.widgets.grid.CGridView', array(
                            'id' => 'ventas-grid',
                            'itemsCssClass' => 'table table-striped table-hover table-responsive scroll',
                            'dataProvider' => $model->radicador(),                            
                            'selectableRows'=>2,
                            'filter' => $model,
                            'columns' => array(
                                 array('id'=>'selectedItems','class'=>'CCheckBoxColumn'),
                                
                                 array(                  
                                        'class' => 'booster.widgets.TbEditableColumn',
                                        'name' => 'numero_radicacion',                                      
                                        'id'=>'numero_radicacion',
                                        'type'=>'html',                                       
                                        'value' => '$data->numero_radicacion',
                                        'editable' => array(
                                            'url' => $this->createUrl('actualizaRadicacion'),
                                            'placement' => 'right',
                                            'inputclass' => 'span2'
                                        )
                                ),
                                'id',
                                array('name' => 'creado', 'header' => 'Fecha Ingreso', 'type' => 'raw', 'value' => 'date("d/m/y h:i A", strtotime($data->creado))', 'htmlOptions' => array('class' => 'width_fecha_ingreso')),
                                array('name'=>'operador_id','type' => 'text','value' => '$data->operador->tipo','filter'=> Ventas::getOperador()),
                                array('name'=>'observaciones','type' => 'text','value' => '$data->observaciones'),
                                array(                  
                                        'class' => 'booster.widgets.TbEditableColumn',
                                        'name' => 'tipo_alta',
                                        'id'=>'tipo_alta',
                                        'type'=>'raw',                                     
                                        'value' => 'Ventas::getTipoAltaNombre($data->getTipoAlta())',
                                        'filter'=>Ventas::getTipoAltaSelect(),                                      
                                        'editable' => array(
                                            'type' => 'select',
                                            'source' =>Ventas::getTipoAltaSelect(),
                                            'url' => $this->createUrl('Actualizatipoalta'),
                                            'placement' => 'left',
                                            'inputclass' => 'span3'
                                        )
                                ),
                                /*cliente*/
                                array('name'=>'numero_identidad','header'=>'Cédula identidad Cliente','type'=>'raw','value'=>'CHtml::link($data->cliente->numero_identidad, array("../clientes/clientes/view/id/".$data->cliente->id),array("target"=>"_blank"))'),                                                                                                                                
                                
                                array(                  
                                        'class' => 'booster.widgets.TbEditableColumn',
                                        'name' => 'nombre_cliente',
                                        'header'=>'Primer nombre cliente',                                    
                                        'type'=>'text',                                  
                                        'value' => '$data->cliente->nombre',                                        
                                        'editable' => array(
                                            'type' => 'text',                                           
                                            'url' => $this->createUrl('Actualizanombrecliente'),
                                            'placement' => 'left',
                                            'inputclass' => 'span3'
                                        )
                                ),
                              
                                array(                  
                                        'class' => 'booster.widgets.TbEditableColumn',
                                        'name' => 'segundo_nombre_cliente',
                                        'header'=>'Segundo nombre Cliente',
                                        'id'=>'segundo_nombre_cliente',
                                        'type'=>'text',                                  
                                        'value' => '$data->cliente->segundo_nombre',                                        
                                        'editable' => array(
                                            'type' => 'text',                                           
                                            'url' => $this->createUrl('Actualizasegundonombrecliente'),
                                            'placement' => 'left',
                                            'inputclass' => 'span3'
                                        )
                                ),
                                
                                array(                  
                                        'class' => 'booster.widgets.TbEditableColumn',
                                        'name' => 'apellido_cliente',
                                        'header'=>'Primer Apellido cliente',
                                        'id'=>'segundo_nombre_cliente',
                                        'type'=>'text',                                  
                                        'value' => '$data->cliente->apellido',                                        
                                        'editable' => array(
                                            'type' => 'text',                                           
                                            'url' => $this->createUrl('Actualizaapellidocliente'),
                                            'placement' => 'left',
                                            'inputclass' => 'span3'
                                        )
                                ),                                       
                                
                                array(                  
                                        'class' => 'booster.widgets.TbEditableColumn',
                                        'name' => 'segundo_apellido_cliente',
                                        'header'=>'Segundo Apellido Cliente',
                                        'id'=>'segundo_apellido_cliente',
                                        'type'=>'text',                                  
                                        'value' => '$data->cliente->segundo_apellido',                                        
                                        'editable' => array(
                                            'type' => 'text',                                           
                                            'url' => $this->createUrl('Actualizasegundoapellidocliente'),
                                            'placement' => 'left',
                                            'inputclass' => 'span3'
                                        )
                                ),
                                
                              
                                
                                
                                array('name'=>'fecha_nacimiento_cliente','header'=>'Fecha Nacimiento Cliente','type'=>'raw','value'=>'Yii::app()->dateFormatter->format("d/M/y",$data->cliente->fecha_nacimiento)'),                                                                                                                                                                
                                
//                              array('name'=>'fecha_expedicion_cliente','header'=>'Fecha Expedición Cliente','type'=>'raw','value'=>'Yii::app()->dateFormatter->format("d/M/y",$data->cliente->fecha_expedicion)'),                                                                                                                                
                                
                                array(
                                        'class' => 'booster.widgets.TbEditableColumn',
                                        'name' => 'fecha_expedicion_cliente',         
                                        'header'=>'Fecha Expedicion',
                                        'value' => '$data->cliente->fecha_expedicion',                                        
                                        'editable' => array(
                                            'type' => 'date',
                                            'url' => $this->createUrl('Actualizarfechaexpedicioncliente'),
                                            'placement' => 'left',
                                            'format' => 'yyyy-mm-dd',
                                            'viewformat' => 'yyyy-mm-dd',
                                            'options' => array(                                                                                           
                                                'datepicker' => array(
                                                    'language' => 'es',
                                                ),
                                            ),
                                        ),
                                ),    
                                
                                array('name'=>'telefono_fijo_cliente','header'=>'Teléfono Fijo Cliente','type'=>'raw','value'=>'$data->cliente->fijo'),                                                                
                                array('name'=>'telefono_movil_cliente','header'=>'Teléfono movil Cliente','type'=>'raw','value'=>'$data->cliente->movil'),                                                                
                                array(                  
                                        'class' => 'booster.widgets.TbEditableColumn',
                                        'name' => 'correo_cliente',
                                        'header'=>'Correo Cliente',
                                        'id'=>'correo_cliente',
                                        'type'=>'text',                                  
                                        'value' => '$data->cliente->email',                                        
                                        'editable' => array(
                                            'type' => 'text',                                           
                                            'url' => $this->createUrl('Actualizaemailcliente'),
                                            'placement' => 'left',
                                            'inputclass' => 'span3'
                                        )
                                ),  
                                          
                                 array(                  
                                        'class' => 'booster.widgets.TbEditableColumn',
                                        'name' => 'direccion_cliente',
                                        'header'=>'Dirección Cliente',                                        
                                        'type'=>'text',                                  
                                        'value' => '$data->cliente->direccion',                                        
                                        'editable' => array(
                                            'type' => 'text',                                           
                                            'url' => $this->createUrl('Actualizadireccioncliente'),
                                            'placement' => 'left',
                                            'inputclass' => 'span3'
                                        )
                                ),         
                                
                                
                                array('name'=>'barrio','type'=>'raw','value'=>'$data->getBarrio()',),
                                
                                
                                array('name'=>'estrato','type'=>'raw','value'=>'$data->getEstrato()',),
                                
                                array(
                                        'class' => 'booster.widgets.TbEditableColumn',
                                        'name' => 'operador_donante',
                                        'id' => 'operador_donante',
                                        'type' => 'html',
                                        'value' => 'Ventas::getOperadorDonanteNombre($data->getOperadorDonante())',
                                        'filter' => Ventas::getOperadorAdministradorFiltro(),
                                        'editable' => array(
                                            'type' => 'select',
                                            'source' => Ventas::getOperadorAdministradorFiltro(),
                                            'url' => $this->createUrl('Actualizaoperadordonante'),
                                            'placement' => 'left',
                                            'inputclass' => 'span3'
                                        )
                                    ),
                                
                                
                                array(                  
                                        'class' => 'booster.widgets.TbEditableColumn',
                                        'name' => 'numero_asignado',
                                        'id'=>'numero_asignado',
                                        'type'=>'html',                                   
                                        'value' => '$data->numero_asignado',                                        
                                        'editable' => array(
                                            'type' => 'text',                                           
                                            'url' => $this->createUrl('actualizanumeroasignado'),
                                            'placement' => 'left',
                                            'inputclass' => 'span3'
                                        )
                                ),

                                array(                  
                                        'class' => 'booster.widgets.TbEditableColumn',
                                        'name' => 'plan_id',
                                        'id'=>'plan_id',
                                        'type'=>'html',                                   
                                        'value' => '@$data->plan->nombre',
                                        'filter'=>Ventas::getPlanes(),                                      
                                        'editable' => array(
                                            'type' => 'select2',
                                            'source' =>Ventas::model()->getPlanes(),
                                            'url' => $this->createUrl('actualizaplanes'),
                                            'placement' => 'left',
                                            'inputclass' => 'span3'
                                        )
                                ),
                                
                                
                                array('name'=>'plan_valor','header'=>'Valor Plan','type'=>'text','value'=>'@$data->plan->valor'),
                                array('name'=>'origen_equipo','type'=>'raw','value'=>'Ventas::getEquipoOrigenNombre($data->getEquipoOrigen2())',),
                                array('name'=>'equipo','header'=>'Modelo','type'=>'raw','value'=>'$data->getEquipo()',),
                                                      
                                array(                  
                                        'class' => 'booster.widgets.TbEditableColumn',
                                        'name' => 'imei',
                                        'id'=>'imei',
                                        'type'=>'raw',                                  
                                        'value' => '$data->getImei()',                                        
                                        'editable' => array(
                                            'type' => 'text',                                           
                                            'url' => $this->createUrl('actualizaimei'),
                                            'placement' => 'left',
                                            'inputclass' => 'span3'
                                        )
                                ),
                                
                                 array(                  
                                        'class' => 'booster.widgets.TbEditableColumn',
                                        'name' => 'iccid',
                                        'id'=>'iccid',                                                                     
                                        'value' => '$data->geticcId()',                                        
                                        'editable' => array(
                                            'type' => 'text',                                           
                                            'url' => $this->createUrl('actualizaiccid'),
                                            'placement' => 'left',
                                            'inputclass' => 'span3'
                                        )
                                ),
                                
                                
                                array(
                                        'class' => 'booster.widgets.TbEditableColumn',
                                        'name' => 'fecha_activacion',         
                                        'value' => '$data->fecha_activacion',                                        
                                        'editable' => array(
                                            'type' => 'date',
                                            'url' => $this->createUrl('cambiarEstdosPorFechas'),
                                            'placement' => 'left',
                                            'format' => 'yyyy-mm-dd',
                                            'viewformat' => 'yyyy-mm-dd',
                                            'options' => array(                                                                                           
                                                'datepicker' => array(
//                                                  'startDate'=>$nuevafecha,
                                                    'endDate'=>'NOW()',
                                                    'weekStart'=>'1',
                                                    'startView'=>'1',
                                                    'maxViewMode'=>'0',
                                                    'todayBtn'=>true,
                                                    'language' => 'es',  
                                                ),
                                            ),
                                        ),
                                ),    
                                        

                                array(
                                        'class' => 'booster.widgets.TbEditableColumn',
                                        'name' => 'fecha_legalizacion',
                                        'value' => '$data->fecha_legalizacion',                                     
                                        'editable' => array(                                          
                                            'type' => 'date',
                                            'url' => $this->createUrl('cambiarEstdosPorFechas'),
                                            'placement' => 'left',
                                            'format' => 'yyyy-mm-dd',
                                            'viewformat' => 'yyyy-mm-dd',
                                            'options' => array(                                                
                                                'datepicker' => array(
//                                                    'startDate'=>$nuevafecha,
                                                    'endDate'=>'NOW()',
                                                    'weekStart'=>'1',
                                                    'startView'=>'1',
                                                    'maxViewMode'=>'0',
                                                    'todayBtn'=>true,
                                                    'language' => 'es',  
                                                ),
                                            ),
                                        ),
                                    ),

                                
                                array('name'=>'radicador_id','type'=>'raw','value'=>'@$data->radicador->persona->nombre." ".@$data->radicador->persona->segundo_nombre." ".@$data->radicador->persona->apellido'),                                 
                                array('name'=>'activador_inicial','type'=>'text','value'=>'$data->activadorInicial->persona->nombre'),                                                              
                                array('name'=>'activador_final','type'=>'text','value'=>'@$data->activadorFinal->persona->nombre." ".@$data->activadorFinal->persona->segundo_nombre'),                                                              

                                
                                array(                  
                                        'class' => 'booster.widgets.TbEditableColumn',
                                        'name' => 'estado_id',
                                        'id'=>'estado_id',
                                        'type'=>'html',                                     
                                        'value' => 'Ventas::EstadoLabel($data->estado->tipo)',
                                        'filter'=>Ventas::getEstados(),                                      
                                        'editable' => array(
                                            'type' => 'select2',
                                            'source' =>Ventas::model()->getEstados(),
                                            'url' => $this->createUrl('actualiza'),
                                            'placement' => 'left',
                                            'inputclass' => 'span3',                                            
                                        )
                                ),
                                
                                array('name'=>'tipo_venta','type'=>'text','value'=>'$data->tipoVenta->tipo','filter'=> Ventas::getTipoVentas()),                                                              
                                
                                array(                  
                                        'class' => 'booster.widgets.TbEditableColumn',
                                        'name' => 'plataforma_id',
                                        'id'=>'plataforma_id',
                                        'type'=>'html',                                   
                                        'value' => 'Ventas::getPlataformaVentasNombre($data->plataforma_id)',
                                        'filter'=>Ventas::getPlataformaVentas(),                                       
                                        'editable' => array(
                                            'type' => 'select',
                                            'source' =>Ventas::model()->getPlataformaVentas(),
                                            'url' => $this->createUrl('actualizaplataformaventas'),
                                            'placement' => 'left',
                                            'inputclass' => 'span3'
                                        )
                                ),
                              
                                array(                  
                                        'class' => 'booster.widgets.TbEditableColumn',
                                        'name' => 'pedido_factura',
                                        'id'=>'pedido_factura',
                                        'type'=>'html',                                    
                                        'value' => '$data->pedido_factura',                                        
                                        'editable' => array(
                                            'type' => 'text',                                           
                                            'url' => $this->createUrl('actualizapedidofactura'),
                                            'placement' => 'left',
                                            'inputclass' => 'span3'
                                        )
                                ),
                                
                             
                                 array(                  
                                        'class' => 'booster.widgets.TbEditableColumn',
                                        'name' => 'pedido_root',
                                        'id'=>'pedido_root',                                     
                                        'value' => '$data->pedido_root',                                        
                                        'editable' => array(
                                            'type' => 'text',                                           
                                            'url' => $this->createUrl('actualizapedidoroot'),
                                            'placement' => 'left',
                                            'inputclass' => 'span3'
                                        )
                                ),
                              
                                array(                  
                                        'class' => 'booster.widgets.TbEditableColumn',
                                        'name' => 'cun_oportunidad',
                                        'id'=>'cun_oportunidad',
                                        'type'=>'html',                                      
                                        'value' => '$data->cun_oportunidad',                                        
                                        'editable' => array(
                                            'type' => 'text',                                           
                                            'url' => $this->createUrl('actualizacunoportunidad'),
                                            'placement' => 'left',
                                            'inputclass' => 'span3'
                                        )
                                ),
                                
                                array('name'=>'contrato','type'=>'text','value'=>'$data->contrato'),                                                          
                                
                                array(                  
                                        'class' => 'booster.widgets.TbEditableColumn',
                                        'name' => 'primer_nombre_vendedor',  
                                        'header'=>'Primer Nombre Vendedor',
                                        'id'=>'primer_nombre_vendedor',
                                        'type'=>'html',                                      
                                        'value' => '$data->vendedor->persona->nombre',                                        
                                        'editable' => array(
                                            'type' => 'text',                                           
                                            'url' => $this->createUrl('Actualizanombrevendedor'),
                                            'placement' => 'left',
                                            'inputclass' => 'span3'
                                        )
                                ),
                               
                                array(                  
                                        'class' => 'booster.widgets.TbEditableColumn',
                                        'name' => 'segundo_nombre_vendedor',  
                                        'header'=>'Segundo Nombre Vendedor',
                                        'id'=>'segundo_nombre_vendedor',
                                        'type'=>'html',                                      
                                        'value' => '$data->vendedor->persona->segundo_nombre',                                        
                                        'editable' => array(
                                            'type' => 'text',                                           
                                            'url' => $this->createUrl('Actualizasegundonombrevendedor'),
                                            'placement' => 'left',
                                            'inputclass' => 'span3'
                                        )
                                ),
                                
                                //array('name'=>'cedula_identidad_vendedor','header'=>'Cédula Vendedor','type'=>'raw','value'=>'$data->vendedor->persona->cedula_identidad'),
                                
                                array('name'=>'cedula_identidad_vendedor','header'=>'Cédula Vendedor','type'=>'raw','value'=>'CHtml::link($data->cliente->numero_identidad, array("../seguridad/users/view/id/".$data->vendedor->persona->id),array("target"=>"_blank"))'),
                                
                                
                                
                                
                                array('name'=>'vendedor_id','header'=>'Coordinador','type'=>'raw','value'=>'$data->vendedor->coordinador_id'),
                                array('name'=>'habeas_data','type'=>'raw','value'=>'Ventas::habea($data->habeas_data)'),
                               
                                array(                  
                                        'class' => 'booster.widgets.TbEditableColumn',
                                        'name' => 'documento_id',
                                        'id'=>'documento_id',
                                        'type'=>'html',                                       
                                        'value' => 'Ventas::getDocumentoID(@$data->documento_id)',
                                        'filter'=>Ventas::getDocumentoVentas(),                                        
                                        'editable' => array(
                                            'type' => 'select',
                                            'source' =>Ventas::model()->getDocumentoVentas(),
                                            'url' => $this->createUrl('actualizadocumentoid'),
                                            'placement' => 'left',
                                            'inputclass' => 'span3'
                                        )
                                ),
                                
                               array('name'=>'cliente_id','header'=>'Tipo Cliente','type'=>'raw','value'=>'@$data->cliente->tipoCliente->tipo'),                                
                                
                               array(                  
                                        'class' => 'booster.widgets.TbEditableColumn',
                                        'sortable' => true,   
                                        'name' => 'observacion_activacion',
                                        'id'=>'observacion_activacion',
                                        'type'=>'html',                                        
                                        'value' => '$data->observacion_activacion',    
                                        'htmlOptions'=>array('class'=>'width-observacion'),
                                        'editable' => array(
                                            'type' => 'text',                                           
                                            'url' => $this->createUrl('actualizaObservacionActivacion'),
                                            'placement' => 'left',
                                            'inputclass' => 'span3'
                                        )
                                ),
                               
                            ),
                        ));
                        ?>                   
                </div>                   
            </div>
            </div>
        </div>
    </div>
</div>
</section>
<script>
    
  
 function generar(){   
     
     $.ajax({
          dataType: "html",
          url: 'generarrandon',
          type: 'POST',
          cache: false,         
          
          beforeSend: function () {
            $("#preloader").html("<i class='fa fa-spinner fa-pulse fa-2x fa-fw'></i>");
           },
          complete: function () {
            $("#preloader").html("");
          },
          error: function(e){
             $('#mensaje').html('Error al agregar, Intente mas tarde');
          },
          success: function(resp){           
          
          var respuesta = eval('(' + resp + ')');                   
                  
                      if(respuesta.ok === true){                     
                        $('#randon').html(respuesta.randon);                           

                   }else{

                        $('#randon').html(respuesta.randon);       
                   }
            }         
       });
     
 }
 
 
 function cambiarNumeroRadicacion(){
        
       var numero_radicacion = $('#numeroRadicacion').val();     
        
       var checkboxValues = new Array();        
        $('input[name="selectedItems[]"]:checked').each(function() {
                checkboxValues.push($(this).val());
        });
        JSONumeroRadicador = JSON.stringify(checkboxValues);        
        
        $.ajax({
            
            url: 'cambiarNumerosRadicador',
            data: 'JSONumeroRadicador='+JSONumeroRadicador+'&numero_radicacion='+numero_radicacion,  
            type: 'POST',         
            dataType: "html",
            beforeSend: function () {
                $("#preloader").html("<i class='fa fa-spinner fa-pulse fa-2x fa-fw'></i>");
            },
                    
            complete: function () {
                $("#preloader").html("");
            },
            error: function () {
                 $('#mensaje').html('Error al cambiar, Intente mas tarde');
            },
            success: function (rs) {
                
                var respuesta = eval('(' + rs + ')');
                if(respuesta.ok == true){
                      location.reload();
                      $('#mensaje').html('Se han realizado los cambios');
                }else {
                        $('#mensaje').html('No se puedo realizar el cambio');
                      }
                  
             }

        });  
 }
</script>
<link href="<?php echo Yii::app()->request->baseUrl ?>/css/datapiker.min.css" rel="stylesheet" type="text/css"/>
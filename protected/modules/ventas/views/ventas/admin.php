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
                    <h3 class="panel-title"><?php echo Yii::t('app', '<i class="fa fa-cogs"></i> Administrador de ventas'); ?></h3>                 
                </div>
                
                <div class="col-md-12">
                     <?php echo CHtml::link('<i class="fa fa-angle-double-down"></i> Busqueda Avanzada', '#', array('class' => 'search-button')); ?>
                    <div class="search-form" style="display:none">
                        <?php $this->renderPartial('_search', array('model' => $model)); ?>
                    </div><!-- search-form -->
                </div>
                   

                <div id="busqueda">
                        <?php if (Yii::app()->authRBAC->checkAccess('ventas_create')): ?>
                            <center>
                                <?php echo CHtml::link(Yii::t('app', '<i class="fa fa-upload"></i> Carga Masiva'), array('ventas/cargamasiva'), array('class' => 'btn btn-info btn-square')); ?>  
                                <?php echo CHtml::link(Yii::app()->params['iconoNuevo'] . Yii::t('app', 'Nueva Venta'), array('ventas/create'), array('class' => 'btn btn-info btn-square')); ?>                                  
                                <?php echo CHtml::link(Yii::app()->params['iconoComision'] . Yii::t('app', 'Comision'), array('/comisiones/comisionesVendedores/comision'), array('class' => 'btn btn-info btn-square')); ?>  
                            </center>                        
                        <?php endif; ?>                                                 
                </div>
                
                <div class="panel-body">
                    <div class="table-responsive">      
                        <div id="altoanchopantalla">
                            <?php                         
                            $this->widget('zii.widgets.grid.CGridView', array(
                                'id' => 'ventas-grid',
                                'itemsCssClass' => 'table table-striped table-hover table-responsive',
                                'dataProvider' => $model->search(),
                                'filter' => $model,                             
                                'columns' => array(
                                    /* venta */
                                    'id',
                                    array('name' => 'creado', 'header' => 'Fecha Ingreso', 'type' => 'raw', 'value' => 'date("d/m/y h:i A", strtotime($data->creado))', 'htmlOptions' => array('class' => 'width_fecha_ingreso')),
                                    array('name' => 'operador_id', 'type' => 'text', 'value' => '$data->operador->tipo', 'filter' => Ventas::getOperador()),
                                    array('name' => 'observaciones', 'type' => 'text', 'value' => '$data->observaciones'),
                                    array(
                                        'class' => 'booster.widgets.TbEditableColumn',
                                        'name' => 'tipo_alta',
                                        'id' => 'tipo_alta',
                                        'type' => 'raw',
                                        'value' => 'Ventas::getTipoAltaNombre($data->getTipoAlta())',
                                        'filter' => Ventas::getTipoAltaSelect(),
                                        'editable' => array(
                                            'type' => 'select',
                                            'source' => Ventas::getTipoAltaSelect(),
                                            'url' => $this->createUrl('Actualizatipoalta'),
                                            'placement' => 'left',
                                            'inputclass' => 'span3'
                                        )
                                    ),
                                    /* cliente */
                                    array('name' => 'numero_identidad', 'header' => 'Cédula identidad Cliente', 'type' => 'raw', 'value' => 'CHtml::link($data->cliente->numero_identidad, array("../clientes/clientes/view/id/".$data->cliente->id),array("target"=>"_blank"))'),
                                    array('name' => 'nombre_cliente', 'header' => 'Primer Nombre Cliente', 'type' => 'raw', 'value' => '$data->cliente->nombre'),
                                    array('name' => 'segundo_nombre_cliente', 'header' => 'Segundo Nombre Cliente', 'type' => 'raw', 'value' => '$data->cliente->segundo_nombre'),
                                    array('name' => 'apellido_cliente', 'header' => 'Primer Apellido Cliente', 'type' => 'raw', 'value' => '$data->cliente->apellido'),
                                    array('name' => 'segundo_apellido_cliente', 'header' => 'Segundo Apellido Cliente', 'type' => 'raw', 'value' => '$data->cliente->segundo_apellido'),
                                    array('name' => 'fecha_expedicion_cliente', 'header' => 'Fecha Expedición Cliente', 'type' => 'raw', 'value' => 'Yii::app()->dateFormatter->format("d/M/y",$data->cliente->fecha_expedicion)'),
                                    array('name' => 'fecha_nacimiento_cliente', 'header' => 'Fecha Nacimiento Cliente', 'type' => 'raw', 'value' => 'Yii::app()->dateFormatter->format("d/M/y",$data->cliente->fecha_nacimiento)'),
                                    array('name' => 'telefono_fijo_cliente', 'header' => 'Teléfono Fijo Cliente', 'type' => 'raw', 'value' => '$data->cliente->fijo'),
                                    array('name' => 'telefono_movil_cliente', 'header' => 'Teléfono movil Cliente', 'type' => 'raw', 'value' => '$data->cliente->movil'),
                                    array('name' => 'correo_cliente', 'header' => 'Correo Cliente', 'type' => 'raw', 'value' => '$data->cliente->email'),
                                    array('name' => 'direccion_cliente', 'header' => 'Dirección Cliente', 'type' => 'raw', 'value' => '$data->cliente->direccion'),
                                    array('name' => 'direccion_instalacion', 'type' => 'raw', 'value' => '@$data->ventasFijases->direccion_instalacion'),
                                    array('name' => 'barrio', 'type' => 'text', 'value' => '$data->getBarrio()',),
                                    array('name' => 'estrato', 'type' => 'raw', 'value' => '$data->getEstrato()',),
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
                                        'id' => 'numero_asignado',
                                        'type' => 'html',
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
                                        'id' => 'plan_id',
                                        'type' => 'text',
                                        'value' => '@$data->plan->nombre',
                                        'filter' => Ventas::getPlanes(),
                                        'editable' => array(
                                            'type' => 'select2',
                                            'source' => Ventas::model()->getPlanes(),
                                            'url' => $this->createUrl('actualizaplanes'),
                                            'placement' => 'left',
                                            'inputclass' => 'span3'
                                        )
                                    ),
                                    array('name' => 'plan_valor', 'header' => 'Valor Plan', 'type' => 'text', 'value' => '@$data->plan->valor'),
                                    array('name' => 'origen_equipo', 'type' => 'raw', 'value' => 'Ventas::getEquipoOrigenNombre($data->getEquipoOrigen2())',),
                                    array('name' => 'equipo', 'header' => 'Modelo', 'type' => 'raw', 'value' => '$data->getEquipo()',),
                                    array(
                                        'class' => 'booster.widgets.TbEditableColumn',
                                        'name' => 'imei',
                                        'id' => 'imei',
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
                                        'id' => 'iccid',
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
                                        'value' => 'Yii::app()->dateFormatter->format("d/M/y",$data->fecha_activacion)',
                                        'editable' => array(
                                            'type' => 'date',
                                            'url' => $this->createUrl('cambiarEstdosPorFechas'),
                                            'placement' => 'left',
                                            'format' => 'yyyy-mm-dd',
                                            'viewformat' => 'dd-mm-yyyy',
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
                                    array(
                                        'class' => 'booster.widgets.TbEditableColumn',
                                        'name' => 'fecha_legalizacion',
                                        'value' => 'Yii::app()->dateFormatter->format("d/M/y",$data->fecha_legalizacion)',
                                        'editable' => array(
//                                            'type' => 'date',
                                            'url' => $this->createUrl('cambiarEstdosPorFechas'),
                                            'placement' => 'left',
                                            'format' => 'yyyy-mm-dd',                                      
                                            'viewformat' => 'dd-mm-yyyy',
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
                                    array('name' => 'radicador_id', 'type' => 'raw', 'value' => '@$data->radicador->persona->nombre." ".@$data->radicador->persona->segundo_nombre." ".@$data->radicador->persona->apellido'),
                                    array('name' => 'activador_inicial', 'type' => 'text', 'value' => '$data->activadorInicial->persona->nombre'),
                                    array('name' => 'activador_final', 'type' => 'text', 'value' => '@$data->activadorFinal->persona->nombre." ".@$data->activadorFinal->persona->segundo_nombre'),
                                    array(
                                        'class' => 'booster.widgets.TbEditableColumn',
                                        'name' => 'estado_id',
                                        'id' => 'estado_id',
                                        'type' => 'html',
                                        'value' => 'Ventas::EstadoLabel($data->estado->tipo)',
                                        'filter' => Ventas::getEstados(),
                                        'editable' => array(
                                            'type' => 'select',
                                            'source' => Ventas::model()->getEstados(),
                                            'url' => $this->createUrl('actualiza'),
                                            'placement' => 'left',
                                            'inputclass' => 'span3'
                                        )
                                    ),
                                    array('name' => 'tipo_venta', 'type' => 'text', 'value' => '$data->tipoVenta->tipo', 'filter' => Ventas::getTipoVentas()),
                                    array(
                                        'class' => 'booster.widgets.TbEditableColumn',
                                        'name' => 'plataforma_id',
                                        'id' => 'plataforma_id',
                                        'type' => 'html',
                                        'value' => 'Ventas::getPlataformaVentasNombre($data->plataforma_id)',
                                        'filter' => Ventas::getPlataformaVentas(),
                                        'editable' => array(
                                            'type' => 'select',
                                            'source' => Ventas::model()->getPlataformaVentas(),
                                            'url' => $this->createUrl('actualizaplataformaventas'),
                                            'placement' => 'left',
                                            'inputclass' => 'span3'
                                        )
                                    ),
                                    array(
                                        'class' => 'booster.widgets.TbEditableColumn',
                                        'name' => 'pedido_factura',
                                        'id' => 'pedido_factura',
                                        'type' => 'html',
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
                                        'id' => 'pedido_root',
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
                                        'id' => 'cun_oportunidad',
                                        'type' => 'html',
                                        'value' => '$data->cun_oportunidad',
                                        'editable' => array(
                                            'type' => 'text',
                                            'url' => $this->createUrl('actualizacunoportunidad'),
                                            'placement' => 'left',
                                            'inputclass' => 'span3'
                                        )
                                    ),
                                    array('name' => 'contrato', 'type' => 'text', 'value' => '$data->contrato'),
                                    array('name' => 'primer_nombre_vendedor', 'header' => 'Primer Nombre Vendedor', 'type' => 'raw', 'value' => '$data->vendedor->persona->nombre'),
                                    array('name' => 'segundo_nombre_vendedor', 'header' => 'Segundo Nombre Vendedor', 'type' => 'raw', 'value' => '$data->vendedor->persona->segundo_nombre'),
                                    array('name' => 'cedula_identidad_vendedor', 'header' => 'Cédula Vendedor', 'type' => 'raw', 'value' => 'CHtml::link($data->persona->cedula_identidad, array("../seguridad/users/view/id/".$data->vendedor->persona->id),array("target"=>"_blank"))'),
                                    array('name' => 'vendedor_id', 'header' => 'Coordinador', 'type' => 'raw', 'value' => '$data->vendedor->coordinador_id'),
                                    array('name' => 'habeas_data', 'type' => 'raw', 'value' => 'Ventas::habea($data->habeas_data)'),
                                    array(
                                        'class' => 'booster.widgets.TbEditableColumn',
                                        'name' => 'documento_id',
                                        'id' => 'documento_id',
                                        'type' => 'html',
                                        'value' => 'Ventas::getDocumentoID($data->documento_id)',
                                        'filter' => Ventas::getDocumentoVentas(),
                                        'editable' => array(
                                            'type' => 'select',
                                            'source' => Ventas::model()->getDocumentoVentas(),
                                            'url' => $this->createUrl('actualizadocumentoid'),
                                            'placement' => 'left',
                                            'inputclass' => 'span3'
                                        )
                                    ),
                                    array('name' => 'cliente_id', 'header' => 'Tipo Cliente', 'type' => 'raw', 'value' => '@$data->cliente->tipoCliente->tipo'),
                                    
                                    array('name'=>'link_imagen','type'=>'html','value'=>'$data->link_imagen'),
                                    
                                    array(
                                        'class' => 'booster.widgets.TbEditableColumn',
                                        'sortable' => true,
                                        'name' => 'observacion_activacion',
                                        'id' => 'observacion_activacion',
                                        'type' => 'html',
                                        'htmlOptions' => array('class' => 'width-observacion'),
                                        'value' => '$data->observacion_activacion',
                                        'editable' => array(
                                            'type' => 'text',
                                            'url' => $this->createUrl('actualizaObservacionActivacion'),
                                            'placement' => 'left',
                                            'inputclass' => 'span3'
                                        )
                                    ),
                                    array(
                                        'class' => 'CLinkColumn',
                                        'header' => Yii::app()->params['view-text'],
                                        'label' => Yii::app()->params['view-icon'],
                                        'linkHtmlOptions' => array('class' => 'view ' . Yii::app()->params['cancel-btn']),
                                        'urlExpression' => 'Yii::app()->controller->createUrl("view",array("id"=>$data->id))',
                                        'visible' => Yii::app()->authRBAC->checkAccess('ventas_detalle')
                                    ),

                                ),
                            ));
                            ?>   

                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<link href="<?php echo Yii::app()->request->baseUrl ?>/css/datapiker.min.css" rel="stylesheet" type="text/css"/>


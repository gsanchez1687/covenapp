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
<section id="ventas-grid">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">      
                        <div id="altoanchopantallaVendedores">                         
                            <center>
                                <?php echo CHtml::link(Yii::app()->params['iconoNuevo'] . Yii::t('app', 'Nueva Venta'), array('ventas/create'), array('class' => 'btn btn-info btn-square')); ?>                                 
                            </center>      
                            <?php
                            $this->widget('zii.widgets.grid.CGridView', array(
                                'id' => 'ventas-vendedores-grid',
                                'itemsCssClass' => 'table table-striped table-hover table-responsive scroll',
                                'dataProvider' => $modelMisVendedores->vendedores(),
                                'filter' => $modelMisVendedores,
                                'columns' => array(
                                    /* venta */
                                    'id',
                                    array('name' => 'creado', 'header' => 'Fecha Ingreso', 'type' => 'raw', 'value' => 'date("d/m/y h:i A", strtotime($data->creado))', 'htmlOptions' => array('class' => 'width_fecha_ingreso'), 'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array('model' => $modelMisVendedores, 'attribute' => 'creado'), true)),
                                    array('name' => 'operador_id', 'type' => 'text', 'value' => '$data->operador->tipo', 'filter' => Ventas::getOperador()),
                                    array(
                                        'class' => 'booster.widgets.TbEditableColumn',
                                        //'sortable' => true,   
                                        'name' => 'observaciones',
                                        'id' => 'observaciones',
                                        'value' => '@$data->observaciones',
                                        'htmlOptions' => array('Onclick' => 'limpiarobservacionvendedor()'),
                                        'editable' => array(
                                            'type' => 'text',
                                            'url' => $this->createUrl('actualizaObservacionVendedorCoordinador'),
                                            'placement' => 'left',
                                            'inputclass' => 'span3 observacion_vendedor'
                                        )
                                    ),
                                    array('name' => 'tipo_alta', 'type' => 'raw', 'value' => 'Ventas::getTipoAltaNombre(@$data->getTipoAlta())','filter' => Ventas::getTipoAltaSelect(),),
                                    /* cliente */
                                    array('name' => 'numero_identidad', 'header' => 'Cédula identidad Cliente', 'type' => 'raw', 'value' => 'CHtml::link(@$data->cliente->numero_identidad, array("../clientes/clientes/view/id/".@$data->cliente->id),array("target"=>"_blank"))'),
                                    array('name' => 'nombre_cliente', 'header' => 'Primer Nombre Cliente', 'type' => 'raw', 'value' => '@$data->cliente->nombre'),
                                    array('name' => 'segundo_nombre_cliente', 'header' => 'Segundo Nombre Cliente', 'type' => 'raw', 'value' => '@$data->cliente->segundo_nombre'),
                                    array('name' => 'apellido_cliente', 'header' => 'Primer Apellido Cliente', 'type' => 'raw', 'value' => '@$data->cliente->apellido'),
                                    array('name' => 'segundo_apellido_cliente', 'header' => 'Segundo Apellido Cliente', 'type' => 'raw', 'value' => '@$data->cliente->segundo_apellido'),
                                    array('name' => 'fecha_nacimiento_cliente', 'header' => 'Fecha Nacimiento Cliente', 'type' => 'raw', 'value' => '@$data->cliente->fecha_nacimiento'),
                                    array('name' => 'fecha_expedicion_cliente', 'header' => 'Fecha Expedición Cliente', 'type' => 'raw', 'value' => '@$data->cliente->fecha_expedicion'),
                                    array('name' => 'telefono_fijo_cliente', 'header' => 'Teléfono Fijo Cliente', 'type' => 'raw', 'value' => '@$data->cliente->fijo'),
                                    array('name' => 'telefono_movil_cliente', 'header' => 'Teléfono movil Cliente', 'type' => 'raw', 'value' => '@$data->cliente->movil'),
                                    array('name' => 'correo_cliente', 'header' => 'Correo Cliente', 'type' => 'raw', 'value' => '@$data->cliente->email'),
                                    array('name' => 'direccion_cliente', 'header' => 'Dirección Cliente', 'type' => 'raw', 'value' => '@$data->cliente->direccion'),
                                    array('name' => 'direccion_instalacion', 'type' => 'raw', 'value' => '@$data->ventasFijases->direccion_instalacion'),
                                    array('name' => 'barrio', 'type' => 'raw', 'value' => '@$data->getBarrio()',),
                                    array('name' => 'estrato', 'type' => 'raw', 'value' => '$data->getEstrato()',),
                                    array('name' => 'operador_donante', 'type' => 'raw', 'value' => 'Ventas::getOperadorDonanteNombre(@$data->getOperadorDonante())',),
                                    array('name' => 'numero_asignado', 'type' => 'raw', 'value' => '$data->numero_asignado',),
                                    array('name' => 'plan_id', 'type' => 'raw', 'value' => '@$data->plan->nombre',),
                                    array('name' => 'plan_id', 'header' => 'Valor Plan', 'type' => 'text', 'value' => '@$data->plan->valor'),
                                    array('name' => 'origen_equipo', 'type' => 'raw', 'value' => 'Ventas::getEquipoOrigenNombre(@$data->getEquipoOrigen2())',),
                                    array('name' => 'equipo', 'header' => 'Modelo', 'type' => 'raw', 'value' => '@$data->getEquipo()',),
                                    array('name' => 'imei', 'type' => 'raw', 'value' => '$data->getImei()',),
                                    array('name' => 'iccid', 'type' => 'raw', 'value' => '$data->geticcId()',),
                                    array('name' => 'fecha_activacion', 'type' => 'raw', 'value' => '@$data->fecha_activacion',),
                                    array('name' => 'fecha_legalizacion', 'type' => 'raw', 'value' => '@$data->fecha_legalizacion',),
                                    array('name' => 'radicador_id', 'type' => 'raw', 'value' => '@$data->radicador->persona->nombre'),
                                    array('name' => 'activador_inicial', 'type' => 'text', 'value' => '$data->activadorInicial->persona->nombre'),
                                    array('name' => 'activador_final', 'type' => 'text', 'value' => '@$data->activadorFinal->persona->nombre'),
                                    array('name' => 'estado_id', 'type' => 'html', 'value' => 'Ventas::EstadoLabel(@$data->estado->tipo)', 'filter' => Ventas::getEstados()),
                                    array('name' => 'tipo_venta', 'type' => 'text', 'value' => '$data->tipoVenta->tipo', 'filter' => Ventas::getTipoVentas()),
                                    array('name' => 'plataforma_id', 'type' => 'html', 'value' => 'Ventas::getPlataformaVentasNombre(@$data->plataforma_id)', 'filter' => Ventas::getPlataformaVentas()),
                                    array('name' => 'pedido_factura', 'type' => 'html', 'value' => '@$data->pedido_factura'),
                                    array('name' => 'pedido_root', 'type' => 'html', 'value' => '@$data->pedido_root'),
                                    array('name' => 'cun_oportunidad', 'type' => 'html', 'value' => '@$data->cun_oportunidad'),
                                    array('name' => 'contrato', 'type' => 'text', 'value' => '@$data->contrato'),
                                    array('name' => 'primer_nombre_vendedor', 'type' => 'raw', 'value' => '@$data->vendedor->persona->nombre'),
                                    array('name' => 'segundo_nombre_vendedor', 'type' => 'raw', 'value' => '@$data->vendedor->persona->segundo_nombre'),
                                    array('name' => 'cedula_identidad_vendedor', 'type' => 'raw', 'value' => '@$data->vendedor->persona->cedula_identidad'),
                                    array('name' => 'vendedor_id', 'header' => 'Coordinador', 'type' => 'raw', 'value' => '@$data->vendedor->coordinador_id'),
                                    array('name' => 'habeas_data', 'type' => 'raw', 'value' => 'Ventas::habea(@$data->habeas_data)'),
                                    array('name' => 'documento_id', 'type' => 'html', 'value' => 'Ventas::getDocumentoID(@$data->documento_id)'),
                                    array('name' => 'cliente_id', 'header' => 'Tipo Cliente', 'type' => 'raw', 'value' => '@$data->cliente->tipoCliente->tipo'),
                                    array('name' => 'observacion_activacion', 'type' => 'html', 'value' => '@$data->observacion_activacion'),
                                    array(
                                        'class' => 'CLinkColumn',
                                        'header' => Yii::app()->params['view-text'],
                                        'label' => Yii::app()->params['view-icon'],
                                        'linkHtmlOptions' => array('class' => 'view ' . Yii::app()->params['cancel-btn']),
                                        'urlExpression' => 'Yii::app()->controller->createUrl("view",array("id"=>$data->id))',
                                        'visible' => Yii::app()->authRBAC->checkAccess('ventas_detalle')
                                    ),
//                                array(
//                                    'class' => 'CLinkColumn',
//                                    'header' =>'Grafica',
//                                    'label' => Yii::app()->params['view-icon'],
//                                    'linkHtmlOptions' => array('class' => 'view ' . Yii::app()->params['cancel-btn']),
//                                    'urlExpression' => 'Yii::app()->controller->createUrl("grafica",array("id"=>$data->vendedor->persona->id))',
//                                    'visible' => Yii::app()->authRBAC->checkAccess('ventas_detalle')
//                                ),                               
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
<script src="<?php echo Yii::app()->request->baseUrl ?>/js/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>       
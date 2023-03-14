<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#ventas-traza-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="row">

    <div class="col-xs-12">

        <div class="panel panel-primary">
            <div class="panel-default">
                <h1>Historial de cambios</h1>        
            </div>
            <div class="panel-body">

                <div class="table-responsive">
                    <div id="altoanchopantalla">


                        <?php echo CHtml::link('Busqueda Avanzada', '#', array('class' => 'search-button')); ?>
                        <div class="search-form" style="display:none">
                            <?php
                            $this->renderPartial('_search', array(
                                'model' => $model,
                            ));
                            ?>
                        </div><!-- search-form -->

                        <?php
                        $this->widget('zii.widgets.grid.CGridView', array(
                            'id' => 'ventas-traza-grid',
                            'itemsCssClass' => 'table table-striped table-hover table-responsive',
                            'dataProvider' => $model->search(),
                            'filter' => $model,
                            'columns' => array(
                                array('name'=>'venta_id','type'=>'html','value'=>'CHtml::link(@$data->venta_id, array("../ventas/ventas/view/id/".@$data->venta_id),array("target"=>"_blank"))'),                                
                                array('name' => 'usuario_modificador', 'type' => 'text', 'value' => '@$data->venta->usuarioModificador->persona->nombre." ".@$data->venta->usuarioModificador->persona->apellido." ".@$data->venta->usuarioModificador->persona->segundo_apellido '),
                                array('name' => 'modificado', 'type' => 'text', 'value' => 'date("d/m/y h:i A", strtotime(@$data->venta->modificado))'),
                                
                                array('name' => 'numero_identidad', 'header' => 'Cédula identidad Cliente', 'type' => 'raw', 'value' => 'CHtml::link($data->venta->cliente->numero_identidad, array("../clientes/clientes/view/id/".$data->venta->cliente->id),array("target"=>"_blank"))'),
                                array('name' => 'nombre_cliente', 'header' => 'Primer Nombre Cliente', 'type' => 'raw', 'value' => '$data->venta->cliente->nombre'),
                                array('name' => 'segundo_nombre_cliente', 'header' => 'Segundo Nombre Cliente', 'type' => 'raw', 'value' => '$data->venta->cliente->segundo_nombre'),
                                array('name' => 'apellido_cliente', 'header' => 'Primer Apellido Cliente', 'type' => 'raw', 'value' => '$data->venta->cliente->apellido'),
                                array('name' => 'segundo_apellido_cliente', 'header' => 'Segundo Apellido Cliente', 'type' => 'raw', 'value' => '$data->venta->cliente->segundo_apellido'),
                                array('name' => 'fecha_expedicion_cliente', 'header' => 'Fecha Expedición Cliente', 'type' => 'raw', 'value' => 'Yii::app()->dateFormatter->format("d/M/y",$data->venta->cliente->fecha_expedicion)'),
                                array('name' => 'fecha_nacimiento_cliente', 'header' => 'Fecha Nacimiento Cliente', 'type' => 'raw', 'value' => 'Yii::app()->dateFormatter->format("d/M/y",$data->venta->cliente->fecha_nacimiento)'),
                                array('name' => 'telefono_fijo_cliente', 'header' => 'Teléfono Fijo Cliente', 'type' => 'raw', 'value' => '$data->venta->cliente->fijo'),
                                array('name' => 'telefono_movil_cliente', 'header' => 'Teléfono movil Cliente', 'type' => 'raw', 'value' => '$data->venta->cliente->movil'),
                                array('name' => 'correo_cliente', 'header' => 'Correo Cliente', 'type' => 'raw', 'value' => '$data->venta->cliente->email'),
                                array('name' => 'direccion_cliente', 'header' => 'Dirección Cliente', 'type' => 'raw', 'value' => '$data->venta->cliente->direccion'),
                               
                                
                                'cun_oportunidad_anterior',
                                'cun_oportunidad_nuevo',
                                'numero_asignado_anterior',
                                'numero_asignado_nuevo',
                                'fecha_activacion_anterior',
                                'fecha_activacion_nuevo',
                                'fecha_legalizacion_anterior',
                                'fecha_legalizacion_nuevo',
                                array('name'=>'plan_id_anterior','type'=>'text','value'=>'@$data->venta->plan->nombre'),                                
                                array('name'=>'plan_id_nuevo','type'=>'text','value'=>'@$data->venta->plan->nombre'),
                                array('name' => 'estado_id_enterior', 'type' => 'html', 'value' => 'Ventas::EstadoLabel($data->estadoanterior->tipo)', 'filter' => Ventas::getEstados(),),
                                array('name' => 'estado_id_nuevo', 'type' => 'html', 'value' => 'Ventas::EstadoLabel($data->estadonuevo->tipo)', 'filter' => Ventas::getEstados(),),
                                array('name' => 'plataforma_id_anterior', 'type' => 'html', 'value' => 'Ventas::getPlataformaVentasNombre($data->plataforma_id_anterior)'),
                                array('name' => 'plataforma_id_nuevo', 'type' => 'html', 'value' => 'Ventas::getPlataformaVentasNombre($data->plataforma_id_nuevo)'),
                                'pedido_root_anterior',
                                'pedido_root_nuevo',
                                array('name' => 'documento_id_anterior', 'type' => 'html', 'value' => 'Ventas::getDocumentoID($data->documento_id_anterior)'),
                                array('name' => 'documento_id_nuevo', 'type' => 'html', 'value' => 'Ventas::getDocumentoID($data->documento_id_nuevo)'),
                                'observacion_activacion_anterior',
                                'observacion_activacion_nuevo',
                                'observacion_anterior',
                                'observacion_nuevo',
                                array(
                                    'class' => 'CLinkColumn',
                                    'header' => Yii::app()->params['view-text'],
                                    'label' => Yii::app()->params['view-icon'],
                                    'linkHtmlOptions' => array('class' => 'view ' . Yii::app()->params['cancel-btn']),
                                    'urlExpression' => 'Yii::app()->controller->createUrl("view",array("id"=>$data->id))',
                                    'visible' => Yii::app()->authRBAC->checkAccess('ventas_trazabilidad_detalle')
                                ),
                            ),
                        ));
                        ?>
                    </div>
                </div>
            </div><!---fin table responsive--->    
        </div>

    </div>

</div>




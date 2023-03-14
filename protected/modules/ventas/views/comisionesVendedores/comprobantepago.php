<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#comisiones-vendedores-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Comprobante de Pago</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <?php
                    $this->widget('zii.widgets.grid.CGridView', array(
                        'id' => 'comisiones-vendedores-grid',
                        'itemsCssClass' => 'table table-striped table-responsive',
                        'dataProvider' => $model->search(),
                        'filter' => $model,
                        'columns' => array(
//                          'id',
                            array('name' => 'numero_identidad', 'header' => 'Cédula identidad Cliente', 'type' => 'raw', 'value' => 'CHtml::link($data->venta->cliente->numero_identidad, array("../clientes/clientes/view/id/".$data->venta->cliente->id),array("target"=>"_blank"))'),
                            array('name' => 'primer_nombre_cliente', 'type' => 'raw', 'value' => '$data->venta->cliente->nombre'),
                            array('name' => 'segundo_nombre_cliente', 'type' => 'raw', 'value' => '$data->venta->cliente->segundo_nombre'),
                            array('name' => 'primer_nombre_vendedor', 'type' => 'raw', 'value' => '$data->venta->vendedor->persona->nombre'),
                            array('name' => 'segundo_nombre_vendedor', 'type' => 'raw', 'value' => '$data->venta->vendedor->persona->segundo_nombre'),
                            array('name' => 'cedula_identidad_vendedor', 'header' => 'Cédula Vendedor', 'type' => 'raw', 'value' => '$data->venta->vendedor->persona->cedula_identidad'),
                            array('name' => 'correo_vendedor', 'type' => 'raw', 'value' => '$data->venta->vendedor->persona->correo'),
                            array('name' => 'coordinador_vendedor', 'type' => 'raw', 'value' => '@$data->venta->vendedor->coordinador->persona->nombre'),
                            array('name' => 'gerente_vendedor', 'type' => 'raw', 'value' => '@$data->venta->vendedor->gerente->persona->nombre'),
                            array('name' => 'numero_asignado', 'type' => 'raw', 'value' => '$data->venta->numero_asignado'),
                            array('name' => 'plan', 'type' => 'raw', 'value' => '$data->venta->plan->nombre'),
                            array('name' => 'plan_valor', 'type' => 'raw', 'value' => '$data->venta->plan->valor'),
                            array('name' => 'operador', 'type' => 'raw', 'value' => '$data->venta->operador->tipo'),
                            array('name'=>'total_comision','type'=>'html','value'=>'@$data->comprobantesPagosTotalizadas->total_comision'),
                            array('name'=>'costo_banco','type'=>'html','value'=>'@$data->comprobantesPagosTotalizadas->costo_banco'),
                            array('name'=>'cartera','type'=>'html','value'=>'@$data->comprobantesPagosTotalizadas->cartera'),
                            array('name'=>'aplica_rete_fuente','type'=>'html','value'=>'@$data->comprobantesPagosTotalizadas->aplica_rete_fuente'),
                            array('name'=>'rete_fuente','type'=>'html','value'=>'@$data->comprobantesPagosTotalizadas->rete_fuente'),
                            array('name'=>'reteica','type'=>'html','value'=>'@$data->comprobantesPagosTotalizadas->reteica'),
                            array('name'=>'total_contable','type'=>'html','value'=>'@$data->comprobantesPagosTotalizadas->total_contable'),
                            array('name'=>'total_egreso','type'=>'html','value'=>'@$data->comprobantesPagosTotalizadas->total_egreso'),
                            array('name'=>'total_pago','type'=>'html','value'=>'@$data->comprobantesPagosTotalizadas->total_pago'),
                            array('name'=>'entidad_bancaria','type'=>'html','value'=>'@$data->comprobantesPagosTotalizadas->entidad_bancaria'),
                            array('name'=>'entidad_bancaria','type'=>'html','value'=>'@$data->comprobantesPagosTotalizadas->entidad_bancaria'),
                            array('name'=>'tipo_cuenta','type'=>'html','value'=>'@$data->comprobantesPagosTotalizadas->tipo_cuenta'),
                            array('name'=>'numero_cuenta','type'=>'html','value'=>'@$data->comprobantesPagosTotalizadas->numero_cuenta'),
                            'liquidacion',
                            array(
                                'class' => 'CButtonColumn',
                            ),
                        ),
                    ));
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>


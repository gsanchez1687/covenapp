<?php
/* @var $this VentasTrazaController */
/* @var $model VentasTraza */

$this->breadcrumbs=array(
	'Ventas Trazas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List VentasTraza', 'url'=>array('index')),
	array('label'=>'Create VentasTraza', 'url'=>array('create')),
	array('label'=>'Update VentasTraza', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete VentasTraza', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage VentasTraza', 'url'=>array('admin')),
);
?>

<h1>View VentasTraza #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'venta_id',
		'cun_oportunidad_anterior',
		'cun_oportunidad_nuevo',
		'numero_asignado_anterior',
		'numero_asignado_nuevo',
		'fecha_activacion_anterior',
		'fecha_activacion_nuevo',
		'fecha_legalizacion_anterior',
		'fecha_legalizacion_nuevo',
		'estado_id_enterior',
		'estado_id_nuevo',
		'plataforma_id_anterior',
		'plataforma_id_nuevo',
		'pedido_root_anterior',
		'pedido_root_nuevo',
		'documento_id_anterior',
		'documento_id_nuevo',
		'observacion_activacion_anterior',
		'observacion_activacion_nuevo',
		'observacion_anterior',
		'observacion_nuevo',
	),
)); ?>

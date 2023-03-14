<?php
/* @var $this ComisionesVendedoresController */
/* @var $model ComisionesVendedores */

$this->breadcrumbs=array(
	'Comisiones Vendedores'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ComisionesVendedores', 'url'=>array('index')),
	array('label'=>'Create ComisionesVendedores', 'url'=>array('create')),
	array('label'=>'Update ComisionesVendedores', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ComisionesVendedores', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ComisionesVendedores', 'url'=>array('admin')),
);
?>

<h1>View ComisionesVendedores #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'venta_id',
		'comprobantes_pagos_totalizadas_id',
		'revenue',
		'comision_conexcel',
		'base_comision',
		'comision_inicial',
		'fondo',
		'comision_menos_fondo',
		'rete_fuente',
		'reteica',
		'iva',
		'precomision',
		'incumplimiento_legalizacion',
		'liquidacion',
	),
)); ?>

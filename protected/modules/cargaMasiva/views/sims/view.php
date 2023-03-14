<?php
/* @var $this SimsController */
/* @var $model Sims */

$this->breadcrumbs=array(
	'Sims'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Sims', 'url'=>array('index')),
	array('label'=>'Create Sims', 'url'=>array('create')),
	array('label'=>'Update Sims', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Sims', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Sims', 'url'=>array('admin')),
);
?>

<h1>View Sims #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'ccid',
		'operador_id',
		'usuario_id',
		'estado_id',
	),
)); ?>

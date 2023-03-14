<?php
/* @var $this VentasTrazaController */
/* @var $model VentasTraza */

$this->breadcrumbs=array(
	'Ventas Trazas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List VentasTraza', 'url'=>array('index')),
	array('label'=>'Create VentasTraza', 'url'=>array('create')),
	array('label'=>'View VentasTraza', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage VentasTraza', 'url'=>array('admin')),
);
?>

<h1>Update VentasTraza <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
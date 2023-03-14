<?php
/* @var $this VentasTrazaController */
/* @var $model VentasTraza */

$this->breadcrumbs=array(
	'Ventas Trazas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List VentasTraza', 'url'=>array('index')),
	array('label'=>'Manage VentasTraza', 'url'=>array('admin')),
);
?>

<h1>Create VentasTraza</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
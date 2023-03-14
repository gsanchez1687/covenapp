<?php
/* @var $this VentasTrazaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ventas Trazas',
);

$this->menu=array(
	array('label'=>'Create VentasTraza', 'url'=>array('create')),
	array('label'=>'Manage VentasTraza', 'url'=>array('admin')),
);
?>

<h1>Ventas Trazas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

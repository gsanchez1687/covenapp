<?php
/* @var $this VentasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ventases',
);

$this->menu=array(
	array('label'=>'Create Ventas', 'url'=>array('create')),
	array('label'=>'Manage Ventas', 'url'=>array('admin')),
);
?>

<h1>Ventases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

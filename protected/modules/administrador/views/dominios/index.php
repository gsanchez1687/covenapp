<?php
/* @var $this DominiosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Dominioses',
);

$this->menu=array(
	array('label'=>'Create Dominios', 'url'=>array('create')),
	array('label'=>'Manage Dominios', 'url'=>array('admin')),
);
?>

<h1>Dominioses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

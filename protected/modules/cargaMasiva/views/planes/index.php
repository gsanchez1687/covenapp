<?php
/* @var $this PlanesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Planes',
);

$this->menu=array(
	array('label'=>'Create Planes', 'url'=>array('create')),
	array('label'=>'Manage Planes', 'url'=>array('admin')),
);
?>

<h1>Planes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

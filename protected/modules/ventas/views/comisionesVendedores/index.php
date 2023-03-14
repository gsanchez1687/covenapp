<?php
/* @var $this ComisionesVendedoresController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Comisiones Vendedores',
);

$this->menu=array(
	array('label'=>'Create ComisionesVendedores', 'url'=>array('create')),
	array('label'=>'Manage ComisionesVendedores', 'url'=>array('admin')),
);
?>

<h1>Comisiones Vendedores</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

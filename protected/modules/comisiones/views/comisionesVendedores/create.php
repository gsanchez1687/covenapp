<?php
/* @var $this ComisionesVendedoresController */
/* @var $model ComisionesVendedores */

$this->breadcrumbs=array(
	'Comisiones Vendedores'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ComisionesVendedores', 'url'=>array('index')),
	array('label'=>'Manage ComisionesVendedores', 'url'=>array('admin')),
);
?>

<h1>Create ComisionesVendedores</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
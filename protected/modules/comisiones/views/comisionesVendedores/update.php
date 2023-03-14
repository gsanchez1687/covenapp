<?php
/* @var $this ComisionesVendedoresController */
/* @var $model ComisionesVendedores */

$this->breadcrumbs=array(
	'Comisiones Vendedores'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ComisionesVendedores', 'url'=>array('index')),
	array('label'=>'Create ComisionesVendedores', 'url'=>array('create')),
	array('label'=>'View ComisionesVendedores', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ComisionesVendedores', 'url'=>array('admin')),
);
?>

<h1>Update ComisionesVendedores <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
/* @var $this SimsController */
/* @var $model Sims */

$this->breadcrumbs=array(
	'Sims'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Sims', 'url'=>array('index')),
	array('label'=>'Create Sims', 'url'=>array('create')),
	array('label'=>'View Sims', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Sims', 'url'=>array('admin')),
);
?>

<h1>Update Sims <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
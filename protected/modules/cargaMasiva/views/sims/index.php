<?php
/* @var $this SimsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sims',
);

$this->menu=array(
	array('label'=>'Create Sims', 'url'=>array('create')),
	array('label'=>'Manage Sims', 'url'=>array('admin')),
);
?>

<h1>Sims</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

<?php
/* @var $this ValoresComisionBaseCargosBasicosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Valores Comision Base Cargos Basicoses',
);

$this->menu=array(
	array('label'=>'Create ValoresComisionBaseCargosBasicos', 'url'=>array('create')),
	array('label'=>'Manage ValoresComisionBaseCargosBasicos', 'url'=>array('admin')),
);
?>

<h1>Valores Comision Base Cargos Basicoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

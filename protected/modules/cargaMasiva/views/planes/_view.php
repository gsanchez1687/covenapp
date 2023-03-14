<?php
/* @var $this PlanesController */
/* @var $data Planes */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('valor')); ?>:</b>
	<?php echo CHtml::encode($data->valor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('operador_id')); ?>:</b>
	<?php echo CHtml::encode($data->operador_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_vigencia')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_vigencia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_vencimiento')); ?>:</b>
	<?php echo CHtml::encode($data->comentario); ?>
	<br />


</div>
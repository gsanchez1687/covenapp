<?php
/* @var $this ValoresComisionBaseCargosBasicosController */
/* @var $data ValoresComisionBaseCargosBasicos */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_id')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comision')); ?>:</b>
	<?php echo CHtml::encode($data->comision); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cesantia_mercantil')); ?>:</b>
	<?php echo CHtml::encode($data->cesantia_mercantil); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activo')); ?>:</b>
	<?php echo CHtml::encode($data->activo); ?>
	<br />


</div>
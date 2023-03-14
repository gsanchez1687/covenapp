<?php
/* @var $this SimsController */
/* @var $data Sims */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ccid')); ?>:</b>
	<?php echo CHtml::encode($data->ccid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('operador_id')); ?>:</b>
	<?php echo CHtml::encode($data->operador_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario_id')); ?>:</b>
	<?php echo CHtml::encode($data->usuario_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado_id')); ?>:</b>
	<?php echo CHtml::encode($data->estado_id); ?>
	<br />


</div>
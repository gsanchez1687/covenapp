<?php
/* @var $this VentasTrazaController */
/* @var $data VentasTraza */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('venta_id')); ?>:</b>
	<?php echo CHtml::encode($data->venta_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cun_oportunidad_anterior')); ?>:</b>
	<?php echo CHtml::encode($data->cun_oportunidad_anterior); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cun_oportunidad_nuevo')); ?>:</b>
	<?php echo CHtml::encode($data->cun_oportunidad_nuevo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numero_asignado_anterior')); ?>:</b>
	<?php echo CHtml::encode($data->numero_asignado_anterior); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numero_asignado_nuevo')); ?>:</b>
	<?php echo CHtml::encode($data->numero_asignado_nuevo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_activacion_anterior')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_activacion_anterior); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_activacion_nuevo')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_activacion_nuevo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_legalizacion_anterior')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_legalizacion_anterior); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_legalizacion_nuevo')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_legalizacion_nuevo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado_id_enterior')); ?>:</b>
	<?php echo CHtml::encode($data->estado_id_enterior); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado_id_nuevo')); ?>:</b>
	<?php echo CHtml::encode($data->estado_id_nuevo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('plataforma_id_anterior')); ?>:</b>
	<?php echo CHtml::encode($data->plataforma_id_anterior); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('plataforma_id_nuevo')); ?>:</b>
	<?php echo CHtml::encode($data->plataforma_id_nuevo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pedido_root_anterior')); ?>:</b>
	<?php echo CHtml::encode($data->pedido_root_anterior); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pedido_root_nuevo')); ?>:</b>
	<?php echo CHtml::encode($data->pedido_root_nuevo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('documento_id_anterior')); ?>:</b>
	<?php echo CHtml::encode($data->documento_id_anterior); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('documento_id_nuevo')); ?>:</b>
	<?php echo CHtml::encode($data->documento_id_nuevo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('observacion_activacion_anterior')); ?>:</b>
	<?php echo CHtml::encode($data->observacion_activacion_anterior); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('observacion_activacion_nuevo')); ?>:</b>
	<?php echo CHtml::encode($data->observacion_activacion_nuevo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('observacion_anterior')); ?>:</b>
	<?php echo CHtml::encode($data->observacion_anterior); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('observacion_nuevo')); ?>:</b>
	<?php echo CHtml::encode($data->observacion_nuevo); ?>
	<br />

	*/ ?>

</div>
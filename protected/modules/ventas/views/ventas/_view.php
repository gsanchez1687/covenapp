<?php
/* @var $this VentasController */
/* @var $data Ventas */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vendedor_id')); ?>:</b>
	<?php echo CHtml::encode($data->vendedor_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cliente_id')); ?>:</b>
	<?php echo CHtml::encode($data->cliente_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('plan_id')); ?>:</b>
	<?php echo CHtml::encode($data->plan_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('operador_id')); ?>:</b>
	<?php echo CHtml::encode($data->operador_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado_id')); ?>:</b>
	<?php echo CHtml::encode($data->estado_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('radicador_id')); ?>:</b>
	<?php echo CHtml::encode($data->radicador_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('estado_admin_id')); ?>:</b>
	<?php echo CHtml::encode($data->estado_admin_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('observaciones')); ?>:</b>
	<?php echo CHtml::encode($data->observaciones); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('plataforma_id')); ?>:</b>
	<?php echo CHtml::encode($data->plataforma_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('documento_id')); ?>:</b>
	<?php echo CHtml::encode($data->documento_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contrato')); ?>:</b>
	<?php echo CHtml::encode($data->contrato); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('habeas_data')); ?>:</b>
	<?php echo CHtml::encode($data->habeas_data); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_activacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_activacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_legalizacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_legalizacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_radica')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_radica); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_venta')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_venta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_ingreso')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_ingreso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('envio_factura_id')); ?>:</b>
	<?php echo CHtml::encode($data->envio_factura_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activador_inicial')); ?>:</b>
	<?php echo CHtml::encode($data->activador_inicial); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activador_final')); ?>:</b>
	<?php echo CHtml::encode($data->activador_final); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_venta_id')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_venta_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('observacion_activacion')); ?>:</b>
	<?php echo CHtml::encode($data->observacion_activacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pedido_factura')); ?>:</b>
	<?php echo CHtml::encode($data->pedido_factura); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado_contrato_id')); ?>:</b>
	<?php echo CHtml::encode($data->estado_contrato_id); ?>
	<br />

	*/ ?>

</div>
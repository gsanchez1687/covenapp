<?php
/* @var $this ComisionesVendedoresController */
/* @var $data ComisionesVendedores */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('venta_id')); ?>:</b>
	<?php echo CHtml::encode($data->venta_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comprobantes_pagos_totalizadas_id')); ?>:</b>
	<?php echo CHtml::encode($data->comprobantes_pagos_totalizadas_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('revenue')); ?>:</b>
	<?php echo CHtml::encode($data->revenue); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comision_conexcel')); ?>:</b>
	<?php echo CHtml::encode($data->comision_conexcel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('base_comision')); ?>:</b>
	<?php echo CHtml::encode($data->base_comision); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comision_inicial')); ?>:</b>
	<?php echo CHtml::encode($data->comision_inicial); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('fondo')); ?>:</b>
	<?php echo CHtml::encode($data->fondo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comision_menos_fondo')); ?>:</b>
	<?php echo CHtml::encode($data->comision_menos_fondo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rete_fuente')); ?>:</b>
	<?php echo CHtml::encode($data->rete_fuente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reteica')); ?>:</b>
	<?php echo CHtml::encode($data->reteica); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('iva')); ?>:</b>
	<?php echo CHtml::encode($data->iva); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('precomision')); ?>:</b>
	<?php echo CHtml::encode($data->precomision); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('incumplimiento_legalizacion')); ?>:</b>
	<?php echo CHtml::encode($data->incumplimiento_legalizacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('liquidacion')); ?>:</b>
	<?php echo CHtml::encode($data->liquidacion); ?>
	<br />

	*/ ?>

</div>
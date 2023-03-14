<table>
    <tbody>
        <tr>
            <td><b>Operador</b></td>
            <td><b>Fecha Ingreso</b></td>
            <td><b>Iccid</b></td>
            <td><b>Asignado</b></td>
            <td><b>Vendedor</b></td>
            <td><b>Cedula</b></td>
            <td><b>Plan</b></td>
            <td><b>Valor</b></td>
            <td><b>Cliente</b></td>
            <td><b>CC Cliente</b></td>
            <td><b>Activador</b></td>
            <td><b>Activacion</b></td>
            <td><b>Legalizacion</b></td>
            <td><b>Estado</b></td>
            <td><b>Observacion</b></td>
            <td><b>CUN/OPORTUNIDAD</b></td>
            <td><b>PLATAFORMA</b></td>
            <td><b>TIPO DE VENTA</b></td>
        </tr>
        <tr>
        <?php foreach($consultaExpotVentas as $consultaExpotVenta ):  ?>
            
            <td><?php echo $consultaExpotVenta->operador['tipo'] ?></td>
            <td><?php echo $consultaExpotVenta['fecha_venta']; ?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><?php echo $consultaExpotVenta->vendedor->persona['nombre']. ' '.$consultaExpotVenta->vendedor->persona['apellido']; ?></td>
            <td><?php echo $consultaExpotVenta->vendedor->persona['cedula_identidad']; ?></td>
            <td><?php echo $consultaExpotVenta->plan['nombre'] ?></td>
            <td><?php echo $consultaExpotVenta->plan['valor'] ?></td>
            <td><?php echo $consultaExpotVenta->cliente['nombre'].' '.$consultaExpotVenta->cliente['apellido']; ?></td>
            <td><?php echo $consultaExpotVenta->cliente['numero_identidad']; ?></td>
            <td><?php echo $consultaExpotVenta->activadorInicial->persona['nombre'].' '.$consultaExpotVenta->activadorInicial->persona['apellido'] ?></td>
            <td><?php echo $consultaExpotVenta['fecha_activacion']; ?></td>
            <td><?php echo $consultaExpotVenta['fecha_legalizacion']; ?></td>
            <td><?php echo $consultaExpotVenta->estado->tipo; ?></td>
            <td><?php echo $consultaExpotVenta['observaciones']; ?></td>
            <td>&nbsp;</td>
            <td><?php $consultaExpotVenta->plataforma['tipo']; ?></td>
            <td><?php $consultaExpotVenta->tipoVenta['tipo']; ?></td>
        <?php endforeach; ?>
        </tr>
    </tbody>
</table>
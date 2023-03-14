<table border="1" CELLSPACING="5" CELLPADDING="5">
    <tbody>
        <tr>
            <td>Cedula Vendedor</td>
            <td>Codigo de la venta</td>
            <td>Correo Vendedor</td>
            <td>Nombre Vendedor</td>
            <td>Coordinador</td>
            <td>Numero Asignado Cliente</td>
            <td>Fecha Activacion</td>            
            <td>Nombre Cliente</td>
            <td>Plan</td>
            <td>Tipo Cliente</td>
            <td>Regimen Vendedor</td>
            <td>Retefuente</td>
            <td>Tipo Vendedor</td>
            <td>Numero de cuenta</td>
            <td>Tipo de cuenta</td>
            <td>Banco</td>
            <td>Cun/Oportunidad</td>
            <td>Iccid</td>
            <td>Contrato</td>
            <td>ID Cliente</td>
            <td>Factura</td>
            <td>Nombre Coordinador</td>
            <td>Plan valor</td>
            <td>Imei</td>
            <td>Nombre Gerente</td>
            <td>Procedencia del equipo</td>
            <td>Incumplimiento</td>
            <td>Documento</td>
            <td>Pedido Root</td>
            <td>Operador</td>
            <td>Fecha Ingreso</td>
            <td>Fecha Legalizacio</td>
            <td>Plataforma</td>
            <td>Estado</td>
            <td>Nombre Radicador</td>
            <td>Nombre Activador</td>
            <td>Estratos</td>
            <td>Direccion Cliente</td>        
            <td>Observacion Activacion</td>        
        </tr>
        <?php foreach ($model as $data): ?>
            <tr>              
                <td><?php echo @$data->vendedor->persona->cedula_identidad; ?></td>               
                <td><?php echo @$data->id; ?></td>               
                <td><?php echo @$data->vendedor->persona->correo; ?></td>               
                <td><?php echo @$data->vendedor->persona->nombre.' '.@$data->vendedor->persona->segundo_nombre.' '.@$data->vendedor->persona->apellido.' '.@$data->vendedor->persona->segundo_apellido; ?></td>               
                <td><?php echo @$data->vendedor->coordinador->persona->nombre.' '.@$data->vendedor->coordinador->persona->segundo_nombre.' '.@$data->vendedor->coordinador->persona->apellido.' '.@$data->vendedor->coordinador->persona->segundo_apellido; ?></td>               
                <td><?php echo @$data->numero_asignado; ?></td>               
                <td><?php echo @$data->fecha_activacion; ?></td>               
                <td><?php echo @$data->cliente->nombre . ' ' . @$data->cliente->segundo_nombre . ' ' . @$data->cliente->apellido . ' ' . @$data->cliente->segundo_apellido; ?></td>               
                <td><?php echo @$data->plan->nombre; ?></td>
                <td><?php echo @$data->cliente->tipoCliente->tipo; ?></td>
                <td><?php echo @$data->vendedor->persona->regimen->tipo; ?></td>
                <td><?php echo Ventas::getReteFuente(@$data->vendedor->persona->rete_fuente); ?></td>
                <td><?php echo @$data->vendedor->persona->cargo->tipo; ?></td>
                <td><?php echo @$data->vendedor->persona->numero_cuenta; ?></td>
                <td><?php echo @$data->vendedor->persona->tipoCuenta->tipo; ?></td>
                <td><?php echo @$data->vendedor->persona->banco; ?></td>
                <td><?php echo @$data->cun_oportunidad; ?></td>
                <td><?php echo @$data->geticcId(); ?></td>
                <td><?php echo @$data->contrato; ?></td>
                <td><?php echo @$data->cliente->id; ?></td>
                <td><?php echo @$data->pedido_factura; ?></td>
                <td><?php echo @$data->vendedor->coordinador->persona->nombre . ' ' . @$data->vendedor->coordinador->persona->apellido; ?></td>
                <td><?php echo @$data->plan->valor; ?></td>
                <td><?php echo @$data->getImei(); ?></td>
                <td><?php echo @$data->vendedor->gerente->persona->nombre . ' ' . @$data->vendedor->gerente->persona->apellido; ?></td>
                <td><?php echo Ventas::getEquipoOrigenNombre(@$data->getEquipoOrigen2()); ?></td>
                <td><?php echo Users::getLegalizacionView(@$data->vendedor->persona->legalizacion); ?></td>
                <td><?php echo Ventas::getDocumentacion(@$data->vendedor->persona->documento); ?></td>
                <td><?php echo @$data->pedido_root; ?></td>
                <td><?php echo @$data->operador->tipo; ?></td>
                <td><?php echo Yii::app()->dateFormatter->format("d/M/y", @$data->creado); ?></td>
                <td><?php echo Yii::app()->dateFormatter->format("d/M/y", @$data->fecha_legalizacion); ?></td>
                <td><?php echo @$data->plataforma->tipo ?></td>
                <td><?php echo @$data->estado->tipo; ?></td>
                <td><?php echo @$data->radicador->persona->nombre . ' ' . @$data->radicador->persona->apellido; ?></td>
                <td><?php echo @$data->activadorInicial->persona->nombre . ' ' . @$data->activadorInicial->persona->apellido; ?></td>
                <td><?php echo @$data->getEstrato(); ?></td>
                <td><?php echo @$data->cliente->direccion; ?></td>
                <td><?php echo @$data->observacion_activacion ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
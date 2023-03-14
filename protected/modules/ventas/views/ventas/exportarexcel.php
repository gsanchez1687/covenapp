<table>    
    <tbody>
        <tr>
            <td></td>   
            <td></td>     
            <td></td>     
            <td></td>   
            <td><b><h5>Fecha Inicial</h5></b></td>               
            <td colspan="2"><h4><?php echo Yii::app()->dateFormatter->formatDateTime($FechaActual, 'long', null); ?></h4></td>               
            <td></td>               
            <td><b><h5>Fecha Final</h5></b></td>               
            <td colspan="2"><h4><?php echo Yii::app()->dateFormatter->formatDateTime($FechaFin, 'long', null); ?></h4></td>                                
            <td></td>     
            <td></td>     
            <td></td>     
            <td></td>     
            <td></td>     

        </tr>
        <tr>
            <td></td>               
            <td></td>               
            <td></td>               
            <td></td>               
            <td></td>               
            <td></td>               
            <td colspan="4"><h3>OPERADOR vs ESTADO</h3></td>     
            <td></td>     
            <td></td>     
            <td></td>     
            <td></td>     
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>COMPLETADAS</td>
            <td>FUERA DE CORTE</td>
            <td>LEGALIZACION TARDIA</td>
            <td>PORTABILIDAD</td>
            <td>EN PROCESO</td>
            <td>PENDIENTE</td>
            <td>DEVOLUCION</td>
            <td>RECHAZADA</td>
            <td>ANULADA</td>
            <td>NO PAGO</td>
            <td><b>EN BLANCO</b></td>
            <td><b>TOTAL</b></td>
        </tr>
        <tr>
            <td><b>AVANTEL</b></td>
            <td><?php echo $completadaAVANTEL; ?></td>
            <td><?php echo $fueracorteAVANTEL; ?></td>
            <td><?php echo $legalizadaAVANTEL; ?></td>
            <td><?php echo $portabilidadAVANTEL; ?></td>
            <td><?php echo $enprocesoAVANTEL; ?></td>
            <td><?php echo $pendienteAVANTEL; ?></td>
            <td><?php echo $devolucionAVANTEL; ?></td>
            <td><?php echo $rechazadaAVANTEL; ?></td>
            <td><?php echo $anuladaAVANTEL; ?></td>           
            <td><?php echo $nopagoAVANTEL; ?></td>
            <td><?php ?></td>
            <td><?php echo $total = $completadaAVANTEL + $fueracorteAVANTEL + $legalizadaAVANTEL + $portabilidadAVANTEL + $enprocesoAVANTEL + $pendienteAVANTEL + $devolucionAVANTEL + $rechazadaAVANTEL + $anuladaAVANTEL + $externaAVANTEL + $nopagoAVANTEL; ?></td>
        </tr>
        <tr>
            <td><b>CLARO</b></td>
            <td><?php echo $completadaCLARO; ?></td>
            <td><?php echo $fueracorteCLARO; ?></td>
            <td><?php echo $legalizadaCLARO; ?></td>
            <td><?php echo $portabilidadCLARO; ?></td>
            <td><?php echo $enprocesoCLARO; ?></td>
            <td><?php echo $pendienteCLARO; ?></td>
            <td><?php echo $devolucionCLARO; ?></td>
            <td><?php echo $rechazadaCLARO; ?></td>
            <td><?php echo $anuladaCLARO; ?></td>          
            <td><?php echo $nopagoCLARO; ?></td>
            <td><?php ?></td>
            <td><?php echo $total = $completadaCLARO + $fueracorteCLARO + $legalizadaCLARO + $portabilidadCLARO + $enprocesoCLARO + $pendienteCLARO + $devolucionCLARO + $rechazadaCLARO + $anuladaCLARO + $externaCLARO + $nopagoCLARO; ?></td>
        </tr>
        <tr>
            <td><b>ETB</b></td>
            <td><?php echo $completadaETB; ?></td>
            <td><?php echo $fueracorteETB; ?></td>
            <td><?php echo $legalizadaETB; ?></td>
            <td><?php echo $portabilidadETB; ?></td>
            <td><?php echo $enprocesoETB; ?></td>
            <td><?php echo $pendienteETB; ?></td>
            <td><?php echo $devolucionETB; ?></td>
            <td><?php echo $rechazadaETB; ?></td>
            <td><?php echo $anuladaETB; ?></td>          
            <td><?php echo $nopagoETB; ?></td>
            <td><?php ?></td>
            <td><?php echo $total = $completadaETB + $fueracorteETB + $legalizadaETB + $portabilidadETB + $enprocesoETB + $pendienteETB + $devolucionETB + $rechazadaETB + $anuladaETB + $externaETB + $nopagoETB; ?></td>
        </tr>
        <tr>
            <td><b>MOVISTART</b></td>
            <td><?php echo $completadaMOVISTART; ?></td>
            <td><?php echo $fueracorteMOVISTART; ?></td>
            <td><?php echo $legalizadaMOVISTART; ?></td>
            <td><?php echo $portabilidadMOVISTART; ?></td>
            <td><?php echo $enprocesoMOVISTART; ?></td>
            <td><?php echo $pendienteMOVISTART; ?></td>
            <td><?php echo $devolucionMOVISTART; ?></td>
            <td><?php echo $rechazadaMOVISTART; ?></td>
            <td><?php echo $anuladaMOVISTART; ?></td>           
            <td><?php echo $nopagoMOVISTART; ?></td>
            <td><?php ?></td>
            <td><?php echo $total = $completadaMOVISTART + $fueracorteMOVISTART + $legalizadaMOVISTART + $portabilidadMOVISTART + $enprocesoMOVISTART + $pendienteMOVISTART + $devolucionMOVISTART + $rechazadaMOVISTART + $anuladaMOVISTART + $externaMOVISTART + $nopagoMOVISTART; ?></td>
        </tr>        
    </tbody>
</table>
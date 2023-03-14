<?php 
if (!isset($_POST['Fecha_inicio'])): 
    $FechaActual = date('Y-m-d');
    $FechaFin = date('Y-m-d');
else:
    $FechaActual = $_POST['Fecha_inicio'];
    $FechaFin = $_POST['Fecha_fin'];
endif;
/* paramstros
 * 
 * operador movil
 * operador fijo
 * estado
 * fecha actual
 * fecha final, es decir hoy mismo
 * 
 * 1 :ETB MOVIL
 * 2: CLARO MOVIL
 * 3 MOVISTAR MOVIL
 * 4 AVANTEL
 * 5 ETB FIJA
 * 6 CLARO FIJA
 * 7 MOVISTAR FIJA
 * 8 DIRECTV 
 */



/*ETB FIJA Y MOVIL*/
$enprocesoETB = Controller::chart(1,5,35,$FechaActual,$FechaFin);
$completadaETB = Controller::chart(1,5,36,$FechaActual,$FechaFin);
$portabilidadETB = Controller::chart(1,5,37,$FechaActual,$FechaFin);
$pendienteETB = Controller::chart(1,5,38,$FechaActual,$FechaFin);
$devolucionETB = Controller::chart(1,5,39,$FechaActual,$FechaFin);
$rechazadaETB = Controller::chart(1,5,40,$FechaActual,$FechaFin);
$anuladaETB = Controller::chart(1,5,41,$FechaActual,$FechaFin);
$fueracorteETB = Controller::chart(1,5,42,$FechaActual,$FechaFin);
$legalizadaETB = Controller::chart(1,5,43,$FechaActual,$FechaFin);
$nopagoETB = Controller::chart(1,5,44,$FechaActual,$FechaFin);
$perdidaETB = Controller::chart(1,5,45,$FechaActual,$FechaFin);
$externaETB = Controller::chart(1,5,46,$FechaActual,$FechaFin);
$preliquidadaETB = Controller::chart(1,5,47,$FechaActual,$FechaFin);
$liquidadaETB = Controller::chart(1,5,48,$FechaActual,$FechaFin);
$contabilizadaETB = Controller::chart(1,5,49,$FechaActual,$FechaFin);
$pagadaETB = Controller::chart(1,5,50,$FechaActual,$FechaFin);

/**********************/

$enprocesoETB_MOVIL = Controller::ChartMovil(1,35,$FechaActual,$FechaFin);
$completadaETB_MOVIL = Controller::ChartMovil(1,36,$FechaActual,$FechaFin);
$portabilidadETB_MOVIL = Controller::ChartMovil(1,37,$FechaActual,$FechaFin);
$pendienteETB_MOVIL = Controller::ChartMovil(1,38,$FechaActual,$FechaFin);
$devolucionETB_MOVIL = Controller::ChartMovil(1,39,$FechaActual,$FechaFin);
$rechazadaETB_MOVIL = Controller::ChartMovil(1,40,$FechaActual,$FechaFin);
$anuladaETB_MOVIL = Controller::ChartMovil(1,41,$FechaActual,$FechaFin);
$fueracorteETB_MOVIL = Controller::ChartMovil(1,42,$FechaActual,$FechaFin);
$legalizadaETB_MOVIL = Controller::ChartMovil(1,43,$FechaActual,$FechaFin);
$nopagoETB_MOVIL = Controller::ChartMovil(1,44,$FechaActual,$FechaFin);
$perdidaETB_MOVIL = Controller::ChartMovil(1,45,$FechaActual,$FechaFin);
$externaETB_MOVIL = Controller::ChartMovil(1,46,$FechaActual,$FechaFin);
$preliquidadaETB_MOVIL = Controller::ChartMovil(1,47,$FechaActual,$FechaFin);
$liquidadaETB_MOVIL = Controller::ChartMovil(1,48,$FechaActual,$FechaFin);
$contabilizadaETB_MOVIL = Controller::ChartMovil(1,49,$FechaActual,$FechaFin);
$pagadaETB_MOVIL = Controller::ChartMovil(1,50,$FechaActual,$FechaFin);

$enprocesoETB_FIJA = Controller::ChartFIJA(5,35,$FechaActual,$FechaFin);
$completadaETB_FIJA = Controller::ChartFIJA(5,36,$FechaActual,$FechaFin);
$portabilidadETB_FIJA = Controller::ChartFIJA(5,37,$FechaActual,$FechaFin);
$pendienteETB_FIJA = Controller::ChartFIJA(5,38,$FechaActual,$FechaFin);
$devolucionETB_FIJA = Controller::ChartFIJA(5,39,$FechaActual,$FechaFin);
$rechazadaETB_FIJA = Controller::ChartFIJA(5,40,$FechaActual,$FechaFin);
$anuladaETB_FIJA = Controller::ChartFIJA(5,41,$FechaActual,$FechaFin);
$fueracorteETB_FIJA = Controller::ChartFIJA(5,42,$FechaActual,$FechaFin);
$legalizadaETB_FIJA = Controller::ChartFIJA(5,43,$FechaActual,$FechaFin);
$nopagoETB_FIJA = Controller::ChartFIJA(5,44,$FechaActual,$FechaFin);
$perdidaETB_FIJA = Controller::ChartFIJA(5,45,$FechaActual,$FechaFin);
$externaETB_FIJA = Controller::ChartFIJA(5,46,$FechaActual,$FechaFin);
$preliquidadaETB_FIJA = Controller::ChartFIJA(5,47,$FechaActual,$FechaFin);
$liquidadaETB_FIJA = Controller::ChartFIJA(5,48,$FechaActual,$FechaFin);
$contabilizadaETB_FIJA = Controller::ChartFIJA(5,49,$FechaActual,$FechaFin);
$pagadaETB_FIJA = Controller::ChartFIJA(5,50,$FechaActual,$FechaFin);



/**********************/


/*CLARO FIJA Y MOVIL*/
$enprocesoCLARO = Controller::chart(2,35,$FechaActual,$FechaFin);
$completadaCLARO = Controller::chart(2,36,$FechaActual,$FechaFin);
$portabilidadCLARO = Controller::chart(2,37,$FechaActual,$FechaFin);
$pendienteCLARO = Controller::chart(2,38,$FechaActual,$FechaFin);
$devolucionCLARO = Controller::chart(2,39,$FechaActual,$FechaFin);
$rechazadaCLARO = Controller::chart(2,40,$FechaActual,$FechaFin);
$anuladaCLARO = Controller::chart(2,41,$FechaActual,$FechaFin);
$fueracorteCLARO = Controller::chart(2,42,$FechaActual,$FechaFin);
$legalizadaCLARO = Controller::chart(2,43,$FechaActual,$FechaFin);
$nopagoCLARO = Controller::chart(2,44,$FechaActual,$FechaFin);
$perdidaCLARO = Controller::chart(2,45,$FechaActual,$FechaFin);
$externaCLARO = Controller::chart(2,46,$FechaActual,$FechaFin);
$preliquidadaCLARO = Controller::chart(2,47,$FechaActual,$FechaFin);
$liquidadaCLARO = Controller::chart(2,48,$FechaActual,$FechaFin);
$contabilizadaCLARO = Controller::chart(2,49,$FechaActual,$FechaFin);
$pagadaCLARO = Controller::chart(2,50,$FechaActual,$FechaFin);


/**************/

$enprocesoCLARO_MOVIL = Controller::chartMOVIL(2,6,35,$FechaActual,$FechaFin);
$completadaCLARO_MOVIL = Controller::chartMOVIL(2,6,36,$FechaActual,$FechaFin);
$portabilidadCLARO_MOVIL = Controller::chartMOVIL(2,6,37,$FechaActual,$FechaFin);
$pendienteCLARO_MOVIL = Controller::chartMOVIL(2,6,38,$FechaActual,$FechaFin);
$devolucionCLARO_MOVIL = Controller::chartMOVIL(2,6,39,$FechaActual,$FechaFin);
$rechazadaCLARO_MOVIL = Controller::chartMOVIL(2,6,40,$FechaActual,$FechaFin);
$anuladaCLARO_MOVIL = Controller::chartMOVIL(2,6,41,$FechaActual,$FechaFin);
$fueracorteCLARO_MOVIL = Controller::chartMOVIL(2,6,42,$FechaActual,$FechaFin);
$legalizadaCLARO_MOVIL = Controller::chartMOVIL(2,6,43,$FechaActual,$FechaFin);
$nopagoCLARO_MOVIL = Controller::chartMOVIL(2,6,44,$FechaActual,$FechaFin);
$perdidaCLARO_MOVIL = Controller::chartMOVIL(2,6,45,$FechaActual,$FechaFin);
$externaCLARO_MOVIL = Controller::chartMOVIL(2,6,46,$FechaActual,$FechaFin);
$preliquidadaCLARO_MOVIL = Controller::chartMOVIL(1,5,47,$FechaActual,$FechaFin);
$liquidadaCLARO_MOVIL = Controller::chartMOVIL(2,6,48,$FechaActual,$FechaFin);
$contabilizadaCLARO_MOVIL = Controller::chartMOVIL(2,6,49,$FechaActual,$FechaFin);
$pagadaCLARO_MOVIL = Controller::chartMOVIL(2,6,50,$FechaActual,$FechaFin);

$enprocesoCLARO_FIJA = Controller::chartFIJA(6,35,$FechaActual,$FechaFin);
$completadaCLARO_FIJA = Controller::chartFIJA(6,36,$FechaActual,$FechaFin);
$portabilidadCLARO_FIJA = Controller::chartFIJA(6,37,$FechaActual,$FechaFin);
$pendienteCLARO_FIJA = Controller::chartFIJA(6,38,$FechaActual,$FechaFin);
$devolucionCLARO_FIJA = Controller::chartFIJA(6,39,$FechaActual,$FechaFin);
$rechazadaCLARO_FIJA = Controller::chartFIJA(6,40,$FechaActual,$FechaFin);
$anuladaCLARO_FIJA = Controller::chartFIJA(6,41,$FechaActual,$FechaFin);
$fueracorteCLARO_FIJA = Controller::chartFIJA(6,42,$FechaActual,$FechaFin);
$legalizadaCLARO_FIJA = Controller::chartFIJA(6,43,$FechaActual,$FechaFin);
$nopagoCLARO_FIJA = Controller::chartFIJA(6,44,$FechaActual,$FechaFin);
$perdidaCLARO_FIJA = Controller::chartFIJA(6,45,$FechaActual,$FechaFin);
$externaCLARO_FIJA = Controller::chartFIJA(6,46,$FechaActual,$FechaFin);
$preliquidadaCLARO_FIJA = Controller::chartFIJA(6,47,$FechaActual,$FechaFin);
$liquidadaCLARO_FIJA = Controller::chartFIJA(6,48,$FechaActual,$FechaFin);
$contabilizadaCLARO_FIJA = Controller::chartFIJA(6,49,$FechaActual,$FechaFin);
$pagadaCLARO_FIJA = Controller::chartFIJA(6,50,$FechaActual,$FechaFin);


/*************/

/*MOVISTAR*/
$enprocesoMOVISTART = Controller::chart(3,7,35,$FechaActual,$FechaFin);
$completadaMOVISTART = Controller::chart(3,7,36,$FechaActual,$FechaFin);
$portabilidadMOVISTART = Controller::chart(3,7,37,$FechaActual,$FechaFin);
$pendienteMOVISTART = Controller::chart(3,7,38,$FechaActual,$FechaFin);
$devolucionMOVISTART = Controller::chart(3,7,39,$FechaActual,$FechaFin);
$rechazadaMOVISTART = Controller::chart(3,7,40,$FechaActual,$FechaFin);
$anuladaMOVISTART = Controller::chart(3,7,41,$FechaActual,$FechaFin);
$fueracorteMOVISTART = Controller::chart(3,7,42,$FechaActual,$FechaFin);
$legalizadaMOVISTART = Controller::chart(3,7,43,$FechaActual,$FechaFin);
$nopagoMOVISTART = Controller::chart(3,7,44,$FechaActual,$FechaFin);
$perdidaMOVISTART = Controller::chart(3,7,45,$FechaActual,$FechaFin);
$externaMOVISTART = Controller::chart(3,7,46,$FechaActual,$FechaFin);
$preliquidadaMOVISTART = Controller::chart(3,7,47,$FechaActual,$FechaFin);
$liquidadaMOVISTART = Controller::chart(3,7,48,$FechaActual,$FechaFin);
$contabilizadaMOVISTART = Controller::chart(1,5,49,$FechaActual,$FechaFin);
$pagadaMOVISTART = Controller::chart(3,7,50,$FechaActual,$FechaFin);

/***********************/
$enprocesoMOVISTART_MOVIL = Controller::chartMOVIL(3,35,$FechaActual,$FechaFin);
$completadaMOVISTART_MOVIL = Controller::chartMOVIL(3,36,$FechaActual,$FechaFin);
$portabilidadMOVISTART_MOVIL = Controller::chartMOVIL(3,37,$FechaActual,$FechaFin);
$pendienteMOVISTART_MOVIL = Controller::chartMOVIL(3,38,$FechaActual,$FechaFin);
$devolucionMOVISTART_MOVIL = Controller::chartMOVIL(3,39,$FechaActual,$FechaFin);
$rechazadaMOVISTART_MOVIL = Controller::chartMOVIL(3,40,$FechaActual,$FechaFin);
$anuladaMOVISTART_MOVIL = Controller::chartMOVIL(3,41,$FechaActual,$FechaFin);
$fueracorteMOVISTART_MOVIL = Controller::chartMOVIL(3,42,$FechaActual,$FechaFin);
$legalizadaMOVISTART_MOVIL = Controller::chartMOVIL(3,43,$FechaActual,$FechaFin);
$nopagoMOVISTART_MOVIL = Controller::chartMOVIL(3,44,$FechaActual,$FechaFin);
$perdidaMOVISTART_MOVIL = Controller::chartMOVIL(3,45,$FechaActual,$FechaFin);
$externaMOVISTART_MOVIL = Controller::chartMOVIL(3,46,$FechaActual,$FechaFin);
$preliquidadaMOVISTART_MOVIL = Controller::chartMOVIL(3,47,$FechaActual,$FechaFin);
$liquidadaMOVISTART_MOVIL = Controller::chartMOVIL(3,48,$FechaActual,$FechaFin);
$contabilizadaMOVISTART_MOVIL = Controller::chartMOVIL(3,49,$FechaActual,$FechaFin);
$pagadaMOVISTART_MOVIL = Controller::chartMOVIL(3,50,$FechaActual,$FechaFin);

$enprocesoMOVISTART_FIJA = Controller::chartFIJA(7,35,$FechaActual,$FechaFin);
$completadaMOVISTART_FIJA = Controller::chartFIJA(7,36,$FechaActual,$FechaFin);
$portabilidadMOVISTART_FIJA = Controller::chartFIJA(7,37,$FechaActual,$FechaFin);
$pendienteMOVISTART_FIJA = Controller::chartFIJA(7,38,$FechaActual,$FechaFin);
$devolucionMOVISTART_FIJA = Controller::chartFIJA(7,39,$FechaActual,$FechaFin);
$rechazadaMOVISTART_FIJA = Controller::chartFIJA(7,40,$FechaActual,$FechaFin);
$anuladaMOVISTART_FIJA = Controller::chartFIJA(7,41,$FechaActual,$FechaFin);
$fueracorteMOVISTART_FIJA = Controller::chartFIJA(7,42,$FechaActual,$FechaFin);
$legalizadaMOVISTART_FIJA = Controller::chartFIJA(7,43,$FechaActual,$FechaFin);
$nopagoMOVISTART_FIJA = Controller::chartFIJA(7,44,$FechaActual,$FechaFin);
$perdidaMOVISTART_FIJA = Controller::chartFIJA(7,45,$FechaActual,$FechaFin);
$externaMOVISTART_FIJA = Controller::chartFIJA(7,46,$FechaActual,$FechaFin);
$preliquidadaMOVISTART_FIJA = Controller::chartFIJA(7,47,$FechaActual,$FechaFin);
$liquidadaMOVISTART_FIJA = Controller::chartFIJA(7,48,$FechaActual,$FechaFin);
$contabilizadaMOVISTART_FIJA = Controller::chartFIJA(7,49,$FechaActual,$FechaFin);
$pagadaMOVISTART_FIJA = Controller::chartFIJA(7,50,$FechaActual,$FechaFin);


/**********************/

/*AVANTEL*/
$enprocesoAVANTEL = Controller::chartMOVIL(4,35,$FechaActual,$FechaFin);
$completadaAVANTEL = Controller::chartMOVIL(4,36,$FechaActual,$FechaFin);
$portabilidadAVANTEL = Controller::chartMOVIL(4,37,$FechaActual,$FechaFin);
$pendienteAVANTEL = Controller::chartMOVIL(4,38,$FechaActual,$FechaFin);
$devolucionAVANTEL = Controller::chartMOVIL(4,39,$FechaActual,$FechaFin);
$rechazadaAVANTEL = Controller::chartMOVIL(4,40,$FechaActual,$FechaFin);
$anuladaAVANTEL = Controller::chartMOVIL(4,41,$FechaActual,$FechaFin);
$fueracorteAVANTEL = Controller::chartMOVIL(4,42,$FechaActual,$FechaFin);
$legalizadaAVANTEL = Controller::chartMOVIL(4,43,$FechaActual,$FechaFin);
$nopagoAVANTEL = Controller::chartMOVIL(4,44,$FechaActual,$FechaFin);
$perdidaAVANTEL = Controller::chartMOVIL(4,45,$FechaActual,$FechaFin);
$externaAVANTEL = Controller::chartMOVIL(4,46,$FechaActual,$FechaFin);
$preliquidadaAVANTEL = Controller::chartMOVIL(4,47,$FechaActual,$FechaFin);
$liquidadaAVANTEL = Controller::chartMOVIL(4,48,$FechaActual,$FechaFin);
$contabilizadaAVANTEL = Controller::chartMOVIL(4,49,$FechaActual,$FechaFin);
$pagadaAVANTEL = Controller::chartMOVIL(4,50,$FechaActual,$FechaFin);
/*DIRECTV*/
$enprocesoDIRECTV = Controller::chart(8,'',35,$FechaActual,$FechaFin);
$completadaDIRECTV = Controller::chart(8,'',36,$FechaActual,$FechaFin);
$portabilidadDIRECTV = Controller::chart(8,'',37,$FechaActual,$FechaFin);
$pendienteDIRECTV = Controller::chart(8,'',38,$FechaActual,$FechaFin);
$devolucionDIRECTV = Controller::chart(8,'',39,$FechaActual,$FechaFin);
$rechazadaDIRECTV = Controller::chart(8,'',40,$FechaActual,$FechaFin);
$anuladaDIRECTV = Controller::chart(8,'',41,$FechaActual,$FechaFin);
$fueracorteDIRECTV = Controller::chart(8,'',42,$FechaActual,$FechaFin);
$legalizadaDIRECTV = Controller::chart(8,'',43,$FechaActual,$FechaFin);
$nopagoDIRECTV = Controller::chart(8,'',44,$FechaActual,$FechaFin);
$perdidaDIRECTV = Controller::chart(8,'',45,$FechaActual,$FechaFin);
$externaDIRECTV = Controller::chart(8,'',46,$FechaActual,$FechaFin);
$preliquidadaDIRECTV = Controller::chart(8,'',47,$FechaActual,$FechaFin);
$liquidadaDIRECTV = Controller::chart(8,'',48,$FechaActual,$FechaFin);
$contabilizadaDIRECTV = Controller::chart(8,'',49,$FechaActual,$FechaFin);
$pagadaDIRECTV = Controller::chart(8,'',50,$FechaActual,$FechaFin);

?>

<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3><i class="fa fa-line-chart" aria-hidden="true"></i> Gráficas de tus ventas  <?php echo date('Y-m-d'); ?> </h3> 
                <center>
                    <?php if (isset($_POST['Fecha_inicio'])):  ?>
                    <h3>Aplicando Filtos</h3>
                    <b><?php echo Yii::app()->dateFormatter->formatDateTime($FechaActual, 'long', null).' Hasta '.Yii::app()->dateFormatter->formatDateTime($FechaFin,'long',null);  ?></b>
                <?php endif; ?>
                </center>
                
                <div class="actions pull-right">
                    <i class="fa fa-expand"></i>
                    <i class="fa fa-chevron-down"></i>
                    <i class="fa fa-times"></i>
                </div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <form name="form-graficos" method="POST" action="<?php echo Yii::app()->request->baseUrl.'/ventas/ventas/graficos'; ?>">                    
                    <center>                        
                            <div class="col-md-6 ">
                                <?php
                                    $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                        'name'=>'Fecha_inicio',
                                        'language'=>'es',
                                        // additional javascript options for the date picker plugin
                                        'options'=>array(
                                            'dateFormat'=>'yy/mm/dd',
                                            'maxDate'=>"now",
                                            'changeMonth'=>true,
                                            'changeYear'=>true,
                                            'showAnim'=>'drop',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                                        ),
                                        'htmlOptions'=>array(
                                            'placeholder'=>'Fecha Inicio',
                                            'class'=>'form-control',
                                        ),
                                    ));
                            ?>
                            </div>
                            <div class="col-md-6">
                                <?php
                                    $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                        'name'=>'Fecha_fin',
                                        'language'=>'es',
                                        'options'=>array(     
                                            'dateFormat'=>'yy/mm/dd',
                                            'maxDate'=>"now",
                                            'changeMonth'=>true,
                                            'changeYear'=>true,
                                            'showAnim'=>'drop',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                                        ),
                                        'htmlOptions'=>array(
                                            'placeholder'=>'Fecha Fin',
                                            'class'=>'form-control',
                                        ),
                                    ));
                                    ?>
                            </div>                        
                    </center>
                    <br />
                    <br />
                    <br />
                    <br />
                    <center>
                        <input type="submit" value="Filtrar" class="btn btn-info btn-square">
                    </center>
                    </form>
                    
                    <br />
                    <div class="col-md-12">
                        
                        
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-primary">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                           <i class="fa fa-chevron-down"></i> OPERADOR VS ESTADOS
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        
                                        <table class="table table-responsive table-bordered table-hover table-striped">
                                            <thead style="font-weight: bold;">
                                            <tr>
                                                <td></td>
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
                                                <td>TOTAL</td>
                                            </tr>
                                            </thead>
                                            <tr style="background-color:#E3007E; color:#FFF " >
                                                <td><strong>AVANTEL</strong></td>
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
                                                <td><?php echo $completadaAVANTEL + $fueracorteAVANTEL + $legalizadaAVANTEL   + $portabilidadAVANTEL   + $enprocesoAVANTEL + $pendienteAVANTEL +$devolucionAVANTEL + $rechazadaAVANTEL + $anuladaAVANTEL + $nopagoAVANTEL ?></td>
                                            </tr>
                                            <tr style="background-color:#F26F33; color:#FFF " >
                                                <td><strong>ETB MOVIL</strong></td>
                                                <td><?php echo $completadaETB_MOVIL;  ?></td>
                                                <td><?php echo $fueracorteETB_MOVIL;  ?></td>
                                                <td><?php echo $legalizadaETB_MOVIL;  ?></td>
                                                <td><?php echo $portabilidadETB_MOVIL;  ?></td>
                                                <td><?php echo $enprocesoETB_MOVIL;  ?></td>
                                                <td><?php echo $pendienteETB_MOVIL;  ?></td>
                                                <td><?php echo $devolucionETB_MOVIL;  ?></td>
                                                <td><?php echo $rechazadaETB_MOVIL;  ?></td>
                                                <td><?php echo $anuladaETB_MOVIL;  ?></td>
                                                <td><?php echo $nopagoETB_MOVIL  ?></td>       
                                                <td><?php echo $completadaETB_MOVIL + $fueracorteETB_MOVIL + $legalizadaETB_MOVIL + $portabilidadETB_MOVIL + $enprocesoETB_MOVIL + $pendienteETB_MOVIL + $devolucionETB_MOVIL + $rechazadaETB_MOVIL + $anuladaETB_MOVIL + $nopagoETB_MOVIL  ?></td>
                                            </tr>
                                            <tr style="background-color:#F26F33; color:#FFF " >
                                                <td><strong>ETB FIJA</strong></td>
                                                <td><?php echo $completadaETB_FIJA;  ?></td>
                                                <td><?php echo $fueracorteETB_FIJA;  ?></td>
                                                <td><?php echo $legalizadaETB_FIJA;  ?></td>
                                                <td><?php echo $portabilidadETB_FIJA;  ?></td>
                                                <td><?php echo $enprocesoETB_FIJA;  ?></td>
                                                <td><?php echo $pendienteETB_FIJA;  ?></td>
                                                <td><?php echo $devolucionETB_FIJA;  ?></td>
                                                <td><?php echo $rechazadaETB_FIJA;  ?></td>
                                                <td><?php echo $anuladaETB_FIJA;  ?></td>
                                                <td><?php echo $nopagoETB_FIJA  ?></td>       
                                                <td><?php echo $completadaETB_FIJA + $fueracorteETB_FIJA + $legalizadaETB_FIJA + $portabilidadETB_FIJA + $enprocesoETB_FIJA + $pendienteETB_FIJA + $devolucionETB_FIJA + $rechazadaETB_FIJA + $anuladaETB_FIJA + $nopagoETB_FIJA  ?></td>
                                            </tr>
                                             <tr style="background-color:#e74c3c; color:#FFF " >
                                                <td><strong>CLARO MOVIL</strong></td>
                                                <td><?php echo $completadaCLARO_MOVIL;  ?></td>
                                                <td><?php echo $fueracorteCLARO_MOVIL;  ?></td>
                                                <td><?php echo $legalizadaCLARO_MOVIL;  ?></td>
                                                <td><?php echo $portabilidadCLARO_MOVIL;  ?></td>
                                                <td><?php echo $enprocesoCLARO_MOVIL;  ?></td>
                                                <td><?php echo $pendienteCLARO_MOVIL;  ?></td>
                                                <td><?php echo $devolucionCLARO_MOVIL;  ?></td>
                                                <td><?php echo $rechazadaCLARO_MOVIL;  ?></td>
                                                <td><?php echo $anuladaCLARO_MOVIL;  ?></td>
                                                <td><?php echo $nopagoCLARO_MOVIL;  ?></td> 
                                                <td><?php echo $completadaCLARO_MOVIL + $fueracorteCLARO_MOVIL + $legalizadaCLARO_MOVIL + $portabilidadCLARO_MOVIL + $enprocesoCLARO_MOVIL + $pendienteCLARO_MOVIL + $devolucionCLARO_MOVIL + $rechazadaCLARO_MOVIL + $anuladaCLARO_MOVIL + $nopagoCLARO_MOVIL ?></td>
                                            </tr>
                                             <tr style="background-color:#e74c3c; color:#FFF " >
                                                <td><strong>CLARO FIJA</strong></td>
                                                <td><?php echo $completadaCLARO_FIJA;  ?></td>
                                                <td><?php echo $fueracorteCLARO_FIJA;  ?></td>
                                                <td><?php echo $legalizadaCLARO_FIJA;  ?></td>
                                                <td><?php echo $portabilidadCLARO_FIJA;  ?></td>
                                                <td><?php echo $enprocesoCLARO_FIJA;  ?></td>
                                                <td><?php echo $pendienteCLARO_FIJA;  ?></td>
                                                <td><?php echo $devolucionCLARO_FIJA;  ?></td>
                                                <td><?php echo $rechazadaCLARO_FIJA;  ?></td>
                                                <td><?php echo $anuladaCLARO_FIJA;  ?></td>
                                                <td><?php echo $nopagoCLARO_FIJA;  ?></td> 
                                                <td><?php echo $completadaCLARO_FIJA + $fueracorteCLARO_FIJA + $legalizadaCLARO_FIJA + $portabilidadCLARO_FIJA + $enprocesoCLARO_FIJA + $pendienteCLARO_FIJA + $devolucionCLARO_FIJA + $rechazadaCLARO_FIJA + $anuladaCLARO_FIJA + $nopagoCLARO_FIJA ?></td>
                                            </tr>
                                             <tr style="background-color:#5BC500; color:#FFF " >                                              
                                                <td><strong>MOVISTAR MOVIL</strong></td>
                                                <td><?php echo $completadaMOVISTART_MOVIL;  ?></td>
                                                <td><?php echo $fueracorteMOVISTART_MOVIL;  ?></td>
                                                <td><?php echo $legalizadaMOVISTART_MOVIL;  ?></td>
                                                <td><?php echo $portabilidadMOVISTART_MOVIL;  ?></td>
                                                <td><?php echo $enprocesoMOVISTART_MOVIL;  ?></td>
                                                <td><?php echo $pendienteMOVISTART_MOVIL;  ?></td>
                                                <td><?php echo $devolucionMOVISTART_MOVIL;  ?></td>
                                                <td><?php echo $rechazadaMOVISTART_MOVIL;  ?></td>
                                                <td><?php echo $anuladaMOVISTART_MOVIL;  ?></td>
                                                <td><?php echo $nopagoMOVISTART_MOVIL;  ?></td>  
                                                <td><?php echo  $completadaMOVISTART_MOVIL +  $fueracorteMOVISTART_MOVIL + $legalizadaMOVISTART_MOVIL + $portabilidadMOVISTART_MOVIL + $enprocesoMOVISTART_MOVIL + $pendienteMOVISTART_MOVIL + $devolucionMOVISTART_MOVIL + $rechazadaMOVISTART_MOVIL + $anuladaMOVISTART_MOVIL + $nopagoMOVISTART_MOVIL  ?></td>
                                                
                                            </tr>
                                             <tr style="background-color:#5BC500; color:#FFF " >
                                                <td><strong>MOVISTAR FIJA</strong></td>
                                                <td><?php echo $completadaMOVISTART_FIJA;  ?></td>
                                                <td><?php echo $fueracorteMOVISTART_FIJA;  ?></td>
                                                <td><?php echo $legalizadaMOVISTART_FIJA;  ?></td>
                                                <td><?php echo $portabilidadMOVISTART_FIJA;  ?></td>
                                                <td><?php echo $enprocesoMOVISTART_FIJA;  ?></td>
                                                <td><?php echo $pendienteMOVISTART_FIJA;  ?></td>
                                                <td><?php echo $devolucionMOVISTART_FIJA;  ?></td>
                                                <td><?php echo $rechazadaMOVISTART_FIJA;  ?></td>
                                                <td><?php echo $anuladaMOVISTART_FIJA;  ?></td>
                                                <td><?php echo $nopagoMOVISTART_FIJA;  ?></td>  
                                                <td><?php echo  $completadaMOVISTART_FIJA +  $fueracorteMOVISTART_FIJA + $legalizadaMOVISTART_FIJA + $portabilidadMOVISTART_FIJA + $enprocesoMOVISTART_FIJA + $pendienteMOVISTART_FIJA + $devolucionMOVISTART_FIJA + $rechazadaMOVISTART_FIJA + $anuladaMOVISTART_FIJA + $nopagoMOVISTART_FIJA  ?></td>
                                                
                                            </tr>
                                            
                                            <tr style="background-color: #dfe6e9;">
                                                <td><strong>TOTALES</strong></td>
                                                <td><?php echo $valor1 = $completadaAVANTEL   +  $completadaETB_MOVIL   + $completadaETB_FIJA + $completadaCLARO_MOVIL + $completadaCLARO_FIJA  + $completadaMOVISTART_MOVIL + $completadaMOVISTART_FIJA;  ?></td>
                                                <td><?php echo $valor2 = $fueracorteAVANTEL   +  $fueracorteETB_MOVIL   + $fueracorteETB_FIJA + $fueracorteCLARO_MOVIL + $fueracorteCLARO_FIJA  + $fueracorteMOVISTART_MOVIL + $fueracorteMOVISTART_FIJA;  ?></td>
                                                <td><?php echo $valor3 = $legalizadaAVANTEL   +  $legalizadaETB_MOVIL   + $legalizadaETB_FIJA + $legalizadaCLARO_MOVIL + $legalizadaCLARO_FIJA + $legalizadaMOVISTART_MOVIL + $legalizadaMOVISTART_FIJA;  ?></td>
                                                <td><?php echo $valor4 = $portabilidadAVANTEL +  $portabilidadETB_MOVIL + $portabilidadETB_FIJA + $portabilidadCLARO_MOVIL + $portabilidadCLARO_FIJA + $portabilidadMOVISTART_MOVIL + $portabilidadMOVISTART_FIJA;  ?></td>
                                                <td><?php echo $valor5 = $enprocesoAVANTEL    +  $enprocesoETB_MOVIL    + $enprocesoETB_FIJA + $enprocesoCLARO_MOVIL + $enprocesoCLARO_FIJA + $enprocesoMOVISTART_MOVIL + $enprocesoMOVISTART_FIJA; ?></td>
                                                <td><?php echo $valor6 = $pendienteAVANTEL    +  $pendienteETB_MOVIL + $pendienteETB_FIJA + $pendienteCLARO_MOVIL + $pendienteCLARO_FIJA +  $pendienteMOVISTART_MOVIL + $pendienteMOVISTART_FIJA;  ?></td>
                                                <td><?php echo $valor7 = $devolucionAVANTEL   +  $devolucionETB_MOVIL + $devolucionETB_FIJA + $devolucionCLARO_MOVIL + $devolucionCLARO_FIJA + $devolucionMOVISTART_MOVIL + $devolucionMOVISTART_FIJA; ?></td>
                                                <td><?php echo $valor8 = $rechazadaAVANTEL    +  $rechazadaETB_MOVIL + $rechazadaETB_FIJA + $rechazadaCLARO_MOVIL + $rechazadaCLARO_FIJA + $rechazadaMOVISTART_MOVIL + $rechazadaMOVISTART_FIJA;  ?></td>
                                                <td><?php echo $valor9 = $anuladaAVANTEL      +  $anuladaETB_MOVIL + $anuladaETB_FIJA + $anuladaCLARO_MOVIL + $anuladaCLARO_FIJA + $anuladaMOVISTART_MOVIL + $anuladaMOVISTART_FIJA; ?></td>
                                                <td><?php echo $valor10 = $nopagoAVANTEL      +  $nopagoETB_MOVIL + $nopagoETB_FIJA + $nopagoCLARO_MOVIL + $nopagoCLARO_FIJA + $nopagoMOVISTART_MOVIL + $nopagoMOVISTART_FIJA; ?></td>
                                                <td><?php echo $valor1 +  $valor2 + $valor3 + $valor4 + $valor5 + $valor6 + $valor7 + $valor8 + $valor9 + $valor10  ?></td>
                                            </tr>
                                        </table>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-primary">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                           <i class="fa fa-chevron-down"></i> GERENTES VS ESTADOS
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <table class="table table-responsive table-bordered table-hover table-striped">
                                            <thead style="font-weight: bold;">
                                            <tr>
                                                <td></td>
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
                                            </tr>
                                            </thead>                                           
                                                <?php $cont = 1; foreach ( Controller::getGerentes() as $data ): ?>
                                                   <tr>  
                                                    <td><?php echo $cont.' '.$data->nombre. ' '.$data->segundo_nombre.' '.$data->apellido.' '.$data->segundo_apellido;  ?></td>
                                                    <td><?php echo Controller::getGerentesvsEstados($data->id,36,$FechaActual,$FechaFin); ?></td>
                                                    <td><?php echo Controller::getGerentesvsEstados($data->id,42,$FechaActual,$FechaFin); ?></td>
                                                    <td><?php echo Controller::getGerentesvsEstados($data->id,43,$FechaActual,$FechaFin); ?></td>
                                                    <td><?php echo Controller::getGerentesvsEstados($data->id,37,$FechaActual,$FechaFin); ?></td>
                                                    <td><?php echo Controller::getGerentesvsEstados($data->id,35,$FechaActual,$FechaFin); ?></td>
                                                    <td><?php echo Controller::getGerentesvsEstados($data->id,38,$FechaActual,$FechaFin); ?></td>
                                                    <td><?php echo Controller::getGerentesvsEstados($data->id,39,$FechaActual,$FechaFin); ?></td>
                                                    <td><?php echo Controller::getGerentesvsEstados($data->id,40,$FechaActual,$FechaFin); ?></td>
                                                    <td><?php echo Controller::getGerentesvsEstados($data->id,41,$FechaActual,$FechaFin); ?></td>
                                                    <td><?php echo Controller::getGerentesvsEstados($data->id,44,$FechaActual,$FechaFin); ?></td> 
                                                  </tr>
                                                <?php $cont = $cont+1; endforeach; ?>    
                                                  <tr style="background-color: #dfe6e9;">
                                                     <td><strong>TOTAL</strong></td>
                                                     <td><?php echo $completadaAVANTEL + $completadaETB + $completadaCLARO + $completadaMOVISTART; ?></td>
                                                     <td><?php echo $fueracorteAVANTEL + $fueracorteETB + $fueracorteCLARO + $fueracorteMOVISTART; ?></td>
                                                     <td><?php echo $legalizadaAVANTEL + $legalizadaETB + $legalizadaCLARO + $legalizadaMOVISTART; ?></td>
                                                     <td><?php echo $portabilidadAVANTEL + $portabilidadETB + $portabilidadCLARO + $portabilidadMOVISTART; ?></td>
                                                     <td><?php echo $enprocesoAVANTEL + $enprocesoETB + $enprocesoCLARO + $enprocesoMOVISTART; ?></td>
                                                     <td><?php echo $pendienteAVANTEL + $pendienteETB + $pendienteCLARO + $pendienteMOVISTART; ?></td>
                                                     <td><?php echo $devolucionAVANTEL + $devolucionETB + $devolucionCLARO + $devolucionMOVISTART; ?></td>
                                                     <td><?php echo $rechazadaAVANTEL + $rechazadaETB + $rechazadaCLARO + $rechazadaMOVISTART; ?></td>
                                                     <td><?php echo $anuladaAVANTEL + $anuladaETB + $anuladaCLARO + $anuladaMOVISTART; ?></td>
                                                     <td><?php echo $nopagoAVANTEL + $nopagoETB + $nopagoCLARO + $nopagoMOVISTART; ?></td>
                                                 </tr>                                            
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-primary">
                                <div class="panel-heading" role="tab" id="headingTree">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTree" aria-expanded="false" aria-controls="collapseTree">
                                          <i class="fa fa-chevron-down"></i>  GERENTES VS OPERADOR
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTREE">
                                    <div class="panel-body">
                                        por hacer
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-primary">
                                <div class="panel-heading" role="tab" id="headingFour">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                           <i class="fa fa-chevron-down"></i> COORDINADOR/DEALER VS ESTADOS
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                    <div class="panel-body">
                                        
                                        <table class="table table-responsive table-bordered table-hover table-striped">
                                            <thead style="font-weight: bold;">
                                            <tr>
                                                <td></td>
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
                                            </tr>
                                            </thead>                                           
                                                <?php $cont = 1; foreach ( Controller::getCoordinadores() as $data ): ?>
                                                   <tr>  
                                                    <td><?php echo $cont.' '.$data->nombre. ' '.$data->segundo_nombre.' '.$data->apellido.' '.$data->segundo_apellido;  ?></td>
                                                    <td><?php echo Controller::getCoordinadorVsEstadosGenerales($data->id,36,$FechaActual,$FechaFin); ?></td>
                                                    <td><?php echo Controller::getCoordinadorVsEstadosGenerales($data->id,42,$FechaActual,$FechaFin); ?></td>
                                                    <td><?php echo Controller::getCoordinadorVsEstadosGenerales($data->id,43,$FechaActual,$FechaFin); ?></td>
                                                    <td><?php echo Controller::getCoordinadorVsEstadosGenerales($data->id,37,$FechaActual,$FechaFin); ?></td>
                                                    <td><?php echo Controller::getCoordinadorVsEstadosGenerales($data->id,35,$FechaActual,$FechaFin); ?></td>
                                                    <td><?php echo Controller::getCoordinadorVsEstadosGenerales($data->id,38,$FechaActual,$FechaFin); ?></td>
                                                    <td><?php echo Controller::getCoordinadorVsEstadosGenerales($data->id,39,$FechaActual,$FechaFin); ?></td>
                                                    <td><?php echo Controller::getCoordinadorVsEstadosGenerales($data->id,40,$FechaActual,$FechaFin); ?></td>
                                                    <td><?php echo Controller::getCoordinadorVsEstadosGenerales($data->id,41,$FechaActual,$FechaFin); ?></td>
                                                    <td><?php echo Controller::getCoordinadorVsEstadosGenerales($data->id,44,$FechaActual,$FechaFin); ?></td> 
                                                  </tr>
                                                <?php $cont = $cont+1; endforeach; ?>    
                                                                                          
                                        </table>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-primary">
                                <div class="panel-heading" role="tab" id="headingFive">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                           <i class="fa fa-chevron-down"></i> COORDINADOR/DEALER VS OPERADOR
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                                    <div class="panel-body">
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                 
                    
                    
                    
                    
                    <?php
                    $this->Widget('ext.highcharts.HighchartsWidget.HighchartsWidget', array(
                        'options' => array(  
                            
                            'title' => array(
                                'text' => '',
                                'x' => -20 //center
                            ),
                            
                            'chart'=>array('type'=>'column'),                          
                           
                            'xAxis' => array(
                                'categories' => array('COMPLETADAS','FUERA DE CORTE','LEGALIZACION TARDIA','PORTABILIDAD','EN PROCESO','PENDIENTE','DEVOLUCION','RECHAZADA','ANULADA','NO PAGO'),
                            ),
                            'yAxis' => array(
                                 'title' => array('text' => 'TOTALES')
                            ),
                            'tooltip' => array(
                                'valueSuffix' => array(''),
                            ),
                            
                            'legend' => array(
                                'layout' => 'vertical',
                                'align' => 'right',
                                'verticalAlign' => 'middle',
                                'borderWidth' => 0
                            ),
                            
                             'plotOptions'=>array(
                                'column'=>array(
                                    'dataLabels'=>array(
                                        'enabled'=> true
                                    ),
                                    'enableMouseTracking'=> false
                                )
                            ),
                            
                            'series' => array(                              
                               
                                array(
                                    'name' => 'AVANTEL',
                                    'color'=>'#E3007E',
                                    'data' => array(intval($completadaAVANTEL), intval($fueracorteAVANTEL), intval($legalizadaAVANTEL), intval($portabilidadAVANTEL) ,intval($enprocesoAVANTEL), intval($pendienteAVANTEL), intval($devolucionAVANTEL), intval($rechazadaAVANTEL), intval($anuladaAVANTEL), intval($nopagoAVANTEL)),
                                ),
                                
                                array(
                                    'name' => 'ETB MOVIL',
                                    'color'=>'#F26F33',
                                    'data' => array(intval($completadaETB_MOVIL), intval($fueracorteETB_MOVIL), intval($legalizadaETB_MOVIL), intval($portabilidadETB_MOVIL) ,intval($enprocesoETB), intval($pendienteETB_MOVIL), intval($devolucionETB_MOVIL), intval($rechazadaETB_MOVIL), intval($anuladaETB_MOVIL), intval($nopagoETB_MOVIL)),
                                ),
                                array(
                                    'name' => 'ETB FIJA',
                                    'color'=>'#F26F33',
                                    'data' => array(intval($completadaETB_FIJA), intval($fueracorteETB_FIJA), intval($legalizadaETB_FIJA), intval($portabilidadETB_FIJA), intval($enprocesoETB_FIJA), intval($pendienteETB_FIJA), intval($devolucionETB_FIJA), intval($rechazadaETB_FIJA), intval($anuladaETB_FIJA), intval($nopagoETB_FIJA) ),
                                ),
                                
                                array(
                                    'name' => 'CLARO MOVIL',
                                    'color'=>'#e74c3c',
                                    'data' => array(intval($completadaCLARO_MOVIL), intval($fueracorteCLARO_MOVIL), intval($legalizadaCLARO_MOVIL), intval($portabilidadCLARO_MOVIL) ,intval($enprocesoCLARO_MOVIL), intval($pendienteCLARO_MOVIL), intval($devolucionCLARO_MOVIL), intval($rechazadaCLARO_MOVIL), intval($anuladaCLARO_MOVIL), intval($nopagoCLARO_MOVIL)),
                                ),
                                array(
                                    'name' => 'CLARO FIJA',
                                    'color'=>'#e74c3c',
                                    'data' => array(intval($completadaCLARO_FIJA), intval($fueracorteCLARO_FIJA), intval($legalizadaCLARO_FIJA), intval($portabilidadCLARO_FIJA) ,intval($enprocesoCLARO_FIJA), intval($pendienteCLARO_FIJA), intval($devolucionCLARO_FIJA), intval($rechazadaCLARO_FIJA), intval($anuladaCLARO_FIJA), intval($nopagoCLARO_FIJA)),
                                ),
                                
                                array(
                                    'name' => 'MOVISTAR MOVIL',
                                    'color'=>'#5BC500',
                                    'data' => array(intval($completadaMOVISTART_MOVIL), intval($fueracorteMOVISTART_MOVIL), intval($legalizadaMOVISTART_MOVIL), intval($portabilidadMOVISTART_MOVIL) ,intval($enprocesoMOVISTART_MOVIL), intval($pendienteMOVISTART_MOVIL), intval($devolucionMOVISTART_MOVIL), intval($rechazadaMOVISTART_MOVIL), intval($anuladaMOVISTART_MOVIL), intval($nopagoMOVISTART_MOVIL)),
                                ),
                                
                                array(
                                    'name' => 'MOVISTAR FIJA',
                                    'color'=>'#5BC500',
                                    'data' => array(intval($completadaMOVISTART_FIJA), intval($fueracorteMOVISTART_FIJA), intval($legalizadaMOVISTART_FIJA), intval($portabilidadMOVISTART_FIJA) ,intval($enprocesoMOVISTART_FIJA), intval($pendienteMOVISTART_FIJA), intval($devolucionMOVISTART_FIJA), intval($rechazadaMOVISTART_FIJA), intval($anuladaMOVISTART_FIJA), intval($nopagoMOVISTART_FIJA)),
                                ),
                                
//                                array(
//                                    'name' => 'DIRECTV',
//                                    'data' => array(intval($completadaDIRECTV), intval($enprocesoDIRECTV), intval($portabilidadDIRECTV), intval($pendienteDIRECTV) ,  intval($devolucionDIRECTV), intval($rechazadaDIRECTV), intval($anuladaDIRECTV), intval($fueracorteDIRECTV), intval($legalizadaDIRECTV), intval($nopagoDIRECTV), intval($perdidaDIRECTV), intval($externaDIRECTV)),
//                                ),
                                
                            ),
                        ),
//                        'htmlOptions'=>array(),
                        'scripts' => array(     
                            'modules/data',
                            'highcharts-more',  
                            'modules/exporting',   
                            'adapters/mootools-adapter',
                            'modules/drilldown',                           
                          
                        ),
                      
                    ));
                    ?>                    
                    

                    <center>
                         <?php echo CHtml::link('<i class="fa fa-arrow-left" aria-hidden="true"></i> Volver', array('ventas/admin'), array('class' => 'btn btn-info btn-square')); ?>  
                         <?php echo CHtml::link('<i class="fa fa-send" aria-hidden="true"></i> Exportar a datos a Excel', array('ventas/exportarexcel?FechaActual='.$FechaActual.'&FechaFin='.$FechaFin), array('class' => 'btn btn-primary btn-square')); ?>  
                         <?php //echo CHtml::link('<i class="fa fa-send" aria-hidden="true"></i> Exportar Ventas', array('ventas/exportarventas?FechaActual='.$FechaActual.'&FechaFin='.$FechaFin), array('class' => 'btn btn-primary btn-square')); ?>  
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo Yii::app()->request->baseUrl ?>/js/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    
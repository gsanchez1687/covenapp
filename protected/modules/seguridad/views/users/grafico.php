<?php
if (!isset($_POST['Fecha_inicio'])) :
    $FechaActual = date('Y-m-d');
    $FechaFin = date('Y-m-d');
else :
    $FechaActual = $_POST['Fecha_inicio'];
    $FechaFin = $_POST['Fecha_fin'];
endif;

$id = $_GET['id'];
//var_dump($id);



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


/*AVANTEL*/
$enprocesoAVANTEL = Controller::ChartVendedores(4, '', 35, $FechaActual, $FechaFin, $id);
$completadaAVANTEL = Controller::ChartVendedores(4, '', 36, $FechaActual, $FechaFin, $id);
$portabilidadAVANTEL = Controller::ChartVendedores(4, '', 37, $FechaActual, $FechaFin, $id);
$pendienteAVANTEL = Controller::ChartVendedores(4, '', 38, $FechaActual, $FechaFin, $id);
$devolucionAVANTEL = Controller::ChartVendedores(4, '', 39, $FechaActual, $FechaFin, $id);
$rechazadaAVANTEL = Controller::ChartVendedores(4, '', 40, $FechaActual, $FechaFin, $id);
$anuladaAVANTEL = Controller::ChartVendedores(4, '', 41, $FechaActual, $FechaFin, $id);
$fueracorteAVANTEL = Controller::ChartVendedores(4, '', 42, $FechaActual, $FechaFin, $id);
$legalizadaAVANTEL = Controller::ChartVendedores(4, '', 43, $FechaActual, $FechaFin, $id);
$nopagoAVANTEL = Controller::ChartVendedores(4, '', 43, $FechaActual, $FechaFin, $id);
$perdidaAVANTEL = Controller::ChartVendedores(4, '', 43, $FechaActual, $FechaFin, $id);
$externaAVANTEL = Controller::ChartVendedores(4, '', 43, $FechaActual, $FechaFin, $id);

/*ETB FIJA Y MOVIL*/

$enprocesoETB_MOVIL = Controller::ChartVendedores(1, '', 35, $FechaActual, $FechaFin, $id);
$completadaETB_MOVIL = Controller::ChartVendedores(1, '', 36, $FechaActual, $FechaFin, $id);
$portabilidadETB_MOVIL = Controller::ChartVendedores(1, '', 37, $FechaActual, $FechaFin, $id);
$pendienteETB_MOVIL = Controller::ChartVendedores(1, '', 38, $FechaActual, $FechaFin, $id);
$devolucionETB_MOVIL = Controller::ChartVendedores(1, '', 39, $FechaActual, $FechaFin, $id);
$rechazadaETB_MOVIL = Controller::ChartVendedores(1, '', 40, $FechaActual, $FechaFin, $id);
$anuladaETB_MOVIL = Controller::ChartVendedores(1, '', 41, $FechaActual, $FechaFin, $id);
$fueracorteETB_MOVIL = Controller::ChartVendedores(1, '', 42, $FechaActual, $FechaFin, $id);
$legalizadaETB_MOVIL = Controller::ChartVendedores(1, '', 43, $FechaActual, $FechaFin, $id);
$nopagoETB_MOVIL = Controller::ChartVendedores(1, '', 43, $FechaActual, $FechaFin, $id);
$perdidaETB_MOVIL = Controller::ChartVendedores(1, '', 43, $FechaActual, $FechaFin, $id);
$externaETB_MOVIL = Controller::ChartVendedores(1, '', 43, $FechaActual, $FechaFin, $id);

$enprocesoETB_FIJA = Controller::ChartVendedores('', 5, 35, $FechaActual, $FechaFin, $id);
$completadaETB_FIJA = Controller::ChartVendedores('', 5, 36, $FechaActual, $FechaFin, $id);
$portabilidadETB_FIJA = Controller::ChartVendedores('', 5, 37, $FechaActual, $FechaFin, $id);
$pendienteETB_FIJA = Controller::ChartVendedores('', 5, 38, $FechaActual, $FechaFin, $id);
$devolucionETB_FIJA = Controller::ChartVendedores('', 5, 39, $FechaActual, $FechaFin, $id);
$rechazadaETB_FIJA = Controller::ChartVendedores('', 5, 40, $FechaActual, $FechaFin, $id);
$anuladaETB_FIJA = Controller::ChartVendedores('', 5, 41, $FechaActual, $FechaFin, $id);
$fueracorteETB_FIJA = Controller::ChartVendedores('', 5, 42, $FechaActual, $FechaFin, $id);
$legalizadaETB_FIJA = Controller::ChartVendedores('', 5, 43, $FechaActual, $FechaFin, $id);
$nopagoETB_FIJA = Controller::ChartVendedores('', 5, 43, $FechaActual, $FechaFin, $id);
$perdidaETB_FIJA = Controller::ChartVendedores('', 5, 43, $FechaActual, $FechaFin, $id);
$externaETB_FIJA = Controller::ChartVendedores('', 5, 43, $FechaActual, $FechaFin, $id);

/*CLARO FIJA Y MOVIL*/
$enprocesoCLARO_MOVIL = Controller::ChartVendedores(2, '', 35, $FechaActual, $FechaFin, $id);
$completadaCLARO_MOVIL = Controller::ChartVendedores(2, '', 36, $FechaActual, $FechaFin, $id);
$portabilidadCLARO_MOVIL = Controller::ChartVendedores(2, '', 37, $FechaActual, $FechaFin, $id);
$pendienteCLARO_MOVIL = Controller::ChartVendedores(2, '', 38, $FechaActual, $FechaFin, $id);
$devolucionCLARO_MOVIL = Controller::ChartVendedores(2, '', 39, $FechaActual, $FechaFin, $id);
$rechazadaCLARO_MOVIL = Controller::ChartVendedores(2, '', 40, $FechaActual, $FechaFin, $id);
$anuladaCLARO_MOVIL = Controller::ChartVendedores(2, '', 41, $FechaActual, $FechaFin, $id);
$fueracorteCLARO_MOVIL = Controller::ChartVendedores(2, '', 42, $FechaActual, $FechaFin, $id);
$legalizadaCLARO_MOVIL = Controller::ChartVendedores(2, '', 43, $FechaActual, $FechaFin, $id);
$nopagoCLARO_MOVIL = Controller::ChartVendedores(2, '', 43, $FechaActual, $FechaFin, $id);
$perdidaCLARO_MOVIL = Controller::ChartVendedores(2, '', 43, $FechaActual, $FechaFin, $id);
$externaCLARO_MOVIL = Controller::ChartVendedores(2, '', 43, $FechaActual, $FechaFin, $id);

$enprocesoCLARO_FIJA = Controller::ChartVendedores('', 6, 35, $FechaActual, $FechaFin, $id);
$completadaCLARO_FIJA = Controller::ChartVendedores('', 6, 36, $FechaActual, $FechaFin, $id);
$portabilidadCLARO_FIJA = Controller::ChartVendedores('', 6, 37, $FechaActual, $FechaFin, $id);
$pendienteCLARO_FIJA = Controller::ChartVendedores('', 6, 38, $FechaActual, $FechaFin, $id);
$devolucionCLARO_FIJA = Controller::ChartVendedores('', 6, 39, $FechaActual, $FechaFin, $id);
$rechazadaCLARO_FIJA = Controller::ChartVendedores('', 6, 40, $FechaActual, $FechaFin, $id);
$anuladaCLARO_FIJA = Controller::ChartVendedores('', 6, 41, $FechaActual, $FechaFin, $id);
$fueracorteCLARO_FIJA = Controller::ChartVendedores('', 6, 42, $FechaActual, $FechaFin, $id);
$legalizadaCLARO_FIJA = Controller::ChartVendedores('', 6, 43, $FechaActual, $FechaFin, $id);
$nopagoCLARO_FIJA = Controller::ChartVendedores('', 6, 43, $FechaActual, $FechaFin, $id);
$perdidaCLARO_FIJA = Controller::ChartVendedores('', 6, 43, $FechaActual, $FechaFin, $id);
$externaCLARO_FIJA = Controller::ChartVendedores('', 6, 43, $FechaActual, $FechaFin, $id);

/*MOVISTAR*/
$enprocesoMOVISTART_MOVIL = Controller::ChartVendedores(3, '', 35, $FechaActual, $FechaFin, $id);
$completadaMOVISTART_MOVIL = Controller::ChartVendedores(3, '', 36, $FechaActual, $FechaFin, $id);
$portabilidadMOVISTART_MOVIL = Controller::ChartVendedores(3, '', 37, $FechaActual, $FechaFin, $id);
$pendienteMOVISTART_MOVIL = Controller::ChartVendedores(3, '', 38, $FechaActual, $FechaFin, $id);
$devolucionMOVISTART_MOVIL = Controller::ChartVendedores(3, '', 39, $FechaActual, $FechaFin, $id);
$rechazadaMOVISTART_MOVIL = Controller::ChartVendedores(3, '', 40, $FechaActual, $FechaFin, $id);
$anuladaMOVISTART_MOVIL = Controller::ChartVendedores(3, '', 41, $FechaActual, $FechaFin, $id);
$fueracorteMOVISTART_MOVIL = Controller::ChartVendedores(3, '', 42, $FechaActual, $FechaFin, $id);
$legalizadaMOVISTART_MOVIL = Controller::ChartVendedores(3, '', 43, $FechaActual, $FechaFin, $id);
$nopagoMOVISTART_MOVIL = Controller::ChartVendedores(3, '', 43, $FechaActual, $FechaFin, $id);
$perdidaMOVISTART_MOVIL = Controller::ChartVendedores(3, '', 43, $FechaActual, $FechaFin, $id);
$externaMOVISTART_MOVIL = Controller::ChartVendedores(3, '', 43, $FechaActual, $FechaFin, $id);

$enprocesoMOVISTART_FIJA = Controller::ChartVendedores('', 7, 35, $FechaActual, $FechaFin, $id);
$completadaMOVISTART_FIJA = Controller::ChartVendedores('', 7, 36, $FechaActual, $FechaFin, $id);
$portabilidadMOVISTART_FIJA = Controller::ChartVendedores('', 7, 37, $FechaActual, $FechaFin, $id);
$pendienteMOVISTART_FIJA = Controller::ChartVendedores('', 7, 38, $FechaActual, $FechaFin, $id);
$devolucionMOVISTART_FIJA = Controller::ChartVendedores('', 7, 39, $FechaActual, $FechaFin, $id);
$rechazadaMOVISTART_FIJA = Controller::ChartVendedores('', 7, 40, $FechaActual, $FechaFin, $id);
$anuladaMOVISTART_FIJA = Controller::ChartVendedores('', 7, 41, $FechaActual, $FechaFin, $id);
$fueracorteMOVISTART_FIJA = Controller::ChartVendedores('', 7, 42, $FechaActual, $FechaFin, $id);
$legalizadaMOVISTART_FIJA = Controller::ChartVendedores('', 7, 43, $FechaActual, $FechaFin, $id);
$nopagoMOVISTART_FIJA = Controller::ChartVendedores('', 7, 43, $FechaActual, $FechaFin, $id);
$perdidaMOVISTART_FIJA = Controller::ChartVendedores('', 7, 43, $FechaActual, $FechaFin, $id);
$externaMOVISTART_FIJA = Controller::ChartVendedores('', 7, 43, $FechaActual, $FechaFin, $id);


/*DIRECTV*/
$enprocesoDIRECTV = Controller::ChartVendedores(8, '', 35, $FechaActual, $FechaFin, $id);
$completadaDIRECTV = Controller::ChartVendedores(8, '', 36, $FechaActual, $FechaFin, $id);
$portabilidadDIRECTV = Controller::ChartVendedores(8, '', 37, $FechaActual, $FechaFin, $id);
$devolucionDIRECTV = Controller::ChartVendedores(8, '', 39, $FechaActual, $FechaFin, $id);
$rechazadaDIRECTV = Controller::ChartVendedores(8, '', 40, $FechaActual, $FechaFin, $id);
$anuladaDIRECTV = Controller::ChartVendedores(8, '', 41, $FechaActual, $FechaFin, $id);
$fueracorteDIRECTV = Controller::ChartVendedores(8, '', 42, $FechaActual, $FechaFin, $id);
$legalizadaDIRECTV = Controller::ChartVendedores(8, '', 43, $FechaActual, $FechaFin, $id);
$nopagoDIRECTV = Controller::ChartVendedores(8, '', 43, $FechaActual, $FechaFin, $id);
$perdidaDIRECTV = Controller::ChartVendedores(8, '', 43, $FechaActual, $FechaFin, $id);
$externaDIRECTV = Controller::ChartVendedores(8, '', 43, $FechaActual, $FechaFin, $id);
?>

<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3><i class="fa fa-line-chart" aria-hidden="true"></i> Gráficas de tus ventas <?php echo date('Y-m-d'); ?> </h3>
                <center>
                    <?php if (isset($_POST['Fecha_inicio'])) :  ?>
                        <h3>Aplicando Filtos</h3>
                        <b><?php echo Yii::app()->dateFormatter->formatDateTime($FechaActual, 'long', null) . ' Hasta ' . Yii::app()->dateFormatter->formatDateTime($FechaFin, 'long', null);  ?></b>
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
                    <form name="form-graficos" method="POST" action="">
                        <center>
                            <div class="col-md-6 ">
                                <?php
                                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                    'name' => 'Fecha_inicio',
                                    'language' => 'es',
                                    // additional javascript options for the date picker plugin
                                    'options' => array(
                                        'dateFormat' => 'yy/mm/dd',
                                        'maxDate' => "now",
                                        'changeMonth' => true,
                                        'changeYear' => true,
                                        'showAnim' => 'drop', //'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                                    ),
                                    'htmlOptions' => array(
                                        'placeholder' => 'Fecha Inicio',
                                        'class' => 'form-control',
                                    ),
                                ));
                                ?>
                            </div>
                            <div class="col-md-6">
                                <?php
                                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                    'name' => 'Fecha_fin',
                                    'language' => 'es',
                                    'options' => array(
                                        'dateFormat' => 'yy/mm/dd',
                                        'maxDate' => "now",
                                        'changeMonth' => true,
                                        'changeYear' => true,
                                        'showAnim' => 'drop', //'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                                    ),
                                    'htmlOptions' => array(
                                        'placeholder' => 'Fecha Fin',
                                        'class' => 'form-control',
                                    ),
                                ));
                                ?>
                            </div>
                        </center>
                        <br />
                        <br />
                        <center>
                            <input type="submit" value="Filtrar" class="btn btn-info btn-square">
                        </center>
                    </form>



                    <div class="col-md-12">
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
                                        <tr style="background-color:#E3007E; color:#FFF ">
                                            <td><strong>AVANTEL</strong></td>
                                            <td><?php echo $completadaAVANTEL; ?></td>
                                            <td><?php echo $fueracorteAVANTEL; ?></td>
                                            <td><?php echo $legalizadaAVANTEL; ?></td>
                                            <td><?php echo $portabilidadAVANTEL ?></td>
                                            <td><?php echo $enprocesoAVANTEL; ?></td>
                                            <td><?php echo $pendienteAVANTEL;  ?></td>
                                            <td><?php echo $devolucionAVANTEL; ?></td>
                                            <td><?php echo $rechazadaAVANTEL; ?></td>
                                            <td><?php echo $anuladaAVANTEL;  ?></td>
                                            <td><?php echo $nopagoAVANTEL; ?></td>
                                        </tr>
                                        <tr style="background-color:#F26F33; color:#FFF ">
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
                                        <tr style="background-color:#F26F33; color:#FFF ">
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
                                        <tr style="background-color:#e74c3c; color:#FFF ">
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
                                        <tr style="background-color:#e74c3c; color:#FFF ">
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
                                        <tr style="background-color:#5BC500; color:#FFF ">
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
                                        <tr style="background-color:#5BC500; color:#FFF ">
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
                                        <thead style="background-color: #FEFEFE">
                                            <tr>
                                                <td></td>
                                                <td><b>COMPLETADAS</b></td>
                                                <td><b>FUERA DE CORTE</b></td>
                                                <td><b>LEGALIZACION TARDIA</b></td>
                                                <td><b>PORTABILIDAD</b></td>
                                                <td><b>EN PROCESO</b></td>
                                                <td><b>PENDIENTE</b></td>
                                                <td><b>DEVOLUCION</b></td>
                                                <td><b>RECHAZADA</b></td>
                                                <td><b>ANULADA</b></td>
                                                <td><b>NO PAGO</b></td>
                                            </tr>
                                        </thead>
                                        <?php if (!empty(Controller::getRoles())) : ?>
                                            <?php $cont = 1;
                                            foreach (Controller::getRoles() as $data) : ?>
                                                <tr>
                                                    <td><?php echo $cont . ' ' . $data->nombre . ' ' . $data->segundo_nombre . ' ' . $data->apellido . ' ' . $data->segundo_apellido; ?></td>
                                                    <td><?php echo Controller::getCoordinadorVsEstados($data->id, 36, $FechaActual, $FechaFin); ?></td>
                                                    <td><?php echo Controller::getCoordinadorVsEstados($data->id, 42, $FechaActual, $FechaFin); ?></td>
                                                    <td><?php echo Controller::getCoordinadorVsEstados($data->id, 43, $FechaActual, $FechaFin); ?></td>
                                                    <td><?php echo Controller::getCoordinadorVsEstados($data->id, 37, $FechaActual, $FechaFin); ?></td>
                                                    <td><?php echo Controller::getCoordinadorVsEstados($data->id, 35, $FechaActual, $FechaFin); ?></td>
                                                    <td><?php echo Controller::getCoordinadorVsEstados($data->id, 38, $FechaActual, $FechaFin); ?></td>
                                                    <td><?php echo Controller::getCoordinadorVsEstados($data->id, 39, $FechaActual, $FechaFin); ?></td>
                                                    <td><?php echo Controller::getCoordinadorVsEstados($data->id, 40, $FechaActual, $FechaFin); ?></td>
                                                    <td><?php echo Controller::getCoordinadorVsEstados($data->id, 41, $FechaActual, $FechaFin); ?></td>
                                                    <td><?php echo Controller::getCoordinadorVsEstados($data->id, 44, $FechaActual, $FechaFin); ?></td>
                                                </tr>
                                            <?php $cont = $cont + 1;
                                            endforeach; ?>
                                        <?php endif; ?>
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

                    </div>


                    <?php
                    $this->Widget('ext.highcharts.HighchartsWidget.HighchartsWidget', array(
                        'options' => array(

                            'chart' => array('type' => 'column'),

                            'title' => array(
                                'text' => '',
                                'x' => -20 //center
                            ),
                            'subtitle' => array(
                                'text' => strtoupper(Controller::getNombreUsuario($id)),
                                'x' => 0 //center
                            ),
                            'xAxis' => array(
                                'categories' => array('COMPLETADAS', 'FUERA DE CORTE', 'LEGALIZACION TARDIA', 'PORTABILIDAD', 'EN PROCESO', 'PENDIENTE', 'DEVOLUCION', 'RECHAZADA', 'ANULADA', 'NO PAGO'),
                            ),
                            'yAxis' => array(
                                'title' => array(
                                    'text' => 'TOTALES ',
                                ),
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
                            'plotOptions' => array(
                                'column' => array(
                                    'dataLabels' => array(
                                        'enabled' => true
                                    ),
                                    'enableMouseTracking' => false
                                )
                            ),

                            'series' => array(
                                array(
                                    'name' => 'AVANTEL',
                                    'color' => '#E3007E',
                                    'data' => array(intval($completadaAVANTEL), intval($fueracorteAVANTEL), intval($legalizadaAVANTEL), intval($portabilidadAVANTEL), intval($enprocesoAVANTEL), intval($pendienteAVANTEL), intval($devolucionAVANTEL), intval($rechazadaAVANTEL), intval($anuladaAVANTEL), intval($nopagoAVANTEL)),
                                ),
                                array(
                                    'name' => 'ETB MOVIL',
                                    'color' => '#F26F33',
                                    'data' => array(intval($completadaETB_MOVIL), intval($fueracorteETB_MOVIL), intval($legalizadaETB_MOVIL), intval($portabilidadETB_MOVIL), intval($enprocesoETB_MOVIL), intval($pendienteETB_MOVIL), intval($devolucionETB_MOVIL), intval($rechazadaETB_MOVIL), intval($anuladaETB_MOVIL), intval($nopagoETB_MOVIL)),
                                ),
                                array(
                                    'name' => 'ETB FIJA',
                                    'color' => '#F26F33',
                                    'data' => array(intval($completadaETB_FIJA), intval($fueracorteETB_FIJA), intval($legalizadaETB_FIJA), intval($portabilidadETB_FIJA), intval($enprocesoETB_FIJA), intval($pendienteETB_FIJA), intval($devolucionETB_FIJA), intval($rechazadaETB_FIJA), intval($anuladaETB_FIJA), intval($nopagoETB_FIJA)),
                                ),

                                array(
                                    'name' => 'CLARO MOVIL',
                                    'color' => '#e74c3c',
                                    'data' => array(intval($completadaCLARO_MOVIL), intval($fueracorteCLARO_MOVIL), intval($legalizadaCLARO_MOVIL), intval($portabilidadCLARO_MOVIL), intval($enprocesoCLARO_MOVIL), intval($pendienteCLARO_MOVIL), intval($devolucionCLARO_MOVIL), intval($rechazadaCLARO_MOVIL), intval($anuladaCLARO_MOVIL), intval($nopagoCLARO_MOVIL)),
                                ),
                                array(
                                    'name' => 'CLARO FIJA',
                                    'color' => '#e74c3c',
                                    'data' => array(intval($completadaCLARO_FIJA), intval($fueracorteCLARO_FIJA), intval($legalizadaCLARO_FIJA), intval($portabilidadCLARO_FIJA), intval($enprocesoCLARO_FIJA), intval($pendienteCLARO_FIJA), intval($devolucionCLARO_FIJA), intval($rechazadaCLARO_FIJA), intval($anuladaCLARO_FIJA), intval($nopagoCLARO_FIJA)),
                                ),

                                array(
                                    'name' => 'MOVISTAR MOVIL',
                                    'color' => '#5BC500',
                                    'data' => array(intval($completadaMOVISTART_MOVIL), intval($fueracorteMOVISTART_MOVIL), intval($legalizadaMOVISTART_MOVIL), intval($portabilidadMOVISTART_MOVIL), intval($enprocesoMOVISTART_MOVIL), intval($pendienteMOVISTART_MOVIL), intval($devolucionMOVISTART_MOVIL), intval($rechazadaMOVISTART_MOVIL), intval($anuladaMOVISTART_MOVIL), intval($nopagoMOVISTART_MOVIL)),
                                ),

                                array(
                                    'name' => 'MOVISTAR FIJA',
                                    'color' => '#5BC500',
                                    'data' => array(intval($completadaMOVISTART_FIJA), intval($fueracorteMOVISTART_FIJA), intval($legalizadaMOVISTART_FIJA), intval($portabilidadMOVISTART_FIJA), intval($enprocesoMOVISTART_FIJA), intval($pendienteMOVISTART_FIJA), intval($devolucionMOVISTART_FIJA), intval($rechazadaMOVISTART_FIJA), intval($anuladaMOVISTART_FIJA), intval($nopagoMOVISTART_FIJA)),
                                ),

                                //                                array(
                                //                                    'name' => 'DIRECTV',
                                //                                    'data' => array(intval($completadaDIRECTV), intval($enprocesoDIRECTV), intval($portabilidadDIRECTV), intval($pendienteDIRECTV) ,  intval($devolucionDIRECTV), intval($rechazadaDIRECTV), intval($anuladaDIRECTV), intval($fueracorteDIRECTV), intval($legalizadaDIRECTV), intval($nopagoDIRECTV), intval($perdidaDIRECTV), intval($externaDIRECTV)),
                                //                                ),

                            ),
                        ),
                        'htmlOptions' => array(),
                        'scripts' => array(
                            'modules/drilldown',
                            'modules/exporting',
                        ),

                    ));
                    ?>
                    <center>
                        <?php echo CHtml::link('<i class="fa fa-arrow-left" aria-hidden="true"></i> Volver', array('users/admin'), array('class' => 'btn btn-info btn-square')); ?>
                        <?php //echo CHtml::link('<i class="fa fa-send" aria-hidden="true"></i> Exportar a Gráfica', array('ventas/exportarexcel?FechaActual='.$FechaActual.'&FechaFin='.$FechaFin), array('class' => 'btn btn-primary btn-square')); 
                        ?>
                        <?php //echo CHtml::link('<i class="fa fa-send" aria-hidden="true"></i> Exportar Ventas', array('ventas/exportarventas?FechaActual='.$FechaActual.'&FechaFin='.$FechaFin), array('class' => 'btn btn-primary btn-square')); 
                        ?>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo Yii::app()->request->baseUrl ?>/js/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
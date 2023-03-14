<?php

class VentasController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';
    public $modulo = 'Ventas';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
                //'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'planesPorOperador', 'planesestratos', 'Planestecnologia', 'Planestipofija', 'Planescombos', 'cambiarEstdosPorFechas', 'Actualizaobservacionactivacion', 'Actualizacunoportunidad', 'Actualizaplataformaventas', 'actualizadocumentoid', 'actualizapedidofactura', 'actualizapedidoroot', 'actualizanumeroasignado', 'actualizaplanes', 'actualizaimei', 'actualizaiccid', 'actualizaoperadordonante', 'exportaComision','ActualizaObservacionVendedorCoordinador','Actualizatipoalta'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete', 'VentasPreliquidacion', 'Ventasliquidacion', 'Ventascontabilizadas', 'Ventaspagadas', 'graficos', 'actualiza', 'exportarexcel', 'exportarventas', 'vendedores', 'radicador', 'generarrandon', 'actualizaradicacion', 'cambiarnumerosradicador', 'Buscarcliente', 'Createcliente', 'BusquedAjaxClientes', 'deletetemp', 'cargamasiva', 'Comision', 'Avantel', 'Etbfija', 'gerentes', 'Actualizanombrecliente', 'Actualizasegundonombrecliente', 'Actualizaapellidocliente', 'Actualizasegundoapellidocliente', 'Actualizaemailcliente', 'Actualizarfechaexpedicioncliente', 'Actualizadireccioncliente', 'Actualizanombrevendedor', 'Actualizasegundonombrevendedor','getvalorplan'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionComision() {

        $ComisionFechas = new Ventas();

        if (Yii::app()->request->getPost('yt1') == 'Generar'):

            $operador = $_POST['Ventas']['id'];


            switch ($operador):

                case 1: $this->EtbMovil();
                    break;
                case 2: $this->ClaroMovil();
                    break;
                case 3: $this->MovistarMovil();
                    break;
                case 4: $this->Avantel();
                    break;
                case 5: $this->EtbFija();
                    break;
                case 6: $this->ClaroFija();
                    break;
                case 7: $this->MovistarFija();
                    break;
                case 8: $this->Directv();
                    break;

            endswitch;

        endif;

        $this->render('comision', array('ComisionFechas' => $ComisionFechas));
    }

    public function Avantel() {

        try {

            $Fecha_inicio = Yii::app()->request->getPost('Fecha_inicio');
            $Fecha_fin = Yii::app()->request->getPost('Fecha_fin');
            $operador = $_POST['Ventas']['id'];
            $movil = Yii::app()->params['movil'];


            $getEstadoVentas = Ventas::getEstadoVentas();
            $completado = $getEstadoVentas[36];
            $legalizado = $getEstadoVentas[43];
            $fueraCorte = $getEstadoVentas[42];

//        $getvalorcomisioncargo = Ventas::getvalorcomisioncargo();
//        $freelanceFuerzadeVentas = $getvalorcomisioncargo[145];
//        $dealer1 =  $getvalorcomisioncargo[146];
//        $dealer2 = $getvalorcomisioncargo[147];
//        $dealer3 = $getvalorcomisioncargo[148];


            $getVentasComisionesmovil = Ventas::getVentasComisiones($Fecha_inicio, $Fecha_fin, $movil, $operador);



            $consultaVentasVariables = VentasVariables::model()->find();




            foreach ($getVentasComisionesmovil as $datos):

                $incumplimientoLegalizacion = Ventas::IncumplimientoLegalizacion($datos->fecha_activacion, $datos->fecha_legalizacion);

                $convertir = Ventas::PrimerPaso($datos->plan->valor, $consultaVentasVariables->iva_consumo_total);

                $resultado1 = str_replace(',', '', $convertir);

                $resultado2 = Ventas::SegundoPaso($resultado1, $consultaVentasVariables->avantel_conexcel);

                $resultado3 = Ventas::tercerPaso($resultado1, $consultaVentasVariables->base_comision_avantel);

                $CuartoPaso = Ventas::CuartoPaso($resultado3, $consultaVentasVariables->comision_tradicional1);

                $resultado4 = round($CuartoPaso, 0, PHP_ROUND_HALF_DOWN);

                if ($datos->vendedor->persona->cargo_id = 57 || $datos->vendedor->persona->cargo_id == 59 || $datos->vendedor->persona->cargo_id == 58 || $datos->vendedor->persona->cargo_id == 57):
                    $valor = 0.05;
                    $QuintoPaso = Ventas::QuintoPaso($resultado4, $valor);
                    $resultado5 = round($QuintoPaso, 0, PHP_ROUND_HALF_DOWN);

                endif;

                $resultado6 = Ventas::SextoPaso($resultado4, $resultado5);

                $resultado7 = Ventas::OctavoPaso($datos->vendedor->persona->rete_fuente, $datos->vendedor->persona->regimen_id, $resultado6);

                $resultado8 = Ventas::NovenoPaso($datos->vendedor->persona->sucursal, $resultado6, $consultaVentasVariables->reteica);

                $resultado9 = Ventas::DecimoPaso($datos->vendedor->persona->regimen_id, $resultado6, $consultaVentasVariables->iva);

                $resultado10 = Ventas::Undecimo($resultado6, $resultado7, $resultado8, $incumplimientoLegalizacion, $resultado9);

                $modelComisionesVendedores = new ComisionesVendedores();
                $modelComisionesVendedores->venta_id = $datos->id;
                $modelComisionesVendedores->revenue = $resultado1;
                $modelComisionesVendedores->comision_conexcel = $resultado2;
                $modelComisionesVendedores->base_comision = $resultado3;
                $modelComisionesVendedores->comision_inicial = $resultado4;
                $modelComisionesVendedores->fondo = $resultado5;
                $modelComisionesVendedores->comision_menos_fondo = $resultado6;
                $modelComisionesVendedores->rete_fuente = $resultado7;
                $modelComisionesVendedores->reteica = $resultado8;
                $modelComisionesVendedores->iva = $resultado9;
                $modelComisionesVendedores->precomision = $resultado10;
                $modelComisionesVendedores->incumplimiento_legalizacion = $incumplimientoLegalizacion;
                $modelComisionesVendedores->liquidacion = $this->generarliquidacion($operador, '_TRADICIONAL_DEL_', $Fecha_inicio, '_A_', $Fecha_fin);
                $modelComisionesVendedores->save();

                Ventas::ComprobantePagosTotalizados($modelComisionesVendedores->venta_id, $resultado4, $resultado5, $resultado6, $resultado7, $resultado8);

                /* CONSULTO LAS VENTAS PARA LUEGO CAMBIAR EL ESTADO A PRELIQUIDADAS */
                $modelVentas = $this->loadModel($datos->id);
                $modelVentas->estado_id = 47;  /* preliquidada */
                $modelVentas->save();
                Yii::app()->user->setFlash('app', "SE HA GENERADO");

            endforeach;
        } catch (Exception $exc) {

            Yii::app()->user->setFlash('app', "ERROR AL GENERAR LA COMISION: " . $exc);
        }
    }

    public function autoincrementoradicadorliquidacion($operador, $texto1, $fecha_inicio, $texto2, $fecha_fin) {


        $criterio = new CDbCriteria();
        $criterio->select = "max(liquidacion) liquidacion ";
        $models = ComisionesVendedores::model()->findAll($criterio);


        foreach ($models as $data):

            if ($data->liquidacion == null):
                $codigo = Ventas::getOperadorDonanteNombre($operador) . $texto1 . $fecha_inicio . $texto2 . $fecha_fin;

            else:
                $var = $data->liquidacion;
                $a = substr($var, strrpos($var, 'FDC') + 3);

                $b = $a + 1;

                $serial = $b;
                $serial_final = $serial;

                return $serial_final;


            endif;
        endforeach;

        return $codigo;
    }

    public function generarliquidacion($operador, $texto1, $fecha_inicio, $texto2, $fecha_fin) {

        $prefijo = 'FDC';
        $b = $this->autoincrementoradicadorliquidacion($operador, $texto1, $fecha_inicio, $texto2, $fecha_fin);
        $codigo = $prefijo . $b . Ventas::getOperadorDonanteNombre($operador) . $texto1 . $fecha_inicio . $texto2 . $fecha_fin;

        return $codigo;
    }

    public function Etbfija() {

        $Fecha_inicio = Yii::app()->request->getPost('Fecha_inicio');
        $Fecha_fin = Yii::app()->request->getPost('Fecha_fin');
        $operador = $_POST['Ventas']['id'];

        $nueva = Yii::app()->params['nueva'];
        $migracion = Yii::app()->params['migracionlc'];
        $migraciondc = Yii::app()->params['migraciondc'];

        $getEstadoVentas = Ventas::getEstadoVentas();
        $completado = $getEstadoVentas[36];
        $legalizado = $getEstadoVentas[43];
        $fueraCorte = $getEstadoVentas[42];

        $getVentasComisionesFijas = Ventas::getVentasComisionesEtbFija($completado, $legalizado, $fueraCorte, $Fecha_inicio, $Fecha_fin, 53, $operador);
        foreach ($getVentasComisionesFijas as $datos):

            $modelComisionesEtbfija = new ComisionesEtbfija;

            $VentaFijaEstrato = $datos->ventasFijases[0]->estrato;
            $tipoVenta = $datos->ventasFijases[0]->tipo_fija_id;
            $PlanValor = $datos->plan->valor;
            $cargo = $datos->vendedor->persona->cargo_id;


            /*             * *******************************COMISION BUSINESS BUSINESS************************************************ */
            /* COMISIONES POR TIPO DE VENTA FIBRA */
            if ($operador == 5 && $tipoVenta == 76 && $VentaFijaEstrato == 1 || $VentaFijaEstrato == 2):

                $baseImpuesto = $PlanValor;
                $ingresoComision = $baseImpuesto * Ventas::getComision($tipoVenta);
                $ingresoCensantiaComercial = $baseImpuesto * Ventas::getCesantiaMercantil($tipoVenta);

            elseif ($operador == 5 && $tipoVenta == 76 && $VentaFijaEstrato >= 3):

                $baseImpuesto = $PlanValor / 1.19;
                $ingresoComision = $baseImpuesto * Ventas::getComision($tipoVenta);
                $ingresoCensantiaComercial = $baseImpuesto * Ventas::getCesantiaMercantil($tipoVenta);


            elseif ($operador == 5 && $tipoVenta == 77 && $VentaFijaEstrato == 1 || $VentaFijaEstrato == 2):
                $baseImpuesto = $PlanValor;
                $ingresoComision = $baseImpuesto * Ventas::getComision($tipoVenta);
                $ingresoCensantiaComercial = $baseImpuesto * Ventas::getCesantiaMercantil($tipoVenta);
                ;


            elseif ($operador == 5 && $tipoVenta == 77 && $VentaFijaEstrato >= 3):
                $baseImpuesto = $PlanValor / 1.19;
                $ingresoComision = $baseImpuesto * Ventas::getComision($tipoVenta);
                $ingresoCensantiaComercial = $baseImpuesto * Ventas::getCesantiaMercantil($tipoVenta);

            elseif ($operador == 5 && $tipoVenta == 98 && $VentaFijaEstrato == 1 || $VentaFijaEstrato == 2):


                $baseImpuesto = $PlanValor;
                $ingresoComision = $baseImpuesto * Ventas::getComision($tipoVenta);
                $ingresoCensantiaComercial = $baseImpuesto * Ventas::getCesantiaMercantil($tipoVenta);


            elseif ($operador == 5 && $tipoVenta == 98 && $VentaFijaEstrato >= 3):

                $baseImpuesto = $PlanValor / 1.19;
                $ingresoComision = $baseImpuesto * Ventas::getComision($tipoVenta);
                $ingresoCensantiaComercial = $baseImpuesto * Ventas::getCesantiaMercantil($tipoVenta);

            elseif ($operador == 5 && $tipoVenta == 118 && $VentaFijaEstrato == 1 || $VentaFijaEstrato == 2):


                $baseImpuesto = $PlanValor;
                $ingresoComision = $baseImpuesto * Ventas::getComision($tipoVenta);
                $ingresoCensantiaComercial = $baseImpuesto * Ventas::getCesantiaMercantil($tipoVenta);

            elseif ($operador == 5 && $tipoVenta == 118 && $VentaFijaEstrato >= 3):


                $baseImpuesto = $PlanValor / 1.19;
                $ingresoComision = $baseImpuesto * Ventas::getComision($tipoVenta);
                $ingresoCensantiaComercial = $baseImpuesto * Ventas::getCesantiaMercantil($tipoVenta);

            elseif ($operador == 5 && $tipoVenta == 119 && $VentaFijaEstrato == 1 || $VentaFijaEstrato == 2):

                $baseImpuesto = $PlanValor;
                $ingresoComision = $baseImpuesto * Ventas::getComision($tipoVenta);
                $ingresoCensantiaComercial = $baseImpuesto * Ventas::getCesantiaMercantil($tipoVenta);

            elseif ($operador == 5 && $tipoVenta == 119 && $VentaFijaEstrato >= 3):

                $baseImpuesto = $PlanValor / 1.19;
                $ingresoComision = $baseImpuesto * Ventas::getComision($tipoVenta);
                $ingresoCensantiaComercial = $baseImpuesto * Ventas::getCesantiaMercantil($tipoVenta);

            elseif ($operador == 5 && $tipoVenta == 120 && $VentaFijaEstrato == 1 || $VentaFijaEstrato == 2):

                $baseImpuesto = $PlanValor;
                $ingresoComision = $baseImpuesto * Ventas::getComision($tipoVenta);
                $ingresoCensantiaComercial = $baseImpuesto * Ventas::getCesantiaMercantil($tipoVenta);

            elseif ($operador == 5 && $tipoVenta == 120 && $VentaFijaEstrato >= 3):

                $baseImpuesto = $PlanValor / 1.19;
                $ingresoComision = $baseImpuesto * Ventas::getComision($tipoVenta);
                $ingresoCensantiaComercial = $baseImpuesto * Ventas::getCesantiaMercantil($tipoVenta);

            elseif ($operador == 5 && $tipoVenta == 121 && $VentaFijaEstrato == 1 || $VentaFijaEstrato == 2):

                $baseImpuesto = $PlanValor;
                $ingresoComision = $baseImpuesto * Ventas::getComision($tipoVenta);
                $ingresoCensantiaComercial = $baseImpuesto * Ventas::getCesantiaMercantil($tipoVenta);

            elseif ($operador == 5 && $tipoVenta == 121 && $VentaFijaEstrato >= 3):

                $baseImpuesto = $PlanValor / 1.19;
                $ingresoComision = $baseImpuesto * Ventas::getComision($tipoVenta);
                $ingresoCensantiaComercial = $baseImpuesto * Ventas::getCesantiaMercantil($tipoVenta);

            endif;


            /* COMISION POR TIPO DE VENTA COBRE Y FTTC */
            if ($operador == 5 && $tipoVenta == 122 && $VentaFijaEstrato == 1 || $VentaFijaEstrato == 2):

                $baseImpuesto = $PlanValor;
                $ingresoComision = $baseImpuesto * Ventas::getComision($tipoVenta);
                $ingresoCensantiaComercial = $baseImpuesto * Ventas::getCesantiaMercantil($tipoVenta);

            elseif ($operador == 5 && $tipoVenta == 122 && $VentaFijaEstrato >= 3):

                $baseImpuesto = $PlanValor / 1.19;
                $ingresoComision = $baseImpuesto * Ventas::getComision($tipoVenta);
                $ingresoCensantiaComercial = $baseImpuesto * Ventas::getCesantiaMercantil($tipoVenta);

            elseif ($operador == 5 && $tipoVenta == 123 && $VentaFijaEstrato == 1 || $VentaFijaEstrato == 2):

                $baseImpuesto = $PlanValor;
                $ingresoComision = $baseImpuesto * Ventas::getComision($tipoVenta);
                $ingresoCensantiaComercial = $baseImpuesto * Ventas::getCesantiaMercantil($tipoVenta);

            elseif ($operador == 5 && $tipoVenta == 123 && $VentaFijaEstrato >= 3):

                $baseImpuesto = $PlanValor / 1.19;
                $ingresoComision = $baseImpuesto * Ventas::getComision($tipoVenta);
                $ingresoCensantiaComercial = $baseImpuesto * Ventas::getCesantiaMercantil($tipoVenta);

            elseif ($operador == 5 && $tipoVenta == 124 && $VentaFijaEstrato == 1 || $VentaFijaEstrato == 2):

                $baseImpuesto = $PlanValor;
                $ingresoComision = $baseImpuesto * Ventas::getComision($tipoVenta);
                $ingresoCensantiaComercial = $baseImpuesto * Ventas::getCesantiaMercantil($tipoVenta);

            elseif ($operador == 5 && $tipoVenta == 124 && $VentaFijaEstrato >= 3):

                $baseImpuesto = $PlanValor / 1.19;
                $ingresoComision = $baseImpuesto * Ventas::getComision($tipoVenta);
                $ingresoCensantiaComercial = $baseImpuesto * Ventas::getCesantiaMercantil($tipoVenta);

            elseif ($operador == 5 && $tipoVenta == 125 && $VentaFijaEstrato == 1 || $VentaFijaEstrato == 2):

                $baseImpuesto = $PlanValor;
                $ingresoComision = $baseImpuesto * Ventas::getComision($tipoVenta);
                $ingresoCensantiaComercial = $baseImpuesto * Ventas::getCesantiaMercantil($tipoVenta);

            elseif ($operador == 5 && $tipoVenta == 125 && $VentaFijaEstrato >= 3):

                $baseImpuesto = $PlanValor / 1.19;
                $ingresoComision = $baseImpuesto * Ventas::getComision($tipoVenta);
                $ingresoCensantiaComercial = $baseImpuesto * Ventas::getCesantiaMercantil($tipoVenta);

            elseif ($operador == 5 && $tipoVenta == 126 && $VentaFijaEstrato == 1 || $VentaFijaEstrato == 2):

                $baseImpuesto = $PlanValor;
                $ingresoComision = $baseImpuesto * Ventas::getComision($tipoVenta);
                $ingresoCensantiaComercial = $baseImpuesto * Ventas::getCesantiaMercantil($tipoVenta);

            elseif ($operador == 5 && $tipoVenta == 126 && $VentaFijaEstrato >= 3):

                $baseImpuesto = $PlanValor / 1.19;
                $ingresoComision = $baseImpuesto * Ventas::getComision($tipoVenta);
                $ingresoCensantiaComercial = $baseImpuesto * Ventas::getCesantiaMercantil($tipoVenta);

            elseif ($operador == 5 && $tipoVenta == 127 && $VentaFijaEstrato == 1 || $VentaFijaEstrato == 2):

                $baseImpuesto = $PlanValor;
                $ingresoComision = $baseImpuesto * Ventas::getComision($tipoVenta);
                $ingresoCensantiaComercial = $baseImpuesto * Ventas::getCesantiaMercantil($tipoVenta);

            elseif ($operador == 5 && $tipoVenta == 127 && $VentaFijaEstrato >= 3):

                $baseImpuesto = $PlanValor / 1.19;
                $ingresoComision = $baseImpuesto * Ventas::getComision($tipoVenta);
                $ingresoCensantiaComercial = $baseImpuesto * Ventas::getCesantiaMercantil($tipoVenta);

            elseif ($operador == 5 && $tipoVenta == 128 && $VentaFijaEstrato == 1 || $VentaFijaEstrato == 2):

                $baseImpuesto = $PlanValor;
                $ingresoComision = $baseImpuesto * Ventas::getComision($tipoVenta);
                $ingresoCensantiaComercial = $baseImpuesto * Ventas::getCesantiaMercantil($tipoVenta);

            elseif ($operador == 5 && $tipoVenta == 128 && $VentaFijaEstrato >= 3):

                $baseImpuesto = $PlanValor / 1.19;
                $ingresoComision = $baseImpuesto * Ventas::getComision($tipoVenta);
                $ingresoCensantiaComercial = $baseImpuesto * Ventas::getCesantiaMercantil($tipoVenta);

            elseif ($operador == 5 && $tipoVenta == 129 && $VentaFijaEstrato == 1 || $VentaFijaEstrato == 2):

                $baseImpuesto = $PlanValor;
                $ingresoComision = $baseImpuesto * Ventas::getComision($tipoVenta);
                $ingresoCensantiaComercial = $baseImpuesto * Ventas::getCesantiaMercantil($tipoVenta);

            elseif ($operador == 5 && $tipoVenta == 129 && $VentaFijaEstrato >= 3):

                $baseImpuesto = $PlanValor / 1.19;
                $ingresoComision = $baseImpuesto * Ventas::getComision($tipoVenta);
                $ingresoCensantiaComercial = $baseImpuesto * Ventas::getCesantiaMercantil($tipoVenta);

            elseif ($operador == 5 && $tipoVenta == 130 && $VentaFijaEstrato == 1 || $VentaFijaEstrato == 2):

                $baseImpuesto = $PlanValor;
                $ingresoComision = $baseImpuesto * Ventas::getComision($tipoVenta);
                $ingresoCensantiaComercial = $baseImpuesto * Ventas::getCesantiaMercantil($tipoVenta);

            elseif ($operador == 5 && $tipoVenta == 130 && $VentaFijaEstrato >= 3):

                $baseImpuesto = $PlanValor / 1.19;
                $ingresoComision = $baseImpuesto * Ventas::getComision($tipoVenta);
                $ingresoCensantiaComercial = $baseImpuesto * Ventas::getCesantiaMercantil($tipoVenta);

            endif;

            $modelComisionesEtbfija->venta_id = $datos->id;
            $modelComisionesEtbfija->cargo_basico = $PlanValor;
            $modelComisionesEtbfija->base = round($baseImpuesto);
            $modelComisionesEtbfija->ingreso_comision = round($ingresoComision);
            $modelComisionesEtbfija->ingreso_cesantia_comercial = round($ingresoCensantiaComercial);



            $modelComisionesEtbfija->save();


            /* COMISION DE VENDEDORES */
            $modelComisionesEtbfija = Ventas::getComisionesETBFija($datos->id);
            foreach ($modelComisionesEtbfija as $data):

                if ($datos->vendedor->persona->cargo_id == 117):
                    $xx = 0.90;
                    $yy = 0.50;
                elseif ($datos->vendedor->persona->cargo_id == 116):

                    $xx = 0.90;
                    $yy = 0.50;

                elseif ($datos->vendedor->persona->cargo_id == 59):

                    $xx = 0.100;
                    $yy = 0.85;

                elseif ($datos->vendedor->persona->cargo_id == 58):

                    $xx = 0.100;
                    $yy = 0.80;

                elseif ($datos->vendedor->persona->cargo_id == 57):

                    $xx = 0.90;
                    $yy = 0.70;

                endif;

                $modelComisionesVendedores = new ComisionesVendedores;
                $estratos = $this->loadModelEstratosVentasFijas($datos->id);
                if ($estratos->estrato == 1 || $estratos->estrato == 2):

                    $modelComisionesVendedores->venta_id = $datos->id;
                    $modelComisionesVendedores->base_comision = round($data->ingreso_comision * $xx);
                    $modelComisionesVendedores->valor_comision = round($modelComisionesVendedores->base_comision * $yy);
                elseif ($estratos->estrato >= 3):

                    $modelComisionesVendedores->venta_id = $datos->id;
                    $modelComisionesVendedores->base_comision = round($data->ingreso_comision * $xx);
                    $modelComisionesVendedores->valor_comision = round($modelComisionesVendedores->base_comision * $yy);

                endif;
                $modelComisionesVendedores->save();

            endforeach;

            /*             * *******************************COMISION VENDEDORES**************************************************** */
            /* CONSULTO LAS VENTAS PARA LUEGO CAMBIAR EL ESTADO A PRELIQUIDADAS */
            $modelVentas = $this->loadModel($datos->id);
            $modelVentas->estado_id = 47;
            $modelVentas->save();
        endforeach;
    }

    public function actionCargamasiva() {
        
        $model = new Ventas;      
        
        if (isset($_POST['yt0'])== 'Guardar') {          
            $model->attributes = $_POST['yt0'];
            $filelist = CUploadedFile::getInstancesByName('archivo');         
            // To validate 
            if ($filelist){
            
                $model->archivo = 1;
            
                foreach ($filelist as $file) {
                    try {
                        $transaction = Yii::app()->db->beginTransaction();
                        $handle = fopen("$file->tempName", "r");
                        $row = 1;
                        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                            if ($row > 1) {
                               
                                $model = new Ventas;
                                $model->operador_id = Ventas::setOperador($data[0]);
                                $model->plan_id = Ventas::setPlanid($data[1]);
                                
                                
                                $model->save();
                                
                            }
                            $row++;
                        }
                        $transaction->commit();
                        $this->redirect('admin');
                    } catch (Exception $error) {
                        print_r($error);
                        $transaction->rollback();
                    }
                }
                }           
        }

        $this->render('cargamasiva',array('model'=>$model));
    }



    public function actionCreatecliente() {
        if (Yii::app()->authRBAC->checkAccess('clientes_crear')):
            try {
                $modelCliente = new Clientes;
                $transaction = $modelCliente->dbConnection->beginTransaction();

                if (trim(Yii::app()->request->getPost('Clientes_fecha_nacimiento')) == '' && trim(Yii::app()->request->getPost('Clientes_fecha_expedicion')) == ''):
                    header('Content-type: application/json; charst=utf-8');
                    //$transaction->commit();
                    echo CJSON::encode(array('ok' => false));
                else:
                  
//                    $Clientes_fecha_expedicion = strtotime(Yii::app()->request->getPost('Clientes_fecha_expedicion'));
//                    $fecha_expedicion = date('Y-m-d', $Clientes_fecha_expedicion);
//                   
//
//                    $Clientes_fecha_nacimiento = strtotime(Yii::app()->request->getPost('Clientes_fecha_nacimiento'));
//                    $fecha_nacimiento = date('Y-m-d', $Clientes_fecha_nacimiento);

                    $modelCliente->id = trim(Yii::app()->request->getPost('Clientes_numero_identidad'));
                    $modelCliente->nombre = Yii::app()->request->getPost('Clientes_nombre');
                    $modelCliente->segundo_nombre = Yii::app()->request->getPost('Clientes_segundo_nombre');
                    $modelCliente->apellido = Yii::app()->request->getPost('Clientes_apellido');
                    $modelCliente->segundo_apellido = Yii::app()->request->getPost('Clientes_segundo_apellido');
                    $modelCliente->fecha_expedicion = Yii::app()->request->getPost('Clientes_fecha_expedicion');
                    $modelCliente->fijo = trim(Yii::app()->request->getPost('Clientes_fijo'));
                    $modelCliente->movil = trim(Yii::app()->request->getPost('Clientes_movil'));
                    $modelCliente->direccion = trim(Yii::app()->request->getPost('Clientes_direccion'));
                    $modelCliente->email = trim(Yii::app()->request->getPost('Clientes_email'));
                    $modelCliente->ciudad_id = trim(Yii::app()->request->getPost('Clientes_ciudad_id'));
                    $modelCliente->fecha_nacimiento = Yii::app()->request->getPost('Clientes_fecha_nacimiento');
                    $modelCliente->tipoDocumento = trim(Yii::app()->request->getPost('Clientes_tipo_documento'));
                    $modelCliente->numero_identidad = trim(Yii::app()->request->getPost('Clientes_numero_identidad'));


                endif;


                if (Yii::app()->request->getPost('Clientes_tipo_documento') == 72):

                    $modelCliente->tipo_cliente = 71;

                elseif (Yii::app()->request->getPost('Clientes_tipo_documento') == 32 || Yii::app()->request->getPost('Clientes_tipo_documento') == 31):

                    $modelCliente->tipo_cliente = 70;
                endif;

                if ($modelCliente->save()):
                    header('Content-type: application/json; charst=utf-8');
                    $transaction->commit();
                    echo CJSON::encode(array('ok' => true, 'numero_identidad' => $modelCliente->numero_identidad));
                else:
                    header('Content-type: application/json; charst=utf-8');
                    //$transaction->commit();
                    echo CJSON::encode(array('ok' => false));

                endif;
            } catch (Exception $ex) {
                header('Content-type: application/json; charst=utf-8');
                $transaction->rollBack();
                print CJSON::encode(array('ok' => false));
            }


        endif;
    }

    public function actionBusquedAjaxClientes() {
        $this->layout = 'empty';
        $request = trim($_GET['term']);

        if ($request != '') {

            $q = new CDbCriteria();
            $q->addCondition('numero_identidad=' . $request);
            $numero_identidad = Clientes::model()->find($q);

            if (is_null($numero_identidad)):

                echo CJSON::encode(array('ok' => false));

            else:

                echo CJSON::encode(array('ok' => true, 'numero_identidad' => $numero_identidad->numero_identidad));

            endif;
        }
    }

    public function actionBuscarcliente() {

        header('Content-type: application/json; charst=utf-8');
        $cliente_id = Yii::app()->request->getPost('cliente_id');

        $q = new CDbCriteria();
        $q->addCondition('numero_identidad=' . $cliente_id);
        $numero_identidad = Clientes::model()->find($q);

        if (is_null($numero_identidad)):

            echo CJSON::encode(array('ok' => false));

        else:

            echo CJSON::encode(array('ok' => TRUE, 'nombre' => $numero_identidad->nombre, 'apellido' => $numero_identidad->apellido, 'numero_identidad' => $numero_identidad->numero_identidad, 'movil' => $numero_identidad->movil));

        endif;
    }

    public function actionExportarventas() {

        $FechaActual = $_GET['FechaActual'];
        $FechaFin = $_GET['FechaFin'];

        $model = new Ventas('search');
        $consultaExpotVentas = $model->ConsultaExpotVentas($FechaActual, $FechaFin);

        Yii::app()->theme = "exportar";


        $render = $this->render('exportarventas', array('consultaExpotVentas' => $consultaExpotVentas));
        Yii::app()->request->sendFile('ventas.xls', $render);
    }

    public function actionExportacomision() {

        Yii::app()->theme = "exportar";

        if ($_GET):


            if ($_GET['fecha_inicio'] != '' && $_GET['fecha_fin'] != '' && $_GET['operador'] != ''):

                $fecha_inicio = $_GET['fecha_inicio'];
                $fecha_fin = $_GET['fecha_fin'];
                $operador = $_GET['operador'];
                
                // angel martinez - cambio fecha_activacion => creado
                //$model = Ventas::model()->findAll(array(
                //    'condition' => 't.fecha_activacion BETWEEN :Fecha_inicio AND :Fecha_fin AND t.operador_id=:operador',
                //    'params' => array(':operador' => $operador, ':Fecha_inicio' => $fecha_inicio, ':Fecha_fin' => $fecha_fin),
                //));
                $model = Ventas::model()->findAll(array(
                    'condition' => 't.creado BETWEEN :Fecha_inicio AND :Fecha_fin AND t.operador_id=:operador',
                    'params' => array(':operador' => $operador, ':Fecha_inicio' => $fecha_inicio, ':Fecha_fin' => date('Y-m-d', strtotime($fecha_fin. ' + 1 days'))),
                ));

            elseif ($_GET['fecha_inicio'] != '' && $_GET['fecha_fin'] != '' && $_GET['operador'] == ''):

                $fecha_inicio = $_GET['fecha_inicio'];
                $fecha_fin = $_GET['fecha_fin'];
                $operador = $_GET['operador'];
                
                // angel martinez - cambio fecha_activacion => creado
                //$model = Ventas::model()->findAll(array(
                //    'condition' => 't.fecha_activacion BETWEEN :Fecha_inicio AND :Fecha_fin',
                //    'params' => array(':Fecha_inicio' => $fecha_inicio, ':Fecha_fin' => $fecha_fin),
                //));
                $model = Ventas::model()->findAll(array(
                    'condition' => 't.creado BETWEEN :Fecha_inicio AND :Fecha_fin',
                    'params' => array(':Fecha_inicio' => $fecha_inicio, ':Fecha_fin' => date('Y-m-d', strtotime($fecha_fin. ' + 1 days'))),
                ));

            else:
                $model = Ventas::model()->findAll();
            endif;

        else:
             $model = Ventas::model()->findAll();
        endif;




        header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header("Content-Disposition: attachment;filename=\"VentasTotales.xls\"");

        $render = $this->render('exportarcomision', array(
            'model' => $model,        
        ));

    }

    public function actionExportarexcel() {

        Yii::app()->theme = "exportar";
        $FechaActual = $_GET['FechaActual'];
        $FechaFin = $_GET['FechaFin'];

        $enprocesoETB = Controller::chart(1, 5, 35, $FechaActual, $FechaFin);
        $completadaETB = Controller::chart(1, 5, 36, $FechaActual, $FechaFin);
        $portabilidadETB = Controller::chart(1, 5, 37, $FechaActual, $FechaFin);
        $pendienteETB = Controller::chart(1, 5, 38, $FechaActual, $FechaFin);
        $devolucionETB = Controller::chart(1, 5, 39, $FechaActual, $FechaFin);
        $rechazadaETB = Controller::chart(1, 5, 40, $FechaActual, $FechaFin);
        $anuladaETB = Controller::chart(1, 5, 41, $FechaActual, $FechaFin);
        $fueracorteETB = Controller::chart(1, 5, 42, $FechaActual, $FechaFin);
        $legalizadaETB = Controller::chart(1, 5, 43, $FechaActual, $FechaFin);
        $nopagoETB = Controller::chart(1, 5, 44, $FechaActual, $FechaFin);
        $perdidaETB = Controller::chart(1, 5, 45, $FechaActual, $FechaFin);
        $externaETB = Controller::chart(1, 5, 46, $FechaActual, $FechaFin);
        $preliquidadaETB = Controller::chart(1, 5, 47, $FechaActual, $FechaFin);
        $liquidadaETB = Controller::chart(1, 5, 48, $FechaActual, $FechaFin);
        $contabilizadaETB = Controller::chart(1, 5, 49, $FechaActual, $FechaFin);
        $pagadaETB = Controller::chart(1, 5, 50, $FechaActual, $FechaFin);

        /* CLARO FIJA Y MOVIL */
        $enprocesoCLARO = Controller::chart(2, 6, 35, $FechaActual, $FechaFin);
        $completadaCLARO = Controller::chart(2, 6, 36, $FechaActual, $FechaFin);
        $portabilidadCLARO = Controller::chart(2, 6, 37, $FechaActual, $FechaFin);
        $pendienteCLARO = Controller::chart(2, 6, 38, $FechaActual, $FechaFin);
        $devolucionCLARO = Controller::chart(2, 6, 39, $FechaActual, $FechaFin);
        $rechazadaCLARO = Controller::chart(2, 6, 40, $FechaActual, $FechaFin);
        $anuladaCLARO = Controller::chart(2, 6, 41, $FechaActual, $FechaFin);
        $fueracorteCLARO = Controller::chart(2, 6, 42, $FechaActual, $FechaFin);
        $legalizadaCLARO = Controller::chart(2, 6, 43, $FechaActual, $FechaFin);
        $nopagoCLARO = Controller::chart(2, 6, 44, $FechaActual, $FechaFin);
        $perdidaCLARO = Controller::chart(2, 6, 45, $FechaActual, $FechaFin);
        $externaCLARO = Controller::chart(2, 6, 46, $FechaActual, $FechaFin);
        $preliquidadaCLARO = Controller::chart(1, 5, 47, $FechaActual, $FechaFin);
        $liquidadaCLARO = Controller::chart(2, 6, 48, $FechaActual, $FechaFin);
        $contabilizadaCLARO = Controller::chart(2, 6, 49, $FechaActual, $FechaFin);
        $pagadaCLARO = Controller::chart(2, 6, 50, $FechaActual, $FechaFin);

        /* MOVISTAR */
        $enprocesoMOVISTART = Controller::chart(3, 7, 35, $FechaActual, $FechaFin);
        $completadaMOVISTART = Controller::chart(3, 7, 36, $FechaActual, $FechaFin);
        $portabilidadMOVISTART = Controller::chart(3, 7, 37, $FechaActual, $FechaFin);
        $pendienteMOVISTART = Controller::chart(3, 7, 38, $FechaActual, $FechaFin);
        $devolucionMOVISTART = Controller::chart(3, 7, 39, $FechaActual, $FechaFin);
        $rechazadaMOVISTART = Controller::chart(3, 7, 40, $FechaActual, $FechaFin);
        $anuladaMOVISTART = Controller::chart(3, 7, 41, $FechaActual, $FechaFin);
        $fueracorteMOVISTART = Controller::chart(3, 7, 42, $FechaActual, $FechaFin);
        $legalizadaMOVISTART = Controller::chart(3, 7, 43, $FechaActual, $FechaFin);
        $nopagoMOVISTART = Controller::chart(3, 7, 44, $FechaActual, $FechaFin);
        $perdidaMOVISTART = Controller::chart(3, 7, 45, $FechaActual, $FechaFin);
        $externaMOVISTART = Controller::chart(3, 7, 46, $FechaActual, $FechaFin);
        $preliquidadaMOVISTART = Controller::chart(3, 7, 47, $FechaActual, $FechaFin);
        $liquidadaMOVISTART = Controller::chart(3, 7, 48, $FechaActual, $FechaFin);
        $contabilizadaMOVISTART = Controller::chart(1, 5, 49, $FechaActual, $FechaFin);
        $pagadaMOVISTART = Controller::chart(3, 7, 50, $FechaActual, $FechaFin);

        /* AVANTEL */
        $enprocesoAVANTEL = Controller::chart(4, '', 35, $FechaActual, $FechaFin);
        $completadaAVANTEL = Controller::chart(4, '', 36, $FechaActual, $FechaFin);
        $portabilidadAVANTEL = Controller::chart(4, '', 37, $FechaActual, $FechaFin);
        $pendienteAVANTEL = Controller::chart(4, '', 38, $FechaActual, $FechaFin);
        $devolucionAVANTEL = Controller::chart(4, '', 39, $FechaActual, $FechaFin);
        $rechazadaAVANTEL = Controller::chart(4, '', 40, $FechaActual, $FechaFin);
        $anuladaAVANTEL = Controller::chart(4, '', 41, $FechaActual, $FechaFin);
        $fueracorteAVANTEL = Controller::chart(4, '', 42, $FechaActual, $FechaFin);
        $legalizadaAVANTEL = Controller::chart(4, '', 43, $FechaActual, $FechaFin);
        $nopagoAVANTEL = Controller::chart(4, '', 44, $FechaActual, $FechaFin);
        $perdidaAVANTEL = Controller::chart(4, '', 45, $FechaActual, $FechaFin);
        $externaAVANTEL = Controller::chart(4, '', 46, $FechaActual, $FechaFin);
        $preliquidadaAVANTEL = Controller::chart(4, '', 47, $FechaActual, $FechaFin);
        $liquidadaAVANTEL = Controller::chart(4, '', 48, $FechaActual, $FechaFin);
        $contabilizadaAVANTEL = Controller::chart(4, '', 49, $FechaActual, $FechaFin);
        $pagadaAVANTEL = Controller::chart(4, '', 50, $FechaActual, $FechaFin);
        /* DIRECTV */
        $enprocesoDIRECTV = Controller::chart(8, '', 35, $FechaActual, $FechaFin);
        $completadaDIRECTV = Controller::chart(8, '', 36, $FechaActual, $FechaFin);
        $portabilidadDIRECTV = Controller::chart(8, '', 37, $FechaActual, $FechaFin);
        $pendienteDIRECTV = Controller::chart(8, '', 38, $FechaActual, $FechaFin);
        $devolucionDIRECTV = Controller::chart(8, '', 39, $FechaActual, $FechaFin);
        $rechazadaDIRECTV = Controller::chart(8, '', 40, $FechaActual, $FechaFin);
        $anuladaDIRECTV = Controller::chart(8, '', 41, $FechaActual, $FechaFin);
        $fueracorteDIRECTV = Controller::chart(8, '', 42, $FechaActual, $FechaFin);
        $legalizadaDIRECTV = Controller::chart(8, '', 43, $FechaActual, $FechaFin);
        $nopagoDIRECTV = Controller::chart(8, '', 44, $FechaActual, $FechaFin);
        $perdidaDIRECTV = Controller::chart(8, '', 45, $FechaActual, $FechaFin);
        $externaDIRECTV = Controller::chart(8, '', 46, $FechaActual, $FechaFin);
        $preliquidadaDIRECTV = Controller::chart(8, '', 47, $FechaActual, $FechaFin);
        $liquidadaDIRECTV = Controller::chart(8, '', 48, $FechaActual, $FechaFin);
        $contabilizadaDIRECTV = Controller::chart(8, '', 49, $FechaActual, $FechaFin);
        $pagadaDIRECTV = Controller::chart(8, '', 50, $FechaActual, $FechaFin);

        $render = $this->render('exportarexcel', array(
            'FechaActual' => $FechaActual,
            'FechaFin' => $FechaFin,
            'enprocesoETB' => $enprocesoETB,
            'completadaETB' => $completadaETB,
            'portabilidadETB' => $portabilidadETB,
            'pendienteETB' => $pendienteETB,
            'devolucionETB' => $devolucionETB,
            'rechazadaETB' => $rechazadaETB,
            'anuladaETB' => $anuladaETB,
            'fueracorteETB' => $fueracorteETB,
            'legalizadaETB' => $legalizadaETB,
            'nopagoETB' => $nopagoETB,
            'perdidaETB' => $perdidaETB,
            'externaETB' => $externaETB,
            'enprocesoCLARO' => $enprocesoCLARO,
            'completadaCLARO' => $completadaCLARO,
            'portabilidadCLARO' => $portabilidadCLARO,
            'pendienteCLARO' => $pendienteCLARO,
            'devolucionCLARO' => $devolucionCLARO,
            'rechazadaCLARO' => $rechazadaCLARO,
            'anuladaCLARO' => $anuladaCLARO,
            'fueracorteCLARO' => $fueracorteCLARO,
            'legalizadaCLARO' => $legalizadaCLARO,
            'nopagoCLARO' => $nopagoCLARO,
            'perdidaCLARO' => $perdidaCLARO,
            'externaCLARO' => $externaCLARO,
            'enprocesoAVANTEL' => $enprocesoAVANTEL,
            'completadaAVANTEL' => $completadaAVANTEL,
            'portabilidadAVANTEL' => $portabilidadAVANTEL,
            'pendienteAVANTEL' => $pendienteAVANTEL,
            'devolucionAVANTEL' => $devolucionAVANTEL,
            'rechazadaAVANTEL' => $rechazadaAVANTEL,
            'anuladaAVANTEL' => $anuladaAVANTEL,
            'fueracorteAVANTEL' => $fueracorteAVANTEL,
            'legalizadaAVANTEL' => $legalizadaAVANTEL,
            'nopagoAVANTEL' => $nopagoAVANTEL,
            'perdidaAVANTEL' => $perdidaAVANTEL,
            'externaAVANTEL' => $externaAVANTEL,
            'enprocesoMOVISTART' => $enprocesoMOVISTART,
            'completadaMOVISTART' => $completadaMOVISTART,
            'portabilidadMOVISTART' => $portabilidadMOVISTART,
            'pendienteMOVISTART' => $pendienteMOVISTART,
            'devolucionMOVISTART' => $devolucionMOVISTART,
            'rechazadaMOVISTART' => $rechazadaMOVISTART,
            'anuladaMOVISTART' => $anuladaMOVISTART,
            'fueracorteMOVISTART' => $fueracorteMOVISTART,
            'legalizadaMOVISTART' => $legalizadaMOVISTART,
            'nopagoMOVISTART' => $nopagoMOVISTART,
            'perdidaMOVISTART' => $perdidaMOVISTART,
            'externaMOVISTART' => $externaMOVISTART,
            'enprocesoDIRECTV' => $enprocesoDIRECTV,
            'completadaDIRECTV' => $completadaDIRECTV,
            'portabilidadDIRECTV' => $portabilidadDIRECTV,
            'pendienteDIRECTV' => $pendienteDIRECTV,
            'devolucionDIRECTV' => $devolucionDIRECTV,
            'rechazadaDIRECTV' => $rechazadaDIRECTV,
            'anuladaDIRECTV' => $anuladaDIRECTV,
            'fueracorteDIRECTV' => $fueracorteDIRECTV,
            'legalizadaDIRECTV' => $legalizadaDIRECTV,
            'nopagoDIRECTV' => $nopagoDIRECTV,
            'perdidaDIRECTV' => $perdidaDIRECTV,
            'externaDIRECTV' => $externaDIRECTV,
        ));
        Yii::app()->request->sendFile('ventas.xls', $render);
    }

    public function actionView($id) {
        if (Yii::app()->authRBAC->checkAccess('ventas_detalle')):
            $this->render('view', array(
                'model' => $this->loadModel($id),
                'modelVentasFijas' => $this->loadModelVentasFijas($id),
                'modelVentaMovile' => $this->loadModelVentasMovile($id),
            ));
        endif;
    }
    
    public function actionCreate() {
        if (Yii::app()->authRBAC->checkAccess('ventas_nuevo')):
        
            $model = new Ventas;
          
            $modelVentasFijas = new VentasFijas;
        
            $modelVentaMovile = new VentasMoviles;
            
            $modelVentaSesion = new VentasSesion;
            
            try {

               
                if (isset($_POST['Ventas'])) {           
                  
                    $ClienteID = Clientes::model()->find('id = ' . trim($_POST['Ventas']['cliente_id']));

                    if (!is_null($ClienteID)):
                        $cliente_id = trim($_POST['Ventas']['cliente_id']);
                    endif;
                   
                    
                    $model->attributes = $_POST['Ventas'];
                    $modelVentasFijas->attributes = $_POST['VentasFijas'];
                    $modelVentaMovile->attributes = $_POST['VentasMoviles'];
                    $modelVentaSesion->attributes = $_POST['VentasSesion'];
                    $transaction = $model->dbConnection->beginTransaction();

                    $model->vendedor_id = Yii::app()->user->id;
                    $model->contrato = $_POST['Ventas']['contrato'];
                    $model->cliente_id = trim($cliente_id);
                    $model->estado_id = Yii::app()->params['SIN_ESTADO_ESTADOS'];
                    $model->numero_asignado = $_POST['Ventas']['numero_asignado'];
                    

                    if($_POST['Ventas']['link_imagen']):
                    	 $model->link_imagen = $_POST['Ventas']['link_imagen'];
                   endif;
				                    	
                   
                    
                    if($_POST['Ventas']['operador_id'] == 5 || $_POST['Ventas']['operador_id'] == 6 || $_POST['Ventas']['operador_id'] == 7 || $_POST['Ventas']['operador_id'] == 8 || $_POST['Ventas']['operador_id'] == 54 || $_POST['Ventas']['operador_id'] == 138 || $_POST['Ventas']['operador_id'] == 139):
                        
                      $model->tipo_venta =  Yii::app()->params['fija'];
                    
                    elseif ($_POST['Ventas']['operador_id'] == 1 || $_POST['Ventas']['operador_id'] == 2 || $_POST['Ventas']['operador_id'] == 3 || $_POST['Ventas']['operador_id'] == 4):
                       $model->tipo_venta =  Yii::app()->params['movil'];
                    
                    endif;

                    if ($model->save()):
                        
                       if($_POST['VentasMoviles']['tipo_alta'] == 3):
                           
                           if($_POST['VentasSesion']['cedula_titular_actual'] == '' || $_POST['VentasSesion']['nombre_titular_actual'] == '' ||  $_POST['VentasSesion']['segundo_nombre_titular_actual'] == '' || $_POST['VentasSesion']['apellido_titular_actual'] == ''  || $_POST['VentasSesion']['segundo_apellido_titular_actual'] == ''    ):
                                Yii::app()->user->setFlash('app', "Llene todos los campos de la seseion");
                                $this->redirect('create');
                           
                            else:
                                $modelVentaSesion->venta_id = $model->id;
                                $modelVentaSesion->save();                                
                            endif;
                       
                       endif;
                    

                        /* SI ES VENTA FIJA */
                        if ($_POST['Ventas']['operador_id'] == 5 || $_POST['Ventas']['operador_id'] == 6 || $_POST['Ventas']['operador_id'] == 7 || $_POST['Ventas']['operador_id'] == 8 || $_POST['Ventas']['operador_id'] == 54 || $_POST['Ventas']['operador_id'] == 138 || $_POST['Ventas']['operador_id'] == 139):

                            if (trim($_POST['Ventas']['tipo_venta_id']) == '' || trim($_POST['Ventas']['habeas_data']) == '' || trim($_POST['Ventas']['fecha_venta']) == '' || trim($_POST['Ventas']['envio_factura_id']) == '' || trim($_POST['Ventas']['activador_inicial']) == '' || trim($_POST['Ventas']['numero_asignado']) == '' || trim($_POST['VentasFijas']['estrato']) == '' || trim($_POST['VentasFijas']['barrio']) == '' || trim($_POST['VentasFijas']['nombre_contacto']) == '' || trim($_POST['VentasFijas']['telefono_contacto']) == '' || trim($_POST['VentasFijas']['direccion_instalacion']) == ''):
                                Yii::app()->user->setFlash('app', "Llene todos los campos de la venta fija");
                                $this->redirect('create');

                            else:

                                $modelVentasFijas->venta_id = $model->id;
                                $modelVentasFijas->fecha_tentativa = date("Y-m-d");
                                $modelVentasFijas->canal_venta_id = 30;
                                $modelVentasFijas->save();

                            endif;


                        /* SI ES VENTA MOVIL */
                        elseif ($_POST['Ventas']['operador_id'] == 1 || $_POST['Ventas']['operador_id'] == 2 || $_POST['Ventas']['operador_id'] == 3 || $_POST['Ventas']['operador_id'] == 4):
                           

                            if (trim($_POST['Ventas']['tipo_venta_id']) == '' || trim($_POST['Ventas']['habeas_data']) == '' || trim($_POST['Ventas']['fecha_venta']) == '' || trim($_POST['Ventas']['envio_factura_id']) == '' || trim($_POST['Ventas']['activador_inicial']) == '' || trim($_POST['Ventas']['numero_asignado']) == '' || trim($_POST['VentasMoviles']['equipo']) == '' || trim($_POST['VentasMoviles']['Imei']) == '' || trim($_POST['VentasMoviles']['iccId']) == ''):

                                Yii::app()->user->setFlash('app', "Llene todos los campos de la venta movil");
                                $transaction->rollBack();
                                $this->redirect('create');
                            else:

                                $modelVentaMovile->venta_id = $model->id;
                                $modelVentaMovile->plan_id = $model->plan_id;
                                $modelVentaMovile->tipo_alta = $_POST['VentasMoviles']['tipo_alta'];
                                $modelVentaMovile->origen_equipo = $_POST['VentasMoviles']['origen_equipo'];
                                $modelVentaMovile->operador_donante = $_POST['VentasMoviles']['operador_donante'];
                                $modelVentaMovile->equipo = $_POST['VentasMoviles']['equipo'];
                                $modelVentaMovile->Imei = $_POST['VentasMoviles']['Imei'];
                                $modelVentaMovile->iccId = $_POST['VentasMoviles']['iccId'];
                                if ($modelVentaMovile->save()):
                                    $transaction->commit();
                                    $this->redirect(array('view', 'id' => $model->id));
                                else:

                                    Yii::app()->user->setFlash('app', "El imei o la sincard ya existen");
                                    $transaction->rollBack();
                                    $this->redirect('create');

                                endif;

                            endif;
                        endif;


                        $transaction->commit();

                        Yii::app()->user->setFlash('app', "Se ha registrado una venta. N. Contrado " . $model->contrato);

                        Controller::RegistrarLog($this->modulo, 'Se ha agregado una venta : ' . $model->contrato . ' ');

                        $this->redirect(array('view', 'id' => $model->id));

                    endif; /*FIN DEL IF SAVE*/
                }
            } catch (Exception $ex) {

                $transaction->rollBack();

                Yii::app()->user->setFlash('app', "Hubo un problema al completar la venta, LLene todos los campos de la venta");

                $this->redirect('create');
            }

            $this->render('create', array(
                'model' => $model,
                'modelVentaMovile' => $modelVentaMovile,
                'modelVentasFijas' => $modelVentasFijas,
                'modelVentaSesion' => $modelVentaSesion,
            ));
        endif;
    }

   

    public function actionUpdate($id) {
        if (Yii::app()->authRBAC->checkAccess('ventas_editar')):
            $model = $this->loadModel($id);
            $modelVentasFijas = $this->loadModelVentasFijas($id);
            $modelVentaMovile = $this->loadModelVentasMovile($id);
            try {



                // Uncomment the following line if AJAX validation is needed
                // $this->performAjaxValidation($model);

                if (isset($_POST['Ventas'])) {
                    $model->attributes = $_POST['Ventas'];
                    $modelVentaMovile->attributes = $_POST['VentasMoviles'];
                    $modelVentasFijas->attributes = $_POST['VentasFijas'];
                    $transaction = $model->dbConnection->beginTransaction();

                    if ($model->save()) {
                        $modelVentaMovile->save();
                        $modelVentasFijas->save();
                        $transaction->commit();
                        Controller::RegistrarLog($this->modulo, 'Se ha editado la venta : ' . $model->contrato . ' ');
                        $this->redirect(array('view', 'id' => $model->id));
                    }
                }
            } catch (Exception $ex) {
                $transaction->rollBack();
                Yii::app()->user->setFlash('app', "Hubo un problema al editar la venta");
                $this->redirect('update');
            }

            $this->render('update', array(
                'model' => $model,
                'modelVentasFijas' => $modelVentasFijas,
                'modelVentaMovile' => $modelVentaMovile,
            ));
        endif;
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->authRBAC->checkAccess('ventas_eliminar')):
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        endif;
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Ventas');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionVendedores() {
        if (Yii::app()->authRBAC->checkAccess('ventas_vendedores')):
            
            $model = new Ventas('search');
            $model->unsetAttributes();  // clear any default values
            if (isset($_GET['Ventas']))
                $model->attributes = $_GET['Ventas'];

            $this->render('vendedores', array(
                'modelMisVentasCoordinador' => $model,
                'modelMisVendedores'=>$model,
            ));
        endif;
    }

    public function actionAdmin() {
        if (Yii::app()->authRBAC->checkAccess('ventas_admin')):
            $model = new Ventas('search');
            $modelVentasMoviles = new VentasMoviles('search');
            $model->unsetAttributes();  // clear any default values
            if (isset($_GET['Ventas']))
                $model->attributes = $_GET['Ventas'];

            $this->render('admin', array(
                'model' => $model,                
            ));
        endif;
    }

    public function actionRadicador() {
        if (Yii::app()->authRBAC->checkAccess('ventas_admin')):
            $model = new Ventas('radicador');
            $model->unsetAttributes();  // clear any default values
            if (isset($_GET['Ventas']))
                $model->attributes = $_GET['Ventas'];

            $this->render('radicador', array(
                'model' => $model,
            ));
        endif;
    }

    public function actionGerentes() {
        if (Yii::app()->authRBAC->checkAccess('ventas_admin')):
            $model = new Ventas('gerentes');
            $model->unsetAttributes();  // clear any default values
            if (isset($_GET['Ventas']))
                $model->attributes = $_GET['Ventas'];

            $this->render('gerentes', array(
                'model' => $model,
            ));
        endif;
    }

    public function loadModelEstratosVentasFijas($venta_id) {

        $model = VentasFijas::model()->find('venta_id = ' . $venta_id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function loadModelVendedor($id) {

        $model = Ventas::model()->with(array(
                    'persona' => array(
                        'joinType' => 'INNER JOIN',
                        'condition' => 't.id = ' . $id,
                    ),
                ))->find();

        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model->persona;
    }

    public function loadModel($id) {
        $model = Ventas::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function loadModelCliente($id) {
        $model = Clientes::model()->find($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function loadModelComisionesVendedores($id) {
        $model = ComisionesVendedores::model()->find($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function loadModelVentasMovile($id) {
        $model = VentasMoviles::model()->find('venta_id = ' . $id);
        if ($model === null)
            $model = false;
        return $model;
    }

    public function loadModelVentasFijas($id) {
        $model = VentasFijas::model()->find('venta_id = ' . $id);
        if ($model === null)
            $model = false;
        return $model;
    }

    public function loadModelSims($id) {
        $model = Sims::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'ventas-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function autoincremento() {

        $criterio = new CDbCriteria();
        $criterio->select = "max(contrato) contrato";
        $modelProductos = Ventas::model()->findAll($criterio);
        foreach ($modelProductos as $modelProducto) {
            $var = $modelProducto['contrato'];
        }

        $a = substr($var, strrpos($var, 'ETBFIJA') + 7);

        $b = $a + 1;

        $serial = $b;
        $digitos = 6;
        $i = strlen($serial);
        $string = '';
        while ($i < $digitos) {
            $string .= '0';
            $i++;
        }
        $serial_final = $string . $serial;
        return $serial_final;
    }

    public function contrato() {

        $porefijo = 'ETBFIJA';
        $b = $this->autoincremento();
        $codigo = $porefijo . $b;
        return $codigo;
    }
    
    public function actionGetvalorplan(){
        $id = $_POST['valorplan'];
        $model = Planes::model()->find('id = '.$id);        
      
        if($model):
             echo CJSON::encode(array('ok' => true, 'valor' => $model->valor));
        endif;
    }

    public function actionPlanesPorOperador() {


        $operador = $_POST['Ventas']['operador_id'];

        $criteria = new CDbCriteria;
        $criteria->condition = 'operador_id =:operador AND fecha_vencimiento >=  :fin ';
        $criteria->params = array(':operador' => $operador,':fin'=>date('Y-m-d') );    
        $criteria->order = 'nombre DESC';
        $lists = Planes::model()->findAll($criteria);

        foreach ($lists as $data):

            echo "<option value='{$data->id}' >{$data->nombre}  </option>";

        endforeach;
    }

    public function actionPlanesestratos() {

        if (isset($_POST['PlanesEtbFijaEstratos'])):

            $estrato_id = $_POST['PlanesEtbFijaEstratos'];

            $criteria = new CDbCriteria;
            $criteria->condition = 'planes_etb_fija_estrato_id=:estrato';
            $criteria->params = array(':estrato' => intval($estrato_id));
            $lists = PlanesEtbFijaTenologias::model()->findAll($criteria);

            foreach ($lists as $data):

                echo "<option value='{$data->id}' >{$data->nombre}  </option>";

            endforeach;

        endif;
    }

    public function actionPlanestecnologia() {


        if (isset($_POST['PlanesEtbFijaTenologias'])):

            $tecnologia = $_POST['PlanesEtbFijaTenologias'];


            $criteria = new CDbCriteria;
            $criteria->condition = 'planes_etb_fija_tenologia_id=:tecnologia';
            $criteria->params = array(':tecnologia' => intval($tecnologia));
            $lists = PlanesEtbFijaTiposFijas::model()->findAll($criteria);

            foreach ($lists as $data):

                echo "<option value='{$data->id}' >{$data->nombre}  </option>";

            endforeach;

        endif;
    }

    public function actionPlanestipofija() {


        if (isset($_POST['PlanesEtbFijaTiposFijas'])):

            $tipoFija = $_POST['PlanesEtbFijaTiposFijas'];


            $criteria = new CDbCriteria;
            $criteria->condition = 'planes_etb_fija_tipos_fija_id=:tipo';
            $criteria->params = array(':tipo' => intval($tipoFija));
            $lists = PlanesEtbFijaCombos::model()->findAll($criteria);

            foreach ($lists as $data):

                echo "<option value='{$data->id}' >{$data->nombre}  </option>";

            endforeach;

        endif;
    }

    public function actionPlanescombos() {


        if (isset($_POST['PlanesEtbFijaCombos'])):

            $combos = $_POST['PlanesEtbFijaCombos'];

            $criteria = new CDbCriteria;
            $criteria->condition = 'planes_etb_fija_combo_id=:combo';
            $criteria->params = array(':combo' => intval($combos));
            $lists = PlanesEtbFijaVelocidades::model()->findAll($criteria);

            foreach ($lists as $data):
                echo "<option value='{$data->id}' >{$data->nombre}  </option>";

            endforeach;

        endif;
    }

    public function actionVentasPreliquidacion() {

        $model = new Ventas('Preliquidacion');


        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Ventas']))
            $model->attributes = $_GET['Ventas'];

        $this->render('VentasPreliquidacion', array(
            'model' => $model,
        ));
    }

    public function actionVentasliquidacion() {

        $model = new Ventas('liquidacion');


        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Ventas']))
            $model->attributes = $_GET['Ventas'];

        $this->render('Ventasliquidacion', array(
            'model' => $model,
        ));
    }

    public function actionVentascontabilizadas() {

        $model = new Ventas('contabilizadas');


        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Ventas']))
            $model->attributes = $_GET['Ventas'];

        $this->render('Ventascontabilizadas', array(
            'model' => $model,
        ));
    }

    public function actionVentaspagadas() {

        $model = new Ventas('contabilizadas');


        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Ventas']))
            $model->attributes = $_GET['Ventas'];

        $this->render('Ventaspagadas', array(
            'model' => $model,
        ));
    }

    public function actionGraficos() {

        $this->render('graficos');
    }
    
    
    public function actionActualizaObservacionVendedorCoordinador(){
        
        $model = $this->loadModel($_POST['pk']);
        $observaciones_actual = $model->observaciones;
        if($_POST['name'] == 'observaciones'):
            
          $observacion_nuevo =    $_POST['value'];
          $concatenado =  ' | '.$observacion_nuevo.' | '.$observaciones_actual;
          $model->observaciones = $concatenado;
          $model->save();
        
        endif;
        
    }
    

    public function actionActualizanombrevendedor() {
        $model = $this->loadModelVendedor($_POST['pk']);
        if ($_POST['name'] == 'vendedor_id'):
            $model->nombre = trim($_POST['value']);
            $model->save();

        endif;
    }

    public function actionActualizasegundonombrevendedor() {
        $model = $this->loadModelVendedor($_POST['pk']);
        if ($_POST['name'] == 'vendedor_id'):
            $model->segundo_nombre = trim($_POST['value']);
            if ($model->save()):
                var_dump('si guardo');
            else:
                var_dump('no guardo');
            endif;
        endif;
    }

    public function actionActualizanombrecliente() {

        $model = $this->loadModelCliente($_POST['pk']);
        if ($_POST['name'] == 'cliente_id'):

            $model->nombre = trim($_POST['value']);
            if ($model->save()):
                DumpHelper::var_dump('si guardo');
            else:
                DumpHelper::var_dump('no guardo');
            endif;

        endif;
    }

    public function actionActualizacliente() {
        $model = $this->loadModelCliente($_POST['pk']);
        if ($_POST['name'] == 'cliente_id'):
            $model->save();
        endif;
    }

    public function actionActualizadireccioncliente() {
        $model = $this->loadModelCliente($_POST['pk']);
        if ($_POST['name'] == 'cliente_id'):
            $model->direccion = trim($_POST['value']);
            $model->save();
        endif;
    }

    public function actionActualizarfechaexpedicioncliente() {

        $model = $this->loadModelCliente($_POST['pk']);
        if ($_POST['name'] == 'cliente_id'):
            $model->fecha_expedicion = trim($_POST['value']);
            $model->save();
        endif;
    }

    public function actionActualizaemailcliente() {
        $model = $this->loadModelCliente($_POST['pk']);
        if ($_POST['name'] == 'cliente_id'):
            $model->email = trim($_POST['value']);
            $model->save();
        endif;
    }

    public function actionActualizasegundonombrecliente() {

        $model = $this->loadModelCliente($_POST['pk']);
        if ($_POST['name'] == 'cliente_id'):
            $model->segundo_nombre = trim($_POST['value']);
            $model->save();
        endif;
    }

    public function actionActualizaapellidocliente() {

        $model = $this->loadModelCliente($_POST['pk']);
        if ($_POST['name'] == 'cliente_id'):

            $model->apellido = trim($_POST['value']);
            $model->save();

        endif;
    }

    public function actionActualizasegundoapellidocliente() {

        $model = $this->loadModelCliente($_POST['pk']);
        if ($_POST['name'] == 'cliente_id'):

            $model->segundo_apellido = trim($_POST['value']);
            $model->save();

        endif;
    }

    public function actionActualiza() {

        $model = $this->loadModel($_POST['pk']);
        if ($_POST['name'] === 'estado_id'):
            
            $oldestado = $model->estado_id;
            $model->estado_id = $_POST['value'];
            if ($model->save()):
                $modelNotificaciones = new Notificaciones();
                $modelNotificaciones->venta_id = $_POST['pk'];
                $modelNotificaciones->estado_id = $_POST['value'];
                $modelNotificaciones->save();                    
                    echo CJSON::encode(array('ok' => true, 'error' => 'Se ha relizado el cambio de estado'));
                    Controller::RegistrarLog('Ventas - Radicador', 'Se ha cambiado el estado de Venta  de ' .$oldestado.  '  a   '.$model->estado_id.'');                               
            else:
              echo CJSON::encode(array('ok' => false, 'error' => 'nada'));
            endif;
        endif;
    }

    public function actionActualizapedidofactura() {

        $model = $this->loadModel($_POST['pk']);
        if ($_POST['name'] === 'pedido_factura'):
            $model->pedido_factura = trim($_POST['value']);
            $model->save();
        endif;
    }

    public function actionActualizaplanes() {

        $model = $this->loadModel($_POST['pk']);
        if ($_POST['name'] === 'plan_id'):
            $model->plan_id = trim($_POST['value']);
            $model->save();
        endif;
    }

    public function actionActualizaoperadordonante() {

        $model = $this->loadModelVentasMovile($_POST['pk']);
        if ($_POST['name'] === 'operador_donante'):
            $model->operador_donante = $_POST['value'];
            $model->save();
        endif;
    }
    
    
    public function actionActualizatipoalta(){
        
        $model = $this->loadModelVentasMovile($_POST['pk']);
      
        if ($_POST['name'] === 'tipo_alta'):
               $model->tipo_alta = $_POST['value'];              
               $model->save();              
        endif;
    }

    public function actionActualizaimei() {

        $model = $this->loadModelVentasMovile($_POST['pk']);
        if ($_POST['name'] === 'imei'):
            $model->Imei = $_POST['value'];
            $model->save();
        endif;
    }

    public function actionActualizaiccid() {

        $model = $this->loadModelVentasMovile($_POST['pk']);
        if ($_POST['name'] === 'iccid'):
            $model->iccId = $_POST['value'];
            $model->save();
        endif;
    }

    public function actionActualizanumeroasignado() {

        $model = $this->loadModel($_POST['pk']);
        if ($_POST['name'] === 'numero_asignado'):
            $model->numero_asignado = trim($_POST['value']);
            $model->save();
        endif;
    }

    public function actionActualizapedidoroot() {

        $model = $this->loadModel($_POST['pk']);
        if ($_POST['name'] === 'pedido_root'):
            $model->pedido_root = trim($_POST['value']);
            $model->save();
        endif;
    }

    public function actionActualizadocumentoid() {

        $model = $this->loadModel($_POST['pk']);
        if ($_POST['name'] === 'documento_id'):
            $model->documento_id = $_POST['value'];
            $model->save();
        endif;
    }

    public function actionActualizaobservacionactivacion() {

        $model = $this->loadModel($_POST['pk']);
        if ($_POST['name'] === 'observacion_activacion'):
            $model->observacion_activacion = $_POST['value'];
            $model->save();
        endif;
    }

    public function actionActualizaplataformaventas() {

        $model = $this->loadModel($_POST['pk']);
        if ($_POST['name'] === 'plataforma_id'):
            $model->plataforma_id = $_POST['value'];
            $model->save();
        endif;
    }

    public function actionActualizacunoportunidad() {

        $model = $this->loadModel($_POST['pk']);
        if ($_POST['name'] === 'cun_oportunidad'):
            $model->cun_oportunidad = $_POST['value'];
            $model->save();
        endif;
    }

    public function actionCambiarEstdosPorFechas() {

        $model = $this->loadModel($_POST['pk']);

        if ($_POST['name'] == 'fecha_activacion'):
            $model->fecha_activacion = $_POST['value'];
            $model->activador_final = Yii::app()->user->id;
            if ($model->save()):
                if ($model->fecha_legalizacion == null):
                    $model->estado_id = 131;
                    $model->save();
                endif;
            endif;

        else:
            $model->fecha_legalizacion = $_POST['value'];
            if ($model->save()):
                if ($model->fecha_activacion == null):
                    $model->estado_id = 143;
                    $model->save();
                endif;
            endif;

        endif;


        if (isset($model->fecha_activacion) && isset($model->fecha_legalizacion)):
            $d1 = new DateTime($model->fecha_activacion);
            $d2 = new DateTime($model->fecha_legalizacion);
            $diff = $d2->diff($d1);
            if ($diff->days > 3):
                $model->estado_id = 36;
                $model->save();
            endif;
        endif;
    }

    /* ESTA FUNCION ME CONSULTA EL VALOR MAXIMO DEL CAMPO        
     * NUMERO_RADICACION 
     */

    public function autoincrementoradicador() {

        $criterio = new CDbCriteria();
        $criterio->select = "max(numero_radicacion) contrato";
        $models = Ventas::model()->findAll($criterio);


        foreach ($models as $data) {
            $var = $data['contrato'];
        }



        $a = substr($var, strrpos($var, 'CNX') + 3);



        $b = $a + 1;
        $serial = $b;
        $digitos = 4;
        $i = strlen($serial);
        $string = '';
        while ($i < $digitos) {
            $string .= '0';
            $i++;
        }
        $serial_final = $string . $serial;
        return $serial_final;
    }

    public function actionGenerarrandon() {

        $porefijo = 'CNX';
        $b = $this->autoincrementoradicador();
        $b = $codigo = $porefijo . $b;
        if ($codigo):

            header("Content-type: application/json");
            echo CJSON::encode(array('ok' => true, 'randon' => $codigo));

        else:


            header("Content-type: application/json");
            echo CJSON::encode(array('ok' => false, 'randon' => 'Error al generar Numero'));

        endif;
    }

    public function actionActualizaradicacion() {

        $model = $this->loadModel($_POST['pk']);
        if ($_POST['name'] === 'numero_radicacion'):
            $model->numero_radicacion = trim($_POST['value']);
            $model->radicador_id = Yii::app()->user->id;
            if ($model->save()):
                Controller::RegistrarLog($this->modulo, 'Se ha ingresado el numero de radicacion: ' . $model->numero_radicacion);
            endif;
        endif;
    }

    public function actionCambiarnumerosradicador() {

        try {

            $numero_radicacion = $_POST['numero_radicacion'];
            $JSONumeroRadicadors = json_decode($_POST['JSONumeroRadicador']);
            foreach ($JSONumeroRadicadors as $data):
                $model = $this->loadModel($data);
                $temp = $model->numero_radicacion;
                $model->radicador_id = Yii::app()->user->id;
                $model->fecha_legalizacion = date('Y-m-d');
                if ($model->numero_radicacion != NULL):
                    $model->numero_radicacion = trim($temp);
                else:

                    $model->numero_radicacion = trim($numero_radicacion);
                    $model->save();

                endif;

            endforeach;

            header("Content-type: application/json");
            echo CJSON::encode(array('ok' => true));
        } catch (Exception $ex) {
            header("Content-type: application/json");
            echo CJSON::encode(array('ok' => false));
        }
    }

}

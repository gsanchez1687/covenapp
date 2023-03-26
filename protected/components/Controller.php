<?php

Yii::import('application.modules.ventas.models.Ventas');
Yii::import('application.modules.ventas.models.Dominios');
Yii::import('application.modules.ventas.models.Notificaciones');
Yii::import('application.modules.logs.models.Logs');
Yii::import('application.modules.seguridad.models.Users');
Yii::import('application.modules.cargaMasiva.models.Planes');
Yii::import('application.modules.cargaMasiva.models.Sims');
Yii::import('application.modules.clientes.models.Clientes');
Yii::import('application.modules.seguridad.models.Users');
Yii::import('application.modules.seguridad.models.Personas');
class Controller extends CController {
    
   

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/column1';

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();

    public function __construct($id, $module = null) {
        parent::__construct($id, $module);
    }

    public function Upload($model, $attribute, $path = '/images/', $tabla = '', $bool = FALSE) {
        $objeto = CUploadedFile::getInstance($model, $attribute);
        if (is_object($objeto)) {
            $file = CUploadedFile::getInstance($model, $attribute);
            $extension = $file->name;

            if ($bool == TRUE):
                $name = substr(md5(uniqid(rand())), 0, 25);
            else:
                $name = $file->name;
            endif;
            
//          $name = str_replace("_", " ", $name);
            $file->saveAs(Yii::getPathOfAlias("webroot") . $path . $file->name);
            $model->$attribute = $name;           
        } else {
            $banner = $tabla::model()->findByPk($model->id);
            $model->$attribute = $banner->$attribute;
        }
    }

    public static function CreateUpload($model, $attribute, $path = '/images/', $tabla = '', $bool = FALSE) {
        $objeto = CUploadedFile::getInstance($model, $attribute);
        if (is_object($objeto)) {
            $file = CUploadedFile::getInstance($model, $attribute);

            if ($bool == TRUE):
                $name = substr(md5(uniqid(rand())), 0, 25);
            else:
                $name = $file->name;
            endif;
            $name = str_replace("_", " ", $name);
            $file->saveAs(Yii::getPathOfAlias("webroot") . $path . $file->name);
            $model->$attribute = $name;
          
        }
    }

    public static function TipoRol($rol = null) {

        switch ($rol) {

            case 1: $var = 'Vendedor';
                break;
            case 2: $var = 'Coordinador';
                break;
            case 3: $var = 'Gerente';
                break;
            case 4: $var = 'Comisiones';
                break;
            case 5: $var = 'Contabilidad';
                break;
            case 6: $var = 'Cumerario';
                break;
            case 7: $var = 'Activador';
                break;
            case 8: $var = 'Super Administrador';
                break;
            case 9: $var = 'Administrador';
                break;
            default : $var = 'Sin definir';
        }
        return $var;
    }
    
    public function Chart($operadorMovil = NULL, $operadorFija = NULL, $estado = NULL, $fechaActual = null, $fechaFin = null) {
        $Criteria = new CDbCriteria();
        $Criteria->alias = 'Venta';
        $Criteria->condition = '(Venta.operador_id=:operadorMovil OR Venta.operador_id=:operadorFija) '
                . ' AND Venta.estado_id=:estado'
                . ' AND (Venta.creado BETWEEN :fechaActual AND :fechaFin)';
        $Criteria->params = array(':operadorMovil' => $operadorMovil, ':operadorFija' => $operadorFija, ':estado' => $estado, ':fechaActual' => $fechaActual, ':fechaFin' => $fechaFin);

        return Ventas::model()->count($Criteria);
    }

    public function ChartMovil($operadorMovil = NULL, $estado = NULL, $fechaActual = null, $fechaFin = null) {
        $Criteria = new CDbCriteria();
        $Criteria->alias = 'Venta';
        $Criteria->condition = 'Venta.operador_id=:operadorMovil '
                . ' AND Venta.estado_id=:estado'
                . ' AND (Venta.creado BETWEEN :fechaActual AND :fechaFin)';
        $Criteria->params = array(':operadorMovil' => $operadorMovil, ':estado' => $estado, ':fechaActual' => $fechaActual, ':fechaFin' => $fechaFin);

        return Ventas::model()->count($Criteria);
    }
    public function ChartFija($operadorFija = NULL, $estado = NULL, $fechaActual = null, $fechaFin = null) {
        $Criteria = new CDbCriteria();
        $Criteria->alias = 'Venta';
        $Criteria->condition = 'Venta.operador_id=:operadorFija '
                . ' AND Venta.estado_id=:estado'
                . ' AND (Venta.creado BETWEEN :fechaActual AND :fechaFin)';
        $Criteria->params = array(':operadorFija' => $operadorFija, ':estado' => $estado, ':fechaActual' => $fechaActual, ':fechaFin' => $fechaFin);

        return Ventas::model()->count($Criteria);
    }

    /* SE UTILIZA EN EL MODULO DE VENTAS/GRAFICO */

    public function getGerentes() {


        $criteria = new CDbCriteria();
        $criteria->condition = 't.rol_id = :rol_id';
        $criteria->join = 'INNER JOIN personas p ON (p.id = t.persona_id)';
        $criteria->params = array(':rol_id' => 3);
        $models = Users::model()->findAll($criteria);
        $nombre = array();
        foreach ($models as $data):
            $nombre[] = $data->persona;
        endforeach;
        return $nombre;
    }

    public function getCoordinadores() {


        $criteria = new CDbCriteria();
        $criteria->condition = 't.rol_id = :rol_id';
        $criteria->join = 'INNER JOIN personas p ON (p.id = t.persona_id)';
        $criteria->params = array(':rol_id' => 2);
        $models = Users::model()->findAll($criteria);
        $nombre = array();
        foreach ($models as $data):
            $nombre[] = $data->persona;
        endforeach;
        return $nombre;
    }

    /* SE UTILIZA EN EL MODULO DE SEGURIDAD/USERS/GRAFICO */

    public function getRoles() {

        $usuario = Yii::app()->user->id;

        $usuarios = Users::model()->find('id = ' . $usuario);

        $rol_id = $usuarios->rol_id;

        switch ($rol_id):
            /* COORDINADOR */
            case 1:

                $criteria = new CDbCriteria();
                $criteria->condition = 't.id=:coordinador_id';
                $criteria->join = 'INNER JOIN personas p ON (p.id = t.persona_id)';
                $criteria->params = array(':coordinador_id' => $usuario);
                $models = Users::model()->findAll($criteria);


                $nombre = array();
                foreach ($models as $data):
                    $nombre[] = $data->persona;
                endforeach;
                return $nombre;
                break;

            case 2:

                $criteria = new CDbCriteria();
                $criteria->condition = 't.coordinador_id=:coordinador_id';
                $criteria->join = 'INNER JOIN personas p ON (p.id = t.persona_id)';
                $criteria->params = array(':coordinador_id' => $usuario);
                $models = Users::model()->findAll($criteria);

                $nombre = array();
                foreach ($models as $data):
                    $nombre[] = $data->persona;
                endforeach;
                return $nombre;
                break;
            /* GERENTE: consulta los vendedores a cargo de gerente */
            case 3:
                $criteria = new CDbCriteria();
                $criteria->condition = 't.gerente_id=:gerente_id AND p.cargo_id in (140,59,58,57)';
                $criteria->join = 'INNER JOIN personas p ON (p.id = t.persona_id)';
                $criteria->params = array(':gerente_id' => $usuario);
                $models = Users::model()->findAll($criteria);
                $nombre = array();
                foreach ($models as $data):
                    $nombre[] = $data->persona;
                endforeach;
                return $nombre;
                break;


        endswitch;
    }

    /* ESA FUNCTION VA EN VENTAS/GRAFICOS GENERALES */

    public function getGerentesvsEstados($usuario = NULL, $estado = NULL, $fechaActual = NULL, $fechaFin = NULL) {

        $Criteria = new CDbCriteria();
        $Criteria->alias = 'Venta';
        $Criteria->condition = '(Venta.vendedor_id = :vendedor_id OR Usuario.gerente_id = :vendedor_id  ) '
                . ' AND Venta.estado_id=:estado'
                . ' AND (Venta.fecha_ingreso BETWEEN :fechaActual AND :fechaFin) ';
        $Criteria->join = 'INNER JOIN usuarios Usuario ON (Usuario.id = Venta.vendedor_id)';
        $Criteria->params = array(':estado' => $estado, ':fechaActual' => $fechaActual, ':fechaFin' => $fechaFin, ':vendedor_id' => $usuario);
        $model = Ventas::model()->count($Criteria);
        return $model;
    }

    /* ESA FUNCTION VA EN VENTAS/GRAFICOS GENERALES */

    public function getCoordinadorVsEstadosGenerales($usuario = NULL, $estado = NULL, $fechaActual = NULL, $fechaFin = NULL) {

        $Criteria = new CDbCriteria();
        $Criteria->alias = 'Venta';
        $Criteria->condition = '(Venta.vendedor_id = :vendedor_id OR Usuario.coordinador_id = :vendedor_id  ) '
                . ' AND Venta.estado_id=:estado'
                . ' AND (Venta.fecha_ingreso BETWEEN :fechaActual AND :fechaFin) ';
        $Criteria->join = 'INNER JOIN usuarios Usuario ON (Usuario.id = Venta.vendedor_id)';
        $Criteria->params = array(':estado' => $estado, ':fechaActual' => $fechaActual, ':fechaFin' => $fechaFin, ':vendedor_id' => $usuario);
        $model = Ventas::model()->count($Criteria);
        return $model;
    }

    /* SE USA EN EL MODULO DE SEGURIDAD/USUARIOS/GRAFICO */

    public function getCoordinadorVsEstados($usuario = NULL, $estado = NULL, $fechaActual = NULL, $fechaFin = NULL) {

        $user = Yii::app()->user->id;
        $usuarios = Users::model()->find('id = ' . $user);

        $rol_id = $usuarios->rol_id;

        switch ($rol_id):
            //GERENTE
            case 3:

                $Criteria = new CDbCriteria();
                $Criteria->alias = 'Venta';
                $Criteria->condition = '(Venta.vendedor_id = :vendedor_id OR Usuario.gerente_id = :vendedor_id  ) '
                        . ' AND Venta.estado_id=:estado'
                        . ' AND (Venta.fecha_ingreso BETWEEN :fechaActual AND :fechaFin) ';
                $Criteria->join = 'INNER JOIN usuarios Usuario ON (Usuario.id = Venta.vendedor_id)';
                $Criteria->params = array(':estado' => $estado, ':fechaActual' => $fechaActual, ':fechaFin' => $fechaFin, ':vendedor_id' => $usuario);
                $model = Ventas::model()->count($Criteria);
                return $model;
                break;


            //COORDINADOR
            case 2:

                $Criteria = new CDbCriteria();
                $Criteria->alias = 'Venta';
                $Criteria->condition = '(Venta.vendedor_id = :vendedor_id OR Usuario.coordinador_id = :vendedor_id  ) '
                        . ' AND Venta.estado_id=:estado'
                        . ' AND (Venta.fecha_ingreso BETWEEN :fechaActual AND :fechaFin) ';
                $Criteria->join = 'INNER JOIN usuarios Usuario ON (Usuario.id = Venta.vendedor_id)';
                $Criteria->params = array(':estado' => $estado, ':fechaActual' => $fechaActual, ':fechaFin' => $fechaFin, ':vendedor_id' => $usuario);

                $model = Ventas::model()->count($Criteria);
                return $model;
                break;
            //VENDEDOR    
            case 1:

                $Criteria = new CDbCriteria();
                $Criteria->alias = 'Venta';
                $Criteria->condition = 'Venta.vendedor_id = :vendedor_id '
                        . ' AND Venta.estado_id=:estado '
                        . ' AND (Venta.fecha_ingreso BETWEEN :fechaActual AND :fechaFin) ';
                $Criteria->join = 'INNER JOIN usuarios Usuario ON (Usuario.id = Venta.vendedor_id)';
                $Criteria->params = array(':estado' => $estado, ':fechaActual' => $fechaActual, ':fechaFin' => $fechaFin, ':vendedor_id' => $usuario);

                $model = Ventas::model()->count($Criteria);

                return $model;
                break;


        endswitch;
    }

    /* SE UTILIZA EN EL MODULO DE SEGURAD/USERS/GRAFICO */

    public function ChartVendedores($operadorMovil = '', $operadorFija = '', $estado = NULL, $fechaActual = null, $fechaFin = null, $usuario = null) {

        $usuarios = Users::model()->find('id = ' . $usuario);
        $rol_id = $usuarios->rol_id;

        switch ($rol_id):

            case 1:

                $Criteria = new CDbCriteria();
                $Criteria->alias = 'Venta';
                $Criteria->condition = 'Venta.vendedor_id = :vendedor_id'
                        . ' AND (Venta.operador_id=:operadorMovil OR Venta.operador_id=:operadorFija)'
                        . ' AND Venta.estado_id=:estado'
                        . ' AND (Venta.fecha_ingreso BETWEEN :fechaActual AND :fechaFin) ';
                $Criteria->join = 'INNER JOIN usuarios Usuario ON (Usuario.id = Venta.vendedor_id)';
                $Criteria->params = array(':operadorMovil' => $operadorMovil, ':operadorFija' => $operadorFija, ':estado' => $estado, ':fechaActual' => $fechaActual, ':fechaFin' => $fechaFin, ':estado' => $estado, ':vendedor_id' => $usuario);

                $model = Ventas::model()->count($Criteria);
                break;
            case 2:

                $Criteria = new CDbCriteria();
                $Criteria->alias = 'Venta';
                $Criteria->condition = '(Venta.vendedor_id = :vendedor_id OR Usuario.coordinador_id = :vendedor_id  ) '
                        . ' AND (Venta.operador_id=:operadorMovil OR Venta.operador_id=:operadorFija)'
                        . ' AND Venta.estado_id=:estado'
                        . ' AND (Venta.fecha_ingreso BETWEEN :fechaActual AND :fechaFin) ';
                $Criteria->join = 'INNER JOIN usuarios Usuario ON (Usuario.id = Venta.vendedor_id)';
                $Criteria->params = array(':operadorMovil' => $operadorMovil, ':operadorFija' => $operadorFija, ':estado' => $estado, ':fechaActual' => $fechaActual, ':fechaFin' => $fechaFin, ':estado' => $estado, ':vendedor_id' => $usuario);

                $model = Ventas::model()->count($Criteria);
                break;

            case 10:

                $Criteria = new CDbCriteria();
                $Criteria->alias = 'Venta';
                $Criteria->condition = '(Venta.vendedor_id = :vendedor_id OR Usuario.coordinador_id = :vendedor_id  ) '
                        . ' AND (Venta.operador_id=:operadorMovil OR Venta.operador_id=:operadorFija)'
                        . ' AND Venta.estado_id=:estado'
                        . ' AND (Venta.fecha_ingreso BETWEEN :fechaActual AND :fechaFin) ';
                $Criteria->join = 'INNER JOIN usuarios Usuario ON (Usuario.id = Venta.vendedor_id)';
                $Criteria->params = array(':operadorMovil' => $operadorMovil, ':operadorFija' => $operadorFija, ':estado' => $estado, ':fechaActual' => $fechaActual, ':fechaFin' => $fechaFin, ':estado' => $estado, ':vendedor_id' => $usuario);

                $model = Ventas::model()->count($Criteria);
                break;

            case 11:

                $Criteria = new CDbCriteria();
                $Criteria->alias = 'Venta';
                $Criteria->condition = '(Venta.vendedor_id = :vendedor_id OR Usuario.coordinador_id = :vendedor_id  ) '
                        . ' AND (Venta.operador_id=:operadorMovil OR Venta.operador_id=:operadorFija)'
                        . ' AND Venta.estado_id=:estado'
                        . ' AND (Venta.fecha_ingreso BETWEEN :fechaActual AND :fechaFin) ';
                $Criteria->join = 'INNER JOIN usuarios Usuario ON (Usuario.id = Venta.vendedor_id)';
                $Criteria->params = array(':operadorMovil' => $operadorMovil, ':operadorFija' => $operadorFija, ':estado' => $estado, ':fechaActual' => $fechaActual, ':fechaFin' => $fechaFin, ':estado' => $estado, ':vendedor_id' => $usuario);

                $model = Ventas::model()->count($Criteria);
                break;

            case 3:

                $Criteria = new CDbCriteria();
                $Criteria->alias = 'Venta';
                $Criteria->condition = '( Venta.vendedor_id = :vendedor_id OR Usuario.gerente_id = :vendedor_id  ) '
                        . ' AND (Venta.operador_id=:operadorMovil OR Venta.operador_id=:operadorFija)'
                        . ' AND Venta.estado_id=:estado'
                        . ' AND (Venta.fecha_ingreso BETWEEN :fechaActual AND :fechaFin) ';
                $Criteria->join = 'INNER JOIN usuarios Usuario ON (Usuario.id = Venta.vendedor_id)';
                $Criteria->params = array(':operadorMovil' => $operadorMovil, ':operadorFija' => $operadorFija, ':estado' => $estado, ':fechaActual' => $fechaActual, ':fechaFin' => $fechaFin, ':estado' => $estado, ':vendedor_id' => $usuario);
                $model = Ventas::model()->count($Criteria);
                break;


        endswitch;

        return $model;
    }

    public function RegistrarLog($modulo = NULL, $mensaje = NULL) {

        require_once("geolocalizacion/geoiploc.php");
        require_once("mobile/Mobile_Detect.php");

        $detect = new Mobile_Detect;
        $deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'Tablet' : 'Phone') : 'Computer');
        $ip = $_SERVER["REMOTE_ADDR"];

        $log = new Logs();
        $log->usuario_id = Yii::app()->user->id;
        $log->modulo = $modulo;
        $log->actividad = $mensaje;
        $log->pais = getCountryFromIP($ip, " NamE");
        $log->ip = $ip;
        $log->fecha = date("Y-m-d H:i:s");
        $log->dipositivo = htmlentities($_SERVER['HTTP_USER_AGENT']) . " - " . $deviceType;
        $log->save();
    }

    public function getNombreUsuario($id) {

        $Criteria = new CDbCriteria();
        $Criteria->condition = 't.id=:id';
        $Criteria->params = array(':id' => $id);
        $Criteria->join = "INNER JOIN personas as P ON(P.id = t.persona_id)";
        $model = Users::model()->find($Criteria);
        return $model['persona']['nombre'] . ' - ' . $model['persona']['apellido'];
    }

    function NotificacionEstados() {
        $user_id = Yii::app()->user->id;

        $rol = Yii::app()->user->getState('rol');

        switch ($rol):

            case 8: $Criteria = new CDbCriteria();
                $Criteria->join = 'INNER JOIN ventas v ON (v.id = t.venta_id) ';
                $model = Notificaciones::model()->count($Criteria);
                return $model;
                break;

            default : $Criteria = new CDbCriteria();
                $Criteria->condition = 'v.vendedor_id=:vendedor_id';
                $Criteria->join = 'INNER JOIN ventas v ON (v.id = t.venta_id) ';
                $Criteria->params = array(':vendedor_id' => $user_id);
                $model = Notificaciones::model()->count($Criteria);
                return $model;

        endswitch;
    }

    function NotificacionesMenssajes() {

        $user_id = Yii::app()->user->id;

        $rol = Yii::app()->user->getState('rol');

        switch ($rol):

            case 8:
                $Criteria = new CDbCriteria();
                $Criteria->join = 'INNER JOIN ventas Venta ON (Venta.id = t.venta_id ) '
                        . 'INNER JOIN dominios Dominio ON (Dominio.id = t.estado_id) ';
                $models = Notificaciones::model()->findAll($Criteria);
                break;

            default : $Criteria = new CDbCriteria();
                $Criteria->condition = 'Venta.vendedor_id=:vendedor_id';
                $Criteria->join = 'INNER JOIN ventas Venta ON (Venta.id = t.venta_id ) '
                        . 'INNER JOIN dominios Dominio ON (Dominio.id = t.estado_id) ';
                $Criteria->params = array(':vendedor_id' => $user_id);
                $models = Notificaciones::model()->findAll($Criteria);

        endswitch;


        foreach ($models as $data):

            echo '<div class="panel panel-default">                    
                    <div class="panel-body">                    
                    <br/
                      <i class="fa fa-bell" aria-hidden="true"></i> 
                        <a href=' . Yii::app()->request->baseUrl . '/ventas/ventas/view/id/' . $data->venta->id . '><b>' . $data->estado->tipo . '</b></a>
                        <p><sub>Fecha de venta : ' . $data->venta->fecha_ingreso . '</sub></p>    
                    </div>
                  </div>';

        endforeach;
    }

    public static function fechaesp($date) {
        $dia = explode("-", $date, 3);
        $year = $dia[0];
        $month = (string) (int) $dia[1];
        $day = (string) (int) $dia[2];

        $dias = array("domingo", "lunes", "martes", "mi&eacute;rcoles", "jueves", "viernes", "s&aacute;bado");
        $tomadia = $dias[intval((date("w", mktime(0, 0, 0, $month, $day, $year))))];

        $meses = array("", "enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre");

        return $tomadia . ", " . $day . " de " . $meses[$month] . " de " . $year;
    }

    function totales($tabla) {

        $model = $tabla::model()->count();
        return $model;
    }

    function TotalesVentas() {
        $user_id = Yii::app()->user->id;
        $rol_id = Yii::app()->user->getState('rol');

        switch ($rol_id):

            case 1: $criteria = new CDbCriteria();
                $criteria->condition = 't.vendedor_id =:vendedor_id';
                $criteria->params = array(':vendedor_id' => $user_id);
                return Ventas::model()->count($criteria);
                break;

            case 2: $criteria = new CDbCriteria();
                $criteria->condition = 't.vendedor_id =:vendedor_id OR u.coordinador_id = :vendedor_id';
                $criteria->join = 'INNER JOIN usuarios u ON (u.id = t.vendedor_id)';
                $criteria->params = array(':vendedor_id' => $user_id);
                return Ventas::model()->count($criteria);
                break;

            case 3: $criteria = new CDbCriteria();
                $criteria->condition = 't.vendedor_id =:vendedor_id OR u.gerente_id = :vendedor_id';
                $criteria->join = 'INNER JOIN usuarios u ON (u.id = t.vendedor_id)';
                $criteria->params = array(':vendedor_id' => $user_id);
                return Ventas::model()->count($criteria);
                break;

            default : return Ventas::model()->count();

        endswitch;
    }

    function totalesSims($tabla) {

        $model = $tabla::model()->count('usuario_id = ' . Yii::app()->user->id);
        return $model;
    }

    function totalesUsuarios() {

        $user_id = Yii::app()->user->id;
        $rol_id = Yii::app()->user->getState('rol');

        switch ($rol_id):
            case 1: return Users::model()->count('t.id = ' . $user_id);
                break;

            case 2: return Users::model()->count('t.coordinador_id = ' . $user_id);
                break;

            case 3: return Users::model()->count('t.gerente_id = ' . $user_id);
                break;


        endswitch;
    }

    function TipoUsuarioPorRoles() {
        $valor = '';
        $rol = Yii::app()->user->getState('rol');
        switch ($rol):
            case 1: $valor = Yii::t('app', 'Vendedores');
                break;
            case 2: $valor = Yii::t('app', 'Mis Vendedores');
                break;
            case 3: $valor = Yii::t('app', 'Mis Coordinadores');
                break;
            case 8: $valor = Yii::t('app', 'Administrador de Usuarios');
                break;
            case 9: $valor = Yii::t('app', 'Administrador de Usuarios');
                break;
        endswitch;

        return $valor;
    }

    public function PageSize($id = NULL, $model = NULL) {
        $this->widget('application.extensions.PageSize.PageSize', array(
            'gridViewId' => $id,
            'pageSize' => Yii::app()->request->getParam('pageSize', null),
            'defaultPageSize' => Yii::app()->params['cantregistros_defecto_gridview'],
            'pageSizeOptions' => Yii::app()->params['registros_pagina_gridview']));
        $dataProvider = $model;
        $pageSize = Yii::app()->user->getState('pageSize', Yii::app()->params['cantregistros_defecto_gridview']);
        $dataProvider->getPagination()->setPageSize($pageSize);
        return $dataProvider;
    }

    public function enviar($correo = NULL, $password = NULL, $username = NULL, $nombre = null, $apellido = null) {

        $mailer = Yii::createComponent('application.extensions.mailer.EMailer');
        $mailer->AddAddress($correo);
        $mailer->From = 'covenapp@conexcel.com.co';
        $mailer->CharSet = 'UTF-8';
        $mailer->FromName = 'Conexcel';
        $mailer->WordWrap = 500;
        $mailer->IsHTML(true);
        $mailer->Subject = 'Bienvenido a Conexcel';
        $mailer->Body = '<p><img alt="" src="http://conexcel.co/images/logo.png" style="height:54px; width:108px" /></p>
                            <p>Sr(a).<br />
                            <strong>' . $nombre . ' ' . $apellido . '</strong></p>

                            <p>Bienvenido a <strong>http://covenapp.cf</strong> su mejor herramienta para registrar sus ventas<br />
                            Recuerde que su <strong>usuario </strong>y<strong> contrase&ntilde;a</strong> para ingresar&nbsp; es:</p>

                            <p><strong>Usuario:</strong></p>

                            <p>' . $username . '<strong>&nbsp;</strong></p>

                            <p><strong>Contrase&ntilde;a:</strong></p>

                            <p>' . $password . '</p>

                            <p><strong>http://covenapp.cf</strong><br />
                            Todos los Derechos Reservados<br />
                            Atenci&oacute;n al Cliente en Bogot&aacute;&nbsp;745 2337 ext 1801</p>
                            ';
        $mailer->IsSMTP();
        $mailer->SMTPAuth = true;
        $mailer->Username = "covenapp@conexcel.com.co";
        $mailer->Password = "Zarkonexcel2018";
        $mailer->Mailer = "mail.conexcel.com.co";
        $mailer->Host = "mail.conexcel.com.co";
        $mailer->Port = 587;
        $mailer->Send();
    }

    public function recupear($correo, $nombre, $apellido, $username, $password) {

        $mailer = Yii::createComponent('application.extensions.mailer.EMailer');
        $mailer->AddAddress($correo);
        $mailer->From = 'covenapp@conexcel.com.co';
        $mailer->CharSet = 'UTF-8';
        $mailer->FromName = 'Conexcel';
        $mailer->WordWrap = 500;
        $mailer->IsHTML(true);
        $mailer->Subject = 'Bienvenido a Conexcel';
        $mailer->Body = '<p><img alt="" src="http://conexcel.co/images/logo.png" style="height:54px; width:108px" /></p>
                            <p>Sr(a).<br />
                            <strong>' . $nombre . ' ' . $apellido . '</strong></p>

                            <p>Bienvenido a <strong>http://covenapp.cf</strong> su mejor herramienta para registrar sus ventas<br />
                            Recuerde que su <strong>usuario </strong>y<strong> contrase&ntilde;a</strong> para ingresar&nbsp; es:</p>

                            <p><strong>Usuario:</strong></p>

                            <p>' . $username . '<strong>&nbsp;</strong></p>

                            <p><strong>Contrase&ntilde;a:</strong></p>

                            <p>' . $password . '</p>

                            <p><strong>http://covenapp.cf</strong><br />
                            Todos los Derechos Reservados<br />
                            Atenci&oacute;n al Cliente en Bogot&aacute;&nbsp;745 2337 ext 1801</p>
                            ';
        $mailer->IsSMTP();
        $mailer->SMTPAuth = true;
        $mailer->Username = "covenapp@conexcel.com.co";
        $mailer->Password = "Zarkonexcel2018";
        $mailer->Mailer = "mail.conexcel.com.co";
        $mailer->Host = "mail.conexcel.com.co";
        $mailer->Port = 587;
        $mailer->Send();
    }

    public function generar() {
        $pass = "";
        //Definimos toda la serie de caracteres que queremos incluir en nuestras contraseñas
        $patron = "123456789";

        $longitud = strlen($patron); //obtenemos la longitud del patron
        $i = 0;

        while ($i < 4) { //obtenemos una cadena de 8 caracteres del patron, obtener un caracter al azar
            $valor = substr($patron, rand(0, $longitud - 1), 1);
            $pass .= $valor; //incluirlo en pass
            $i++;
        }

        return $pass; //una vez termina que retorne el resultado
    }

    public static function getActivos($valor) {

        if ($valor == 1):
            $resul = '<span class="label label-success">Activo</span>';
        else:
            $resul = '<span class="label label-danger">No Activo</span>';
        endif;

        return $resul;
    }

    public function recuperar($correo) {

        $criteria = new CDbCriteria;
        $criteria->condition = 'p.correo=:correo';
        $criteria->join = 'INNER JOIN personas p ON (p.id = t.persona_id)';
        $criteria->params = array(':correo' => $correo);
        $model = Users::model()->find($criteria);
        return $model;
    }
    
    public function saludo(){
        
        $date = date ("H");
        echo "<html><body>";
        if ($date < 12) echo "Buenos dias!";
        else if ($date < 19) echo "Buenas tardes!";
        else echo "Buenas noches!";
        echo "</body></html>";
        
    }
    public function imagen_dia(){
        
        $date = date ("H");
        echo "<html><body>";
        if ($date < 12) echo CHtml::image(Yii::app()->baseUrl.'/images/buenos_dias.png');
        else if ($date < 19) echo CHtml::image(Yii::app()->baseUrl.'/images/buenas_tardes.png');
        else echo CHtml::image(Yii::app()->baseUrl.'/images/buenas_noches.png');
        echo "</body></html>";
        
    }

}

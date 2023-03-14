<?php

/**
 * This is the model class for table "ventas".
 *
 * The followings are the available columns in table 'ventas':
 * @property integer $id
 * @property string $contrato
 * @property string $cun_oportunidad
 * @property integer $vendedor_id
 * @property string $cliente_id
 * @property integer $operador_id
 * @property integer $tipo_venta
 * @property integer $plan_id
 * @property integer $plan_etb_fija
 * @property integer $estado_id
 * @property integer $estado_admin_id
 * @property integer $radicador_id
 * @property string $numero_radicacion
 * @property string $link_imagen
 * @property string $observaciones
 * @property integer $plataforma_id
 * @property integer $documento_id
 * @property integer $habeas_data
 * @property string $fecha_activacion
 * @property string $fecha_legalizacion
 * @property string $fecha_radica
 * @property string $fecha_venta
 * @property string $fecha_ingreso
 * @property integer $envio_factura_id
 * @property integer $activador_inicial
 * @property integer $activador_final
 * @property integer $tipo_venta_id
 * @property string $observacion_activacion
 * @property string $pedido_factura
 * @property string $pedido_root
 * @property integer $estado_contrato_id
 * @property string $numero_asignado
 * @property string $creado
 * @property string $modificado
 *
 * The followings are the available model relations:
 * @property ComisionesEtbfija[] $comisionesEtbfijas
 * @property ComisionesVendedores[] $comisionesVendedores
 * @property DatosAdicionales[] $datosAdicionales
 * @property Notificaciones[] $notificaciones
 * @property Transaccion[] $transaccions
 * @property Dominios $operador
 * @property Dominios $plataforma
 * @property Dominios $documento
 * @property Dominios $envioFactura
 * @property Usuarios $activadorInicial
 * @property Usuarios $activadorFinal
 * @property Dominios $tipoVenta
 * @property Dominios $estadoContrato
 * @property Usuarios $vendedor
 * @property Dominios $estado
 * @property Planes $plan
 * @property Dominios $estadoAdmin
 * @property Usuarios $radicador
 * @property VentasFijas[] $ventasFijases
 * @property VentasMoviles[] $ventasMoviles
 * @property VentasSesion[] $ventasSesions
 */
Yii::import('application.modules.seguridad.models.Users');
Yii::import('application.modules.seguridad.models.Personas');
Yii::import('application.modules.clientes.models.Clientes');
Yii::import('application.modules.cargaMasiva.models.Planes');
Yii::import('application.modules.cargaMasiva.models.Sims');

class Ventas extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'ventas';
    }

    public $archivo;
    public $fecha_fin;
    public $barrio;
    public $estrato;
    public $operador_donante;
    public $origen_equipo;
    public $equipo;
    public $imei;
    public $iccid;
    public $tipo_alta;
    public $numero_identidad;
    public $nombre_cliente;
    public $segundo_nombre_cliente;
    public $apellido_cliente;
    public $segundo_apellido_cliente;
    public $fecha_nacimiento_cliente;
    public $fecha_expedicion_cliente;
    public $telefono_fijo_cliente;
    public $telefono_movil_cliente;
    public $correo_cliente;
    public $direccion_cliente;
    public $activador_iniciar_nombre;
    public $cedula_identidad_vendedor;
    public $primer_nombre_vendedor;
    public $segundo_nombre_vendedor;
    public $direccion_instalacion;
    public $plan_valor;
    public $fecha_ingreso_inicio;
    public $fecha_ingreso_fin;

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('cliente_id, operador_id, tipo_venta, envio_factura_id, activador_inicial, tipo_venta_id, habeas_data, plan_id, numero_asignado', 'required'),
            array('numero_asignado,vendedor_id, operador_id, tipo_venta, plan_id, plan_etb_fija, estado_id, estado_admin_id, radicador_id, plataforma_id, documento_id, habeas_data, envio_factura_id, activador_inicial, activador_final, tipo_venta_id, estado_contrato_id, imei, iccid, operador_donante, tipo_alta', 'numerical', 'integerOnly' => true),
            array('contrato', 'length', 'max' => 100),
            array('cun_oportunidad, pedido_factura, pedido_root', 'length', 'max' => 20),
            array('numero_radicacion, cliente_id , numero_asignado', 'length', 'max' => 10),
            array('link_imagen', 'length', 'max' => 900),
            array('observaciones, observacion_activacion', 'length', 'max' => 500),
            array('fecha_activacion, fecha_legalizacion, fecha_radica, fecha_venta, fecha_ingreso, creado, modificado', 'safe'),
            array('modificado', 'default', 'value' => new CDbExpression('NOW()'), 'setOnEmpty' => false, 'on' => 'update'),
            array('usuario_modificador', 'default', 'value' => Yii::app()->user->id, 'setOnEmpty' => false, 'on' => 'update'),
            array('fecha_ingreso,creado,modificado', 'default', 'value' => new CDbExpression('NOW()'), 'setOnEmpty' => false, 'on' => 'insert'),
            array('id, contrato, vendedor_id, cliente_id, plan_id, plan_valor, plan_etb_fija, operador_id, tipo_venta, estado_id, radicador_id, estado_admin_id, observaciones, plataforma_id, documento_id, habeas_data, fecha_activacion, fecha_legalizacion, fecha_radica, fecha_venta, fecha_ingreso, envio_factura_id, activador_inicial, activador_final, tipo_venta_id, observacion_activacion, pedido_factura, estado_contrato_id, cun_oportunidad, numero_identidad,nombre_cliente, numero_asignado, segundo_nombre_cliente, apellido_cliente, segundo_apellido_cliente, fecha_nacimiento_cliente, fecha_expedicion_cliente, telefono_fijo_cliente, telefono_movil_cliente, correo_cliente, direccion_cliente, barrio, activador_iniciar_nombre, cedula_identidad_vendedor, primer_nombre_vendedor, segundo_nombre_vendedor, direccion_instalacion, imei, iccid, link_imagen', 'safe', 'on' => 'search'),
            array('id, contrato, vendedor_id, cliente_id, plan_id, plan_valor, plan_etb_fija, operador_id, tipo_venta, estado_id, radicador_id, estado_admin_id, observaciones, plataforma_id, documento_id, habeas_data, fecha_activacion, fecha_legalizacion, fecha_radica, fecha_venta, fecha_ingreso, envio_factura_id, activador_inicial, activador_final, tipo_venta_id, observacion_activacion, pedido_factura, estado_contrato_id, cun_oportunidad, numero_identidad,nombre_cliente, numero_asignado, segundo_nombre_cliente, apellido_cliente, segundo_apellido_cliente, fecha_nacimiento_cliente, fecha_expedicion_cliente, telefono_fijo_cliente, telefono_movil_cliente, correo_cliente, direccion_cliente, barrio, activador_iniciar_nombre, cedula_identidad_vendedor, primer_nombre_vendedor, segundo_nombre_vendedor, direccion_instalacion, imei, iccid, link_imagen', 'safe', 'on' => 'vendedores'),
            array('id, contrato, vendedor_id, cliente_id, plan_id, plan_valor, plan_etb_fija, operador_id, tipo_venta, estado_id, radicador_id, estado_admin_id, observaciones, plataforma_id, documento_id, habeas_data, fecha_activacion, fecha_legalizacion, fecha_radica, fecha_venta, fecha_ingreso, envio_factura_id, activador_inicial, activador_final, tipo_venta_id, observacion_activacion, pedido_factura, estado_contrato_id, cun_oportunidad, numero_identidad,nombre_cliente, numero_asignado, segundo_nombre_cliente, apellido_cliente, segundo_apellido_cliente, fecha_nacimiento_cliente, fecha_expedicion_cliente, telefono_fijo_cliente, telefono_movil_cliente, correo_cliente, direccion_cliente, barrio, activador_iniciar_nombre, cedula_identidad_vendedor, primer_nombre_vendedor, segundo_nombre_vendedor, direccion_instalacion, imei, iccid, link_imagen', 'safe', 'on' => 'coordinadores'),
            array('id, contrato, vendedor_id, cliente_id, plan_id, plan_valor, plan_etb_fija, operador_id, tipo_venta, estado_id, radicador_id, estado_admin_id, observaciones, plataforma_id, documento_id, habeas_data, fecha_activacion, fecha_legalizacion, fecha_radica, fecha_venta, fecha_ingreso, envio_factura_id, activador_inicial, activador_final, tipo_venta_id, observacion_activacion, pedido_factura, estado_contrato_id, cun_oportunidad, numero_identidad,nombre_cliente, numero_asignado, segundo_nombre_cliente, apellido_cliente, segundo_apellido_cliente, fecha_nacimiento_cliente, fecha_expedicion_cliente, telefono_fijo_cliente, telefono_movil_cliente, correo_cliente, direccion_cliente, barrio, activador_iniciar_nombre, cedula_identidad_vendedor, primer_nombre_vendedor, segundo_nombre_vendedor, direccion_instalacion, imei, iccid, link_imagen', 'safe', 'on' => 'gerentes'),
            array('id, contrato, vendedor_id, cliente_id, plan_id, plan_valor, plan_etb_fija, operador_id, tipo_venta, estado_id, radicador_id, estado_admin_id, observaciones, plataforma_id, documento_id, habeas_data, fecha_activacion, fecha_legalizacion, fecha_radica, fecha_venta, fecha_ingreso, envio_factura_id, activador_inicial, activador_final, tipo_venta_id, observacion_activacion, pedido_factura, estado_contrato_id, cun_oportunidad, numero_identidad,nombre_cliente, numero_asignado, segundo_nombre_cliente, apellido_cliente, segundo_apellido_cliente, fecha_nacimiento_cliente, fecha_expedicion_cliente, telefono_fijo_cliente, telefono_movil_cliente, correo_cliente, direccion_cliente, barrio, activador_iniciar_nombre, cedula_identidad_vendedor, primer_nombre_vendedor, segundo_nombre_vendedor, direccion_instalacion, imei, iccid,link_imagen', 'safe', 'on' => 'radicador'),
            array('id, contrato, vendedor_id, cliente_id, plan_id, plan_valor, plan_etb_fija, operador_id, tipo_venta, estado_id, radicador_id, estado_admin_id, observaciones, plataforma_id, documento_id, habeas_data, fecha_activacion, fecha_legalizacion, fecha_radica, fecha_venta, fecha_ingreso, envio_factura_id, activador_inicial, activador_final, tipo_venta_id, observacion_activacion, pedido_factura, estado_contrato_id, cun_oportunidad, numero_identidad,nombre_cliente, numero_asignado, segundo_nombre_cliente, apellido_cliente, segundo_apellido_cliente, fecha_nacimiento_cliente, fecha_expedicion_cliente, telefono_fijo_cliente, telefono_movil_cliente, correo_cliente, direccion_cliente, barrio', 'safe', 'on' => 'preliquidacion'),
            array('id, contrato, vendedor_id, cliente_id, plan_id, plan_valor, plan_etb_fija, operador_id, tipo_venta, estado_id, radicador_id, estado_admin_id, observaciones, plataforma_id, documento_id, habeas_data, fecha_activacion, fecha_legalizacion, fecha_radica, fecha_venta, fecha_ingreso, envio_factura_id, activador_inicial, activador_final, tipo_venta_id, observacion_activacion, pedido_factura, estado_contrato_id, cun_oportunidad, numero_identidad,nombre_cliente, numero_asignado, segundo_nombre_cliente, apellido_cliente, segundo_apellido_cliente, fecha_nacimiento_cliente, fecha_expedicion_cliente, telefono_fijo_cliente, telefono_movil_cliente, correo_cliente, direccion_cliente, barrio', 'safe', 'on' => 'liquidacion'),
            array('id, contrato, vendedor_id, cliente_id, plan_id, plan_valor, plan_etb_fija, operador_id, tipo_venta, estado_id, radicador_id, estado_admin_id, observaciones, plataforma_id, documento_id, habeas_data, fecha_activacion, fecha_legalizacion, fecha_radica, fecha_venta, fecha_ingreso, envio_factura_id, activador_inicial, activador_final, tipo_venta_id, observacion_activacion, pedido_factura, estado_contrato_id, cun_oportunidad, numero_identidad,nombre_cliente, numero_asignado, segundo_nombre_cliente, apellido_cliente, segundo_apellido_cliente, fecha_nacimiento_cliente, fecha_expedicion_cliente, telefono_fijo_cliente, telefono_movil_cliente, correo_cliente, direccion_cliente, barrio', 'safe', 'on' => 'contabilizadas'),
            array('id, contrato, vendedor_id, cliente_id, plan_id, plan_valor, plan_etb_fija, operador_id, tipo_venta, estado_id, radicador_id, estado_admin_id, observaciones, plataforma_id, documento_id, habeas_data, fecha_activacion, fecha_legalizacion, fecha_radica, fecha_venta, fecha_ingreso, envio_factura_id, activador_inicial, activador_final, tipo_venta_id, observacion_activacion, pedido_factura, estado_contrato_id, cun_oportunidad, numero_identidad,nombre_cliente, numero_asignado, segundo_nombre_cliente, apellido_cliente, segundo_apellido_cliente, fecha_nacimiento_cliente, fecha_expedicion_cliente, telefono_fijo_cliente, telefono_movil_cliente, correo_cliente, direccion_cliente, barrio', 'safe', 'on' => 'pagadas'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'comisionesEtbfijas' => array(self::HAS_MANY, 'ComisionesEtbfija', 'venta_id'),
            'comisionesVendedores' => array(self::HAS_MANY, 'ComisionesVendedores', 'venta_id'),
            'datosAdicionales' => array(self::HAS_MANY, 'DatosAdicionales', 'venta_id'),
            'transaccions' => array(self::HAS_MANY, 'Transaccion', 'venta_id'),
            'operador' => array(self::BELONGS_TO, 'Dominios', 'operador_id'),
            'plataforma' => array(self::BELONGS_TO, 'Dominios', 'plataforma_id'),
            'documento' => array(self::BELONGS_TO, 'Dominios', 'documento_id'),
            'envioFactura' => array(self::BELONGS_TO, 'Dominios', 'envio_factura_id'),
            'activadorInicial' => array(self::BELONGS_TO, 'Users', 'activador_inicial'),
            'activadorFinal' => array(self::BELONGS_TO, 'Users', 'activador_final'),
            'tipoVenta' => array(self::BELONGS_TO, 'Dominios', 'tipo_venta'),
            'estadoContrato' => array(self::BELONGS_TO, 'Dominios', 'estado_contrato_id'),
            'estado' => array(self::BELONGS_TO, 'Dominios', 'estado_id'),
            'plan' => array(self::BELONGS_TO, 'Planes', 'plan_id'),
            'vendedor' => array(self::BELONGS_TO, 'Users', 'vendedor_id'),
            'persona' => array(self::BELONGS_TO, 'Personas', 'vendedor_id'),
            'cliente' => array(self::BELONGS_TO, 'Clientes', 'cliente_id'),
            'estadoAdmin' => array(self::BELONGS_TO, 'Dominios', 'estado_admin_id'),
            'radicador' => array(self::BELONGS_TO, 'Users', 'radicador_id'),
            'ventasFijases' => array(self::HAS_MANY, 'VentasFijas', 'venta_id'),
            'ventasMoviles' => array(self::HAS_MANY, 'VentasMoviles', 'venta_id'),
            'ventasSesions' => array(self::HAS_MANY, 'VentasSesion', 'venta_id'),
            'usuarioModificador' => array(self::BELONGS_TO, 'Users', 'usuario_modificador'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'Numero de Registro',
            'contrato' => 'Contrato',
            'cun_oportunidad' => 'Cun Oportunidad',
            'vendedor_id' => 'Vendedor',
            'cliente_id' => 'Cliente',
            'operador_id' => 'Operador',
            'tipo_venta' => 'Tipo Venta',
            'plan_id' => 'Plan',
            'plan_etb_fija' => 'Plan Etb Fija',
            'estado_id' => 'Estado',
            'estado_admin_id' => 'Estado Admin',
            'radicador_id' => 'Radicador',
            'numero_radicacion' => 'Numero Radicacion',
            'link_imagen' => 'Link Imagen',
            'observaciones' => 'Observaciones',
            'plataforma_id' => 'Plataforma',
            'documento_id' => 'Documento',
            'habeas_data' => 'Habeas Data',
            'fecha_activacion' => 'Fecha Activacion',
            'fecha_legalizacion' => 'Fecha Legalizacion',
            'fecha_radica' => 'Fecha Radica',
            'fecha_venta' => 'Fecha Venta',
            'fecha_ingreso' => 'Fecha Ingreso',
            'envio_factura_id' => 'Envio Factura',
            'activador_inicial' => 'Activador Inicial',
            'activador_final' => 'Activador Final',
            'tipo_venta_id' => 'Nicho de Venta',
            'observacion_activacion' => 'Observacion Activacion',
            'pedido_factura' => 'Pedido Factura',
            'pedido_root' => 'Pedido Root',
            'estado_contrato_id' => 'Estado Contrato',
            'numero_asignado' => 'Numero Asignado',
            'creado' => 'Creado',
            'modificado' => 'Modificado',
            'numero_identidad' => 'Cedula identidad cliente'
        );
    }

    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('t.id', $this->id);
        $criteria->compare('vendedor.username', $this->vendedor_id, true);
        $criteria->compare('t.cun_oportunidad', $this->cun_oportunidad, true);
        $criteria->compare('cliente.numero_identidad', $this->numero_identidad, true);
        $criteria->compare('cliente.nombre', $this->nombre_cliente, true);
        $criteria->compare('cliente.segundo_nombre', $this->segundo_nombre_cliente, true);
        $criteria->compare('cliente.apellido', $this->apellido_cliente, true);
        $criteria->compare('cliente.segundo_apellido', $this->segundo_apellido_cliente, true);
        $criteria->compare('cliente.fecha_nacimiento', $this->fecha_nacimiento_cliente, true);
        $criteria->compare('cliente.fecha_expedicion', $this->fecha_expedicion_cliente, true);
        $criteria->compare('cliente.fijo', $this->telefono_fijo_cliente, true);
        $criteria->compare('cliente.movil', $this->telefono_movil_cliente, true);
        $criteria->compare('cliente.email', $this->correo_cliente, true);
        $criteria->compare('cliente.direccion', $this->direccion_cliente, true);
        $criteria->compare('ventasFijases.barrio', $this->getBarrio(), true);
        $criteria->compare('plan.nombre', $this->plan_id, true);
        $criteria->compare('plan.valor', $this->plan_valor, true);
        $criteria->compare('operador.id', $this->operador_id, true);
        $criteria->compare('t.tipo_venta', $this->tipo_venta);
        $criteria->compare('t.estado_id', $this->estado_id);
        $criteria->compare('t.radicador_id', $this->radicador_id);
        $criteria->compare('t.numero_radicacion', $this->numero_radicacion, true);
        $criteria->compare('t.estado_admin_id', $this->estado_admin_id);
        $criteria->compare('t.observaciones', $this->observaciones, true);
        $criteria->compare('t.plataforma_id', $this->plataforma_id);
        $criteria->compare('t.documento_id', $this->documento_id);
        $criteria->compare('t.contrato', $this->contrato, true);
        $criteria->compare('t.habeas_data', $this->habeas_data);
        $criteria->compare('t.fecha_activacion', $this->fecha_activacion, true);
        $criteria->compare('t.fecha_legalizacion', $this->fecha_legalizacion, true);
        $criteria->compare('t.fecha_radica', $this->fecha_radica, true);
        $criteria->compare('t.fecha_venta', $this->fecha_venta, true);
        $criteria->compare('t.fecha_ingreso', $this->fecha_ingreso, true);
        $criteria->compare('t.envio_factura_id', $this->envio_factura_id);
        $criteria->compare('activadorInicial.nombre', $this->activador_iniciar_nombre);
        $criteria->compare('t.activador_final', $this->activador_final);
        $criteria->compare('t.tipo_venta_id', $this->tipo_venta_id);
        $criteria->compare('t.observacion_activacion', $this->observacion_activacion, true);
        $criteria->compare('t.pedido_factura', $this->pedido_factura, true);
        $criteria->compare('t.pedido_root', $this->pedido_root, true);
        $criteria->compare('t.estado_contrato_id', $this->estado_contrato_id);
        $criteria->compare('t.numero_asignado', $this->numero_asignado, true);
        $criteria->compare('creado', $this->creado, true);
        $criteria->compare('modificado', $this->modificado, true);
        $criteria->compare('persona.cedula_identidad', $this->cedula_identidad_vendedor, true);
        $criteria->compare('persona.nombre', $this->primer_nombre_vendedor, true);
        $criteria->compare('persona.segundo_nombre', $this->segundo_nombre_vendedor, true);
        $criteria->compare('ventasMoviles.Imei', $this->imei, true);
        $criteria->compare('ventasMoviles.iccId', $this->iccid, true);
        $criteria->compare('ventasMoviles.tipo_alta', $this->tipo_alta, true);
        $criteria->compare('ventasMoviles.operador_donante', $this->operador_donante, true);
        $criteria->compare('t.link_imagen', $this->link_imagen, true);


        $criteria->with = array('operador', 'plan', 'cliente', 'vendedor', 'ventasMoviles' => array('select' => 'ventasMoviles.Imei, ventasMoviles.iccId, ventasMoviles.tipo_alta, ventasMoviles.operador_donante', 'together' => true), 'persona');

        if (isset($_GET['Ventas']['fecha_ingreso_inicio']) || isset($_GET['Ventas']['$fecha_ingreso_fin'])):
            $fecha_ingreso_inicio = $_GET['Ventas']['fecha_ingreso_inicio'];
            $fecha_ingreso_fin = $_GET['Ventas']['fecha_ingreso_fin'];
            $criteria->addBetweenCondition('t.fecha_ingreso', $fecha_ingreso_inicio, $fecha_ingreso_fin);
        else:
            $fecha_ingreso_inicio = date("Y-m-d", strtotime("-3 month"));
            $fecha_ingreso_fin = date("Y-m-d", strtotime("+1 day"));
            $criteria->addBetweenCondition('t.fecha_ingreso', $fecha_ingreso_inicio, $fecha_ingreso_fin);
        endif;
        
        
        //$criteria->order = "t.id DESC"; /* AÑADIR ORDEN */
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function vendedores() {

        $criteria = new CDbCriteria;
        $criteria->compare('t.id', $this->id);
        $criteria->compare('vendedor.username', $this->vendedor_id, true);
        $criteria->compare('t.cun_oportunidad', $this->cun_oportunidad, true);
        $criteria->compare('cliente.numero_identidad', $this->numero_identidad);
        $criteria->compare('cliente.nombre', $this->nombre_cliente, true);
        $criteria->compare('cliente.segundo_nombre', $this->segundo_nombre_cliente, true);
        $criteria->compare('cliente.apellido', $this->apellido_cliente, true);
        $criteria->compare('cliente.segundo_apellido', $this->segundo_apellido_cliente, true);
        $criteria->compare('cliente.fecha_nacimiento', $this->fecha_nacimiento_cliente, true);
        $criteria->compare('cliente.fecha_expedicion', $this->fecha_expedicion_cliente, true);
        $criteria->compare('cliente.fijo', $this->telefono_fijo_cliente, true);
        $criteria->compare('cliente.movil', $this->telefono_movil_cliente, true);
        $criteria->compare('cliente.email', $this->correo_cliente, true);
        $criteria->compare('cliente.direccion', $this->direccion_cliente, true);
        $criteria->compare('ventasFijases.barrio', $this->getBarrio(), true);
        $criteria->compare('plan.nombre', $this->plan_id, true);
        $criteria->compare('operador.id', $this->operador_id, true);
        $criteria->compare('t.tipo_venta', $this->tipo_venta);
        $criteria->compare('t.estado_id', $this->estado_id);
        $criteria->compare('t.radicador_id', $this->radicador_id);
        $criteria->compare('t.numero_radicacion', $this->numero_radicacion, true);
        $criteria->compare('t.estado_admin_id', $this->estado_admin_id);
        $criteria->compare('t.observaciones', $this->observaciones, true);
        $criteria->compare('t.plataforma_id', $this->plataforma_id);
        $criteria->compare('t.documento_id', $this->documento_id);
        $criteria->compare('t.contrato', $this->contrato, true);
        $criteria->compare('t.habeas_data', $this->habeas_data);
        $criteria->compare('t.fecha_activacion', $this->fecha_activacion, true);
        $criteria->compare('t.fecha_legalizacion', $this->fecha_legalizacion, true);
        $criteria->compare('t.fecha_radica', $this->fecha_radica, true);
        $criteria->compare('t.fecha_venta', $this->fecha_venta, true);
        $criteria->compare('t.fecha_ingreso', $this->fecha_ingreso, true);
        $criteria->compare('t.envio_factura_id', $this->envio_factura_id);
        $criteria->compare('activadorInicial.nombre', $this->activador_iniciar_nombre);
        $criteria->compare('t.activador_final', $this->activador_final);
        $criteria->compare('t.tipo_venta_id', $this->tipo_venta_id);
        $criteria->compare('t.observacion_activacion', $this->observacion_activacion, true);
        $criteria->compare('t.pedido_factura', $this->pedido_factura, true);
        $criteria->compare('t.pedido_root', $this->pedido_root, true);
        $criteria->compare('t.estado_contrato_id', $this->estado_contrato_id);
        $criteria->compare('t.numero_asignado', $this->numero_asignado, true);
        $criteria->compare('creado', $this->creado, true);
        $criteria->compare('modificado', $this->modificado, true);
        $criteria->compare('persona.cedula_identidad', $this->cedula_identidad_vendedor);
        $criteria->compare('persona.nombre', $this->primer_nombre_vendedor, true);
        $criteria->compare('persona.segundo_nombre', $this->segundo_nombre_vendedor, true);
        $criteria->compare('ventasMoviles.Imei', $this->imei, true);
        $criteria->compare('ventasMoviles.iccId', $this->iccid, true);
        $criteria->compare('ventasMoviles.tipo_alta', $this->tipo_alta, true);
        $criteria->compare('ventasMoviles.operador_donante', $this->operador_donante, true);
        $criteria->with = array('operador', 'plan', 'cliente', 'vendedor', 'ventasMoviles' => array('select' => 'ventasMoviles.Imei, ventasMoviles.iccId, ventasMoviles.tipo_alta, ventasMoviles.operador_donante', 'together' => true), 'persona');

        //$criteria->order = "t.id DESC"; /* AÑADIR ORDEN */
        $user_id = Yii::app()->user->id;
        $criteria->addCondition('vendedor.coordinador_id =' . $user_id);

        if (isset($_GET['Ventas']['fecha_ingreso_inicio']) || isset($_GET['Ventas']['fecha_ingreso_fin'])):
            $fecha_ingreso_inicio = $_GET['Ventas']['fecha_ingreso_inicio'];
            $fecha_ingreso_fin = $_GET['Ventas']['fecha_ingreso_fin'];
            $criteria->addBetweenCondition('t.fecha_ingreso', $fecha_ingreso_inicio, $fecha_ingreso_fin);
        else:
            $fecha_ingreso_inicio = date("Y-m-d", strtotime("-3 month"));
            $fecha_ingreso_fin = date("Y-m-d", strtotime("+1 day"));
            $criteria->addBetweenCondition('t.fecha_ingreso', $fecha_ingreso_inicio, $fecha_ingreso_fin);
        endif;

        $totales = Ventas::model()->count();
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array('pageSize' => $totales),
        ));
    }

    public function coordinadores() {

        $criteria = new CDbCriteria;
        $criteria->compare('t.id', $this->id);
        $criteria->compare('vendedor.username', $this->vendedor_id, true);
        $criteria->compare('t.cun_oportunidad', $this->cun_oportunidad, true);
        $criteria->compare('cliente.numero_identidad', $this->numero_identidad, true);
        $criteria->compare('cliente.nombre', $this->nombre_cliente, true);
        $criteria->compare('cliente.segundo_nombre', $this->segundo_nombre_cliente, true);
        $criteria->compare('cliente.apellido', $this->apellido_cliente, true);
        $criteria->compare('cliente.segundo_apellido', $this->segundo_apellido_cliente, true);
        $criteria->compare('cliente.fecha_nacimiento', $this->fecha_nacimiento_cliente, true);
        $criteria->compare('cliente.fecha_expedicion', $this->fecha_expedicion_cliente, true);
        $criteria->compare('cliente.fijo', $this->telefono_fijo_cliente, true);
        $criteria->compare('cliente.movil', $this->telefono_movil_cliente, true);
        $criteria->compare('cliente.email', $this->correo_cliente, true);
        $criteria->compare('cliente.direccion', $this->direccion_cliente, true);
        $criteria->compare('ventasFijases.barrio', $this->getBarrio(), true);
        $criteria->compare('plan.nombre', $this->plan_id, true);
        $criteria->compare('operador.id', $this->operador_id, true);
        $criteria->compare('t.tipo_venta', $this->tipo_venta);
        $criteria->compare('t.estado_id', $this->estado_id);
        $criteria->compare('t.radicador_id', $this->radicador_id);
        $criteria->compare('t.numero_radicacion', $this->numero_radicacion, true);
        $criteria->compare('t.estado_admin_id', $this->estado_admin_id);
        $criteria->compare('t.observaciones', $this->observaciones, true);
        $criteria->compare('t.plataforma_id', $this->plataforma_id);
        $criteria->compare('t.documento_id', $this->documento_id);
        $criteria->compare('t.contrato', $this->contrato, true);
        $criteria->compare('t.habeas_data', $this->habeas_data);
        $criteria->compare('t.fecha_activacion', $this->fecha_activacion, true);
        $criteria->compare('t.fecha_legalizacion', $this->fecha_legalizacion, true);
        $criteria->compare('t.fecha_radica', $this->fecha_radica, true);
        $criteria->compare('t.fecha_venta', $this->fecha_venta, true);
        $criteria->compare('t.fecha_ingreso', $this->fecha_ingreso, true);
        $criteria->compare('t.envio_factura_id', $this->envio_factura_id);
        $criteria->compare('activadorInicial.nombre', $this->activador_iniciar_nombre);
        $criteria->compare('t.activador_final', $this->activador_final);
        $criteria->compare('t.tipo_venta_id', $this->tipo_venta_id);
        $criteria->compare('t.observacion_activacion', $this->observacion_activacion, true);
        $criteria->compare('t.pedido_factura', $this->pedido_factura, true);
        $criteria->compare('t.pedido_root', $this->pedido_root, true);
        $criteria->compare('t.estado_contrato_id', $this->estado_contrato_id);
        $criteria->compare('t.numero_asignado', $this->numero_asignado, true);
        $criteria->compare('creado', $this->creado, true);
        $criteria->compare('modificado', $this->modificado, true);
        $criteria->compare('persona.cedula_identidad', $this->cedula_identidad_vendedor, true);
        $criteria->compare('persona.nombre', $this->primer_nombre_vendedor, true);
        $criteria->compare('persona.segundo_nombre', $this->segundo_nombre_vendedor, true);
        $criteria->compare('ventasMoviles.Imei', $this->imei, true);
        $criteria->compare('ventasMoviles.iccId', $this->iccid, true);
        $criteria->compare('ventasMoviles.tipo_alta', $this->tipo_alta, true);
        $criteria->compare('ventasMoviles.operador_donante', $this->operador_donante, true);
        $criteria->with = array('operador', 'plan', 'cliente', 'vendedor', 'ventasMoviles' => array('select' => 'ventasMoviles.Imei, ventasMoviles.iccId, ventasMoviles.tipo_alta, ventasMoviles.operador_donante', 'together' => true), 'persona');
        $criteria->order = "t.id DESC"; /* AÑADIR ORDEN */
        $user_id = Yii::app()->user->id;
        $criteria->addCondition('t.vendedor_id =' . $user_id);


        if (isset($_GET['Ventas']['fecha_ingreso_inicio']) || isset($_GET['Ventas']['fecha_ingreso_inicio'])):
            $fecha_ingreso_inicio = $_GET['Ventas']['fecha_ingreso_inicio'];
            $fecha_ingreso_fin = $_GET['Ventas']['fecha_ingreso_fin'];
            $criteria->addBetweenCondition('t.fecha_ingreso', $fecha_ingreso_inicio, $fecha_ingreso_fin);
        endif;


        $totales = Ventas::model()->count();

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array('pageSize' => $totales),
        ));
    }

    public function gerentes() {


        $criteria = new CDbCriteria;
        $criteria->compare('t.id', $this->id);
        $criteria->compare('vendedor.username', $this->vendedor_id, true);
        $criteria->compare('t.cun_oportunidad', $this->cun_oportunidad, true);
        $criteria->compare('cliente.numero_identidad', $this->numero_identidad, true);
        $criteria->compare('cliente.nombre', $this->nombre_cliente, true);
        $criteria->compare('cliente.segundo_nombre', $this->segundo_nombre_cliente, true);
        $criteria->compare('cliente.apellido', $this->apellido_cliente, true);
        $criteria->compare('cliente.segundo_apellido', $this->segundo_apellido_cliente, true);
        $criteria->compare('cliente.fecha_nacimiento', $this->fecha_nacimiento_cliente, true);
        $criteria->compare('cliente.fecha_expedicion', $this->fecha_expedicion_cliente, true);
        $criteria->compare('cliente.fijo', $this->telefono_fijo_cliente, true);
        $criteria->compare('cliente.movil', $this->telefono_movil_cliente, true);
        $criteria->compare('cliente.email', $this->correo_cliente, true);
        $criteria->compare('cliente.direccion', $this->direccion_cliente, true);
        $criteria->compare('ventasFijases.barrio', $this->getBarrio(), true);
        $criteria->compare('plan.nombre', $this->plan_id, true);
        $criteria->compare('operador.id', $this->operador_id, true);
        $criteria->compare('t.tipo_venta', $this->tipo_venta);
        $criteria->compare('t.estado_id', $this->estado_id);
        $criteria->compare('t.radicador_id', $this->radicador_id);
        $criteria->compare('t.estado_admin_id', $this->estado_admin_id);
        $criteria->compare('t.observaciones', $this->observaciones, true);
        $criteria->compare('t.plataforma_id', $this->plataforma_id);
        $criteria->compare('t.documento_id', $this->documento_id);
        $criteria->compare('t.contrato', $this->contrato, true);
        $criteria->compare('t.habeas_data', $this->habeas_data);
        $criteria->compare('t.fecha_activacion', $this->fecha_activacion, true);
        $criteria->compare('t.fecha_legalizacion', $this->fecha_legalizacion, true);
        $criteria->compare('t.fecha_radica', $this->fecha_radica, true);
        $criteria->compare('t.fecha_venta', $this->fecha_venta, true);
        $criteria->compare('t.fecha_ingreso', $this->fecha_ingreso, true);
        $criteria->compare('t.envio_factura_id', $this->envio_factura_id);
        $criteria->compare('activadorInicial.nombre', $this->activador_iniciar_nombre);
        $criteria->compare('t.activador_final', $this->activador_final);
        $criteria->compare('t.tipo_venta_id', $this->tipo_venta_id);
        $criteria->compare('t.observacion_activacion', $this->observacion_activacion, true);
        $criteria->compare('t.pedido_factura', $this->pedido_factura, true);
        $criteria->compare('t.pedido_root', $this->pedido_root, true);
        $criteria->compare('t.estado_contrato_id', $this->estado_contrato_id);
        $criteria->compare('t.numero_asignado', $this->numero_asignado, true);
        $criteria->compare('creado', $this->creado, true);
        $criteria->compare('modificado', $this->modificado, true);
        $criteria->compare('ventasMoviles.Imei', $this->imei, true);
        $criteria->compare('ventasMoviles.iccId', $this->iccid, true);
        $criteria->compare('ventasMoviles.tipo_alta', $this->tipo_alta, true);
        $criteria->compare('ventasMoviles.operador_donante', $this->operador_donante, true);
        $criteria->with = array('operador', 'plan', 'cliente', 'vendedor', 'ventasMoviles' => array('select' => 'ventasMoviles.Imei, ventasMoviles.iccId, ventasMoviles.tipo_alta, ventasMoviles.operador_donante', 'together' => true), 'persona');
        $criteria->order = "t.fecha_ingreso DESC"; /* AÑADIR ORDEN */
        $user_id = Yii::app()->user->id;
        $criteria->addCondition('vendedor.gerente_id = ' . $user_id);

        if (isset($_GET['Ventas']['fecha_ingreso_inicio']) || isset($_GET['Ventas']['fecha_ingreso_inicio'])):
            $fecha_ingreso_inicio = $_GET['Ventas']['fecha_ingreso_inicio'];
            $fecha_ingreso_fin = $_GET['Ventas']['fecha_ingreso_fin'];
            $criteria->addBetweenCondition('t.fecha_ingreso', $fecha_ingreso_inicio, $fecha_ingreso_fin);
        endif;

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function radicador() {


        $criteria = new CDbCriteria;

        $criteria->compare('t.id', $this->id);
        $criteria->compare('vendedor.username', $this->vendedor_id, true);
        $criteria->compare('t.cun_oportunidad', $this->cun_oportunidad, true);
        $criteria->compare('cliente.numero_identidad', $this->numero_identidad, true);
        $criteria->compare('cliente.nombre', $this->nombre_cliente, true);
        $criteria->compare('cliente.segundo_nombre', $this->segundo_nombre_cliente, true);
        $criteria->compare('cliente.apellido', $this->apellido_cliente, true);
        $criteria->compare('cliente.segundo_apellido', $this->segundo_apellido_cliente, true);
        $criteria->compare('cliente.fecha_nacimiento', $this->fecha_nacimiento_cliente, true);
        $criteria->compare('cliente.fecha_expedicion', $this->fecha_expedicion_cliente, true);
        $criteria->compare('cliente.fijo', $this->telefono_fijo_cliente, true);
        $criteria->compare('cliente.movil', $this->telefono_movil_cliente, true);
        $criteria->compare('cliente.email', $this->correo_cliente, true);
        $criteria->compare('cliente.direccion', $this->direccion_cliente, true);
        $criteria->compare('ventasFijases.barrio', $this->getBarrio(), true);
        $criteria->compare('plan.nombre', $this->plan_id, true);
        $criteria->compare('operador.id', $this->operador_id, true);
        $criteria->compare('t.tipo_venta', $this->tipo_venta);
        $criteria->compare('t.estado_id', $this->estado_id);
        $criteria->compare('t.radicador_id', $this->radicador_id);
        $criteria->compare('t.numero_radicacion', $this->numero_radicacion, true);
        $criteria->compare('t.estado_admin_id', $this->estado_admin_id);
        $criteria->compare('t.observaciones', $this->observaciones, true);
        $criteria->compare('t.plataforma_id', $this->plataforma_id);
        $criteria->compare('t.documento_id', $this->documento_id);
        $criteria->compare('t.contrato', $this->contrato, true);
        $criteria->compare('t.habeas_data', $this->habeas_data);
        $criteria->compare('t.fecha_activacion', $this->fecha_activacion, true);
        $criteria->compare('t.fecha_legalizacion', $this->fecha_legalizacion, true);
        $criteria->compare('t.fecha_radica', $this->fecha_radica, true);
        $criteria->compare('t.fecha_venta', $this->fecha_venta, true);
        $criteria->compare('t.fecha_ingreso', $this->fecha_ingreso, true);
        $criteria->compare('t.envio_factura_id', $this->envio_factura_id);
        $criteria->compare('activadorInicial.nombre', $this->activador_iniciar_nombre);
        $criteria->compare('t.activador_final', $this->activador_final);
        $criteria->compare('t.tipo_venta_id', $this->tipo_venta_id);
        $criteria->compare('t.observacion_activacion', $this->observacion_activacion, true);
        $criteria->compare('t.pedido_factura', $this->pedido_factura, true);
        $criteria->compare('t.pedido_root', $this->pedido_root, true);
        $criteria->compare('t.estado_contrato_id', $this->estado_contrato_id);
        $criteria->compare('t.numero_asignado', $this->numero_asignado, true);
        $criteria->compare('creado', $this->creado, true);
        $criteria->compare('modificado', $this->modificado, true);
        $criteria->compare('persona.cedula_identidad', $this->cedula_identidad_vendedor, true);
        $criteria->compare('persona.nombre', $this->primer_nombre_vendedor, true);
        $criteria->compare('persona.segundo_nombre', $this->segundo_nombre_vendedor, true);
        $criteria->compare('ventasMoviles.Imei', $this->imei, true);
        $criteria->compare('ventasMoviles.iccId', $this->iccid, true);
        $criteria->compare('ventasMoviles.tipo_alta', $this->tipo_alta, true);
        $criteria->compare('ventasMoviles.operador_donante', $this->operador_donante, true);
        $criteria->with = array('operador', 'plan', 'cliente', 'vendedor', 'ventasMoviles' => array('select' => 'ventasMoviles.Imei, ventasMoviles.iccId, ventasMoviles.tipo_alta, ventasMoviles.operador_donante', 'together' => true), 'persona');

        if (isset($_GET['Ventas']['fecha_ingreso_inicio']) || isset($_GET['Ventas']['fecha_ingreso_inicio'])):
            $fecha_ingreso_inicio = $_GET['Ventas']['fecha_ingreso_inicio'];
            $fecha_ingreso_fin = $_GET['Ventas']['fecha_ingreso_fin'];
            $criteria->addBetweenCondition('t.fecha_ingreso', $fecha_ingreso_inicio, $fecha_ingreso_fin);
        endif;

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array('pageSize' => 20),
        ));
    }

    public function searchFechas($Fecha_inicio = null, $Fecha_fin = null, $operador = null) {

        $criteria = new CDbCriteria;

        $criteria->compare('t.id', $this->id);
        $criteria->compare('vendedor.username', $this->vendedor_id, true);
        $criteria->compare('t.cun_oportunidad', $this->cun_oportunidad, true);
        $criteria->compare('cliente.numero_identidad', $this->numero_identidad, true);
        $criteria->compare('cliente.nombre', $this->nombre_cliente, true);
        $criteria->compare('cliente.segundo_nombre', $this->segundo_nombre_cliente, true);
        $criteria->compare('cliente.apellido', $this->apellido_cliente, true);
        $criteria->compare('cliente.segundo_apellido', $this->segundo_apellido_cliente, true);
        $criteria->compare('cliente.fecha_nacimiento', $this->fecha_nacimiento_cliente, true);
        $criteria->compare('cliente.fecha_expedicion', $this->fecha_expedicion_cliente, true);
        $criteria->compare('cliente.fijo', $this->telefono_fijo_cliente, true);
        $criteria->compare('cliente.movil', $this->telefono_movil_cliente, true);
        $criteria->compare('cliente.email', $this->correo_cliente, true);
        $criteria->compare('cliente.direccion', $this->direccion_cliente, true);
        $criteria->compare('ventasFijases.barrio', $this->getBarrio(), true);
        $criteria->compare('plan.nombre', $this->plan_id, true);
        $criteria->compare('operador.id', $this->operador_id, true);
        $criteria->compare('t.tipo_venta', $this->tipo_venta);
        $criteria->compare('t.estado_id', $this->estado_id);
        $criteria->compare('t.radicador_id', $this->radicador_id);
        $criteria->compare('t.numero_radicacion', $this->numero_radicacion, true);
        $criteria->compare('t.estado_admin_id', $this->estado_admin_id);
        $criteria->compare('t.observaciones', $this->observaciones, true);
        $criteria->compare('t.plataforma_id', $this->plataforma_id);
        $criteria->compare('t.documento_id', $this->documento_id);
        $criteria->compare('t.contrato', $this->contrato, true);
        $criteria->compare('t.habeas_data', $this->habeas_data);
        $criteria->compare('t.fecha_activacion', $this->fecha_activacion, true);
        $criteria->compare('t.fecha_legalizacion', $this->fecha_legalizacion, true);
        $criteria->compare('t.fecha_radica', $this->fecha_radica, true);
        $criteria->compare('t.fecha_venta', $this->fecha_venta, true);
        $criteria->compare('t.fecha_ingreso', $this->fecha_ingreso, true);
        $criteria->compare('t.envio_factura_id', $this->envio_factura_id);
        $criteria->compare('activadorInicial.nombre', $this->activador_iniciar_nombre);
        $criteria->compare('t.activador_final', $this->activador_final);
        $criteria->compare('t.tipo_venta_id', $this->tipo_venta_id);
        $criteria->compare('t.observacion_activacion', $this->observacion_activacion, true);
        $criteria->compare('t.pedido_factura', $this->pedido_factura, true);
        $criteria->compare('t.pedido_root', $this->pedido_root, true);
        $criteria->compare('t.estado_contrato_id', $this->estado_contrato_id);
        $criteria->compare('t.numero_asignado', $this->numero_asignado, true);
        $criteria->compare('creado', $this->creado, true);
        $criteria->compare('modificado', $this->modificado, true);
        $criteria->compare('persona.cedula_identidad', $this->cedula_identidad_vendedor, true);
        $criteria->compare('persona.nombre', $this->primer_nombre_vendedor, true);
        $criteria->compare('persona.segundo_nombre', $this->segundo_nombre_vendedor, true);
        $criteria->compare('ventasMoviles.Imei', $this->imei, true);
        $criteria->compare('ventasMoviles.iccId', $this->iccid, true);
        $criteria->compare('ventasMoviles.tipo_alta', $this->tipo_alta, true);
        $criteria->compare('ventasMoviles.operador_donante', $this->operador_donante, true);
        $criteria->with = array('operador', 'plan', 'cliente', 'vendedor', 'ventasMoviles' => array('select' => 'ventasMoviles.Imei, ventasMoviles.iccId, ventasMoviles.tipo_alta, ventasMoviles.operador_donante', 'together' => true), 'persona');
        $criteria->order = "t.id DESC"; /* AÑADIR ORDEN */

        $criteria->condition = 't.operador_id = :operador '
                . ' AND t.fecha_activacion BETWEEN :Fecha_inicio AND :Fecha_fin';
        $criteria->params = array(':operador' => $operador, ':Fecha_inicio' => $Fecha_inicio, ':Fecha_fin' => $Fecha_fin,);

        $todos = Ventas::model()->count();

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array('pageSize' => $todos),
        ));
    }

    public function preliquidacion() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('t.id', $this->id);
        $criteria->compare('vendedor.username', $this->vendedor_id, true);
        $criteria->compare('cliente.nombre', $this->cliente_id, true);
        $criteria->compare('plan.nombre', $this->plan_id, true);
        $criteria->compare('operador.id', $this->operador_id, true);
        $criteria->compare('t.estado_id', $this->estado_id);
        $criteria->compare('t.radicador_id', $this->radicador_id);
        $criteria->compare('t.estado_admin_id', $this->estado_admin_id);
        $criteria->compare('t.observaciones', $this->observaciones, true);
        $criteria->compare('t.plataforma_id', $this->plataforma_id);
        $criteria->compare('t.documento_id', $this->documento_id);
        $criteria->compare('t.contrato', $this->contrato, true);
        $criteria->compare('t.habeas_data', $this->habeas_data);
        $criteria->compare('t.fecha_activacion', $this->fecha_activacion, true);
        $criteria->compare('t.fecha_legalizacion', $this->fecha_legalizacion, true);
        $criteria->compare('t.fecha_radica', $this->fecha_radica, true);
        $criteria->compare('t.fecha_venta', $this->fecha_venta, true);
        $criteria->compare('t.fecha_ingreso', $this->fecha_ingreso, true);
        $criteria->compare('t.envio_factura_id', $this->envio_factura_id);
        $criteria->compare('t.activador_inicial', $this->activador_inicial);
        $criteria->compare('t.activador_final', $this->activador_final);
        $criteria->compare('t.tipo_venta_id', $this->tipo_venta_id);
        $criteria->compare('t.observacion_activacion', $this->observacion_activacion, true);
        $criteria->compare('t.pedido_factura', $this->pedido_factura);
        $criteria->compare('t.estado_contrato_id', $this->estado_contrato_id);
        $criteria->compare('t.numero_asignado', $this->numero_asignado, true);
        $criteria->with = array('operador', 'plan', 'cliente', 'vendedor');
        $criteria->condition = 't.estado_id = 47';
        $criteria->order = "t.id DESC"; /* AÑADIR ORDEN */
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function liquidacion() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('t.id', $this->id);
        $criteria->compare('vendedor.username', $this->vendedor_id, true);
        $criteria->compare('cliente.nombre', $this->cliente_id, true);
        $criteria->compare('plan.nombre', $this->plan_id, true);
        $criteria->compare('operador.id', $this->operador_id, true);
        $criteria->compare('t.estado_id', $this->estado_id);
        $criteria->compare('t.radicador_id', $this->radicador_id);
        $criteria->compare('t.estado_admin_id', $this->estado_admin_id);
        $criteria->compare('t.observaciones', $this->observaciones, true);
        $criteria->compare('t.plataforma_id', $this->plataforma_id);
        $criteria->compare('t.documento_id', $this->documento_id);
        $criteria->compare('t.contrato', $this->contrato, true);
        $criteria->compare('t.habeas_data', $this->habeas_data);
        $criteria->compare('t.fecha_activacion', $this->fecha_activacion, true);
        $criteria->compare('t.fecha_legalizacion', $this->fecha_legalizacion, true);
        $criteria->compare('t.fecha_radica', $this->fecha_radica, true);
        $criteria->compare('t.fecha_venta', $this->fecha_venta, true);
        $criteria->compare('t.fecha_ingreso', $this->fecha_ingreso, true);
        $criteria->compare('t.envio_factura_id', $this->envio_factura_id);
        $criteria->compare('t.activador_inicial', $this->activador_inicial);
        $criteria->compare('t.activador_final', $this->activador_final);
        $criteria->compare('t.tipo_venta_id', $this->tipo_venta_id);
        $criteria->compare('t.observacion_activacion', $this->observacion_activacion, true);
        $criteria->compare('t.pedido_factura', $this->pedido_factura);
        $criteria->compare('t.estado_contrato_id', $this->estado_contrato_id);
        $criteria->compare('t.numero_asignado', $this->numero_asignado, true);
        $criteria->with = array('operador', 'plan', 'cliente', 'vendedor');
        $criteria->condition = 't.estado_id = 48';
        $criteria->order = "t.id DESC"; /* AÑADIR ORDEN */
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function contabilizadas() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('t.id', $this->id);
        $criteria->compare('vendedor.username', $this->vendedor_id, true);
        $criteria->compare('cliente.nombre', $this->cliente_id, true);
        $criteria->compare('plan.nombre', $this->plan_id, true);
        $criteria->compare('operador.id', $this->operador_id, true);
        $criteria->compare('t.estado_id', $this->estado_id);
        $criteria->compare('t.radicador_id', $this->radicador_id);
        $criteria->compare('t.estado_admin_id', $this->estado_admin_id);
        $criteria->compare('t.observaciones', $this->observaciones, true);
        $criteria->compare('t.plataforma_id', $this->plataforma_id);
        $criteria->compare('t.documento_id', $this->documento_id);
        $criteria->compare('t.contrato', $this->contrato, true);
        $criteria->compare('t.habeas_data', $this->habeas_data);
        $criteria->compare('t.fecha_activacion', $this->fecha_activacion, true);
        $criteria->compare('t.fecha_legalizacion', $this->fecha_legalizacion, true);
        $criteria->compare('t.fecha_radica', $this->fecha_radica, true);
        $criteria->compare('t.fecha_venta', $this->fecha_venta, true);
        $criteria->compare('t.fecha_ingreso', $this->fecha_ingreso, true);
        $criteria->compare('t.envio_factura_id', $this->envio_factura_id);
        $criteria->compare('t.activador_inicial', $this->activador_inicial);
        $criteria->compare('t.activador_final', $this->activador_final);
        $criteria->compare('t.tipo_venta_id', $this->tipo_venta_id);
        $criteria->compare('t.observacion_activacion', $this->observacion_activacion, true);
        $criteria->compare('t.pedido_factura', $this->pedido_factura);
        $criteria->compare('t.estado_contrato_id', $this->estado_contrato_id);
        $criteria->compare('t.numero_asignado', $this->numero_asignado, true);

        $criteria->with = array('operador', 'plan', 'cliente', 'vendedor');
        $criteria->condition = 't.estado_id = 48';
        $criteria->order = "t.id DESC"; /* AÑADIR ORDEN */
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function pagadas() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('t.id', $this->id);
        $criteria->compare('vendedor.username', $this->vendedor_id, true);
        $criteria->compare('cliente.nombre', $this->cliente_id, true);
        $criteria->compare('plan.nombre', $this->plan_id, true);
        $criteria->compare('operador.id', $this->operador_id, true);
        $criteria->compare('t.estado_id', $this->estado_id);
        $criteria->compare('t.radicador_id', $this->radicador_id);
        $criteria->compare('t.estado_admin_id', $this->estado_admin_id);
        $criteria->compare('t.observaciones', $this->observaciones, true);
        $criteria->compare('t.plataforma_id', $this->plataforma_id);
        $criteria->compare('t.documento_id', $this->documento_id);
        $criteria->compare('t.contrato', $this->contrato, true);
        $criteria->compare('t.habeas_data', $this->habeas_data);
        $criteria->compare('t.fecha_activacion', $this->fecha_activacion, true);
        $criteria->compare('t.fecha_legalizacion', $this->fecha_legalizacion, true);
        $criteria->compare('t.fecha_radica', $this->fecha_radica, true);
        $criteria->compare('t.fecha_venta', $this->fecha_venta, true);
        $criteria->compare('t.fecha_ingreso', $this->fecha_ingreso, true);
        $criteria->compare('t.envio_factura_id', $this->envio_factura_id);
        $criteria->compare('t.activador_inicial', $this->activador_inicial);
        $criteria->compare('t.activador_final', $this->activador_final);
        $criteria->compare('t.tipo_venta_id', $this->tipo_venta_id);
        $criteria->compare('t.observacion_activacion', $this->observacion_activacion, true);
        $criteria->compare('t.pedido_factura', $this->pedido_factura);
        $criteria->compare('t.estado_contrato_id', $this->estado_contrato_id);
        $criteria->compare('t.numero_asignado', $this->numero_asignado, true);
        $criteria->with = array('operador', 'plan', 'cliente', 'vendedor',);
        $criteria->condition = 't.estado_id = 48';
        $criteria->order = "t.id DESC"; /* AÑADIR ORDEN */
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getBarrio() {
        foreach ($this->ventasFijases as $ventasFijas) {
            return $this->barrio = $ventasFijas->barrio;
        }
    }

    public function getEstrato() {
        foreach ($this->ventasFijases as $ventasFijas) {
            return $this->estrato = $ventasFijas->estrato;
        }
    }

    public function getOperadorDonante() {

        foreach ($this->ventasMoviles as $ventasMovil) {
            return $this->operador_donante = $ventasMovil->operador_donante;
        }
    }

    public function getTipoAlta() {

        foreach ($this->ventasMoviles as $ventasMovil) {
            return $this->tipo_alta = $ventasMovil->tipo_alta;
        }
    }

    public static function getTipoAltaNombre($valor) {

        $nombre = '';
        switch ($valor):
            case 0: $nombre = 'Linea Nueva';
                break;
            case 1: $nombre = 'Portabilidad';
                break;
            case 2: $nombre = 'Reposicion';
                break;
            case 3: $nombre = 'Sesion';
                break;
        endswitch;
        return $nombre;
    }

    public static function getTipoAltaSelect() {
        return array(0 => 'Linea Nueva', 1 => 'Portabilidad', 2 => 'Reposicion', 3 => 'Sesion');
    }

    public static function getOperadorDonanteNombre($valor) {

        $operador = '';
        switch ($valor):
            case '1': $operador = 'ETB MOVIL';
                break;
            case '2': $operador = 'CLARO MOVIL';
                break;
            case '3': $operador = 'MOVISTAR MOVIL';
                break;
            case '4': $operador = 'AVANTEL';
                break;
            case '5': $operador = 'ETB FIJA';
                break;
            case '6': $operador = 'CLARO FIJA';
                break;
            case '7': $operador = 'MOVISTAR FIJA';
                break;
            case '8': $operador = 'DIRECTV';
                break;
            case '54': $operador = 'ETB';
                break;
            case '138': $operador = 'UFF';
                break;
            case '139': $operador = 'TIGO';
                break;
            case '144': $operador = 'VIRGIN';
                break;
        endswitch;

        return $operador;
    }

    public function getNumeroAsignado() {
        foreach ($this->ventasMoviles as $ventasMovil) {
            return $this->numero_asignado = $ventasMovil->numero_asignado;
        }
    }

    public function getEquipoOrigen2() {
        foreach ($this->ventasMoviles as $ventasMovil) {
            return $this->origen_equipo = $ventasMovil->origen_equipo;
        }
    }

    public static function getEquipoOrigenNombre($valor) {

        $equipo = '';
        switch ($valor):
            case 0: $equipo = 'Traido';
                break;
            case 1: $equipo = 'Vendido';
                break;
        endswitch;

        return $equipo;
    }

    public function getEquipo() {
        foreach ($this->ventasMoviles as $ventasMovil) {
            return $this->equipo = $ventasMovil->equipo;
        }
    }

    public function getImei() {
        foreach ($this->ventasMoviles as $ventasMovil) {
            return $this->imei = $ventasMovil->Imei;
        }
    }

    public function geticcId() {
        foreach ($this->ventasMoviles as $ventasMovil) {
            return $this->iccid = $ventasMovil->iccId;
        }
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Ventas the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function ConsultaExpotVentas($fechaActual = NULL, $fechaFin = NULL) {

        $Criteria = new CDbCriteria();
        $Criteria->alias = 'Venta';
        $Criteria->condition = 'Venta.fecha_venta BETWEEN :fechaActual AND :fechaFin';
        $Criteria->params = array(':fechaActual' => $fechaActual, ':fechaFin' => $fechaFin);

        return Ventas::model()->findAll($Criteria);
    }

    public static function habea($model) {

        if ($model == 0) {
            $valor = 'NO ACEPTA';
        } else {
            $valor = 'SI ACEPTA';
        }

        return $valor;
    }

    public static function habeasSelect() {

        return array(0 => 'No acepto', 1 => 'Si acepto');
    }

    public static function getEquipoOrigen($valor = NULL) {
        if ($valor == 0):
            $data = 'TRAIDO';
        else:
            $data = 'VENDIDO';
        endif;

        return $data;
    }

    public static function getOperador() {

        $operador = Dominios::model()->findAll('activo = 1 AND id IN (1, 2, 3, 4, 5, 8, 6, 7, 8) ');
        return CHtml::listData($operador, 'id', 'tipo');
    }

    public static function getOperadorparametro() {

        $operador = Dominios::model()->findAll('activo = 1 AND id IN (1, 2, 3, 4, 5, 8, 6, 7, 8) ');
        foreach ($operador as $data):
            $res[] = $data->id;
        endforeach;
        return $res;
    }

    public static function getOperadorAdministradorFiltro() {

        $operador = Dominios::model()->findAll('activo = 1 AND id IN (1, 2, 3, 4,5,8,8, 138, 139, 144, 147) ');
        return CHtml::listData($operador, 'id', 'tipo');
    }

    public static function getOperadorDonanteFormulario() {

        $operador = Dominios::model()->findAll('activo = 1 AND id IN (1, 2, 3, 4,8, 138, 139, 144, 147) ');
        return CHtml::listData($operador, 'id', 'tipo');
    }

    public static function getClientes() {
        return CHtml::listData(Clientes::model()->findAll(''), 'id', 'SelectNombreApellidoCliente');
    }

    public static function getUsuarios() {
        $Usuarios = Users::model()->findAll();
        return CHtml::listData($Usuarios, 'id', 'Selectsuario');
    }

    public static function getActivadorInicial() {

        $usuario_id = Yii::app()->user->id;

        $coordinador_id = Users::model()->find(array(
            'select' => 't.coordinador_id',
            'condition' => 't.id = :usuario_id ',
            'params' => array(':usuario_id' => $usuario_id)
        ));

        $vendedor_id = Users::model()->findAll(array(
            'condition' => 't.id = :usuario_id OR t.id=:yo OR t.id = 64',
            'params' => array(':usuario_id' => $coordinador_id->coordinador_id, ':yo' => $usuario_id)
        ));

        return CHtml::listData($vendedor_id, 'id', 'Selectsuario');
    }

    public static function getPlanes() {
        $planes = Planes::model()->findAll(array('order' => 'nombre ASC'));
        return CHtml::listData($planes, 'id', 'nombre');
    }

    public static function getPlanesAdmin($valor) {
        $planes = array();
        foreach ($valor as $data):

            $planes = Planes::model()->findAll(array('condition' => 'operador_id =' . $data));
            return CHtml::listData($planes, 'id', 'nombre');


        endforeach;
    }

    public static function getVendedores() {
        $id = Yii::app()->user->id;
        $Usuarios = Users::model()->findAll('coordinador_id = ' . $id);
        return CHtml::listData($Usuarios, 'id', 'Selectsuario');
    }

    public static function getCanalVenta() {
        $CanalVenta = Dominios::model()->findAll('parametro = "CANAL_VENTA" AND activo = 1');
        return CHtml::listData($CanalVenta, 'id', 'tipo');
    }

    public static function getModeloEquipo() {
        $ModeloEquipo = Dominios::model()->findAll('parametro = "EQUIPO_MODELO" AND activo = 1');
        return CHtml::listData($ModeloEquipo, 'id', 'tipo');
    }

    public static function getSims() {
        $ModeloEquipo = Sims::model()->findAll('estado_id = 68');
        return CHtml::listData($ModeloEquipo, 'id', 'ccid');
    }

    public static function getTipoVentas() {
        $ModeloTipoVenta = Dominios::model()->findAll('parametro = "TIPO_VENTA" AND activo = 1');
        return CHtml::listData($ModeloTipoVenta, 'id', 'tipo');
    }

    public static function getDocumentoVentas() {
        $model = Dominios::model()->findAll('parametro = "DOCUMENTO_VENTAS" AND activo = 1');
        return CHtml::listData($model, 'id', 'tipo');
    }

    public static function getPlataformaVentas() {
        $model = Dominios::model()->findAll('parametro = "PLATAFORMA_VENTA" AND activo = 1');
        return CHtml::listData($model, 'id', 'tipo');
    }

    public static function getPlataformaVentasNombre($valor) {

        $nombre = '';
        switch ($valor):
            case 136: $nombre = 'SIBEL';
                break;
            case 137: $nombre = 'STC';
                break;
            case 141: $nombre = 'VENTA EXPERSS';
                break;
            case 141: $nombre = 'CRM AVANTEL';
                break;

        endswitch;

        return $nombre;
    }

    public static function getDocumentoID($valor) {

        $nombre = '';
        switch ($valor):
            case 132: $nombre = 'FISICA';
                break;
            case 133: $nombre = 'VIRTUAL';
                break;
            case 134: $nombre = 'PLANILLADA';
                break;

        endswitch;

        return $nombre;
    }

    public static function getTipoVentasIndividualCorporativa() {
        $ModeloTipoVenta = Dominios::model()->findAll('parametro = "TipoVenta" AND activo = 1');
        return CHtml::listData($ModeloTipoVenta, 'id', 'tipo');
    }

    public static function getEnvioFactura() {

        $Factura = Dominios::model()->findAll('parametro = "ENVIAR_FACTURA" AND activo = 1');
        return CHtml::listData($Factura, 'id', 'tipo');
    }

    public static function getEstados() {

        $Estados = Dominios::model()->findAll('parametro = "ESTADOS" AND activo = 1');
        return CHtml::listData($Estados, 'id', 'tipo');
    }

    public static function getEstadosAdmin() {

        $EstadosAdmin = Dominios::model()->findAll('parametro = "ESTADOS" AND activo = 1');
        return CHtml::listData($EstadosAdmin, 'id', 'tipo');
    }

    /* INICIO DE COMISIONES */

    public static function getEstadoVentas() {
        $estados = Dominios::model()->findAll('id  IN(36,43,42)');
        return CHtml::listData($estados, 'id', 'id');
    }

    public static function getvalorcomisioncargo() {
        $model = Dominios::model()->findAll('parametro = "VALOR_COMISION_CARGO" AND activo = 1 ');
        return CHtml::listData($model, 'id', 'id');
    }

    public static function getTipoDuoMigracionNuevo() {
        $model = Dominios::model()->findAll('parametro = "TIPO_FIJA" ');
        return CHtml::listData($model, 'id', 'tipo');
    }

   

    public static function getVentasComisionesEtbFija($completado = null, $legalizado = null, $fueraCorte = null, $Fecha_inicio = null, $Fecha_fin = null, $TipoVenta = 52, $operador = null) {

        $Criteria = new CDbCriteria();
        $Criteria->alias = 'Venta';
        $Criteria->condition = 'Venta.estado_id=:completado OR Venta.estado_id =:legalizado OR Venta.estado_id=:fueraCorte AND Venta.tipo_venta =:TipoVenta AND Venta.operador_id=:operdador_id AND (Venta.fecha_ingreso BETWEEN :Fecha_inicio AND :Fecha_fin)  ';
        $Criteria->params = array(
            ':completado' => $completado,
            ':legalizado' => $legalizado,
            ':fueraCorte' => $fueraCorte,
            ':Fecha_inicio' => $Fecha_inicio,
            ':Fecha_fin' => $Fecha_fin,
            ':TipoVenta' => $TipoVenta,
            'operdador_id' => $operador,
        );
        $Criteria->join = 'INNER JOIN planes Plan ON (Plan.id = Venta.plan_id) INNER JOIN ventas_fijas VentaFija ON (VentaFija.venta_id = Venta.id)';
        $ventas = Ventas::model()->findAll($Criteria);
        return $ventas;
    }
    
    public function getMeses($total = null, $base = null, $venta_id, $Fecha_inicio = null, $Fecha_fin = null, $operador = null) {

        $MesInicio = substr($Fecha_inicio, 5, 2);
        $MesFin = substr($Fecha_fin, 5, 2);

        $Criteria = new CDbCriteria();
        $Criteria->alias = 't';
        $Criteria->condition = 't.mes BETWEEN :mesInicio AND :mesFin';
        $Criteria->params = array(
            ':mesInicio' => $MesInicio,
            ':mesFin' => $MesFin,
        );

        $comisionesVentasMeses = ComisionesVentasMeses::model()->findAll($Criteria);

        foreach ($comisionesVentasMeses as $datos):
            $transaccion = new Transaccion();
            $transaccion->venta_id = $venta_id;
            $transaccion->comision_total_conexcel = $total; /* valor del plan sin iva con el 240% */
            $transaccion->base_comision_conexcel = str_replace(',', '', $base); /* base: valor sin iva */
            $transaccion->comision = $base * $datos->porcentaje;
            $transaccion->ingreso_cesantia_comercial = $transaccion->comision_total_conexcel * 8.33;
            $transaccion->ingreso_base_comision_vendedor_revenue = $transaccion->base_comision_conexcel * 220;
            $transaccion->mes_id = $datos->id;
            $transaccion->save();
        endforeach;
    }

    function getComisionesETBFija($venta_id = null) {

        $Criteria = new CDbCriteria();
        $Criteria->condition = 't.venta_id = ' . $venta_id;
        $ComisionesEtbfija = ComisionesEtbfija::model()->findAll($Criteria);
        return $ComisionesEtbfija;
    }

    function getComision($tipo = null) {

        $model = ValoresComisionBaseCargosBasicos::model()->find('t.tipo_id = ' . $tipo);
        $comision = $model->comision;
        return '0.' . $comision;
    }

    function getCesantiaMercantil($tipo = null) {

        $model = ValoresComisionBaseCargosBasicos::model()->find('t.tipo_id = ' . $tipo);
        $cesantia_mercantil = $model->cesantia_mercantil;
        return '0.' . $cesantia_mercantil;
    }

    /* FIN DE LAS FUNCIONES DE LAS COMISIONES */

    public static function EstadoLabel($estado) {

        $valor = '';
        switch ($estado):

            case 'EN PROCESO': $valor = '<span class="label label-en-proceso">' . $estado . '</span>';
                break;
            case 'ACTIVADA': $valor = '<span class="label   label-en-proceso">' . $estado . '</span>';
                break;
            case 'COMPLETADO': $valor = '<span class="label label-completado">' . $estado . '</span>';
                break;
            case 'PORTABILIDAD': $valor = '<span class="label label-portabilidad">' . $estado . '</span>';
                break;
            case 'PENDIENTE': $valor = '<span class="label label-pendiente">' . $estado . '</span>';
                break;
            case 'DEVOLUCION': $valor = '<span class="label label-devolucion">' . $estado . '</span>';
                break;
            case 'RECHAZADA': $valor = '<span class="label label-rechazada">' . $estado . '</span>';
                break;
            case 'ANULADA': $valor = '<span class="label label-anulada">' . $estado . '</span>';
                break;
            case 'FUERA DE CORTE': $valor = '<span class="label label-fuera-de-corte">' . $estado . '</span>';
                break;
            case 'LEGALIZACION TARDIA': $valor = '<span class="label label-legalizacion-tardia">' . $estado . '</span>';
                break;
            case 'LEGALIZADA': $valor = '<span class="label label-legalizada">' . $estado . '</span>';
                break;
            case 'NO PAGO': $valor = '<span class="label label-no-pago">' . $estado . '</span>';
                break;
            case 'PERDIDA': $valor = '<span class="label label-perdida">' . $estado . '</span>';
                break;
            case 'EXTERNA': $valor = '<span class="label label-externa">' . $estado . '</span>';
                break;
            case 'PRELIQUIDADA': $valor = '<span class="label label-preliquidada">' . $estado . '</span>';
                break;
            case 'LIQUIDADA': $valor = '<span class="label label-liquidada">' . $estado . '</span>';
                break;
            case 'CONTABILIZADA': $valor = '<span class="label label-contabilizada">' . $estado . '</span>';
                break;
            case 'PAGADA': $valor = '<span class="label label-pagada">' . $estado . '</span>';
                break;
            case 'SIN ESTADO': $valor = '<span class="label label-sin-estado">' . $estado . '</span>';
                break;

        endswitch;
        return $valor;
    }

    public static function getReteFuente($valor) {
        $nombre = '';
        switch ($valor):
            case 0: $nombre = 'NO';
                break;
            case 1: $nombre = 'Si';
                break;
        endswitch;
        return $nombre;
    }

    public static function getEstadosID($valor) {

        switch ($valor):




        endswitch;
    }

    public static function getDocumentacion($valor) {

        $nombre = '';
        switch ($valor):
            case 0: $nombre = 'NO TIENE';
                break;
            case 1: $nombre = 'SI TIENE';
                break;
        endswitch;
        return $nombre;
    }

   

    public function setOperador($operador_id) {

        $op = Dominios::model()->find('tipo = ' . $operador_id . ' AND parametro = OPERADOR');
        DumpHelper::var_dump($op);

        $valor = '';
        switch ($operador_id):
            case 'avantel': $valor = 4;
                break;
        endswitch;
    }

    public static function getTipoAta($tipo_alta) {

        if ($tipo_alta == 0):
            $valor = 'Linea Nueva';
        elseif ($tipo_alta == 1):
            $valor = 'Portabilidad';
        elseif ($tipo_alta == 2):
            $valor = 'Repocision';
        elseif ($tipo_alta == 3):
            $valor = 'Sesion';
        endif;

        return $valor;
    }

    public static function getOrigenEquipo($origen_equipo) {
        if ($origen_equipo == 0):
            $valor = 'Traido';
        else:
            $valor = 'Vendido';
        endif;
        return $valor;
    }

    public static function totalCotizacionPlanes() {
        $sql = "SELECT  SUM(Plan.valor) suma FROM temp_ventas_moviles t
                   INNER JOIN planes Plan ON (t.plan_id = Plan.id)                    
                   WHERE t.usuario_id = '" . Yii::app()->user->id . "'";
        $models = Yii::app()->db->createCommand($sql)->queryAll();

        foreach ($models as $consulta):
            $data = $consulta['suma'];

        endforeach;
        return $data;
    }

}

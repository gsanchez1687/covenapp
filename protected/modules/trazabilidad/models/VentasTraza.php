<?php

/**
 * This is the model class for table "ventas_traza".
 *
 * The followings are the available columns in table 'ventas_traza':
 * @property integer $id
 * @property integer $venta_id
 * @property string $cun_oportunidad_anterior
 * @property string $cun_oportunidad_nuevo
 * @property string $numero_asignado_anterior
 * @property string $numero_asignado_nuevo
 * @property string $fecha_activacion_anterior
 * @property string $fecha_activacion_nuevo
 * @property string $fecha_legalizacion_anterior
 * @property string $fecha_legalizacion_nuevo
 * @property integer $estado_id_enterior
 * @property integer $estado_id_nuevo
 * @property integer $plataforma_id_anterior
 * @property integer $plataforma_id_nuevo
 * @property string $pedido_root_anterior
 * @property string $pedido_root_nuevo
 * @property integer $documento_id_anterior
 * @property integer $documento_id_nuevo
 * @property string $observacion_activacion_anterior
 * @property string $observacion_activacion_nuevo
 * @property string $observacion_anterior
 * @property string $observacion_nuevo
 */
class VentasTraza extends CActiveRecord
{
        public $usuario_modificador; 
        public $modificado; 
        public $numero_identidad;
        public $nombre_cliente;
        public $segundo_nombre_cliente;
        public $apellido_cliente;
        public $segundo_apellido_cliente;
        public $fecha_expedicion_cliente;
        public $fecha_nacimiento_cliente;
        public $telefono_fijo_cliente;
        public $telefono_movil_cliente;
        public $correo_cliente;
        public $direccion_cliente;
        public $direccion_instalacion;
        /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ventas_traza';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('venta_id, estado_id_enterior, estado_id_nuevo, plataforma_id_anterior, plataforma_id_nuevo, documento_id_anterior, documento_id_nuevo', 'numerical', 'integerOnly'=>true),
			array('cun_oportunidad_anterior, cun_oportunidad_nuevo, numero_asignado_anterior, numero_asignado_nuevo, pedido_root_anterior, pedido_root_nuevo', 'length', 'max'=>20),
			array('observacion_activacion_anterior, observacion_activacion_nuevo, observacion_anterior, observacion_nuevo', 'length', 'max'=>500),
			array('fecha_activacion_anterior, fecha_activacion_nuevo, fecha_legalizacion_anterior, fecha_legalizacion_nuevo', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, venta_id, cun_oportunidad_anterior, cun_oportunidad_nuevo, numero_asignado_anterior, numero_asignado_nuevo, fecha_activacion_anterior, fecha_activacion_nuevo, fecha_legalizacion_anterior, fecha_legalizacion_nuevo, estado_id_enterior, estado_id_nuevo, plataforma_id_anterior, plataforma_id_nuevo, pedido_root_anterior, pedido_root_nuevo, documento_id_anterior, documento_id_nuevo, observacion_activacion_anterior, observacion_activacion_nuevo, observacion_anterior, observacion_nuevo, usuario_modificador', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'venta' => array(self::BELONGS_TO, 'Ventas', 'venta_id'),                      
                        'estadoanterior' => array(self::BELONGS_TO, 'Dominios', 'estado_id_enterior'),
                        'estadonuevo' => array(self::BELONGS_TO, 'Dominios', 'estado_id_nuevo'),                        
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'venta_id' => 'Venta',
			'cun_oportunidad_anterior' => 'Cun Oportunidad Anterior',
			'cun_oportunidad_nuevo' => 'Cun Oportunidad Nuevo',
			'numero_asignado_anterior' => 'Numero Asignado Anterior',
			'numero_asignado_nuevo' => 'Numero Asignado Nuevo',
			'fecha_activacion_anterior' => 'Fecha Activacion Anterior',
			'fecha_activacion_nuevo' => 'Fecha Activacion Nuevo',
			'fecha_legalizacion_anterior' => 'Fecha Legalizacion Anterior',
			'fecha_legalizacion_nuevo' => 'Fecha Legalizacion Nuevo',
			'estado_id_enterior' => 'Estado Id Enterior',
			'estado_id_nuevo' => 'Estado Id Nuevo',
			'plataforma_id_anterior' => 'Plataforma Id Anterior',
			'plataforma_id_nuevo' => 'Plataforma Id Nuevo',
			'pedido_root_anterior' => 'Pedido Root Anterior',
			'pedido_root_nuevo' => 'Pedido Root Nuevo',
			'documento_id_anterior' => 'Documento Id Anterior',
			'documento_id_nuevo' => 'Documento Id Nuevo',
			'observacion_activacion_anterior' => 'Observacion Activacion Anterior',
			'observacion_activacion_nuevo' => 'Observacion Activacion Nuevo',
			'observacion_anterior' => 'Observacion Anterior',
			'observacion_nuevo' => 'Observacion Nuevo',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('venta_id',$this->venta_id);
		$criteria->compare('cun_oportunidad_anterior',$this->cun_oportunidad_anterior,true);
		$criteria->compare('cun_oportunidad_nuevo',$this->cun_oportunidad_nuevo,true);
		$criteria->compare('numero_asignado_anterior',$this->numero_asignado_anterior,true);
		$criteria->compare('numero_asignado_nuevo',$this->numero_asignado_nuevo,true);
		$criteria->compare('fecha_activacion_anterior',$this->fecha_activacion_anterior,true);
		$criteria->compare('fecha_activacion_nuevo',$this->fecha_activacion_nuevo,true);
		$criteria->compare('fecha_legalizacion_anterior',$this->fecha_legalizacion_anterior,true);
		$criteria->compare('fecha_legalizacion_nuevo',$this->fecha_legalizacion_nuevo,true);
		$criteria->compare('estado_id_enterior',$this->estado_id_enterior);
		$criteria->compare('estado_id_nuevo',$this->estado_id_nuevo);
		$criteria->compare('plataforma_id_anterior',$this->plataforma_id_anterior);
		$criteria->compare('plataforma_id_nuevo',$this->plataforma_id_nuevo);
		$criteria->compare('pedido_root_anterior',$this->pedido_root_anterior,true);
		$criteria->compare('pedido_root_nuevo',$this->pedido_root_nuevo,true);
		$criteria->compare('documento_id_anterior',$this->documento_id_anterior);
		$criteria->compare('documento_id_nuevo',$this->documento_id_nuevo);
		$criteria->compare('observacion_activacion_anterior',$this->observacion_activacion_anterior,true);
		$criteria->compare('observacion_activacion_nuevo',$this->observacion_activacion_nuevo,true);
		$criteria->compare('observacion_anterior',$this->observacion_anterior,true);
		$criteria->compare('observacion_nuevo',$this->observacion_nuevo,true);
		$criteria->compare('usuario_modificador',$this->venta_id,true);
                
                $criteria->order = "id DESC"; /*AÑADIR ORDEN*/
                
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VentasTraza the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

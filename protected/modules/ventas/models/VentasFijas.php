<?php

/**
 * This is the model class for table "ventas_fijas".
 *
 * The followings are the available columns in table 'ventas_fijas':
 * @property integer $id
 * @property integer $venta_id
 * @property integer $canal_venta_id
 * @property string $barrio
 * @property string $nombre_contacto
 * @property string $telefono_contacto
 * @property string $orden_trabajo
 * @property string $cuenta
 * @property string $servicio
 * @property string $fecha_tentativa
 * @property integer $estrato
 * @property integer $tipo_fija_id
 * @property string $direccion_instalacion
 *
 * The followings are the available model relations:
 * @property Ventas $venta
 * @property Dominios $tipoFija
 * @property Dominios $canalVenta
 */
class VentasFijas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ventas_fijas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('venta_id', 'required'),
			array('venta_id, canal_venta_id, estrato, tipo_fija_id', 'numerical', 'integerOnly'=>true),
			array('barrio, nombre_contacto', 'length', 'max'=>30),
			array('servicio', 'length', 'max'=>20),
			array('telefono_contacto', 'length', 'max'=>10),
			array('orden_trabajo, cuenta', 'length', 'max'=>15),
			array('direccion_instalacion', 'length', 'max'=>100),
			array('fecha_tentativa', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, venta_id, canal_venta_id, barrio, nombre_contacto, telefono_contacto, orden_trabajo, cuenta, servicio, fecha_tentativa, estrato, tipo_fija_id, direccion_instalacion', 'safe', 'on'=>'search'),
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
			'tipoFija' => array(self::BELONGS_TO, 'Dominios', 'tipo_fija_id'),
			'canalVenta' => array(self::BELONGS_TO, 'Dominios', 'canal_venta_id'),
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
			'canal_venta_id' => 'Canal Venta',
			'barrio' => 'Barrio',
			'nombre_contacto' => 'Nombre Contacto',
			'telefono_contacto' => 'Telefono Contacto',
			'orden_trabajo' => 'Orden Trabajo',
			'cuenta' => 'Cuenta',
			'servicio' => 'Servicio',
			'fecha_tentativa' => 'Fecha Tentativa',
			'estrato' => 'Estrato',
			'tipo_fija_id' => 'Tipo Fija',
			'direccion_instalacion' => 'Direccion Instalacion',
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
		$criteria->compare('canal_venta_id',$this->canal_venta_id);
		$criteria->compare('barrio',$this->barrio,true);
		$criteria->compare('nombre_contacto',$this->nombre_contacto,true);
		$criteria->compare('telefono_contacto',$this->telefono_contacto,true);
		$criteria->compare('orden_trabajo',$this->orden_trabajo,true);
		$criteria->compare('cuenta',$this->cuenta,true);
		$criteria->compare('servicio',$this->servicio,true);
		$criteria->compare('fecha_tentativa',$this->fecha_tentativa,true);
		$criteria->compare('estrato',$this->estrato);
		$criteria->compare('tipo_fija_id',$this->tipo_fija_id);
		$criteria->compare('direccion_instalacion',$this->direccion_instalacion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VentasFijas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

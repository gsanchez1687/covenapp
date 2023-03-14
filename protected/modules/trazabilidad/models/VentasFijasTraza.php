<?php

/**
 * This is the model class for table "ventas_fijas_traza".
 *
 * The followings are the available columns in table 'ventas_fijas_traza':
 * @property integer $id
 * @property integer $venta_id
 * @property integer $canal_venta_id_anterior
 * @property integer $canal_venta_id_nuevo
 * @property string $barrio_anterior
 * @property string $barrio_nuevo
 * @property string $nombre_contacto_anterior
 * @property string $nombre_contacto_nuevo
 * @property string $telefono_contacto_anterior
 * @property string $telefono_contacto_nuevo
 * @property string $fecha_tentativa_anterior
 * @property string $fecha_tentativa_nuevo
 * @property string $direccion_instalacion_anterior
 * @property string $direccion_instalacion_nuevo
 */
class VentasFijasTraza extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ventas_fijas_traza';
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
			array('venta_id, canal_venta_id_anterior, canal_venta_id_nuevo', 'numerical', 'integerOnly'=>true),
			array('barrio_anterior, barrio_nuevo, nombre_contacto_anterior, nombre_contacto_nuevo', 'length', 'max'=>30),
			array('telefono_contacto_anterior, telefono_contacto_nuevo', 'length', 'max'=>20),
			array('direccion_instalacion_anterior, direccion_instalacion_nuevo', 'length', 'max'=>100),
			array('fecha_tentativa_anterior, fecha_tentativa_nuevo', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, venta_id, canal_venta_id_anterior, canal_venta_id_nuevo, barrio_anterior, barrio_nuevo, nombre_contacto_anterior, nombre_contacto_nuevo, telefono_contacto_anterior, telefono_contacto_nuevo, fecha_tentativa_anterior, fecha_tentativa_nuevo, direccion_instalacion_anterior, direccion_instalacion_nuevo', 'safe', 'on'=>'search'),
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
			'canal_venta_id_anterior' => 'Canal Venta Id Anterior',
			'canal_venta_id_nuevo' => 'Canal Venta Id Nuevo',
			'barrio_anterior' => 'Barrio Anterior',
			'barrio_nuevo' => 'Barrio Nuevo',
			'nombre_contacto_anterior' => 'Nombre Contacto Anterior',
			'nombre_contacto_nuevo' => 'Nombre Contacto Nuevo',
			'telefono_contacto_anterior' => 'Telefono Contacto Anterior',
			'telefono_contacto_nuevo' => 'Telefono Contacto Nuevo',
			'fecha_tentativa_anterior' => 'Fecha Tentativa Anterior',
			'fecha_tentativa_nuevo' => 'Fecha Tentativa Nuevo',
			'direccion_instalacion_anterior' => 'Direccion Instalacion Anterior',
			'direccion_instalacion_nuevo' => 'Direccion Instalacion Nuevo',
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
		$criteria->compare('canal_venta_id_anterior',$this->canal_venta_id_anterior);
		$criteria->compare('canal_venta_id_nuevo',$this->canal_venta_id_nuevo);
		$criteria->compare('barrio_anterior',$this->barrio_anterior,true);
		$criteria->compare('barrio_nuevo',$this->barrio_nuevo,true);
		$criteria->compare('nombre_contacto_anterior',$this->nombre_contacto_anterior,true);
		$criteria->compare('nombre_contacto_nuevo',$this->nombre_contacto_nuevo,true);
		$criteria->compare('telefono_contacto_anterior',$this->telefono_contacto_anterior,true);
		$criteria->compare('telefono_contacto_nuevo',$this->telefono_contacto_nuevo,true);
		$criteria->compare('fecha_tentativa_anterior',$this->fecha_tentativa_anterior,true);
		$criteria->compare('fecha_tentativa_nuevo',$this->fecha_tentativa_nuevo,true);
		$criteria->compare('direccion_instalacion_anterior',$this->direccion_instalacion_anterior,true);
		$criteria->compare('direccion_instalacion_nuevo',$this->direccion_instalacion_nuevo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VentasFijasTraza the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

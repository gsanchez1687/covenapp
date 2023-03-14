<?php

/**
 * This is the model class for table "ventas_sesion".
 *
 * The followings are the available columns in table 'ventas_sesion':
 * @property integer $id
 * @property integer $venta_id
 * @property integer $cedula_titular_actual
 * @property string $nombre_titular_actual
 * @property string $segundo_nombre_titular_actual
 * @property string $apellido_titular_actual
 * @property string $segundo_apellido_titular_actual
 *
 * The followings are the available model relations:
 * @property Ventas $venta
 */
class VentasSesion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ventas_sesion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('venta_id, cedula_titular_actual', 'numerical', 'integerOnly'=>true),
			array('nombre_titular_actual, segundo_nombre_titular_actual, apellido_titular_actual, segundo_apellido_titular_actual', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, venta_id, cedula_titular_actual, nombre_titular_actual, segundo_nombre_titular_actual, apellido_titular_actual, segundo_apellido_titular_actual', 'safe', 'on'=>'search'),
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
			'cedula_titular_actual' => 'Cedula Titular Actual',
			'nombre_titular_actual' => 'Nombre Titular Actual',
			'segundo_nombre_titular_actual' => 'Segundo Nombre Titular Actual',
			'apellido_titular_actual' => 'Apellido Titular Actual',
			'segundo_apellido_titular_actual' => 'Segundo Apellido Titular Actual',
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
		$criteria->compare('cedula_titular_actual',$this->cedula_titular_actual);
		$criteria->compare('nombre_titular_actual',$this->nombre_titular_actual,true);
		$criteria->compare('segundo_nombre_titular_actual',$this->segundo_nombre_titular_actual,true);
		$criteria->compare('apellido_titular_actual',$this->apellido_titular_actual,true);
		$criteria->compare('segundo_apellido_titular_actual',$this->segundo_apellido_titular_actual,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VentasSesion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

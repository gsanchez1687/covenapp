<?php

/**
 * This is the model class for table "ventas_moviles_traza".
 *
 * The followings are the available columns in table 'ventas_moviles_traza':
 * @property integer $id
 * @property integer $venta_id
 * @property integer $tipo_alta_anterior
 * @property integer $tipo_alta_nuevo
 * @property integer $operador_donante_anterior
 * @property integer $operador_donante_nuevo
 * @property integer $origen_equipo_anterior
 * @property integer $origen_equipo_nuevo
 * @property string $iccId_anterior
 * @property string $iccId_nuevo
 * @property string $equipo_anterior
 * @property string $equipo_nuevo
 * @property string $Imei_anterior
 * @property string $Imei_nuevo
 */
class VentasMovilesTraza extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ventas_moviles_traza';
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
			array('venta_id, tipo_alta_anterior, tipo_alta_nuevo, operador_donante_anterior, operador_donante_nuevo, origen_equipo_anterior, origen_equipo_nuevo', 'numerical', 'integerOnly'=>true),
			array('iccId_anterior, iccId_nuevo, equipo_anterior, equipo_nuevo', 'length', 'max'=>50),
			array('Imei_anterior, Imei_nuevo', 'length', 'max'=>25),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, venta_id, tipo_alta_anterior, tipo_alta_nuevo, operador_donante_anterior, operador_donante_nuevo, origen_equipo_anterior, origen_equipo_nuevo, iccId_anterior, iccId_nuevo, equipo_anterior, equipo_nuevo, Imei_anterior, Imei_nuevo', 'safe', 'on'=>'search'),
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
			'tipo_alta_anterior' => 'Tipo Alta Anterior',
			'tipo_alta_nuevo' => 'Tipo Alta Nuevo',
			'operador_donante_anterior' => 'Operador Donante Anterior',
			'operador_donante_nuevo' => 'Operador Donante Nuevo',
			'origen_equipo_anterior' => 'Origen Equipo Anterior',
			'origen_equipo_nuevo' => 'Origen Equipo Nuevo',
			'iccId_anterior' => 'Icc Id Anterior',
			'iccId_nuevo' => 'Icc Id Nuevo',
			'equipo_anterior' => 'Equipo Anterior',
			'equipo_nuevo' => 'Equipo Nuevo',
			'Imei_anterior' => 'Imei Anterior',
			'Imei_nuevo' => 'Imei Nuevo',
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
		$criteria->compare('tipo_alta_anterior',$this->tipo_alta_anterior);
		$criteria->compare('tipo_alta_nuevo',$this->tipo_alta_nuevo);
		$criteria->compare('operador_donante_anterior',$this->operador_donante_anterior);
		$criteria->compare('operador_donante_nuevo',$this->operador_donante_nuevo);
		$criteria->compare('origen_equipo_anterior',$this->origen_equipo_anterior);
		$criteria->compare('origen_equipo_nuevo',$this->origen_equipo_nuevo);
		$criteria->compare('iccId_anterior',$this->iccId_anterior,true);
		$criteria->compare('iccId_nuevo',$this->iccId_nuevo,true);
		$criteria->compare('equipo_anterior',$this->equipo_anterior,true);
		$criteria->compare('equipo_nuevo',$this->equipo_nuevo,true);
		$criteria->compare('Imei_anterior',$this->Imei_anterior,true);
		$criteria->compare('Imei_nuevo',$this->Imei_nuevo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VentasMovilesTraza the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

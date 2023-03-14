<?php

/**
 * This is the model class for table "ventas_variables".
 *
 * The followings are the available columns in table 'ventas_variables':
 * @property integer $id
 * @property integer $operador_id
 * @property string $impuesto_estrato
 * @property integer $iva
 * @property integer $consumo
 * @property string $iva_consumo_total
 * @property integer $base_comision_total
 * @property integer $avantel_conexcel
 * @property integer $comision_total_ingreso
 *
 * The followings are the available model relations:
 * @property Dominios $operador
 */
class VentasVariables extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ventas_variables';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('operador_id, impuesto_estrato, iva, consumo, iva_consumo_total, base_comision_total, avantel_conexcel, comision_total_ingreso', 'required'),
			array('operador_id, iva, consumo, base_comision_total, avantel_conexcel, comision_total_ingreso', 'numerical', 'integerOnly'=>true),
			array('impuesto_estrato, iva_consumo_total', 'length', 'max'=>5),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, operador_id, impuesto_estrato, iva, consumo, iva_consumo_total, base_comision_total, avantel_conexcel, comision_total_ingreso', 'safe', 'on'=>'search'),
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
			'operador' => array(self::BELONGS_TO, 'Dominios', 'operador_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'operador_id' => 'Operador',
			'impuesto_estrato' => 'Impuesto Estrato',
			'iva' => 'Iva',
			'consumo' => 'Consumo',
			'iva_consumo_total' => 'Iva Consumo Total',
			'base_comision_total' => 'Base Comision Total',
			'avantel_conexcel' => 'Avantel Conexcel',
			'comision_total_ingreso' => 'Comision Total Ingreso',
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
		$criteria->compare('operador_id',$this->operador_id);
		$criteria->compare('impuesto_estrato',$this->impuesto_estrato,true);
		$criteria->compare('iva',$this->iva);
		$criteria->compare('consumo',$this->consumo);
		$criteria->compare('iva_consumo_total',$this->iva_consumo_total,true);
		$criteria->compare('base_comision_total',$this->base_comision_total);
		$criteria->compare('avantel_conexcel',$this->avantel_conexcel);
		$criteria->compare('comision_total_ingreso',$this->comision_total_ingreso);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VentasVariables the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

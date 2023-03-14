<?php

/**
 * This is the model class for table "transaccion".
 *
 * The followings are the available columns in table 'transaccion':
 * @property integer $id
 * @property integer $venta_id
 * @property integer $comision_total_conexcel
 * @property string $base_comision_conexcel
 * @property integer $comision
 * @property integer $ingreso_cesantia_comercial
 * @property integer $ingreso_base_comision_vendedor_revenue
 * @property integer $mes_id
 *
 * The followings are the available model relations:
 * @property Ventas $venta
 * @property ComisionesVentasMeses $mes
 */
class Transaccion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'transaccion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('venta_id, comision_total_conexcel, base_comision_conexcel, comision, ingreso_cesantia_comercial, ingreso_base_comision_vendedor_revenue, mes_id', 'required'),
			array('venta_id, comision_total_conexcel, base_comision_conexcel, comision, ingreso_cesantia_comercial, ingreso_base_comision_vendedor_revenue, mes_id', 'numerical', 'integerOnly'=>true),			
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, venta_id, comision_total_conexcel, base_comision_conexcel, comision, ingreso_cesantia_comercial, ingreso_base_comision_vendedor_revenue, mes_id', 'safe', 'on'=>'search'),
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
			'mes' => array(self::BELONGS_TO, 'ComisionesVentasMeses', 'mes_id'),
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
			'comision_total_conexcel' => 'Comision Total Conexcel',
			'base_comision_conexcel' => 'Base Comision Conexcel',
			'comision' => 'Comision',
			'ingreso_cesantia_comercial' => 'Ingreso Cesantia Comercial',
			'ingreso_base_comision_vendedor_revenue' => 'Ingreso Base Comision Vendedor Revenue',
			'mes_id' => 'Mes',
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
		$criteria->compare('comision_total_conexcel',$this->comision_total_conexcel);
		$criteria->compare('base_comision_conexcel',$this->base_comision_conexcel,true);
		$criteria->compare('comision',$this->comision);
		$criteria->compare('ingreso_cesantia_comercial',$this->ingreso_cesantia_comercial);
		$criteria->compare('ingreso_base_comision_vendedor_revenue',$this->ingreso_base_comision_vendedor_revenue);
		$criteria->compare('mes_id',$this->mes_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Transaccion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

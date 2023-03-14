<?php

/**
 * This is the model class for table "comisiones_etbfija".
 *
 * The followings are the available columns in table 'comisiones_etbfija':
 * @property integer $id
 * @property integer $venta_id
 * @property integer $cargo_basico
 * @property integer $base
 * @property integer $ingreso_comision
 * @property integer $ingreso_cesantia_comercial
 *
 * The followings are the available model relations:
 * @property Ventas $venta
 */
class ComisionesEtbfija extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'comisiones_etbfija';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('venta_id, cargo_basico, base, ingreso_comision, ingreso_cesantia_comercial', 'required'),
			array('venta_id, cargo_basico, base, ingreso_comision, ingreso_cesantia_comercial', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, venta_id, cargo_basico, base, ingreso_comision, ingreso_cesantia_comercial', 'safe', 'on'=>'search'),
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
			'cargo_basico' => 'Cargo Basico',
			'base' => 'Base',
			'ingreso_comision' => 'Ingreso Comision',
			'ingreso_cesantia_comercial' => 'Ingreso Cesantia Comercial',
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
		$criteria->compare('cargo_basico',$this->cargo_basico);
		$criteria->compare('base',$this->base);
		$criteria->compare('ingreso_comision',$this->ingreso_comision);
		$criteria->compare('ingreso_cesantia_comercial',$this->ingreso_cesantia_comercial);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ComisionesEtbfija the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

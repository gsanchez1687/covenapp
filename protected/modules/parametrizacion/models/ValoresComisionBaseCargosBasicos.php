<?php

/**
 * This is the model class for table "valores_comision_base_cargos_basicos".
 *
 * The followings are the available columns in table 'valores_comision_base_cargos_basicos':
 * @property integer $id
 * @property integer $tipo_id
 * @property integer $comision
 * @property string $cesantia_mercantil
 * @property integer $activo
 *
 * The followings are the available model relations:
 * @property Dominios $tipo
 */
class ValoresComisionBaseCargosBasicos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'valores_comision_base_cargos_basicos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tipo_id, comision, cesantia_mercantil, activo', 'required'),
			array('tipo_id, comision, activo', 'numerical', 'integerOnly'=>true),
			array('cesantia_mercantil', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, tipo_id, comision, cesantia_mercantil, activo', 'safe', 'on'=>'search'),
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
			'tipo' => array(self::BELONGS_TO, 'Dominios', 'tipo_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'tipo_id' => 'Tipo',
			'comision' => 'Comision',
			'cesantia_mercantil' => 'Cesantia Mercantil',
			'activo' => 'Activo',
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
		$criteria->compare('tipo_id',$this->tipo_id);
		$criteria->compare('comision',$this->comision);
		$criteria->compare('cesantia_mercantil',$this->cesantia_mercantil,true);
		$criteria->compare('activo',$this->activo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ValoresComisionBaseCargosBasicos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

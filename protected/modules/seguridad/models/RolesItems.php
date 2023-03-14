<?php

/**
 * This is the model class for table "roles_items".
 *
 * The followings are the available columns in table 'roles_items':
 * @property integer $id
 * @property integer $rol_id
 * @property integer $item_id
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property Roles $rol
 * @property Items $item
 * @property UsersRolesItems[] $usersRolesItems
 */
class RolesItems extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'roles_items';
	}
        public $name;
        public $icon;
        public $position;
        public $url;
        public $category;
        public $parent;
        public $module;

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rol_id, item_id, active', 'required'),
			array('rol_id, item_id, active', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, rol_id, item_id, active', 'safe', 'on'=>'search'),
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
			'rol' => array(self::BELONGS_TO, 'Roles', 'rol_id'),
			'item' => array(self::BELONGS_TO, 'Items', 'item_id'),
			'usersRolesItems' => array(self::HAS_MANY, 'UsersRolesItems', 'rol_item_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'rol_id' => 'Rol',
			'item_id' => 'Item',
			'active' => 'Active',
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
		$criteria->compare('rol_id',$this->rol_id);
		$criteria->compare('item_id',$this->item_id);
		$criteria->compare('active',$this->active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RolesItems the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

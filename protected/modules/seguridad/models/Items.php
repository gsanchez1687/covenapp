<?php

/**
 * This is the model class for table "items".
 *
 * The followings are the available columns in table 'items':
 * @property integer $id
 * @property string $item
 * @property string $name
 * @property integer $menu_id
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property Menus $menu
 * @property RolesItems[] $rolesItems
 */
class Items extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'items';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('item, name, menu_id, active', 'required'),
            array('menu_id, active', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, item, name, menu_id, active', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'menu' => array(self::BELONGS_TO, 'Menus', 'menu_id'),
            'rolesItems' => array(self::HAS_MANY, 'RolesItems', 'item_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'item' => 'Item',
            'name' => 'Nombre',
            'menu_id' => 'Modulo',
            'active' => 'Activo',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('t.id', $this->id);
        $criteria->compare('t.item', $this->item, true);
        $criteria->compare('t.name', $this->name, true);
        $criteria->compare('menu.id', $this->menu_id);
        $criteria->compare('t.active', $this->active);
        $criteria->order = "t.id DESC"; /* AÑADIR ORDEN */
        $criteria->with = array('menu');
       
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Items the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function checkSwicthLabel($activo) {

        if ($activo == 1) {

            $label = '<span class="label label-success"> Activo</span>';
        } elseif ($activo == 0) {

            $label = '<span class="label label-danger"> Inactivo</span>';
        } elseif ($activo == 9) {

            $label = '<span class="label-del"><i class="glyph-icon flaticon-information19"></i> Eliminado</span>';
        } else {
            $label = '<span class="btn btn-default btn-xs">' . $activo . '</span>';
        }

        return $label;
    }

}

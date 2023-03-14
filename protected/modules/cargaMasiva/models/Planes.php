<?php

/**
 * This is the model class for table "planes".
 *
 * The followings are the available columns in table 'planes':
 * @property integer $id
 * @property string $nombre
 * @property integer $valor
 * @property integer $operador_id
 * @property string $fecha_vigencia
 * @property string $fecha_vencimiento
 *
 * The followings are the available model relations:
 * @property Dominios $operador
 * @property Ventas[] $ventases
 * @property VentasMoviles[] $ventasMoviles
 */
class Planes extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'planes';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('valor, operador_id', 'numerical', 'integerOnly' => true),
            array('nombre', 'length', 'max' => 100),
            array('fecha_vigencia, fecha_vencimiento', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, nombre, valor, operador_id, fecha_vigencia, fecha_vencimiento', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'operador' => array(self::BELONGS_TO, 'Dominios', 'operador_id'),
            'ventases' => array(self::HAS_MANY, 'Ventas', 'plan_id'),
            'ventasMoviles' => array(self::HAS_MANY, 'VentasMoviles', 'plan_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'nombre' => 'Nombre',
            'valor' => 'Valor',
            'operador_id' => 'Operador',
            'fecha_vigencia' => 'Fecha Vigencia',
            'fecha_vencimiento' => 'Fecha Vencimiento',
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

        $criteria->compare('id', $this->id);
        $criteria->compare('nombre', $this->nombre, true);
        $criteria->compare('valor', $this->valor);
        $criteria->compare('operador_id', $this->operador_id);
        $criteria->compare('fecha_vigencia', $this->fecha_vigencia, true);
        $criteria->compare('fecha_vencimiento', $this->fecha_vencimiento, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Planes the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function activo() {
        return array('1' => 'Activo', '2' => 'No Activo');
    }

    public static function isActivo($data) {
        $valor = '';
        if ($data == 1) {
            $valor = '<span class="label label-success">Activo</span>';
        } else {
            $valor = '<span class="label label-danger">No Activo</span>';
        }

        return $valor;
    }

    public static function getOperador() {

        $operador = Dominios::model()->findAll('activo = 1 AND parametro = "OPERADOR" ');
        return CHtml::listData($operador, 'id', 'tipo');
    }

}

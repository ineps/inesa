<?php

/**
 * This is the model class for table "presentarsecon".
 *
 * The followings are the available columns in table 'presentarsecon':
 * @property integer $id
 * @property string $seccion
 * @property integer $cotizacion_id
 * @property integer $personas_id
 *
 * The followings are the available model relations:
 * @property Cotizacion $cotizacion
 * @property Personas $personas
 */
class Presentarsecon extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'presentarsecon';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cotizacion_id, personas_id', 'required'),
			array('cotizacion_id, personas_id', 'numerical', 'integerOnly'=>true),
			array('seccion', 'length', 'max'=>150),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, seccion, cotizacion_id, personas_id', 'safe', 'on'=>'search'),
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
			'cotizacion' => array(self::BELONGS_TO, 'Cotizacion', 'cotizacion_id'),
			'personas' => array(self::BELONGS_TO, 'Personas', 'personas_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'seccion' => 'Seccion',
			'cotizacion_id' => 'Cotizacion',
			'personas_id' => 'Personas',
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
		$criteria->compare('seccion',$this->seccion,true);
		$criteria->compare('cotizacion_id',$this->cotizacion_id);
		$criteria->compare('personas_id',$this->personas_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Presentarsecon the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

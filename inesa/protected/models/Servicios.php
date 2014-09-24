<?php

/**
 * This is the model class for table "servicios".
 *
 * The followings are the available columns in table 'servicios':
 * @property integer $id
 * @property integer $areas_id
 * @property string $servicio
 * @property string $folio
 * @property double $precio
 * @property string $observaciones
 *
 * The followings are the available model relations:
 * @property Productos[] $productoses
 * @property Areas $areas
 */
class Servicios extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'servicios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('areas_id, servicio, folio, precio, observaciones', 'required'),
			array('areas_id', 'numerical', 'integerOnly'=>true),
			array('precio', 'numerical'),
			array('servicio', 'length', 'max'=>150),
			array('folio', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, areas_id, servicio, folio, precio, observaciones', 'safe', 'on'=>'search'),
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
			'productoses' => array(self::HAS_MANY, 'Productos', 'servicios_id'),
			'areas' => array(self::BELONGS_TO, 'Areas', 'areas_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'areas_id' => 'Areas',
			'servicio' => 'Servicio',
			'folio' => 'Clave de Servicio',
			'precio' => 'Precio de Lista',
			'observaciones' => 'Descripción',
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
		$criteria->compare('areas_id',$this->areas_id);
		$criteria->compare('servicio',$this->servicio,true);
		$criteria->compare('folio',$this->folio,true);
		$criteria->compare('precio',$this->precio);
		$criteria->compare('observaciones',$this->observaciones,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Servicios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

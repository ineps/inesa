<?php

/**
 * This is the model class for table "asesor".
 *
 * The followings are the available columns in table 'asesor':
 * @property integer $id
 * @property integer $personas_id
 * @property integer $domiciliocliente_id
 * @property integer $autorizado
 * @property integer $autoriza
 *
 * The followings are the available model relations:
 * @property Personas $personas
 * @property Domiciliocliente $domiciliocliente
 */
class Asesor extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'asesor';
	}

	public function metodoprueba()
	{
        $prueba = CHtml::listData(Asesor::model()->findAll(array('condition'=>'autorizado=false')), 'id', 'autorizado');
		return count($prueba);

	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('personas_id, domiciliocliente_id, autorizado, autoriza', 'required'),
			array('personas_id, domiciliocliente_id, autorizado, autoriza', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, personas_id, domiciliocliente_id, autorizado, autoriza', 'safe', 'on'=>'search'),
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
			'personas' => array(self::BELONGS_TO, 'Personas', 'personas_id'),
			'domiciliocliente' => array(self::BELONGS_TO, 'Domiciliocliente', 'domiciliocliente_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'personas_id' => 'Personas',
			'domiciliocliente_id' => 'Domiciliocliente',
			'autorizado' => 'Autorizado',
			'autoriza' => 'Autoriza',
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
		$criteria->compare('personas_id',$this->personas_id);
		$criteria->compare('domiciliocliente_id',$this->domiciliocliente_id);
		$criteria->compare('autorizado',$this->autorizado);
		$criteria->compare('autoriza',$this->autoriza);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Asesor the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

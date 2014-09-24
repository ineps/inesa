<?php

/**
 * This is the model class for table "domiciliopersonas".
 *
 * The followings are the available columns in table 'domiciliopersonas':
 * @property integer $id
 * @property integer $domiciliocliente_id
 * @property integer $personas_id
 *
 * The followings are the available model relations:
 * @property Domiciliocliente $domiciliocliente
 * @property Personas $personas
 */
class Domiciliopersonas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'domiciliopersonas';
	}

        public function getNombres()
        {
            return $this->personas->acronimo->acronimo.' '.$this->personas->nombre.' '.$this->personas->apellido_pateno.' '.$this->personas->apellido_materno;
        }
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('domiciliocliente_id, personas_id', 'required'),
			array('domiciliocliente_id, personas_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, domiciliocliente_id, personas_id', 'safe', 'on'=>'search'),
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
			'domiciliocliente' => array(self::BELONGS_TO, 'Domiciliocliente', 'domiciliocliente_id'),
			'personas' => array(self::BELONGS_TO, 'Personas', 'personas_id'),
		);
	}
	public function getPersona()
	{

		return $this->personas->cargo->cargo.', '.$this->personas->acronimo->acronimo.''.$this->personas->nombre.' '.$this->personas->apellido_pateno.' '.$this->personas->apellido_materno;
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'domiciliocliente_id' => 'Domiciliocliente',
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
		$criteria->compare('domiciliocliente_id',$this->domiciliocliente_id);
		$criteria->compare('personas_id',$this->personas_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Domiciliopersonas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

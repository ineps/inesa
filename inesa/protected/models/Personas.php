<?php

/**
 * This is the model class for table "personas".
 *
 * The followings are the available columns in table 'personas':
 * @property integer $id
 * @property integer $acronimo_id
 * @property string $nombre
 * @property string $apellido_pateno
 * @property string $apellido_materno
 * @property integer $cargo_id
 * @property integer $telefono
 * @property integer $telefono_oficina
 * @property integer $celular
 * @property string $email
 * @property string $observaciones
 * @property integer $estatus_id
 *
 * The followings are the available model relations:
 * @property Acceso[] $accesos
 * @property Asesor[] $asesors
 * @property Domiciliopersonas[] $domiciliopersonases
 * @property Cargo $cargo
 * @property Estatus $estatus
 * @property Acronimo $acronimo
 */
class Personas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'personas';
	}
        public function getNombreBasico()
	{
		return $this->nombre.' '.$this->apellido_pateno.' '.$this->apellido_materno;
	}
        
        public function getNombreProfesion()
	{
		return $this->acronimo->acronimo.' '.$this->nombre.' '.$this->apellido_pateno.' '.$this->apellido_materno;
	}

	public function getNombreCompleto()
	{
		return $this->cargo->cargo.', '.$this->nombre.' '.$this->apellido_pateno.' '.$this->apellido_materno;
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('acronimo_id, nombre, apellido_pateno, cargo_id, email, estatus_id', 'required'),
			array('acronimo_id, cargo_id, , estatus_id', 'numerical', 'integerOnly'=>true),
			array('nombre, apellido_pateno, apellido_materno', 'length', 'max'=>50),
			array('email', 'length', 'max'=>80),
            array('telefono', 'length', 'max'=>15),
            array('telefono_oficina', 'length', 'max'=>25),
            array('celular', 'length', 'max'=>20),
			array('observaciones', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, acronimo_id, nombre, apellido_pateno, apellido_materno, cargo_id, telefono, telefono_oficina, celular, email, observaciones, estatus_id', 'safe', 'on'=>'search'),
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
			'accesos' => array(self::HAS_MANY, 'Acceso', 'personas_id'),
			'asesors' => array(self::HAS_MANY, 'Asesor', 'personas_id'),
			'domiciliopersonases' => array(self::HAS_MANY, 'Domiciliopersonas', 'personas_id'),
			'cargo' => array(self::BELONGS_TO, 'Cargo', 'cargo_id'),
			'estatus' => array(self::BELONGS_TO, 'Estatus', 'estatus_id'),
			'acronimo' => array(self::BELONGS_TO, 'Acronimo', 'acronimo_id'),
			'empresa' => array(self::BELONGS_TO, 'Empresa', 'empresa_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(			
			'acronimo_id' => 'Acronimo',
			'nombre' => 'Nombre',
			'apellido_pateno' => 'Apellido Pateno',
			'apellido_materno' => 'Apellido Materno',
			'cargo_id' => 'Cargo',
			'telefono' => 'Telefono',
			'telefono_oficina' => 'Telefono Oficina',
			'celular' => 'Celular',
			'email' => 'Email',
			'observaciones' => 'Observaciones',
			'estatus_id' => 'Estatus',
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
                $criteria->with = array('acronimo', 'cargo', 'estatus');
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellido_pateno',$this->apellido_pateno,true);
		$criteria->compare('apellido_materno',$this->apellido_materno,true);
		$criteria->compare('telefono',$this->telefono);
		$criteria->compare('telefono_oficina',$this->telefono_oficina);
		$criteria->compare('celular',$this->celular);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('observaciones',$this->observaciones,true);
                $criteria->addSearchCondition('acronimo.acronimo', $this->acronimo_id, true);
                $criteria->addSearchCondition('estatus.estatus', $this->estatus_id, true);
                $criteria->addSearchCondition('cargo.cargo', $this->cargo_id, true);

		return new CActiveDataProvider($this, array(
                    'criteria'=>$criteria,
                    'pagination' => array(
                    'pageSize' => 75,
                ),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Personas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

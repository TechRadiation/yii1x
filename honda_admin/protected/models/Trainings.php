<?php

/**
 * Trainings class.
 * Trainings is the data structure for keeping
 * Trainings data. It is used by the 'Trainings'.
 */
class Trainings extends CActiveRecord
{
	public $name;
	public $description;
	public $template_file;

	private $_identity;

	public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    public function tableName()
    {
        return 'trainings';
    }

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			array('name, template_file', 'required'),
			array('description','safe'),
			array('updated_at','default',
              'value'=>new CDbExpression('NOW()'),
              'setOnEmpty'=>false,'on'=>'update'),

        	array('created_at,updated_at','default',
              'value'=>new CDbExpression('NOW()'),
				'setOnEmpty'=>false,'on'=>'insert'
			)
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'name'=>'Certificate Name',
			'description'=>'Description',
		);
	}
}
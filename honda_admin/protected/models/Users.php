<?php

/**
 * Users class.
 * Users is the data structure for keeping
 * Users data. It is used by the 'Users'.
 */
class Users extends CActiveRecord
{
	public $name;
	public $email;
	public $password;
	public $address;
	public $gender;


	private $_identity;

	public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    public function tableName()
    {
        return 'users';
    }

	/**
	 * Declares the validation rules.
	 */
	

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'name'=>'Name'
		);
	}
}
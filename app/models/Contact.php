<?php

/**
* Maps 'ssup_contacts' DB table to a Eloquent object.
*/
class Contact extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'ssup_contacts';
	
	/**
	 * Specifies which attributes should be mass-assignable.
	 *
	 * @var array
	 */
	protected $fillable = array('user_id', 'last_name', 'first_name', 'gender', 'birthdate');
	
	/**
	 * Defines a relationship with User.
	 *
	 * @var Contact
	 */
	public function user()
	{
		return $this->belongsTo('User');
	}
	
	/**
	 * Defines a relationship with PhoneNumber.
	 *
	 * @var Contact
	 */
	public function phoneNumbers(){
		return $this->hasMany('PhoneNumber');
	}

	/**
	 * Defines a relationship with Email.
	 *
	 * @var Contact
	 */
	public function emails(){
		return $this->hasMany('Email');
	}

}

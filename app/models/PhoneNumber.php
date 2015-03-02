<?php

/**
* Maps 'ssup_phone_numbers' DB table to a Eloquent object.
*/
class PhoneNumber extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'ssup_phone_numbers';
	
	/**
	 * Specifies which attributes should be mass-assignable.
	 *
	 * @var array
	 */
	protected $fillable = array('contact_id', 'phone_number');

	/**
	 * Defines a relationship with Contact.
	 *
	 * @var Contact
	 */
	public function contact()
	{
		return $this->belongsTo('Contact');
	}

}

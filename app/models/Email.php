<?php

/**
* Maps 'ssup_emails' DB table to a Eloquent object.
*/
class Email extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'ssup_emails';

	/**
	 * Specifies which attributes should be mass-assignable.
	 *
	 * @var array
	 */
	protected $fillable = array('contact_id', 'email');

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

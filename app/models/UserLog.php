<?php

/**
* Maps 'ssup_emails' DB table to a Eloquent object.
*/
class UserLog extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'ssup_user_logs';
	
	/**
	 * Specifies which attributes should be mass-assignable.
	 *
	 * @var array
	 */
	protected $fillable = array('user_id', 'upload_time', 'error_count', 'upload_date');			
	
	/**
	 * Defines a relationship with Contact.
	 *
	 * @var Contact
	 */
	public function user()
	{
		return $this->belongsTo('User');
	}
	
}

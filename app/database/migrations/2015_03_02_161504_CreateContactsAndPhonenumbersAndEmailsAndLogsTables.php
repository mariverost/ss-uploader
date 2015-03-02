<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsAndPhonenumbersAndEmailsAndLogsTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ssup_contacts', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->string('last_name');
			$table->string('first_name');
			$table->string('gender');
			$table->date('birthdate');
			$table->foreign('user_id')->references('id')
				->on('ssup_users')->onDelete('CASCADE')
				->onUpdate('CASCADE');
			$table->timestamps();
		});
		
		Schema::create('ssup_phone_numbers', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->integer('contact_id')->unsigned();
			$table->string('phone_number');
			$table->foreign('contact_id')->references('id')
				->on('ssup_contacts')->onDelete('CASCADE')
				->onUpdate('CASCADE');
			$table->timestamps();
		});
		
		Schema::create('ssup_emails', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->integer('contact_id')->unsigned();
			$table->string('email');
			$table->foreign('contact_id')->references('id')
				->on('ssup_contacts')->onDelete('CASCADE')
				->onUpdate('CASCADE');
			$table->timestamps();
		});
		
		Schema::create('ssup_user_logs', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->integer('upload_time');
			$table->integer('error_count');
			$table->date('upload_date');
			$table->foreign('user_id')->references('id')
				->on('ssup_users')->onDelete('CASCADE')
				->onUpdate('CASCADE');
			$table->timestamps();
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ssup_contacts');
		Schema::drop('ssup_phone_numbers');
		Schema::drop('ssup_emails');
		Schema::drop('ssup_logs');
	}

}

<?php

class UsersControllerTest extends TestCase {
 
     /**
	 * Set up testing env.
	 *
	 * @return 
	 */
    public function setUp()
    {
        parent::setUp();
		// Enables filters (as they are turned off when environment set to testing)
		Route::enableFilters();
		
		$this->mock = Mockery::mock('Eloquent', 'User');
    }
 
	/**
	 * Tears down testing env.
	 *
	 * @return 
	 */
    public function tearDown()
    {
		//Workaround for:
		//ErrorException: Notice: ob_end_clean(): failed to delete buffer
		if (ob_get_length() == 0 ) {
			ob_start();
		}
        
		Mockery::close();
    }
 
	/**
	 * Tests user creation.
	 *
	 * @return 
	 */
    public function testStoreSuccess()
    {
		// Mock input data
		Input::replace($input = ['first_name' => 'Nohora',
								'last_name' => 'Trujillo', 
								'email' => 'nonitrujillo@gmail.com',
								'password' => 'nonitrujillo',
								'password_confirmation' => 'nonitrujillo',
		]);
 
		
        $this->mock
            ->shouldReceive('store')
            ->once()
            ->with($input);
		
		$this->app->instance('User', $this->mock);
 
		//Invoke route
        $this->call('GET', '/user/create', $input);
         
		$this->assertRedirectedTo('upload');		
    }
 
}
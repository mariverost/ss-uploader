<?php

class UsersControllerTest extends TestCase {
 
    public function setUp()
    {
        parent::setUp();
        $this->mock = Mockery::mock('Eloquent', 'User');
 
        $_ENV['DB_HOST'] = 'localhost';
        $_ENV['DB_NAME'] = 'ss_uploader';
        $_ENV['DB_USERNAME'] = 'root';
        $_ENV['DB_PASSWORD'] = ''; 
    }
 
    public function tearDown()
    {
		if (ob_get_length() == 0 ) {
			ob_start();
		}
        
		Mockery::close();
    }
 
    public function testStoreSuccess()
    {
        // Establish us as Admin (user_id == 1)
        //$user = Sentry::findUserByID(1);
        //Sentry::setUser($user);
 
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
 
        $this->call('GET', '/user/create', $input);
 
        $this->assertRedirectedTo('upload');
		
    }
 
}
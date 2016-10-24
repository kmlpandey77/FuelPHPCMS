<?php
/**
 * Installation file of FuelPHPCMS.
 *
 * @package    FuelPHPCMS
 * @version    1.0
 * @author     Kamal Pandey (kml.pandey77@gmail.com)
 * 
 */

class Controller_Install extends Controller_Template
{
	public $template = 'install/template';

	public function before()
	{
		parent::before();

		if(File::exists(APPPATH.'INSTALLATION_DISABLED')){
			Session::set_flash('error', 'Installation already complete.');
			Response::redirect('admin');
		}

		if($this->request->active()->action == 'index'){

			if(File::exists(APPPATH . 'config/development/db.bak.php')){
				Response::redirect('install/2/');
			}

		}else{

			if(!File::exists(APPPATH . 'config/development/db.bak.php')){
				Response::redirect('install/');
			}

		}
		
	}
	public function action_index()
	{		

		if(Input::method() == 'POST'){

			if(File::get_permissions(APPPATH) !== "0777"){
				die('App folder permission deny. Please chenge to writeable (0777) and try again.');
			}

			if(File::get_permissions(DOCROOT) !== "0777"){
				die('Root(public) folder permission deny. Please chenge to writeable (0777) and try again.');
			}

			$servername = Input::post('host');
			$username = Input::post('username');
			$password = Input::post('password');
			$db_name = Input::post('db_name');

			try {
		        $dbh = new PDO("mysql:host=$servername", $username, $password);		        

		        $db_create = false;
		        
		        if($dbh->exec("CREATE DATABASE `$db_name`;")){
		        	$db_create = true;
		        }else{

		        	if($dbh->errorInfo()[1] == 1007){
		        		$db_create = true;
		        	}else{
		        		var_dump($dbh->errorInfo());exit;
		        	}
		        	
		        }

			    if($db_create){

			    	if(File::get_permissions(APPPATH.'config/development/db.php') === "0777"){

				    	/**
			        	 * Backup db.php files
			        	 * 
			        	**/
			        	File::copy(APPPATH.'config/development/db.php',APPPATH.'config/development/db.bak.php');

			        	$db_php_data = "<?php
/**
 * The development database settings. These get merged with the global settings.
 */

return array(
	'default' => array(
		'connection'  => array(
			'dsn'        => 'mysql:host=$servername;dbname=$db_name',
			'username'   => '$username',
			'password'   => '$password',
		),
	),
);

/* End of development/db.php */
";
					
					
						File::update(APPPATH.'config/development/', 'db.php', $db_php_data);
						Response::redirect('install/2/');
					}else
						die('"<em>config/development/db.php</em>" file permission deny. Please chenge to writeable (0777) and try again.');
			    }
			    

		    } catch (PDOException $e) {
		        die("DB ERROR: ". $e->getMessage());
		    }

		}

		$this->template->title = 'Config';
		$this->template->content = View::forge('install/index');
	}

	public function action_2()
	{
		if(Input::method() == 'POST'){
			Migrate::version(0);
			Migrate::latest();			


			$username = Input::post('username');
			$password = Input::post('password');
			$email = Input::post('email');

			try {
				$admin = Auth::create_user(
				    $username,
				    $password,
				    $email,
				    100
				);

				if($admin){

					File::create(APPPATH, 'INSTALLATION_DISABLED', 'Installation Complete.');
					Response::redirect('admin');

				}else{
					die('Error while creating admin. Please try agian.');
				}
				
			} catch (Exception $e) {

				die("ERROR: ". $e->getMessage());

			}
		}

		$this->template->title = 'Admin username and Password.';
		$this->template->content = View::forge('install/setp_2');
	}
	
}

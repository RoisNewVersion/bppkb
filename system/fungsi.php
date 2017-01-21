<?php 
/**
* kumpulan class 
*/
class Core 
{
	public $con;

	function __construct()
	{
		require_once ('php-mysqli/MysqliDb.php');

		$this->con = new MysqliDb();
		date_default_timezone_set('Asia/Jakarta');
	}

	public function test_db()
	{
		// $db = MysqliDb::getInstance();
		if ($this->con->ping()) {
			echo 'sukses';
		}else{
			echo 'gagal '.$this->con->getLastError();
		}
	}

	public function select_a()
	{
		if ($a = $this->con->get('tb_user', 1)) {
			print_r($a);
		} else {
			# code...
		}
		
	}

	// check sdh login apa blm
	public function check_login($value)
	{
		if (isset($_SESSION[$value])) {
			header("Location: index.php");
		} 
	}

	// check ada session admin atau tdk
	public function check_session($value)
	{
		if (!isset($_SESSION[$value])) {
			header("Location: login.php");
		}
	}

	// proses login admin
	public function proses_login($username, $password)
	{
		session_start();
		$this->con->where('username', $username);
		$this->con->where('password', $password);
		$data = $this->con->getOne('tb_user');
		if ($this->con->count>0) {
			$_SESSION['admin'] = $data;
			return TRUE;
		} else {
			return FALSE;
		}
		
	}

	// logout
	public function logout($value)
	{
		unset($value);
		session_destroy();
		header("Location: login.php");
	}

	// function response json
	public function json_response($pesan = null, $typeError = null, $code = '')
	{
		header_remove();
		http_response_code($code);
		header("Cache-Controll: no-transform, public, max-age30, s-maxage=900");
		header("Content-type: application/json");
		$status = array(
			200=>'200 OK',
			400=>'400 Bad Request',
			422=>'422 Unprocessable entity',
			500=>'500 Internal server error'
			);
		header("Status:".$status[$code]);
		return json_encode(array(
			'status'=>$code < 300,
			'message'=>$pesan,
			'type'=>$typeError,
			));
	}
}
 ?>
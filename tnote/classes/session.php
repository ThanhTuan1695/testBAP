<?php 
/**
* Session class
* 
*/
class Session {
	
	
	public function sendSession($user,$id){
		$_SESSION['user'] = $user;
		
	}

	public function startSession(){
		session_start();
		
	}

	public function getSession(){
		
		if (isset($_SESSION['user'])) {
			$user = $_SESSION['user'];
		}else{
			$user = '';
		}
		return $user;
	}

	public function destroySession(){
		session_destroy();
	}
}


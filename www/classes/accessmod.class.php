<?php
/**
 * Classe de acesso de usuario (login, cadastro, logout e etc)
 * 
 * 
 * ==============================================================================
 */

/**
 * Classe de acesso
 * 
 * @param string $dbName
 * @param string $dbHost 
 * @param string $dbUser
 * @param string $dbPass
 * @param string $dbTable
 */

class flexibleAccess{
  /*Settings*/
  /**
   * The database that we will use
   * var string
   */
  var $dbName = 'grupo3';
  /**
   * The database host
   * var string
   */
  var $dbHost = 'localhost';
  /**
   * The database port
   * var int
   */
  var $dbPort = 3306;
  /**
   * The database user
   * var string
   */
  var $dbUser = 'user';
  /**
   * The database password
   * var string
   */
  var $dbPass = 'password';
  /**
   * The database table that holds all the information
   * var string
   */
  var $dbTable  = 'usuario';
  var $dbTable2 = 'responsavel';
  var $dbTable3 = 'idoso';
  var $dbTable4 = 'bloqueio';
  /**
   * The session variable ($_SESSION[$sessionVariable]) which will hold the data while the user is logged on
   * var string
   */
  var $sessionVariable = 'userSessionValue';
  /**
   * Those are the fields that our table uses in order to fetch the needed data. The structure is 'fieldType' => 'fieldName'
   * var array
   */
  var $tbFields = array(
  	'userID'=> 'CPF', 
  	'login' => 'Username',
  	'pass'  => 'Senha',
  	'ad'=> 'Admin'
  );
	/**
   * When user wants the system to remember him/her, how much time to keep the cookie? (seconds)
   * var int
   */
  var $remTime = 2592000;//One month
  /**
   * The name of the cookie which we will use if user wants to be remembered by the system
   * var string
   */
  var $remCookieName = 'ckSavePass';
  /**
   * The cookie domain
   * var string
   */
  var $remCookieDomain = '';
  /**
   * The method used to encrypt the password. It can be sha1, md5 or nothing (no encryption)
   * var string
   */
  var $passMethod = 'nothing';
  /**
   * Display errors? Set this to true if you are going to seek for help, or have troubles with the script
   * var bool
   */
  var $displayErrors = true;
  /*Do not edit after this line*/
  var $userID;
  var $dbConn;
  var $userData=array();
  /**
   * Class Constructure
   * 
   * @param string $dbConn
   * @param array $settings
   * @return void
   */
  function flexibleAccess($dbConn = '', $settings = '')
  {
	    if ( is_array($settings) ){
		    foreach ( $settings as $k => $v ){
				    if ( !isset( $this->{$k} ) ) die('Property '.$k.' does not exists. Check your settings.');
				    $this->{$k} = $v;
			}
	    }
	    $this->remCookieDomain = $this->remCookieDomain == '' ? $_SERVER['HTTP_HOST'] : $this->remCookieDomain;
	    $this->dbConn = ($dbConn=='')? mysql_connect($this->dbHost.':'.$this->dbPort, $this->dbUser, $this->dbPass):$dbConn;
	    if ( !$this->dbConn ) die(mysql_error($this->dbConn));
	    mysql_select_db($this->dbName, $this->dbConn)or die(mysql_error($this->dbConn));
	    if( !isset( $_SESSION ) ) session_start();
	    if ( !empty($_SESSION[$this->sessionVariable]) )
	    {
		    $this->loadUser( $_SESSION[$this->sessionVariable] );
	    }
	    //Maybe there is a cookie?
	    if ( isset($_COOKIE[$this->remCookieName]) && !$this->is_loaded()){
	      //echo 'I know you<br />';
	      $u = unserialize(base64_decode($_COOKIE[$this->remCookieName]));
	      $this->login($u['uname'], $u['password']);
	    }
  }
  
  /**
  	* Login function
  	* @param string $uname
  	* @param string $password
  	* @param bool $loadUser
  	* @return bool
  */
  function login($uname, $password, $remember = false, $loadUser = true)
  {
    	$uname    = $this->escape($uname);
    	$password = $originalPassword = $this->escape($password);
		switch(strtolower($this->passMethod)){
		  case 'sha1':
		  	$password = "SHA1('$password')"; break;
		  case 'md5' :
		  	$password = "MD5('$password')";break;
		  case 'nothing':
		  	$password = "'$password'";
		}
		$res = $this->query("SELECT * FROM `{$this->dbTable}` 
		WHERE `{$this->tbFields['login']}` = '$uname' AND `{$this->tbFields['pass']}` = $password LIMIT 1",__LINE__);
		if ( @mysql_num_rows($res) == 0)
			return false;
		if ( $loadUser )
		{
			$this->userData = mysql_fetch_array($res);
			$this->userID = $this->userData[$this->tbFields['userID']];
			$_SESSION[$this->sessionVariable] = $this->userID;
			if ( $remember ){
			  $cookie = base64_encode(serialize(array('uname'=>$uname,'password'=>$originalPassword)));
			  $a = setcookie($this->remCookieName, 
			  $cookie,time()+$this->remTime, '/', $this->remCookieDomain);
			}
		}
		return true;
  }
  
  /**
  	* Logout function
  	* param string $redirectTo
  	* @return bool
  */
  function logout()
  {
    setcookie($this->remCookieName, '', time()-3600);
    $_SESSION[$this->sessionVariable] = '';
    $this->userData = '';
	$this->userID = '';
	session_destroy();
  }
  /**
  	* Function to determine if a property is true or false
  	* param string $prop
  	* @return bool
  */
  function is($prop){
  	return $this->get_property($prop)==1?true:false;
  }
  
    /**
  	* Get a property of a user. You should give here the name of the field that you seek from the user table
  	* @param string $property
  	* @return string
  */
  function get_property($property)
  {
    if (empty($this->userID)) $this->error('No user is loaded', __LINE__);
    if (!isset($this->userData[$property])) $this->error('Unknown property <b>'.$property.'</b>', __LINE__);
    return $this->userData[$property];
  }

  
  /**
   * Is the user loaded?
   * @ return bool
   */
  function is_loaded()
  {
    return empty($this->userID) ? false : true;
  }
  
   /**
  	* O usuario é administrador?
  	* @return bool
  */
  function is_admin()
 {
  if($this->is_loaded()){
	if (($this->userData[$this->tbFields['ad']])==1){
    return true;}}
   else{
	return false;
	}
  }
  
  /*
   * Creates a user account. The array should have the form 'database field' => 'value'
   * @param array $data
   * return int
   */  
  function insertUser($data){
    if (!is_array($data)) $this->error('Data is not an array', __LINE__);
    switch(strtolower($this->passMethod)){
	  case 'sha1':
	  	$password = "SHA1('".$data[$this->tbFields['pass']]."')"; break;
	  case 'md5' :
	  	$password = "MD5('".$data[$this->tbFields['pass']]."')";break;
	  case 'nothing':
		$password = $data[$this->tbFields['pass']];
	}
    foreach ($data as $k => $v ) $data[$k] = "'".$this->escape($v)."'";
    $data[$this->tbFields['pass']] = $password;
	$query = "INSERT INTO `{$this->dbTable}` (`".implode('`, `', array_keys($data))."`) VALUES (".implode(", ", $data).")";
    $result_of_query = $this->query($query);
	return (int)mysql_insert_id($this->dbConn);
  }
  /*
   * Creates a random password. You can use it to create a password or a hash for user activation
   * param int $length
   * param string $chrs
   * return string
   */
  function randomPass($length=10, $chrs = '1234567890qwertyuiopasdfghjklzxcvbnm'){
    for($i = 0; $i < $length; $i++) {
        $pwd .= $chrs{mt_rand(0, strlen($chrs)-1)};
    }
    return $pwd;
  }
  

  function cadastro($id,$user,$pass, $RG, $Nome,$end, $Cidade, $Estado, $Bairro, $tel, $email, $fumo, $alcool, $observacoes, $CPF_idoso,$Nomeidoso,$endidoso,$RGidoso,$Cidadeidoso,$Estadoidoso,$Bairroidoso,$telidoso,$emailidoso,$fumoidoso,$alcoolidoso,$medicamentos,$num,$num2){

  $sql = "INSERT INTO `{$this->dbTable}` (CPF,Username,Senha,Admin) VALUES ('".$id."','".$user."','".$pass."',0)";
  $result_of_query = $this->query($sql);
  if (!$result_of_query) {
		return 0;
		}

  $sql = "INSERT INTO `{$this->dbTable2}` (CPF,RG,Nome,Endereco,Cidade,Estado,Bairro,Telefone,email,fumo,alcool,observacoes,CPF_Idoso,Numero_endereco) VALUES 
  ('".$id."','".$RG."','".$Nome."','".$end."','".$Cidade."','".$Estado."','".$Bairro."','".$tel."','".$email."','".$fumo."','".$alcool."','".$observacoes."','".$CPF_idoso."','".$num."')";
	$result_of_query = $this->query($sql);
   if (!$result_of_query) {
		return 1;
		}
  $sql = "INSERT INTO `{$this->dbTable3}` (CPF_IDOSO,Nome,Endereco,Numero_endereco,RG,Cidade,Estado,Bairro,Telefone,Email,Fumo,Alcool,Medicamentos) VALUES 
  ('".$CPF_idoso."','".$Nomeidoso."','".$endidoso."','".$num2."','".$RGidoso."','".$Cidadeidoso."','".$Estadoidoso."','".$Bairroidoso."','".$telidoso."','".$emailidoso."','".$fumoidoso."','".$alcoolidoso."','".$medicamentos."')";
   $result_of_query = $this->query($sql);
    if (!$result_of_query) {
		return 2;
		}
	$data = date ( "Y-m-d" );
	$sql = "INSERT INTO `{$this->dbTable4}` (`MODO_boqueio`, `bloqueado`, `Data`, `CPF`) VALUES ('\0',0,'".$data."','".$id."')";
	$result_of_query = $this->query($sql);
    if (!$result_of_query) {
		return 3;
		}
	else {
	return 4;}
	
 
 }
 
 function is_blocked($CPF){
$res = $this->query("SELECT * FROM `{$this->dbTable4}` 
		WHERE bloqueado = 0 AND CPF = '$CPF' LIMIT 1",__LINE__);
 if ( @mysql_num_rows($res) == 0){
			return true;
	}
 else {
 return false;
 }
 }
  
  ////////////////////////////////////////////
  // PRIVATE FUNCTIONS
  ////////////////////////////////////////////
  
  /**
  	* SQL query function
  	* @access private
  	* @param string $sql
  	* @return string
  */
  function query($sql, $line = 'Uknown')
  {
    //if (defined('DEVELOPMENT_MODE') ) echo '<b>Query to execute: </b>'.$sql.'<br /><b>Line: </b>'.$line.'<br />';
	$res = mysql_db_query($this->dbName, $sql, $this->dbConn);
	if ( !$res )
		$this->error(mysql_error($this->dbConn), $line);
	return $res;
  }
  
  /**
  	* A function that is used to load one user's data
  	* @access private
  	* @param string $userID
  	* @return bool
  */
  function loadUser($userID)
  {
	$res = $this->query("SELECT * FROM `{$this->dbTable}` WHERE `{$this->tbFields['userID']}` = '".$this->escape($userID)."' LIMIT 1");
    if ( mysql_num_rows($res) == 0 )
    	return false;
    $this->userData = mysql_fetch_array($res);
    $this->userID = $userID;
    $_SESSION[$this->sessionVariable] = $this->userID;
    return true;
  }

  /**
  	* Produces the result of addslashes() with more safety
  	* @access private
  	* @param string $str
  	* @return string
  */  
  function escape($str) {
    $str = get_magic_quotes_gpc()?stripslashes($str):$str;
    $str = mysql_real_escape_string($str, $this->dbConn);
    return $str;
  }
  
  /**
  	* Error holder for the class
  	* @access private
  	* @param string $error
  	* @param int $line
  	* @param bool $die
  	* @return bool
  */  
  function error($error, $line = '', $die = false) {
    if ( $this->displayErrors ){}
    	//echo '<b>Error: </b>'.$error.'<br /><b>Line: </b>'.($line==''?'Unknown':$line).'<br />';
    if ($die) exit;
    return false;
  }
  
   function getCPF(){
   return $this->userID;
   
   }

  }
?>
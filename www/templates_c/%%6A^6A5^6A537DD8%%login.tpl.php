<?php /* Smarty version 2.6.22, created on 2009-05-27 10:24:50
         compiled from login.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array('title' => 'login')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h1>Login</h1>
	<p><form method="post" action="login_submit.php" />
	 username: <input type="text" name="uname" /><br /><br />
	 password: <input type="password" name="pwd" /><br /><br />
	 Remember me? <input type="checkbox" name="remember" value="1" /><br /><br />
	 <input type="submit" value="login" />
	</form>
	</p>
	
	<p> <a href="cadastrar_usuario.php">Quero cadastrar-me</a></p>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
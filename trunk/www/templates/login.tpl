{include file="header.tpl" title=login}

<h1>Login</h1>
	<p><form method="post" action="{$php_self}/?page=login_submit" />
	 username: <input type="text" name="uname" /><br /><br />
	 password: <input type="password" name="pwd" /><br /><br />
	 Remember me? <input type="checkbox" name="remember" value="1" /><br /><br />
	 <input type="submit" value="login" />
	</form>
	</p>
	
	<p> <a href="/?page=cadastrar_usuario"></a>Quero cadastrar-me</p>

{include file="footer.tpl"}

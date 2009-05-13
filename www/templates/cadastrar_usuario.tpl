{include file="header.tpl" title=foo}

<h1>Register</h1>
	<p><form method="post" action="{$php_self}/cadastrar_usuario_submit" />
	 username: <input type="text" name="username" /><br /><br />
	 password: <input type="password" name="pwd" /><br /><br />
	 email: <input type="text" name="email" /><br /><br />
	 <input type="submit" value="Register user" />
	</form>
	</p>

{include file="footer.tpl"}

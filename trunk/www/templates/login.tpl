{include file="header.tpl" title=foo}

<h1>Login</h1>
	<p><form method="post" action="{$php_self}" />
	 username: <input type="text" name="uname" /><br /><br />
	 password: <input type="password" name="pwd" /><br /><br />
	 Remember me? <input type="checkbox" name="remember" value="1" /><br /><br />
	 <input type="submit" value="login" />
	</form>
	</p>

{include file="footer.tpl"}

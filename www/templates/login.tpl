{include file="header.tpl"}

<p>Faça o Login:</p>
<p></p>
	<p><form method="post" action="login_submit.php" />
	 username: <input type="text" name="uname" /><br /><br />
	 password: <input type="password" name="pwd" /><br /><br />
	 <input type="submit" value="login" />
	</form>
	</p>
	
	<p> <a href="cadastrar_usuario.php">Quero cadastrar-me</a></p>
	<p> <a href="esqueci.php">Esqueceu sua senha?</a></p>

{include file="footer.tpl"}

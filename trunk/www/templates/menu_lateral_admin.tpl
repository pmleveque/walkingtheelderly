<h2>Menu</h2>
{if $usuario_logado}
<p>Você está logado! <b><a href="logout.php">Log Out</a></b></p>
{else}
<p>Bem-vindo no sistema WtE... <br />Você não esta logado! <b><a href="login.php">Log In</a></b></p>
{/if}

<ul>
	<li><a href="admin.php">Pagina Inicial</a></li>
	<li><a href="bloquear.php">Bloquear</a></li>
	<li><a href="desbloquear.php">Desbloquear</a></li>
	<li><a href="registro.php">Criar Log</a></li>


</ul>
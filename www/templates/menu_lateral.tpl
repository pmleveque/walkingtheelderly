<h2>Menu</h2>
{if $usuario_logado}
<p>Você está logado! <b><a href="logout.php">Log Out</a></b></p>
{else}
<p>Bem-vindo no sistema WtE... <br />Você não esta logado! <b><a href="login.php">Log In</a></b></p>
{/if}

<ul>
	<li><a href="index.php">Pagina inicial</a></li>
	<li><a href="listagens.php">Listagens</a></li>
<li><a href="cadastrar_viagem.php">Cadastrar viagem</a></li>
<li><a href="cadastrar_usuario.php">Cadastrar usuário</a></li>


</ul>
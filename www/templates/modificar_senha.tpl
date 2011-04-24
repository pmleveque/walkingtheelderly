{include file="header.tpl"}

<form method="post" action="modificar_dados_submit.php" accept-charset="utf-8"/>

<h1>Alteração de senha</h1>

<p>
	Usuario: <input type="text" name="username" /><br /><br />
	Senha Antiga: <input type="password" name="password" /><br /><br />
	Senha Nova: <input type="password" name="passwordNew" /><br /><br />
	Confirmação de Senha: <input type="password" name="passwordNewConf" /><br /><br />
    
<input type="submit" value="Modificar"/>
<input type="button" value="Cancelar" onClick="window.location.href='index.php'"/>

</FORM>

{include file="footer.tpl"}

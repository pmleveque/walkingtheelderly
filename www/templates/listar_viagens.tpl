{include file="header.tpl"}

<form method="post" action="cadastrar_viagem_submit.php" />

<h1>Dados da viagem</h1>
<p>Digite os dados para o cadastro da viagem
</p>
<p>
	Data de Início dd.mm.aaaa: <input type="text" name="datainicio" /><br /><br />
	Data Final dd.mm.aaaa: <input type="text" name="datafim" /><br /><br />
	Cidade: <input type="text" name="cidade" /><br /><br />
	Estado: <input type="text" name="estado" /><br /><br />
</p>



<input type="submit" value="Cadastrar-se" />
</form>



{include file="footer.tpl"}

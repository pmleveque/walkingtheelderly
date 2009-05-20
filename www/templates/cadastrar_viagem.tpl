{include file="header.tpl" title=foo}

<form method="post" action="{$php_self}/?page=cadastrar_viagem_submit" />

<h1>Dados da viagem</h1>
<p>Digite os dados para o cadastro da viagem
</p>
<p>
	Data de Início: <input type="text" name="nome" /><br /><br />
	Data Final: <input type="text" name="cpf" /><br /><br />
	Cidade: <input type="text" name="rg" /><br /><br />
	Estado: <input type="text" name="endereco" /><br /><br />
</p>

<input type="submit" value="Cadastrar-se" />
</form>

{include file="footer.tpl"}

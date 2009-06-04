{include file="header_admin.tpl"}

<form action="registro" method="get" accept-charset="utf-8">
	<label for="titulo_manutencao">Titulo manutenção: </label><input type="text" name="titulo_manutencao" value="" id="titulo_manutencao">
	
	<br /><br /><label for="descricao">Descrição:</label>
	<br /><textarea name="descricao" id="descricao" rows="10" cols="40"></textarea>
	

	<p><input type="submit" value="Salvar &rarr;"></p>
</form>

{include file="footer.tpl"}

{include file="header_admin.tpl"}

<form method="post" action="registro.php" accept-charset="utf-8" />
	<p><label for="titulo_manutencao">Titulo manutenção: </label><input type="text" name="titulo_manutencao" value="" id="titulo_manutencao">
	
	<br /><br /><label for="descricao">Descrição:</label>
	<br /><textarea name="descricao" id="descricao" rows="10" cols="40"></textarea>
	

	<p><input type="submit" value="Salvar &rarr;"></p>
</form>
</p>

<table border="0" cellspacing="5" cellpadding="5">
	<tr>
	      <th>Titulo</th>
	      <th>Log</th>
	   </tr>
{section name=elt loop=$listagem}
{strip}
   <tr bgcolor="{cycle values="#fafafa,#ffffff"}">
      <td>{$listagem[elt].titulo}</td>
      <td>{$listagem[elt].log}</td>
   </tr>
{/strip}
{/section}
</table>


{include file="footer.tpl"}

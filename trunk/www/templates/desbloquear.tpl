{include file="header_admin.tpl"}


<p>Lista de usuários que podem ser desbloqueados:</p>

<table>
	<tr>
		<th>Nome</th>
	      <th>CPF</th>
	      <th>Email</th>
	      <th>Desbloquear ?</th>
	      
	</tr>
{section name=elt loop=$listagem}
{strip}
   <tr bgcolor="{cycle values="#fafafa,#ffffff"}">
      <td>{$listagem[elt].name}</td>
      <td>{$listagem[elt].cpf}</td>
      <td>{$listagem[elt].email}</td>		
      <td><a href="desbloquear_submit.php?cpf={$listagem[elt].cpf}">Desbloquear </a></td>
   </tr>
{/strip}
{/section}
</table>

{include file="footer.tpl"}

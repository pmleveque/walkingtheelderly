{include file="header_admin.tpl"}

<p>Lista de usuários que podem ser bloqueados:</p>

<table>
	<tr>
		<th>Nome</th>
	      <th>CPF</th>
	      <th>Email</th>
	      <th>Bloquear por</th>
	      
	</tr>
{section name=elt loop=$listagem}
{strip}
   <tr bgcolor="{cycle values="#fafafa,#ffffff"}">
		<td><a href="consultaadmin.php?responsavel={$listagem[elt].cpf}">{$listagem[elt].name}</a></td>
      <td>{$listagem[elt].cpf}</td>
      <td>{$listagem[elt].email}</td>		
      <td><a href="bloquear.php?cpf={$listagem[elt].cpf}&tempo=7dias">7dias </a>&nbsp;
          <a href="bloquear.php?cpf={$listagem[elt].cpf}&tempo=15dias">15dias</a>&nbsp;
          <a href="bloquear.php?cpf={$listagem[elt].cpf}&tempo=30dias">30dias</a>&nbsp;
          <a href="bloquear.php?cpf={$listagem[elt].cpf}&tempo=sempre">sempre</a></td>
   </tr>
{/strip}
{/section}
</table>


{include file="footer.tpl"}

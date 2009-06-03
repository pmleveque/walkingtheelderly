{include file="header.tpl"}
//vannucci
<form method="post" action="busca_acomp_submit.php" />

<table>
{section name=mysec loop=$name}
{strip}
   <tr bgcolor="{cycle values="#eeeeee,#dddddd"}">
      <td>{$name[mysec]}</td>
   </tr>
{/strip}
{/section}
</table>



<input type="submit" value="Cadastrar-se" />
</form>



{include file="footer.tpl"}
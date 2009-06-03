{include file="header.tpl"}

<table>
{section name=mysec loop=$acompanhantes}
{strip}
   <tr bgcolor="{cycle values="#aaaaaa,#bbbbbb"}">
      <td>{$acompanhantes[mysec].name}</td>
      <td>{$acompanhantes[mysec].phone}</td>
   </tr>
{/strip}
{/section}
</table>



{include file="footer.tpl"}

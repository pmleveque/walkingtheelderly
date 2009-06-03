{include file="header.tpl"}

<table>
{section name=acomp loop=$acompanhantes}
{strip}
   <tr bgcolor="{cycle values="#aaaaaa,#bbbbbb"}">
      <td>{$acompanhantes[mysec].name}</td>
      <td>{$acompanhantes[mysec].phone}</td>
      <td>{$idosos[mysec].dia}</td>
      <td>{$idosos[mysec].hora_inicio}</td>
      <td>{$idosos[mysec].hora_fim}</td>
   </tr>
{/strip}
{/section}
</table>

<table>
{section name=idosos loop=$idosos}
{strip}
   <tr bgcolor="{cycle values="#aaaaaa,#bbbbbb"}">
      <td>{$idosos[mysec].name}</td>
      <td>{$idosos[mysec].dia}</td>
      <td>{$idosos[mysec].cidade}</td>
      <td>{$idosos[mysec].hora_inicio}</td>
      <td>{$idosos[mysec].hora_fim}</td>
   </tr>
{/strip}
{/section}
</table>



{include file="footer.tpl"}

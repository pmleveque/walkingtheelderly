{include file="header.tpl"}

<table>
{section name=acomp loop=$acompanhantes}
{strip}
   <tr bgcolor="{cycle values="#aaaaaa,#bbbbbb"}">
      <td>{$acompanhantes[acomp].name}</td>
      <td>{$acompanhantes[acomp].phone}</td>
      <td>{$idosos[acomp].dia}</td>
      <td>{$idosos[acomp].hora_inicio}</td>
      <td>{$idosos[acomp].hora_fim}</td>
   </tr>
{/strip}
{/section}
</table>

<table>
{section name=idoso loop=$idosos}
{strip}
   <tr bgcolor="{cycle values="#aaaaaa,#bbbbbb"}">
      <td>{$idosos[idoso].name}</td>
      <td>{$idosos[idoso].dia}</td>
      <td>{$idosos[idoso].cidade}</td>
      <td>{$idosos[idoso].hora_inicio}</td>
      <td>{$idosos[idoso].hora_fim}</td>
        <td><a href="feedback.php?idoso="{$idosos[idoso].CPF}">hagsuh</a></td>
   </tr>
{/strip}
{/section}
</table>



{include file="footer.tpl"}

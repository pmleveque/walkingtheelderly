{include file="header.tpl"}

<h1 id="viagens">Viagens e acompanhantes possíveis</h1>

<table>
	

<tr>
		<th>Id viagem</th>
		<th>Periodo viagem</th>
		<th>Nome</th>
	      <th>Phone</th>
	      <th>Cidade<br />
		  Estado</th>
		  <th>Periodo disponivel<br />
		  do Acompanhante<br />
		  Ano-mes-dia</th>
	      <th>Status</th>
	      <th>Feedback</th>
	</tr>
{section name=acomp loop=$acompanhantes}
{strip}
   <tr bgcolor="{cycle values="#fafafa,#ffffff"}">
      <td>{$acompanhantes[acomp].viagem}</td>
	  <td>{$acompanhantes[acomp].datainicio}<br />
      {$acompanhantes[acomp].datafim}</td>
	  <td>{$acompanhantes[acomp].name}</td>
      <td>{$acompanhantes[acomp].phone}</td>
	  <td>{$acompanhantes[acomp].Cidade}<br />
	  {$acompanhantes[acomp].Estado}</td>
      <td>{$acompanhantes[acomp].dia1}<br />
      {$acompanhantes[acomp].dia2}</td>
	  <td>
		<a href="listagens.php?viagemcruza={$acompanhantes[acomp].idcruza}&viagem={$acompanhantes[acomp].viagem}&datai={$acompanhantes[acomp].dataini}&dataf={$acompanhantes[acomp].dataf}">Combina</a>
		</td>
      <td><a href="feedback.php?acompanhante={$acompanhantes[acomp].CPF}">Feedback</a></td>
<td><a href="listagens.php?action=fim&acompanhante={$acompanhantes[acomp].CPF}&viagem={$viagens[viagens].Id}">Fim</a> <a href="listagens.php?action=ausente&acompanhante={$acompanhantes[acomp].CPF}&viagem={$viagens[viagens].Id}">Ausente</a></td>
   </tr>
{/strip}
{/section}

</table>



<br />
<br />
<br />
<h1 id="idosos">Idosos</h1>

<table>
	<tr>
		<th>Nome</th>
	      <th>Dia inicio<br />
		  Dia fim</th>
	      <th>Localização</th>
	<th>Feedback</th>
	</tr>
{section name=idoso loop=$idosos}
{strip}
   <tr bgcolor="{cycle values="#fafafa,#ffffff"}">
      <td>{$idosos[idoso].name}</td>
      <td>{$idosos[idoso].dia1}<br />
	  {$idosos[idoso].dia2}</td>
      <td>Cidade:{$idosos[idoso].cidade}<br />
	  Estado:{$idosos[idoso].estado}<br />
	  Endereço:{$idosos[idoso].endereco},nº{$idosos[idoso].numero_endereco}</td>
        <td><a href="feedback.php?idoso={$idosos[idoso].CPF}">Feedback</a></td>
   </tr>
{/strip}
{/section}
</table>





{include file="footer.tpl"}
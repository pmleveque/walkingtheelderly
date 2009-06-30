{include file="header.tpl"}

<h1 id="viagens">Viagens e acompanhantes possíveis</h1>

<table>
	
{section name=viagens loop=$viagens}
<tr>
		<th>Viagem</th>
		<th>Data Inicio</th>
		<th>Data Fim</th>
	</tr>
{strip}
   <tr bgcolor="{cycle values="#cfcfc1,#ffffff"}">
      <td>{$viagens[viagens].Id}</td>
	  <td>{$viagens[viagens].datain}</td>
	  <td>{$viagens[viagens].datafim}</td>
   </tr>
<tr>
		<th>Nome</th>
	      <th>Phone</th>
	      <th>Cidade<br />
		  Estado</th>
		  <th>Periodo<br />
		  Ano-mes-dia</th>
	      <th>Status</th>
	      <th>Feedback</th>
	</tr>
{section name=acomp loop=$acompanhantes}
{strip}
   <tr bgcolor="{cycle values="#fafafa,#ffffff"}">
      <td>{$acompanhantes[acomp].name}</td>
      <td>{$acompanhantes[acomp].phone}</td>
	  <td>{$acompanhantes[acomp].Cidade}<br />
	  {$acompanhantes[acomp].Estado}</td>
      <td>inicio:{$acompanhantes[acomp].dia1}<br />
      fim:{$acompanhantes[acomp].dia2}</td>
	  <td>
		<form action="listagens.php" method="get" id="status" accept-charset="utf-8">
			<input type="hidden" name="action" value="status">
			<input type="hidden" name="viagem" value="{$viagens[viagens].Id}">
			<input type="hidden" name="acompanhante" value="{$acompanhantes[acomp].CPF}">
			<select name="status" size="1"  onchange="this.form.submit()">
				<option value="{$acompanhantes[acomp].current_status}">{$acompanhantes[acomp].current_status}</option>
				<option value="talvez">Talvez</option>
				<option value="confirmado">Confirmado</option>
				<option value="nao">Não</option>
			</select>
			<!-- <input type="submit" value="Mudar"> -->
		</form>
		</td>
      <td><a href="feedback.php?acompanhante={$acompanhantes[acomp].CPF}">Feedback</a></td>
<td><a href="listagens.php?action=fim&acompanhante={$acompanhantes[acomp].CPF}&viagem={$viagens[viagens].Id}">Fim</a> <a href="listagens.php?action=ausente&acompanhante={$acompanhantes[acomp].CPF}&viagem={$viagens[viagens].Id}">Ausente</a></td>
   </tr>
{/strip}
{/section}
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
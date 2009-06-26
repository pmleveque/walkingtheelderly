{include file="header.tpl"}


<h1 id="acompanhantes">Acompanhantes</h1>
<table>
	<tr>
		<th>Nome</th>
	      <th>Phone</th>
	      <th>Cidade</th>
		  <th>Dia</th>
	      <th>Status</th>
	      <th>Feedback</th>
	</tr>
{section name=acomp loop=$acompanhantes}
{strip}
   <tr bgcolor="{cycle values="#fafafa,#ffffff"}">
      <td>{$acompanhantes[acomp].name}</td>
      <td>{$acompanhantes[acomp].phone}</td>
	  <td>{$acompanhantes[acomp].Cidade}</td>
      <td>{$acompanhantes[acomp].dia}<br />
      {$acompanhantes[acomp].hora_inicio}
      {$acompanhantes[acomp].hora_fim}</td>
	  <td>
		<form action="status.php" method="get" accept-charset="utf-8">
			<select name="status" size="1">
				<option value="talvez">Talvez</option>
				<option value="confirmado">Confirmado</option>
				<option value="nao">Não</option>
			</select>
			<!-- <input type="submit" value="Mudar"> -->
		</form>
		</td>
      <td><a href="feedback.php?acompanhante={$acompanhantes[acomp].CPF}">Feedback</a></td>
<td><a href="">Fim</a> <a href="">Aussente</a></td>
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
	      <th>Dia</th>
	      <th>Cidade</th>
	      <th>Inicio</th>
	      <th>Fim</th>
	<th>Feedback</th>
	</tr>
{section name=idoso loop=$idosos}
{strip}
   <tr bgcolor="{cycle values="#fafafa,#ffffff"}">
      <td>{$idosos[idoso].name}</td>
      <td>{$idosos[idoso].dia}</td>
      <td>{$idosos[idoso].cidade}</td>
      <td>{$idosos[idoso].hora_inicio}</td>
      <td>{$idosos[idoso].hora_fim}</td>
        <td><a href="feedback.php?idoso={$idosos[idoso].CPF}">Feedback</a></td>
   </tr>
{/strip}
{/section}
</table>



{include file="footer.tpl"}

{include file="header.tpl"}


	
      <p>CPF            :{$dados.CPF            			}</p>
      <p>RG             :{$dados.RG             			}</p>
      <p>Nome           :{$dados.Nome           			}</p>
      <p>Endereco       :{$dados.Endereco       			}</p>
      <p>Cidade         :{$dados.Cidade         			}</p>
      <p>Estado         :{$dados.Estado         			}</p>
      <p>Bairro         :{$dados.Bairro         			}</p>
      <p>Telefone       :{$dados.Telefone       			}</p>
      <p>Email          :{$dados.email          			}</p>
      <p>Fumo           :{$dados.fumo           			}</p>
      <p>Alcool         :{$dados.alcool         			}</p>
      <p>Observacoes    :{$dados.observacoes    			}</p>
      <p>Numero_endereco:{$dados.Numero_endereco			}</p>
      <p>Mediaresp      :{$dados.mediaresp      			}</p>


<h1>Feedback</h1>

<table>
<tr>
		<th>Nota</th>
		<th>Jutificativa</th>
	</tr>
{section name=elt loop=$feed}
{strip}
   <tr bgcolor="{cycle values="#fafafa,#ffffff"}">
      <td>{$feed[elt].Nota}</td>
	  <td>{$feed[elt].Justificativa}</td>
   </tr>
{/strip}
{/section}

</table>


      
{include file="footer.tpl"}

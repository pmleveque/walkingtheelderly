{include file="header.tpl"}

<form method="post" action="cadastrar_viagem_submit.php" accept-charset="utf-8"/>

<h1>Dados da viagem</h1>
<p>Digite os dados para o cadastro da viagem
</p>
<p>
	Data de Início dd.mm.aaaa: <input type="text" name="diainicio" SIZE="2"/> / <input type="text" name="mesinicio" SIZE="2" /> / <input type="text" name="anoinicio" SIZE="4" /><br /><br />
	Data Final dd.mm.aaaa: <input type="text" name="diafim" SIZE="2"/> / <input type="text" name="mesfim" SIZE="2" /> / <input type="text" name="anofim" SIZE="4" /><br /><br />
	Cidade: <input type="text" name="cidade"/>
	Estado: <select name="estado" size="1">
		<option value="AC">AC</option>
		<option value="AL">AL</option>
		<option value="AP">AP</option>
		<option value="AM">AM</option>
		<option value="BA">BA</option>
		<option value="CE">CE</option>
		<option value="DF">DF</option>
		<option value="GO">GO</option>
		<option value="ES">ES</option>
		<option value="MA">MA</option>
		<option value="MT">MT</option>
		<option value="MS">MS</option>
		<option value="MG">MG</option>
		<option value="PA">PA</option>
		<option value="PB">PB</option>
		<option value="PR">PR</option>
		<option value="PE">PE</option>
		<option value="PI">PI</option>
		<option value="RJ">RJ</option>
		<option value="RN">RN</option>
		<option value="RS">RS</option>
		<option value="RO">RO</option>
		<option value="RR">RR</option>
		<option value="SP">SP</option>
		<option value="SC">SC</option>
		<option value="SE">SE</option>
		<option value="TO">TO</option>
	</select>
</p>



<input type="submit" value="Cadastrar viagem" />
</form>



{include file="footer.tpl"}

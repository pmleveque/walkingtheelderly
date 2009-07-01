{include file="header.tpl"}

<form method="post" action="modificar_dados_submit.php" accept-charset="utf-8"/>

<h1>Dados do Responsável</h1>
<p>Atualize as informações do responsável
</p>
<p>
	Endereço: <input type="text" name="endereco"/> 
	Numero: <input type="text" name="num" SIZE="5"/><br /><br />
	Cidade: <input type="text" name="cidade" />
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
	Bairro: <input type="text" name="bairro" /><br /><br />
	Telefone*: <input type="text" name="telefone" />
	Fumo?:<select name="fumo" size="1">
		<option value="0">0</option>
		<option value="1">1</option>
	</select>
	Álcool?:<select name="alcool" size="1">
		<option value="0">0</option>
		<option value="1">1</option>
	</select><br /><br />
	Observacoes:<br /><textarea name="observacoes" rows="10" cols="40"></textarea>
</p>


<h1>Dados do Idoso</h1>
<p>Atualize as informações do seu idoso:</p>
<p>
	Endereço*: <input type="text" name="endereco2" />
	Numero*: <input type="text" name="num2" SIZE="5" /><br /><br />
	Cidade*: <input type="text" name="cidade2" />
	Estado*: <select name="estado2" size="1">
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
	Bairro: <input type="text" name="bairro2" /><br /><br />
	Telefone: <input type="text" name="telefone2" />
	Fumo?:<select name="fumo2" size="1">
		<option value="0">0</option>
		<option value="1">1</option>
	</select>
	Álcool?:<select name="alcool2" size="1">
		<option value="0">0</option>
		<option value="1">1</option>
	</select><br /><br />
	email: <input type="text" name="email2" SIZE="46"/><br /><br />
	medicamentos/observacoes:<br />
	<textarea name="observacoes2" rows="10" cols="40">
	</textarea><br /><br /><br /><br />
	<p align="center">
    
<input type="submit" value="Modificar"/>
<input type="button" value="Cancelar" onClick="window.location.href='index.php'"/>

</FORM>

{include file="footer.tpl"}

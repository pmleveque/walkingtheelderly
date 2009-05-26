{include file="../templates/header.tpl"}

<form action="bloquear.php" method="get" accept-charset="utf-8">
	<label for="">Digite o nome do usuário: </label><input type="text" name="pesquisa" value="" id="">
	
	<p><input type="submit" value="Procurar &rarr;"></p>
</form>

<form action="bloquear.php" method="get" accept-charset="utf-8">
	
	<!-- incluir aqui a listagem resultado da pesquisa -->
	
	<label for="bloquear_por">Bloquear por</label>
	
	<select name="bloquear_por" id="bloquear_por" multiple onchange="" size="1">
		<option value="7dias">7dias</option>
		<option value="15dias">15dias</option>
		<option value="30dias">30dias</option>
		<option value="sempre">sempre</option>
		
	</select>
	
	<p><input type="submit" value="Bloquear &rarr;"></p>
</form>


{include file="../templates/footer.tpl"}

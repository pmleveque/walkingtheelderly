{include file="header_admin.tpl"}

<form method="post" action="feedback.php" accept-charset="utf-8" />
	<p><label for="nota">Nota do feedback: </label><input type="text" name="nota_feed" value="0" id="nota_feed">
	
	<br /><br /><label for="justificativa">Justificativa:</label>
	<br /><textarea name="justificativa" id="justificativa" rows="10" cols="40"></textarea>
	

	<p><input type="submit" value="Enviar &rarr;"></p>
</form>
</p>

{include file="footer.tpl"}
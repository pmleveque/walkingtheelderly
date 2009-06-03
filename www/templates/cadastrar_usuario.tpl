{include file="header.tpl"}

<form method="post" action="cadastrar_usuario_submit.php" />

<h1>Login/senha</h1>
<p>Escolha um nome de usuário e uma senha para acessar o Walking the Elderly</p>
<p>	
	usuario: <input type="text" name="username" /><br /><br />
	senha: <input type="password" name="password" /><br /><br />
	email: <input type="text" name="email" /><br /><br />
</p>

<h1>Dados do Responsável</h1>
<p>Olá, bem-vindo ao Walking the Elderly. Por favor preencha as seguintes informações para que possamos 
conhecer um pouco sobre ti...
</p>
<p>
	nome: <input type="text" name="nome" /><br /><br />
	CPF: <input type="text" name="cpf" /><br /><br />
	RG: <input type="text" name="rg" /><br /><br />
	Endereço: <input type="text" name="endereco" /><br /><br />
	Numero: <input type="text" name="num" /><br /><br />
	Cidade: <input type="text" name="cidade" /><br /><br />
	Estado: <input type="text" name="estado" /><br /><br />
	Bairro: <input type="text" name="bairro" /><br /><br />
	Telefone: <input type="text" name="telefone" /><br /><br />
	Fumo?: <input type="text" name="fumo" /><br /><br />
	Álcool?: <input type="text" name="alcool" /><br /><br />
	Observações: <input type="text" name="observacoes" /><br /><br />
</p>


<h1>Dados do Idoso</h1>
<p>Preencha os dados do seu idoso para que possamos conhece-lo melhor:</p>
<p>
	nome: <input type="text" name="nome2" /><br /><br />
	CPF: <input type="text" name="cpf2" /><br /><br />
	RG: <input type="text" name="rg2" /><br /><br />
	Endereço: <input type="text" name="endereco2" /><br /><br />
	Numero: <input type="text" name="num2" /><br /><br />
	Cidade: <input type="text" name="cidade2" /><br /><br />
	Estado: <input type="text" name="estado2" /><br /><br />
	Bairro: <input type="text" name="bairro2" /><br /><br />
	Telefone: <input type="text" name="telefone2" /><br /><br />
	Fumo?: <input type="text" name="fumo2" /><br /><br />
	Álcool?: <input type="text" name="alcool2" /><br /><br />
	email: <input type="text" name="email2" /><br /><br />
	Observações: <input type="text" name="observacoes2" /><br /><br />
</p>


<input type="submit" value="Cadastrar-se" />
</form>


{include file="footer.tpl"}

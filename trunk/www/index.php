<?php

require 'db.php'; //manda a variavel $link
require 'class/smarty/Smarty.class.php';
require 'class/access.class.php';


$smarty = new Smarty;
$smarty->compile_check = true;
$smarty->debugging = true;


//Get page
if ( isset($_REQUEST['page'])){
    $page=$_REQUEST['page'];
}else{
    $page="index";
}






if ($page="cadastrar_usuario") {
    //TODO: nada aqui...
    //as modificações tem que ser feitas no arquivo tpl seguinte (é o proprio formulario)
    $smarty->assign("php_self", $_SERVER['PHP_SELF']);
    $smarty->display('cadastrar_usuario.tpl');




}else if ($page="cadastrar_usuario_submit") {
    //essa pagina recebe os resultados do formulario

    if (!empty($_POST['username'])){
        //Register user:

        $user = new flexibleAccess($link); // var $link definido no arquivo bd.php
        //The logic is simple. We need to provide an associative array, where keys are the field names and values are the values :)
        $data = array(
    'username' => $_POST['username'],
    'email' => $_POST['email'],
    'password' => $_POST['pwd'],
    'active' => 1
            //
            //adicionar os outros dados...
            //
        );
        $userID = $user->insertUser($data);//The method returns the userID of the new user or 0 if the user is not added
        if ($userID==0)
        echo 'User not registered';//user is already registered or something like that
        else
        echo 'User registered with user id '.$userID;
    }


    //essa função seguinte faz a redireição (desativar para fazer testes)
    //header('Location: http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);




}else{
    //Inicialização do usuario
    //()
    //(verifica se o usuario é logado)
    $user = new flexibleAccess($link); // var $link definido no arquivo bd.php
    if ( $_GET['logout'] == 1 )
    $user->logout('http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);
    if ( !$user->is_loaded() )
    {
        //Login stuff:
        if ( isset($_POST['uname']) && isset($_POST['pwd'])){
            if ( !$user->login($_POST['uname'],$_POST['pwd'],$_POST['remember'] )){//Mention that we don't have to use addslashes as the class do the job
                echo 'Wrong username and/or password';
            }else{
                //user is now loaded
                //essa função seguinte faz a redireição
                header('Location: http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);
            }
        }

        $smarty->assign("php_self", $_SERVER['PHP_SELF']);
        $smarty->display('login.tpl');




    }else{
        // neste caso, o usuario é logado...


        if ($page="index") {

            //essa pagina contem a listagem dos idosos a cuidar e dos acompanhantes do seu idoso



            $smarty->assign("acompanhantes", $listagem_acompanhantes);
            $smarty->assign("idosos", $listagem_idosos);
            $smarty->display('index.tpl');








        }else if ($page="cadastrar_viagem") {
            //TODO: nada aqui...
            //as modificações tem que ser feitas no arquivo tpl seguinte (é o proprio formulario)
            $smarty->display('cadastrar_viagem.tpl');


        }else if ($page="cadastrar_viagem_submit") {
            //essa pagina recebe os resultados do formulario

            //TODO:
            //fazer o request das variaveis do formulario
            //implementar o cadastramento
            //fazer um redirect para a pagina inicial

        }


    }
}






//exemplos de smarty
$smarty->assign("Name","Fred Irving Johnathan Bradley Peppergill");
$smarty->assign("FirstName",array("John","Mary","James","Henry"));
$smarty->assign("LastName",array("Doe","Smith","Johnson","Case"));
$smarty->assign("Class",array(array("A","B","C","D"), array("E", "F", "G", "H"),
        array("I", "J", "K", "L"), array("M", "N", "O", "P")));

$smarty->assign("contacts", array(array("phone" => "1", "fax" => "2", "cell" => "3"),
        array("phone" => "555-4444", "fax" => "555-3333", "cell" => "760-1234")));

$smarty->assign("option_values", array("NY","NE","KS","IA","OK","TX"));
$smarty->assign("option_output", array("New York","Nebraska","Kansas","Iowa","Oklahoma","Texas"));

//fim dos exemplos


?>

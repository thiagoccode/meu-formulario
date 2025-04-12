<?php
$servidor = "localhost"; //nome do servidor
$usuario = "root"; //nome do usuario padrão do mysql
$senha = ""; //a senha é facultativa
$banco = "atividade"; //nome do banco de dados

$conexao = new mysqli($servidor, $usuario, $senha, $banco); //abrinco conexão com o BD

if($conexao->connect_error){
    die("Falha: ".$conexao->connect_error);
}
//echo "conexão feita co sucesso";
//tentando se a conexão foi feita ou se falhou(da linha 9 a 12)

//parte do codigo que vai receber e trabalhar com os dados inserios no FORMULÁRIO

$nome = $_POST['nome'];
$email = $_POST['email'];
//INSERINDO OS DADOS RECEBIDOS DO FORMULARIO NO BACO DE DADOS

$sql = "INSERT INTO tabelaatv(nome, email) values('$nome', '$email')";

//testanto se os dados foram inseridos no BD
if($conexao->query($sql)=== true){
    //echo 'Inserido com sucesso';
    header("Location: index.html");
    exit;
}else{
    echo 'Erro: ' . $conexao->error;
}


$conexao->close();//fechando a conexão que foi aberta no inicio(linha 7)


?>
<?php
/*
$img = isset($_POST['arquivo']) ? $_POST['arquivo'] : "erro";
print_r($img);
*/

if (isset($_POST['formulario'])){
    $formatos = array("png", "jpeg", "jpg", "gif", "PNG", "JPEG", "JPG");
    $quantidade = count($_FILES['arquivo']['name']);
    $contador = 0;

while ($contador < $quantidade) {

$extensao = pathinfo($_FILES['arquivo']['name'][$contador], PATHINFO_EXTENSION);//mostra a extensao do arquivo

  if (in_array($extensao, $formatos)) {
    $pasta = "arquivos/";

    $temporario = $_FILES['arquivo']['tmp_name'][$contador];
    $novoNome = uniqid().".$extensao";

  if (move_uploaded_file($temporario, $pasta.$novoNome)) { //realiza o upload para a pasta
    $mensagem = "Upload feito com sucesso!";

  }
}
  else {
    $mensagem = "Erro, não foi possivel fazer Upload";
    echo "$mensagem";
  }
  $contador++;
}}

header("Location: index.html");
  ?>

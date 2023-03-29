<?php
if (isset($_FILES['file'])) {
  $target_dir = "./uploadteste/";
  $target_file = $target_dir . basename($_FILES['file']['name']);
  if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
    echo "Arquivo enviado com sucesso.";
  } else {
    echo "Ocorreu um erro ao enviar o arquivo.";
  }
}
?>
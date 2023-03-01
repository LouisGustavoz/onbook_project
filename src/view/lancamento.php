<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LANÇAMENTOS | ONBOOK | A sua biblioteca digital</title>
  <link rel="stylesheet" href="../../style.css">
</head>
<body>
<header>
        <nav>
            <!--Logo do site-->
               
            <img src="../../assets/logo.svg" class="logo" >

            <ul class="nav-links">
                <li><a href="./lancamento.php">Lançamentos</a></dli>
                <li><a href="./categorias.php">Categorias</a></dli>
                <li><a href="./sobre.php">Sobre nós</a></dli>
                <li><a href="./upload_eb.php">Upload</a></dli>
            </ul>
        </nav>
        <!-- Barra de pesquisas -->

</body>
</html>


<?php
    require_once "../controller/connect_db.php";

    
    $sql = "SELECT * FROM livros ORDER BY reg_date DESC LIMIT 5";
    $result = mysqli_query($conn, $sql);
    
    // Exiba a lista de livros adicionados recentemente
    echo "<h3 class='add'>Adicionados recentemente</h3>";
    echo "<table><tr><th>Nome</th><th>Autor</th><th>PDF</th></tr>";
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
      $nome = $row['nome'];
      $autor = $row['autor'];
      $pdf = $row['pdf'];
      echo "<tr><td>" . $row["nome"]. "</td><td>" . $row["autor"]. "</td><td><a href='../../pdfs/".$row['pdf']."'>Download</a></td></tr>";
    }
    echo "</ul>";
?>
      
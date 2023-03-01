<?php
require_once'./connect_db.php';

$search_query = $_POST['search'];


// Execute a consulta de pesquisa no banco de dados
$sql = "SELECT * FROM livros WHERE nome LIKE '%$search_query%' OR autor LIKE '%$search_query%' OR pdf LIKE '%$search_query%'";
$result = mysqli_query($conn, $sql);

// Exiba os resultados da pesquisa na tela
if ($result->num_rows > 0) {
  echo "<h2>Resultados da pesquisa para '$search_query':</h2>";
  echo "<ul>";
  while ($row = $result->fetch_assoc()) {
    $nome = $row['nome'];
    $autor = $row['autor'];
    $pdf = $row['pdf'];
    echo "<tr><td>" . $row["nome"]. "</td><td>" . $row["autor"]. "</td><td><a href='../../pdfs/".$row['pdf']."'>Download</a></td></tr>";
  }
  echo "</ul>";
} else {
  echo "<h2>Nenhum resultado encontrado para '$search_query'.</h2>";
}
?>
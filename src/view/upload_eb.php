<?php
session_start();
require_once"../controller/connect_db.php";

// Verificar se o formulário foi enviado
if(isset($_POST['submit'])){
    $nome = $_POST['nome'];
    $autor = $_POST['autor'];
    // Obter arquivo enviado
    $pdf = $_FILES['pdf']['name'];
    $pdf_tmp = $_FILES['pdf']['tmp_name'];

    // Mover arquivo para pasta de destino
    move_uploaded_file($pdf_tmp,"../../pdfs/$pdf");

    // Inserir dados na tabela
    $ser = "SELECT * FROM livros WHERE nome LIKE '%$nome%' OR autor LIKE '%$autor%' OR pdf LIKE '%$pdf%'";
    $req = mysqli_query($conn, $ser);
    $sql = "INSERT INTO livros (nome, autor, pdf, reg_date)
    VALUES ('$nome', '$autor', '$pdf', NOW())";
    if($req->num_rows == 0) {
        if (mysqli_query($conn, $sql)) {
            echo "Livro adicionado com sucesso";
        } else {
            echo "Erro ao adicionar livro: " . mysqli_error($conn);
        }
    } else {
    }
}

// Selecionar todos os livros da tabela
$sql = "SELECT * FROM livros";
$result = mysqli_query($conn, $sql);
// Exibir livros
if (mysqli_num_rows($result) > 0) {
        echo "<table><tr><th>Nome</th><th>Autor</th><th>PDF</th></tr>";
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row["nome"]. "</td><td>" . $row["autor"]. "</td><td><a href='../../pdfs/".$row['pdf']."'>Download</a></td></tr>";
        }
        echo "</table>";
    
} else {
    echo "Nenhum livro encontrado.";
}

// Fechar conexão
maysqli_close($conn);
?>

<!-- Formulário para adicionar livros -->
<form action="" method="post" enctype="multipart/form-data">
    Nome do livro: <input type="text" name="nome" ><br>
    Autor: <input type="text" name="autor"><br>
    PDF: <input type="file" name="pdf" accept=".pdf"><br>
    <input type="submit" name="submit" value="Adicionar livro">
</form>

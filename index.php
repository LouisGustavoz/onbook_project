<?php
    session_start();
    require_once "./src/controller/connect_db.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONBOOK | A sua biblioteca digital</title>
    <link rel="stylesheet" href="./assets/bootstrap-5.2.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="./style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>
<body>
    <header>
        <nav>
            <!--Logo do site-->
               
            <img src="./assets/logo.png" class="logo" >

            <ul class="nav-links">
                <li><a href="./src/view/lancamento.php">Lançamentos</a></dli>
                <li><a href="./src/view/categorias.php">Categorias</a></dli>
                <li><a href="./src/view/sobre.php">Sobre nós</a></dli>
                <li><a href="./src/view/upload_eb.php">Upload</a></dli>
            </ul>
        </nav>
        
        <!-- Barra de pesquisas -->

        <div class="search">
            <h1>Busque por livros</h1>
                <form action="./src/controller/search.php" method="post">
                    <input type="text" name="search" id="search" placeholder="&#x270e;  Buscar livros">
                    <button type="submit">Buscar</button>
                </form>          
            </div>
    </header>

        <!-- Slide de livros -->
    <?php
        $recent_books = array();
        $result = $conn->query("SELECT * FROM livros ORDER BY reg_date DESC LIMIT 5");

        // Armazene os resultados em um array
        while ($row = $result->fetch_assoc()) {
        $recent_books[] = $row;
        }
    ?>
    <div class="carousel">
    <div class="carousel-inner">
        <?php foreach ($recent_books as $book): ?>
            <div class="carousel-item">
                <h5><?php echo $book['nome']; ?></h5>
                <p><?php echo $book['autor']; ?></p>
                <a href="./pdfs/<?php echo $book['pdf']; ?>" class="btn btn-primary">Baixar</a>
            </div>
        <?php endforeach; ?>
    </div>
</div>



<script src="./assets/bootstrap-5.2.3-dist/js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>
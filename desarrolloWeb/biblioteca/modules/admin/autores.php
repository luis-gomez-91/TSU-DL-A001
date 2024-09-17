<?php 
    session_start();
    include ("../../conexion.php");

    if($_POST) {

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <nav>
            <img src="../../img/logo.png" alt="logo" id="logo-nav">
            <div id="link-nav-container">
                <a href="home.php" class="link-nav">Home</a>
                <a href="categorias.php" class="link-nav">Categorias</a>
                <a href="autores.php" class="link-nav">Autores</a>
                <a href="" class="link-nav"><?php echo $_SESSION['user']['usuario'] ?></a>
            </div>
        </nav>
    </header>

    <h1>AUTORES</h1>
    

    <footer>

    </footer>

    
</body>
</html>
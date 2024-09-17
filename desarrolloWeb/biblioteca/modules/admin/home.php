<?php 
    session_start();
    include ("../../conexion.php");

    if($_POST) {
        if ($_POST['action']) {
            $action = $_POST['action'];

            if ($action == 'add') {
                $titulo = $_POST['titulo'];
                $autor = $_POST['autor'];
                $categoria = $_POST['categoria'];
                $stock = $_POST['stock'];

                $sql = "insert into libro(titulo, autor_id, categoria_id, stock) values('$titulo', $autor, $categoria, $stock)";
                $insert = $conexion->query($sql);
                if ($insert) {
                    echo "Libro guardado";
                } else {
                    echo "Ocurrio un error inesperado";
                }
            }

            if ($action == 'delete') {
                $idLibro = $_POST['idLibro'];
                $sql = "delete from libro where id = $idLibro";
                $delete = $conexion->query($sql);
            }

            if ($action == 'update') {
                echo 'EDITAR 1';
                $titulo = $_POST['titulo'];
                $autor = $_POST['autor'];
                $categoria = $_POST['categoria'];
                $stock = $_POST['stock'];
                $idLibro = $_POST['idLibro'];

                $sql = "update libro set titulo='$titulo', autor_id = $autor, categoria_id = $categoria, stock = $stock where id = $idLibro";
                $update = $conexion->query($sql);

                echo 'EDITAR 2';

            }
        }
        
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
    <script src="../../js/admin/home.js"></script>
</head>
<body>
    <header>
        <nav>
            <img src="../../img/logo.png" alt="logo" id="logo-nav">
            <div id="link-nav-container">
                <a href="" class="link-nav">Home</a>
                <a href="categorias.php" class="link-nav">Categorias</a>
                <a href="autores.php" class="link-nav">Autores</a>
                <a href="" class="link-nav"><?php echo $_SESSION['user']['usuario'] ?></a>
            </div>
        </nav>
    </header>

    <main class="container mt-5">
        <div class="row text-end">
            <div class="col">
                <!-- Button trigger modal -->
                <button type="button" onclick="addLibro()" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formularioLibroModal">
                Adicionar libro
                </button>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <table class="table">
                    <tr>
                        <th>Id</th>
                        <th>Titulo</th>
                        <th>Autor</th>
                        <th>Categoria</th>
                        <th>Stock</th>
                        <th>Imagen</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                    <?php
                        $sql = "select 
                                    libro.*,
                                    autor.nombre as n_autor,
                                    categoria.nombre as n_categoria
                                from libro, autor, categoria
                                where libro.autor_id = autor.id
                                and libro.categoria_id = categoria.id;";
                        
                        if($result = $conexion ->query($sql)) {
                            while ($row = $result->fetch_assoc()) {
                                $id = $row['id'];
                                $titulo = $row['titulo'];
                                $autor = $row['n_autor'];
                                $categoria = $row['n_categoria'];
                                $imagen = $row['imagen'];
                                $stock = $row['stock'];
                                $idAutor = $row['autor_id'];
                                $idCategoria = $row['categoria_id'];
                            ?>

                                <tr>
                                    <td><?php echo $id; ?></td>
                                    <td><?php echo $titulo; ?></td>
                                    <td><?php echo $autor; ?></td>
                                    <td><?php echo $categoria; ?></td>
                                    <td><?php echo $stock; ?></td>
                                    <td><?php echo $imagen; ?></td>
                                    <td class="text-center" style="display:flex; gap:10px; justify-content: center;">
                                        <button 
                                            type="submit" 
                                            class="btn btn-warning" 
                                            onclick="editarLibro(
                                                '<?php echo $titulo; ?>',
                                                '<?php echo $idAutor; ?>',
                                                '<?php echo $idCategoria; ?>',
                                                '<?php echo $stock; ?>',
                                                '<?php echo $id; ?>'

                                            )"
                                        >
                                            Editar
                                        </button>

                                        <form action="home.php" method="POST">
                                            <input type="text" name="action" value="delete" hidden>
                                            <input type="number" name="idLibro" value="<?php echo $id; ?>" hidden>
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form>
                                        
                                    </td>
                                </tr>

                            <?php
                            }
                        }
                    ?>
                    
                </table>
            </div>
        </div>
    </main>

    <footer>

    </footer>

    <!-- Modal -->
    <div class="modal fade" id="formularioLibroModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar Libro</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>


            <form action="home.php" method="POST" enctype="multipart/form-data">
                <input type="text" name="action" value="add" id="txtAccion" hidden>
                <input type="number" name="idLibro" value="" id="txt-id" hidden>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="txt-titulo" class="form-label">Titulo</label>
                            <input type="text" class="form-control" id="txt-titulo" name="titulo">
                        </div>
                    </div>

                    <div class="row">
                        <!-- Autores -->
                        <div class="col-6 mb-3">
                            <label for="slct-autor" class="form-label">Autor</label>
                            <select name="autor" id="slct-autor" class="form-control">
                                <option value="0">---</option>
                                <?php 
                                    $sql = "select * from autor;";
                                    if($result = $conexion ->query($sql)) {
                                        while ($row = $result->fetch_assoc()) {
                                            $id = $row['id'];
                                            $nombre = $row['nombre'];
                                            ?>
                                            <option value="<?php echo $id; ?>"><?php echo $nombre; ?></option>
                                            <?php
                                        }
                                    }
                                ?>
                                
                            </select>
                        </div>

                        <!-- Categorias -->
                        <div class="col-6 mb-3">
                            <label for="slct-categoria" class="form-label">Categoria</label>
                            <select name="categoria" id="slct-categoria" class="form-control">
                                <option value="0">---</option>
                                <?php 
                                    $sql = "select * from categoria;";
                                    if($result = $conexion ->query($sql)) {
                                        while ($row = $result->fetch_assoc()) {
                                            $id = $row['id'];
                                            $nombre = $row['nombre'];
                                            ?>
                                            <option value="<?php echo $id; ?>"><?php echo $nombre; ?></option>
                                            <?php
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="imagen" class="form-label">Imagen</label>
                            <input type="file" id="imagen" name="imagen" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4 mb-3">
                            <label for="txt-stock" class="form-label">Stock</label>
                            <input type="number" id="txt-stock" name="stock" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</body>
</html>
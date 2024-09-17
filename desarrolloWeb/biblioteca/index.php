<?php 
    include ("conexion.php");
    
    // Colacar si se usa o se declaran variables de sesion
    session_start();

    if($_POST) {
        $user = $_POST['usuario'];
        $pass = $_POST['clave'];

        $sql = "select * from usuario where usuario='$user' and clave='$pass';";
        $result = mysqli_query($conexion, $sql);
        $array = mysqli_fetch_array($result);

        if($array) {
            $_SESSION['user'] = $array;

            if($array['es_admin'] == 1) {
                header("Location: modules/admin/home.php");
            } else {
                header("Location: modules/user/home.php");
            }
            
        } else {
            echo "Credenciales incorrectas \n";
        }
        

    } else {
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="icomoon/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        #img-login {
            background: url('img/login-wallpaper.jpg');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body>
    <div class="container shadow mt-5 rounded">
        <div class="row">
            <!-- Imagen -->
            <div class="col-7 d-none d-md-block rounded-start" id="img-login">
            </div>

            <!-- Formulario -->
            <div class="col-12 col-md-5 p-5 rounded-end">
                <div class="bg-dark rounded text-end p-1">
                    <img src="img/logo.png" height="50" alt="">
                </div>

                <h2 class="mt-3 text-center">Bienvenido</h2>
                <form action="" method="POST">
                    <div class="my-3">
                        <label for="" class="form-label">Usuario</label>
                        <input type="text" class="form-control" name="usuario">
                    </div>

                    <div class="my-3">
                        <label for="" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" name="clave">
                    </div>

                    <button type="submit" class="btn btn-primary" style="width:100%">Ingresar</button>
                </form>

                <div class="mt-5">
                    <p class="m-0">No tienes cuenta? <a href="#">Registrate</a></p>
                    <a href="#" class="m-0">Recuperar contraseña</a>
                </div>

                <div class="row mt-5">
                    <div class="col-6">
                        <a href="" class="btn btn-outline-primary w-100">Facebook</a>
                    </div>
                    <div class="col-6">
                        <a href="" class="btn btn-outline-danger w-100">Instagram</a>
                    </div>
                </div>

            </div>

            

        </div>

    </div>
</body>
</html>
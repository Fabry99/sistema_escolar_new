<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centro Escolar Santa Teresita</title>
    <link rel="stylesheet" href="./css/style1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


</head>

<body style="background-color: #f2f2f2;">
    <div class="header p-4" style="background: #066BBB;"></div>
    <div class="d-flex justify-content-center align-items-center my-5">

        <div id="container" class="container" style="border-radius: 20px; width: 65%;">
            <div id="datos" class="row">
                <div class="col px-0 bg d-flex">
                    <img class="img-fluid ms-4" src="img/santa-teresita-removebg-preview.png" alt="logoPrin">
                </div>
                <div class="col-sm px-5  pb-5">
                    <div class="text-end ">
                        <img class="rounded-circle m-2" src="img/santa-teresita-removebg-preview.png" alt="logo" width="48">
                    </div>
                    <h1 class="fw-bold text-center pt-2 mb-4">
                        Bienvenido
                    </h1>
                    <form method="POST" action="validacion_login.php">
                        <div class="mb-4">
                            <label for="correo" class="form-label fs-4"> Correo</label>
                            <input type="text" class="form-control" name="correo" id="correo" placeholder="Usuario" required>
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label fs-4"> Contraseña</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="contraseña" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary" name="btn_iniciar">Iniciar Sesión</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <div class="footer p-4" style="background: #066BBB; position: absolute; bottom: 0; width: 100%;"></div>


        <!-- <body id="body" class="d-flex justify-content-center align-items-center vh-100"> -->





        <!-- <div id="container" class="container w-75" style="border-radius: 20px;">
        <div id="datos" class="row">
            <div class="col px-0 bg d-flex">
                <img class="img-fluid" src="images/santa-teresita.jpg" alt="logoPrin">
            </div>
            <div class="col-sm px-5 ">
                <div class="text-end ">
                    <img class="rounded-circle m-2" src="images/Santa-teresita.jpg" alt="logo" width="48">
                </div>
                <h1 class="fw-bold text-center pt-2 mb-4">
                    Bienvenido
                </h1>
                <form method="POST" action="validacion_login.php">
                    <div class="mb-4">
                        <label for="correo" class="form-label fs-4"> Correo</label>
                        <input type="text" class="form-control" name="correo" id="correo" placeholder="Usuario" required>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label fs-4"> Contraseña</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="contraseña" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary" name="btn_iniciar">Iniciar Sesión</button>
                    </div>
                </form>
            </div>
        </div>
    </div> -->


</body>

</html>
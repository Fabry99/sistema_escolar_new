<?php
include "../includes/header.php";

?>

<style>
    .small-image {
    width: 50px; /* Ajusta el tamaño de la imagen según tus necesidades */
    float: right; /* Hace que la imagen se ubique a la derecha del texto */
    margin-left: 10px; /* Agrega un espacio entre el texto y la imagen */
}

</style>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class=" mb-4">


    </div>

    <!-- Content Row -->
    <div class="row d-flex flex-row">
        <!-- Earnings (Monthly) Card Example -->
        <a href="./materias.php" class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Materias</div>
                        </div>
                        <div class="col-auto">
                            <img src="../../img/materias.png" alt="Descripción de la imagen" class="small-image">
                        </div>
                    </div>
                </div>
            </div>
        </a>



        <a href="./alumnos.php" class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Alumnos</div>
                        </div>
                        <div class="col-auto">
                        <img src="../../img/alumnos.png" alt="Descripción de la imagen" class="small-image">
                        </div>
                    </div>
                </div>
            </div>
        </a>


        <a href="./profesores.php" class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Profesores</div>
                        </div>
                        <div class="col-auto">
                        <img src="../../img/profesores.png" alt="Descripción de la imagen" class="small-image">
                        </div>
                    </div>
                </div>
            </div>
        </a>

        <a href="./grados.php" class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Grados</div>
                        </div>
                        <div class="col-auto">
                        <img src="../../img/escuela.png" alt="Descripción de la imagen" class="small-image">
                        </div>
                    </div>
                </div>
            </div>
        </a>


    </div>

</div>
</div>

<!-- End of Main Content -->
<?php include "../includes/footer.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-c9eh+N37ea4YU27lK0ZxFRaFqgmrJ3hH6eZE5+1BvabDyIuAc5pysObkpluCNCI6" crossorigin="anonymous">
    <title>Menú Ganado</title>
</head>
<body>
<?php
include("includes/header.php");

?>


<div class="container mt-4 text-center">
    <div class="row">
        <div class="col-md-12">
            <div class="btn-container">
                <a href="mostrarlotes.php" class="btn btn-lg btn-secondary btn-white-border">
                    <img src="../images/lotes.jpg" alt="Lotes" class="img-fluid rounded">
                </a>
                <div class="btn-name">Mostrar Lotes</div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4 text-center">
    <div class="row">
        <div class="col-md-6">
            <div class="btn-container">
                <a href="comprarlote.php" class="btn btn-sm btn-secondary btn-white-border">
                    <img src="images/comprar.jpg" alt="Comprar Lote" class="img-fluid rounded">
                </a>
                <div class="btn-name">Comprar Lote</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="btn-container">
                <a href="vender.php" class="btn btn-sm btn-secondary btn-white-border">
                    <img src="images/vender.png" alt="Vender Lote" class="img-fluid rounded">
                </a>
                <div class="btn-name">Vender Lote</div>
            </div>
        </div>
    </div>
</div>

<style>
    .btn-white-border {
        background-color: #ffffff; /* Fondo blanco */
        border: 2px solid #6c757d; /* Borde gris */
        max-width: 200px; /* Ancho máximo */
        margin: 0 auto; /* Centrar */
    }

    .btn-container {
        margin-bottom: 15px;
    }

    .btn-name {
        margin-top: 5px;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-Y7xk1Bjc8F9zJxKtJcC5EPsbFVf0jcZ5z5nFf5r5l5uue6bF5f5u5z5z5z5z5z5z5z" crossorigin="anonymous"></script>
</body>
</html>

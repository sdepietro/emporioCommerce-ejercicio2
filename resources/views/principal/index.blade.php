<?php $base_url = url('/') ?>

<head>
    <title>Ejercicio 2</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{$base_url}}/css/style.css">

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">


</head>


<body>

<div class='container'>
    <form class='search-form' action="search" method="get">
        <div class='row'>
            <div class='col-md-12'>
                <h1>Buscador de Mercadolibre</h1>
                <p class='lead'>Un simple buscador de Mercadolibre.</p>
            </div>

            <div class='col-md-12'>
                <div class='search-box'>
                    <input class='form-control' name="q" placeholder='Ingrese un producto' type='text'>
                    <button class='btn btn-link search-btn'>
                        <i class='glyphicon glyphicon-search'></i>
                    </button>
                </div>
            </div>
        </div>
    </form>

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


</body>


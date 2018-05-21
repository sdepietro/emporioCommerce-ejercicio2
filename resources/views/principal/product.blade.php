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
    <form class='search-form' action="{{$base_url}}/search" method="get">
        <div class='row'>
            <div class='col-md-6'>
                <h1>Buscador de Mercadolibre</h1>
                <p class='lead'>Un simple buscador de Mercadolibre.</p>
            </div>

            <div class='col-md-6'>
                <div class='search-box'>
                    <input class='form-control' name="q" placeholder='Ingrese un producto' type='text'>
                    <button class='btn btn-link search-btn'>
                        <i class='glyphicon glyphicon-search'></i>
                    </button>
                </div>
            </div>
        </div>
        <div class='row'>
            <div class='col-md-4'>


                <section class="carousel-fixed-height">
                    <div id="carousel-default2" class="carousel slide" data-ride="carousel">

                        <ol class="carousel-indicators">
                            @foreach($product->pictures as $k => $picture)
                                <li data-target="#carousel-default2" data-slide-to="{{$k}}" class="{{$k ===0 ? "active":""}}"></li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <!-- NOTE: Bootstrap v4 changes class name to carousel-item -->
                            @foreach($product->pictures as $k => $picture)
                                <div class="item {{$k ===0 ? "active":""}}">
                                    <div style="background:url({{$picture->url}}) center center; background-size:cover;" class="slider-size"></div>
                                </div>
                            @endforeach
                        </div>
                        <a class="left carousel-control" href="#carousel-default2" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-default2" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </section>
            </div>
            <div class='col-md-8'>
                <h3>{{$product->title}}</h3>
                <h1>${{$product->price}}</h1>
                <hr>
                {!! nl2br(e($product->description)) !!}}
            </div>
        </div>
    </form>
</div>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


</body>


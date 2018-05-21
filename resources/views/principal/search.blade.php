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
            <div class='col-md-3'>
                <h5>Filtros</h5>
                @foreach($usedFilters as $uf)
                    <span class="tag label label-info">
                      <span>{{$uf['name']}}: {{$uf['value']}}</span>
                      <a href="{{$base_url}}/search/{{$querySearch}}&remove_filter={{$uf['id']}}"><i class="remove glyphicon glyphicon-remove-sign glyphicon-white"></i></a>
                    </span><br>
                @endforeach

                <hr>
                <div id="accordion" class="panel-group">
                    @foreach($filters as $filter)
                        <div class="panel">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="#panel_{{$filter->id}}" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion">{{$filter->name}}</a>
                                </h4>
                            </div>
                            <div id="panel_{{$filter->id}}" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        @foreach($filter->values as $value)
                                            <li><a href="{{$base_url}}/search/{{$querySearch}}&{{$filter->id}}={{$value->id}}">{{$value->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


            </div>
            <div class='col-md-9'>
                <h5>Listado de productos</h5>
                <div id="products" class="wrapper row">
                    @foreach($items as $item)
                        <div class="col-xs-12 col-sm-4">
                            <div class="card">
                                <a class="img-card" href="{{$base_url}}/product/{{$item->id}}">
                                    <img src="{{$item->thumbnail}}"/>
                                </a>
                                <div class="card-content">
                                    <h4 class="card-title">
                                        <a href="{{$base_url}}/product/{{$item->id}}"> {{$item->title}}
                                        </a>
                                    </h4>
                                    <p class="">
                                        Precio: {{$item->price}}
                                    </p>
                                </div>
                                <div class="card-read-more">
                                    <a href="{{$base_url}}/product/{{$item->id}}" class="btn btn-link btn-block">
                                        Ver Producto
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </form>

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


</body>


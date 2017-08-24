@extends('backpack::layout')

@section('header')
    {{--<section class="content-header">--}}
    {{--<ol class="breadcrumb">--}}
    {{--<li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>--}}
    {{--<li class="active">{{ trans('backpack::base.dashboard') }}</li>--}}
    {{--</ol>--}}
    {{--</section>--}}
@endsection


@section('content')
    <h1>Procure por Livros</h1>
    <div class="row">

        <form action="/buscarLivro" method="get">
            <div class="form-group col-lg-12">
                <div class="input-group">
                    <input type="text" name="s" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit">Buscar!</button>
                    </span>
                </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
        </form>
    </div>

    @if(isset($_GET['s']))
        <h3>Você está pesquisando por: {{ $_GET['s'] }}</h3>
    @endif


    <div class="row">
        @if(isset($livros))
            @foreach($livros as $livro)
                <div class="col-lg-3">
                    <div class="thumbnail">
                        <img src="http://3.bp.blogspot.com/_k4DgxQsoKuo/TGsRZIJJapI/AAAAAAAAACE/hH4NlEdJ81g/s1600/livros2.gif" alt="...">
                        <div class="caption">
                            <h3>{{ $livro->titulo }}</h3>
                            <p>Assunto: {{ $livro->assunto }}</p>
                            <p>Editora: {{ $livro->editora }}</p>
                            <p><a href="{{ route('crud.livro.show', $livro->id) }}" class="btn btn-primary" role="button">Visualizar</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

    </div>
@endsection

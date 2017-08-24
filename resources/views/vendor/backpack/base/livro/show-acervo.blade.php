@extends('backpack::layout')

@section('content-header')
    <section class="content-header">
        <h1>
            {{ trans('backpack::crud.preview') }} <span>{{ $crud->entity_name }}</span>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url(config('backpack.base.route_prefix'), 'dashboard') }}">{{ trans('backpack::crud.admin') }}</a></li>
            <li><a href="{{ url($crud->route) }}" class="text-capitalize">{{ $crud->entity_name_plural }}</a></li>
            <li class="active">{{ trans('backpack::crud.preview') }}</li>
        </ol>
    </section>
@endsection

@section('content')
    @if ($crud->hasAccess('list'))
        <a href="{{ url($crud->route) }}"><i class="fa fa-angle-double-left"></i> {{ trans('backpack::crud.back_to_all') }} <span>{{ $crud->entity_name_plural }}</span></a><br><br>
    @endif

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">
                Livros no acervo
            </h3>
            @foreach($entries->chunk(4) as $chunk)
                <div class="row">
                    @foreach($chunk as $livro)
                        <div class="col-lg-3">
                            <div class="thumbnail">
                                <img src="http://3.bp.blogspot.com/_k4DgxQsoKuo/TGsRZIJJapI/AAAAAAAAACE/hH4NlEdJ81g/s1600/livros2.gif" alt="...">
                                <div class="caption">
                                    <h3>{{ $livro->livro->titulo }}</h3>
                                    <p>Assunto: {{ $livro->livro->assunto }}</p>
                                    <p>Editora: {{ $livro->livro->editora }}</p>
                                    <p>
                                        <a href="{{ route('crud.livro.show', $livro->livro->id) }}" class="btn btn-primary" role="button">Visualizar</a>
                                    @if(\Illuminate\Support\Facades\Auth::user()->livrosLidos->where('livro_id',$livro->livro->id)->first() != null)
                                        <form action="{{ route('crud.livro-lido.destroy', $livro->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <input type="submit" class="btn btn-danger" value="Remover do acervo">
                                        </form>
                                        @endif
                                        </p>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach

        </div>
        <div class="box-body">

        </div><!-- /.box-body -->
    </div><!-- /.box -->

@endsection


@section('after_styles')
    <link rel="stylesheet" href="{{ asset('vendor/backpack/crud/css/crud.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/backpack/crud/css/show.css') }}">
@endsection

@section('after_scripts')
    <script src="{{ asset('vendor/backpack/crud/js/crud.js') }}"></script>
    <script src="{{ asset('vendor/backpack/crud/js/show.js') }}"></script>
@endsection
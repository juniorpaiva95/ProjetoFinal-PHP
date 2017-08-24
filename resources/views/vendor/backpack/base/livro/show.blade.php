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
                {{ trans('backpack::crud.preview') }}
                <span>{{ $crud->entity_name }}</span>
            </h3>
        </div>
        <div class="box-body">
            <h1>{{ $entry->titulo  }}</h1>
            <div class="row">
                <div class="col-xs-6 col-md-3">
                    <a href="#" class="thumbnail">
                        <img src="http://3.bp.blogspot.com/_k4DgxQsoKuo/TGsRZIJJapI/AAAAAAAAACE/hH4NlEdJ81g/s1600/livros2.gif" alt="...">
                    </a>
                </div>

                <div class="form-group col-lg-3">
                    <label for="">Editora</label>
                    <input class="form-control" type="text" value="{{ $entry->editora }}" readonly>
                </div>
                <div class="form-group col-lg-3">
                    <label for="">ISBN</label>
                    <input class="form-control" type="text" value="{{ $entry->isbn }}" readonly>
                </div>

                <div class="form-group col-lg-3">
                    <label for="">Assunto</label>
                    <input class="form-control" type="text" value="{{ $entry->assunto }}" readonly>
                </div>
                <div class="form-group col-lg-3">
                    <label for="">Ano</label>
                    <input class="form-control" type="text" value="{{ $entry->ano }}" readonly>
                </div>
                <div class="form-group col-lg-3">
                    <label for="">Paginas</label>
                    <input class="form-control" type="text" value="{{ $entry->paginas }}" readonly>
                </div>
                <div class="form-group col-lg-3">
                    <label for="">Data de Cadastro</label>
                    <input class="form-control" type="text" value="{{ $entry->created_at }}" readonly>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-12">
                    <h3>Comentários ({{$entry->comments->count()}})</h3>

                </div>
                <div class="form-group col-lg-12">
                    <ul>
                    @foreach($entry->comments as $comment)
                        {{ $comment->texto  }} - {{ $comment->created_at }}
                            <br>
                        <small>{{ $comment->autor->name }}</small>
                    @endforeach
                    </ul>
                </div>
            </div>

            <div class="row">
                <form action="{{ route('crud.comentario.store')  }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="livro_id" value="{{ $entry->id }}">
                    <div class="form-group col-lg-12">
                        <textarea name="texto" class="form-control" id="" cols="20" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary">
                                Comentar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
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
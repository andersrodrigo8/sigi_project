@extends('layouts.app')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto bg-white col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Editar Compromisso</h1>
        </div>

        <div class="card-body">
            <form action="{{ route('dashboard.schedules.update', $schedule) }}" method="post">
            @csrf
            {{ method_field('put') }}

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{ $schedule->name }}" required autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="happens_at" class="col-md-4 col-form-label text-md-right">Data e Hora</label>

                <div class="col-md-4">
                    <input id="happens_at" type="datetime" class="form-control" name="happens_at" value="{{ $schedule->happens_at }}" required autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="add_info" class="col-md-4 col-form-label text-md-right">Outras Informações</label>

                <div class="col-md-6">
                    <textarea id="add_info" type="text" class="form-control" name="add_info">{{ $schedule->add_info }}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="completed" class="col-md-4 col-form-label text-md-right">Completado?</label>

                <div class="col-md-2 offset-md-1 form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="completed" id="completedTrue" value="true">
                    <label class="form-check-label" for="inlineRadio1">Sim</label>
                </div>
                <div class="col-md-2 form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="completed" id="completedFalse" value="false">
                    <label class="form-check-label" for="inlineRadio2">Nao</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">
                Cadastrar
            </button>
            <a href="{{ route('dashboard.schedules.index') }}">
                <button type="button" class="btn btn-light">Cancelar</button>
            </a>

            </form>
        </div>
    </main>
@endsection

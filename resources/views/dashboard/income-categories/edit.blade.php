<x-app-layout>
    <x-slot name="header">
        {{ __('Edit Income Category') . ' - ' . $income_category->name }}
    </x-slot>

    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
            {{ session('message') }}
        </div>
    @endif

    <form action="{{ route('dashboard.finances.categories-incomes.update', $income_category) }}" method="post">
        @csrf
        {{ method_field('put') }}

        <div class="mb-3 row">
            <label for="name" class="col-md-2 col-form-label text-md-end">Nome</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                    name="name" value="{{ $income_category->name }}" required autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-success">
            Atualizar
        </button>
        <a href="{{ route('dashboard.finances.categories') }}">
            <button type="button" class="btn btn-light">Cancelar</button>
        </a>

    </form>

</x-app-layout>

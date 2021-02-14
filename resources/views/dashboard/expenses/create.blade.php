<x-app-layout>
    <x-slot name="header">
        {{ __('New Expense') }}
    </x-slot>

    <div class="card-body">
        <form action="{{ route('dashboard.finances.expenses.store') }}" method="post">
        @csrf

        <div class="form-group row">
            <label for="name" class="col-md-2 col-form-label text-md-right">Nome</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="value" class="col-md-2 col-form-label text-md-right">Valor</label>

            <div class="col-md-3">
                <input id="value" type="number" step="0.01" class="form-control @error('value') is-invalid @enderror" name="value" required>

                @error('value')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="ref_date" class="col-md-2 col-form-label text-md-right">Data</label>

            <div class="col-md-3">
                <input id="ref_date" type="date" class="form-control @error('ref_date') is-invalid @enderror" name="ref_date" required>

                @error('ref_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="expense_category" class="col-md-2 col-form-label text-md-right">Categoria</label>

            <select id="expense_category" class="ml-3 col-sm-4 form-control" name="expense_category_id" required>
                <option>Selecione uma Categoria</option>
                @foreach ($expense_categories as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group row">
            <label for="account" class="col-md-2 col-form-label text-md-right">Conta</label>

            <select id="account" class="ml-3 col-sm-4 form-control" name="account_id" required>
                <option>Selecione uma conta</option>
                @foreach ($accounts as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group row">
            <label for="add_info" class="col-md-2 col-form-label text-md-right">Informações Adicionais</label>

            <div class="col-md-6">
                <textarea id="add_info" type="add_info" class="form-control @error('add_info') is-invalid @enderror" name="add_info"></textarea>

                @error('add_info')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <hr>

        <button type="submit" class="btn btn-primary">
            Cadastrar
        </button>
        <a href="{{ url()->previous() }}">
            <button type="button" class="btn btn-outline-secondary">Cancelar</button>
        </a>

        </form>
    </div>

</x-app-layout>

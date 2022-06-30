@extends('app')
@section('title', 'Home')

@section('content')

<h2>Culturas encontradas</h2>

<div class="d-flex">
    <div class="list-group w-50">
        @if (count($cultures) > 0)
            @foreach ($cultures as $culture)
                <a
                    href="{{ route('culture', ['id' => $culture->id]) }}"
                    class="list-group-item list-group-item-action"
                >
                    {{ $culture->name }}
                </a>
            @endforeach
        @else
            <span>Não foram encontrados registros, por gentileza, atualize a base de dados.</span>
        @endif
    </div>
    <div class="update-base w-50 d-flex justify-content-end align-items-start">
        <form class="d-flex flex-column" action="{{ route('database.update') }}">
            @csrf
            <button type="submit"class="btn btn-primary">
                Atualizar base de dados
            </button>

            @if (Session::has('message'))
                <small class="text-success mt-2">{{ Session::get('message') }}</small>
            @endif
        </form>
    </div>
</div>

@endsection

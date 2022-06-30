@extends('app')
@section('title', 'Detalhes')

@section('content')

<form action="{{ route('home') }}">
    <button type="submit" class="btn btn-secondary">
        Voltar
    </button>
</form>

<h2 class="mt-3">
    Detalhes sobre <strong>{{ $culture->name }}</strong>
    <small style="font-size: 14px;">( Última atualização em {{ $details[0]->formatted_date }} )</small>
</h2>

@if (count($details) > 0)
    <table class="table table-bordered w-50">
        <tbody>
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Valor</th>
                </tr>
            </thead>
            @foreach ($details as $detail)
                <tr>
                    <td>{{ $detail->formatted_date }}</td>
                    <td>{{ number_format($detail->value, 2, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <span>Não foram localizados registros.</span>
@endif

@endsection

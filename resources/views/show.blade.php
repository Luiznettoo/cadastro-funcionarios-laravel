@extends('templates.template')

@section('content')
    <h1 class="text-center">Visualizar</h1> <hr>

    <div class="col-8 m-auto">
        Nome: {{$employee->name}}<br>
        Email: {{$employee->email}}<br>
        Cargo: {{$employee->office}}<br>
        Endereço: {{$employee->address}}<br>
    </div>
@endsection
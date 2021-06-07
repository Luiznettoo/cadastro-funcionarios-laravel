@extends('templates.template')

@section('content')

    <h1 class="text-center">@if(isset($employee)) Editar @else Cadastrar @endif</h1> <hr>

    <div class="col-8 m-auto">

        @if(isset($errors) && count($errors)>0)
            <div class="text-center mt-4 mb-4 p-2 alert-danger">
                @foreach($errors->all() as $erro)
                    {{$erro}}<br>
                @endforeach
            </div>
        @endif

        @if(isset($employee))
            <form name="formEdit" id="formEdit" method="post" action="{{url("employees/$employee->id")}}">
                @method('PUT')
        @else
            <form name="formCad" id="formCad" method="post" action="{{url('employees')}}">
        @endif
            @csrf
            <input class="form-control" type="text" name="name" id="name" placeholder="Nome:" value="{{$employee->name ?? ''}}"  required><br>
            <input class="form-control" type="text" name="office" id="office" placeholder="Cargo:" value="{{$employee->office ?? ''}}" required><br>
            <input class="form-control" type="text" name="email" id="email" placeholder="Email:" value="{{$employee->email ?? ''}}" required><br>
            <input class="form-control" type="text" name="address" id="address" placeholder="Endereço:" value="{{$employee->address ?? ''}}" required><br>
            <input class="btn btn-primary" type="submit" value="@if(isset($employee)) Editar @else Cadastrar @endif">
        </form>
    </div>
@endsection
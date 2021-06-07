@extends('templates.template')


@section('content')
@yield('modal')

    <h1 class="text-center">Cadastro de Funcionarios Myra</h1>

    <div class="text-center mt-3 mb-4">
        <a href="{{url("employees/create")}}">
            <button class="btn btn-success">Cadastrar</button>
        </a>
    </div>
    @csrf
    <div class="col-8 m-auto">
        <table class="table table-dark table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Cargo</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <th scope="row">{{$employee->id}}</th>
                        <td>{{$employee->name}}</td>
                        <td>{{$employee->email}}</td>
                        <td>{{$employee->office}}</td>
                        <td>{{$employee->address}}</td>
                        <td>
                            <a href="{{url("employees/$employee->id")}}">
                                <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">Visualizar</button>
                            </a>

                            <a href="{{url("employees/$employee->id/edit")}}">
                                <button class="btn btn-primary">Editar</button>
                            </a>

                            <a href="{{url("employees/$employee->id")}}" class="js-del">
                                <button class="btn btn-danger">Deletar</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
               
            </tbody>
        </table>
        {{$employees->links()}}
    </div>
@endsection
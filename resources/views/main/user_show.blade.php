@extends('layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Категории</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Категории/создать</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                Номер пользователя: {{$user->id}}
                <br>
                Имя: {{$user->name}}
                <br>
                Фамилия: {{$user->surname}}
                <br>
                Отчество: {{$user->patronymic}}
                <br>
                Электронная почта: {{$user->email}}
                <br>
                Возвраст: {{$user->age}}
                <br>
                Адрес: {{$user->address}}
                <br>
                Роль: {{$user->role ? 'admin' : 'user'}}
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

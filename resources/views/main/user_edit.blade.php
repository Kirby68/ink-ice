@extends('layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Пользователи</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Пользователи/изменить</li>
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
                <div class="col-12">
                    Добавление пользователя
                </div>
                <form action="{{ route('admin.user.update', $user->id) }}" method="post">
                    @method('PATCH')
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name" class="form-label">Имя</label>
                            <input id="name" value="{{$user->name}}" type="text" name="name" class="form-control">
                            @error('name')
                            <div class="text-danger">
                                Это поле необходимо для заполнения
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="surname" class="form-label">Фамилия</label>
                            <input id="surname" value="{{$user->surname}}" type="text" name="surname" class="form-control">
                            @error('surname')
                            <div class="text-danger">
                                Это поле необходимо для заполнения
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="patronymic" class="form-label">Отчество</label>
                            <input id="patronymic" value="{{$user->patronymic}}" type="text" name="patronymic" class="form-control">
                            @error('patronymic')
                            <div class="text-danger">
                                Это поле необходимо для заполнения
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="age" class="form-label">возвраст</label>
                            <input id="age" value="{{$user->age}}" type="number" name="age" class="form-control">
                            @error('age')
                            <div class="text-danger">
                                Это поле необходимо для заполнения
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address" class="form-label">адрес</label>
                            <input id="address" value="{{$user->address}}" type="text" name="address" class="form-control">
                            @error('address')
                            <div class="text-danger">
                                Это поле необходимо для заполнения
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectBorder" class="form-label">Гендер</label>
                            <select name="gender" class="custom-select form-control" id="exampleSelectBorder">
                                <option disabled selected>Пол</option>
                                <option value="1">Мужской</option>
                                <option value="2">Женский</option>
                            </select>
                            @error('gender')
                            <div class="text-danger">
                                Это поле необходимо для заполнения
                            </div>
                            @enderror
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Изменить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

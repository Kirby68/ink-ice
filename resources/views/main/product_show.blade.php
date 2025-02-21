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
                <div>
                    <img src="{{asset('storage/' . $product->preview_image)}}" alt="#" class="w-25">
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Data</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">Номер товара:</th>
                        <td>{{$product->id}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Название:</th>
                        <td>{{$product->name}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Описание:</th>
                        <td>{{$product->description}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Контент:</th>
                        <td>{{$product->content}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Цена:</th>
                        <td>{{$product->price}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Количество:</th>
                        <td>{{$product->count}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Категория:</th>
                        <td>{{$product->category->name}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Теги:</th>
                        <td><select disabled class="tags" name="tag_ids[]" multiple="multiple" data-placeholder="Выберите тег"
                                    style="width: 9%">
                                @foreach($tags as $tag)
                                    <option {{ $product->tags->contains($tag->id) ? 'selected' : '' }} value="{{$tag->id}}">{{$tag->name}}</option>
                                @endforeach
                            </select></td>
                    </tr>
                    <tr>
                        <th scope="row">Оно опубликовано:</th>
                        <td>{{$product->is_published == '1' ? 'Да' : 'Нет'}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

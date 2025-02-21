@extends('layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Продукты</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Продукты/создать</li>
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
                    Добавление продукта
                </div>
                <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name" class="form-label">Название</label>
                            <input id="name" value="{{old('name')}}" type="text" name="name" class="form-control">
                            @error('name')
                            <div class="text-danger">
                                Это поле необходимо для заполнения
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description" class="form-label">Описание</label>
                            <input id="description" value="{{old('description')}}" type="text" name="description"
                                   class="form-control">
                            @error('description')
                            <div class="text-danger">
                                Это поле необходимо для заполнения
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="content" class="form-label">Контент</label>
                            <input id="content" value="{{old('content')}}" type="text" name="content"
                                   class="form-control">
                            @error('content')
                            <div class="text-danger">
                                Это поле необходимо для заполнения
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputGroupFile01" class="form-label">Изображение</label>
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="preview_image">
                                    <label class="custom-file-label">Выберите превью</label>
                                </div>
                            </div>
                            @error('preview_image')
                            <div class="text-danger">
                                Это поле необходимо для заполнения
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price" class="form-label">Цена</label>
                            <input id="price" value="{{old('price')}}" type="number" name="price" class="form-control">
                            @error('price')
                            <div class="text-danger">
                                Это поле необходимо для заполнения
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="count" class="form-label">Количество</label>
                            <input id="count" value="{{old('count')}}" type="number" name="count"
                                   class="form-control">
                            @error('count')
                            <div class="text-danger">
                                Это поле необходимо для заполнения
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <labe>Категория</labe>
                            <select class="form-control category" name="category_id"
                                    data-placeholder="Выберите ктегорию" style="width: 100%">
                                <option selected="selected" disabled>Выберите категорию</option>
                                @foreach($categories as $category)
                                    <option class="col-5"
                                            {{old('category_id') == $category->id ? ' selected' : '' }}
                                            value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <labe>Теги</labe>
                            <select class="tags" name="tag_ids[]" multiple="multiple" data-placeholder="Выберите тег"
                                    style="width: 100%">
                                @foreach($tags as $tag)
                                    <option {{ is_array(old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? ' selected' : '' }} value="{{$tag->id}}">{{$tag->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectBorder" class="form-label">Опубликовать ?</label>
                            <select name="is_published" class="custom-select form-control" id="exampleSelectBorder">
                                <option disabled selected>Выберите:</option>
                                <option {{old('is_published') == 1 ? ' selected' : '' }} value="1">Да</option>
                                <option {{old('is_published') == 2 ? ' selected' : '' }} value="2">Нет</option>
                            </select>
                            @error('is_published')
                            <div class="text-danger">
                                Это поле необходимо для заполнения
                            </div>
                            @enderror
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Добавить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

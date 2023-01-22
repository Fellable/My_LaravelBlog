@extends('admin.layouts.main')
@section('content')



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование поста</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                        <li class="breadcrumb-item active">Редактирование поста</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <form action=" {{ route('admin.post.update',  $post->id ) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label> Название</label>
                            <input type="text" name="title" class="form-control w-25" placeholder="Название поста" value="{{  $post-> title }}">

                            @error('title')
                            <div class="text-danger"> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                    <textarea name="content" id="summernote" >
                        {{ $post -> content }}
                    </textarea>
                            @error('content')
                            <div class="text-danger"> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="w-25">
                            <img src="{{ url('storage/' . $post->preview_image) }}" alt="preview_image" class="w-25">
                        </div>

                        <div class="input-group w-50">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile" name="preview_image">
                                <label class="custom-file-label" for="exampleInputFile">Добавить превью</label>

                            </div>
                            <div class="input-group-append">

                                <span class="input-group-text"> Загрузить изображение</span>
                            </div>
                        </div>
                        @error('preview_image')
                        <div class="text-danger"> {{ $message }}</div>
                        @enderror

                        <div class="w-25">
                            <img src="{{ url('storage/' . $post->main_image) }}" alt="main_image" class="w-50">
                        </div>
                        <div class="input-group w-50">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile" name="main_image">
                                <label class="custom-file-label" for="exampleInputFile">Выберите главное изображение</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text"> Загрузить изображение</span>
                            </div>
                        </div>
                        @error('main_image')
                        <div class="text-danger"> {{ $message }}</div>
                        @enderror


                        <div class="form-group w-50">
                            <label> Выберите категорию </label>
                            <select name="category_id" class="form-control">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == $post->category_id ? 'selected' : ' '}}
                                    > {{ $category->title }} </option>
                                @endforeach
                            </select>
                        </div>
                        @error('category_id')
                        <div class="text-danger"> {{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <label> Тэги </label>
                            <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Выберите тэги" style="width:100%">
                                @foreach ($tags as $tag)
                                    <option {{ $post->tags->contains($tag->id) ? 'selected' : '' }}

                                            value ={{ $tag -> id }}> {{$tag->title}}
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label> Технология</label>
                            <input type="text" name="technology" class="form-control w-25" placeholder="Основная технология" value="{{  $post-> technology }}">

                            @error('technology')
                            <div class="text-danger"> {{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label> Что реализовано</label>
                            <input type="text" name="additional_tech" class="form-control w-25" placeholder="Что реализовано (crud)" value="{{  $post-> additional_tech }}">

                            @error('additional_tech')
                            <div class="text-danger"> {{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label> GitHub</label>
                            <input type="text" name="gitHub" class="form-control w-25" placeholder="gitHub" value="{{  $post-> gitHub }}">

                            @error('gitHub')
                            <div class="text-danger"> {{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group d-block">
                            <input type="submit" class="btn btn-primary" value="Обновить">
                        </div>
        </form>

                </div>
                </div>

            </div>
            <!-- /.row -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

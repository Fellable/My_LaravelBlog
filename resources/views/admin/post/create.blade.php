@extends('admin.layouts.main')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавление поста</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                            <li class="breadcrumb-item active">Добавление поста</li>
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
                    <div class="col-12 mb-3">
                        <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label> Название</label>
                                <input type="text" name="title" class="form-control w-25" placeholder="Название поста" value="{{ old('title') }}">
                                @error('title')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <textarea name="content" id="summernote">{{ old('content') }}</textarea>
                                @error('content')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-group w-50">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="preview_image">
                                    <label class="custom-file-label" for="exampleInputFile">Добавить превью</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Загрузить изображение</span>
                                </div>
                            </div>
                            @error('preview_image')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <div class="input-group w-50">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="main_image">
                                    <label class="custom-file-label" for="exampleInputFile">Выберите главное изображение</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Загрузить изображение</span>
                                </div>
                            </div>
                            @error('main_image')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group w-50">
                                <label> Выберите категорию </label>
                                <select name="category_id" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? 'selected' : '' }}>{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('category_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label> Тэги </label>
                                <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Выберите тэги" style="width:100%">
                                    @foreach ($tags as $tag)
                                        <option {{ is_array(old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? 'selected' : '' }} value="{{ $tag->id }}">{{ $tag->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label> Технология</label>
                                <input type="text" name="technology" class="form-control w-25" placeholder="Основная технология" value="{{ old('technology') }}">
                                @error('technology')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label> Что реализовано </label>
                                <input type="text" name="additional_tech" class="form-control w-25" placeholder="Что реализовано (crud)" value="{{ old('additional_tech') }}">
                                @error('additional_tech')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label> Маленькое описание на мейне </label>
                                <input type="text" name="small_description" class="form-control w-25" placeholder="Что реализовано (crud)" value="{{ old('small_description') }}">
                                @error('small_description')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label> GitHub </label>
                                <input type="text" name="gitHub" class="form-control w-25" placeholder="gitHub" value="{{ old('gitHub') }}">
                                @error('gitHub')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label> Очередь </label>
                                <input type="text" name="queuery" class="form-control w-25" placeholder="queuery" value="{{ old('queuery') }}">
                                @error('queuery')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div id="slider-container">
                                <label> Изображение для слайдера Vuejs  №1</label>
                                <div class="slider-item">
                                    <div class="input-group w-50">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="post_images[]">
                                            <label class="custom-file-label" for="exampleInputFile">Выберите изображение для слайдера</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Загрузить изображение</span>
                                        </div>
                                    </div>
                                    @error('post_images')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label> Титул слайда для Vuejs №1</label>
                                        <input type="text" name="post_titles[]" class="form-control w-25">
                                    </div>

                                    <div class="form-group">
                                        <label> Описание слайда для Vuejs №1</label>
                                        <input type="text" name="post_descriptions[]" class="form-control w-25">
                                    </div>
                                </div>
                            </div>

                            <button type="button" class="btn btn-secondary mb-2" id="add-slider-item">Добавить ещё 1 фото для слайдера (бесконечно)</button>

                            <div class="form-group d-block">
                                <input type="submit" class="btn btn-primary" value="Добавить">
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let sliderIndex = 2; // Начинаем с 2, так как 1 уже задано
            document.getElementById('add-slider-item').addEventListener('click', function() {
                let sliderContainer = document.getElementById('slider-container');
                let newSliderItem = document.createElement('div');
                newSliderItem.classList.add('slider-item');

                newSliderItem.innerHTML = `
                <label> Изображение для слайдера Vuejs №${sliderIndex} </label>
                <div class="input-group w-50">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="post_images[]">
                        <label class="custom-file-label">Выберите изображение для слайдера</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">Загрузить изображение</span>
                    </div>
                </div>
                <div class="form-group">
                    <label> Титул для слайда Vuejs №${sliderIndex} </label>
                    <input type="text" name="post_titles[]" class="form-control w-25">
                </div>
                <div class="form-group">
                    <label> Описание для слайда Vuejs №${sliderIndex} </label>
                    <input type="text" name="post_descriptions[]" class="form-control w-25">
                </div>
                `;
                sliderContainer.appendChild(newSliderItem);
                sliderIndex++;
            });
        });
    </script>

@endsection

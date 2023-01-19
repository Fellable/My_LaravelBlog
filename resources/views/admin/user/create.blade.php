@extends('admin.layouts.main')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавление пользователя</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Добавление пользователя</li>
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
                    <form action="{{ route('admin.user.store') }}" method="POST" class="col-4">
                        @csrf
            <div class="form-choup">
                <label> Название</label>
                <input type="text" name="name" class="form-control" placeholder="Имя пользователя">
            </div>
                        @error('name')
                        <div class="text-danger"> {{ $message }}</div>
                        @enderror

                        <label> Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Имейл пользователя">
                </div>
                @error('email')
                <div class="text-danger">  {{ $message }}</div>
                @enderror


            <div class="form-group w-50">
                <lable> Выберите роль </lable>
                <select name="role" class="form-control">
                    @foreach ($roles as $id => $role)
                        <option value="{{ $id }}"
                            {{ $id == old('role') ? 'selected' : ' '}}
                        > {{ $role }} </option>
                    @endforeach
                </select>
            </div>
            @error('role')
            <div class="text-danger"> {{ $message }}</div>
            @enderror


                        <input type="submit" class="btn btn-primary" value="Добавить">
        </form>

                </div>
                </div>

            </div>
            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

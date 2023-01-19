@extends('lk.layouts.main')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Комментарии</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Комментарии</li>
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
            <div class="col-12">
                <form action=" {{ route('lk.comment.update',  $comment->id ) }}" method="POST" class="col-4">
                    @csrf
                    @method('PATCH')
                    <div class="form-croup">
                        <label> Название</label>
                        <textarea class="form-control" name="message" cols="30" rows="10"> {{ $comment->message }} </textarea>
                    </div>
                    @error('message')
                    <div class="text-danger"> Это поле необходимо для заполнения {{ $message }}</div>
                    @enderror

                    <input type="submit" class="btn btn-primary" value="Обновить">
                </form>

            </div>
            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

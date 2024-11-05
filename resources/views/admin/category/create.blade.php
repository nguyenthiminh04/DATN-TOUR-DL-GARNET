@extends('admin.layouts.app')
@section('title', '')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"> <i class="nav-icon fas fa fa-home"></i> Trang chủ</a></li>            
                               <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Danh mục</a></li>
                        <li class="breadcrumb-item active">Tạo mới Danh mục</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        @include('admin.category.form')
    </section>
@stop
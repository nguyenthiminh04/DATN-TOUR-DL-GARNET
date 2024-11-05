@extends('admin.layouts.app')
@section('title', 'Danh sách địa danh')
@section('content')
    <section class="content-header" style="margin-top: 100px">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"> <i
                                    class="nav-icon fas fa fa-home"></i> Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('location.index') }}">Địa danh</a></li>

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <section class="content">
            <div class="container-fluid">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="">
                            <div class="row">
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control mg-r-15"
                                            placeholder="Tên địa danh">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-success " style="margin-right: 10px"><i
                                                class="fas fa-search"></i> Tìm kiếm </button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                <div class="btn-group">
                                    <a href="{{ route('location.create') }}"><button type="button"
                                            class="btn btn-block btn-info"><i class="fa fa-plus"></i> Tạo mới</button></a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table-bordered">
                                <thead>
                                    <tr>
                                        <th width="4%" class=" text-center">STT</th>
                                        <th>Tên địa danh</th>
                                        <th>Hình ảnh</th>
                                        <th>Mô tả</th>
                                        <th>Nội dung</th>
                                        <th class="text-center">Trạng thái</th>
                                        <th class=" text-center">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!$locations->isEmpty())
                                        @php $i = $locations->firstItem(); @endphp

                                        @foreach ($locations as $location)
                                            <tr>
                                                <td class="text-center" style="vertical-align: middle;">{{ $i }}
                                                </td>
                                                <td class="title-content" style="vertical-align: middle;width: 30%">
                                                    {{ $location->name }}
                                                </td>
                                                <td style="vertical-align: middle; width:20%;">
                                                    @if (isset($location) && !empty($location->image))
                                                    <img src="{{ asset($location->image) }}" alt="" class="margin-auto-div img-rounded" style="height: 100px; width:100%;">
                                                    
                                                    @else
                                                        <img src="{{ asset('admin/icon/img/no-image.png') }}" alt=""
                                                            class="margin-auto-div img-rounded"
                                                            style="height: 100px; width:100%;">
                                                    @endif
                                                </td>

                                                <td class="title-content" style="vertical-align: middle;width: 30%">
                                                    {{ $location->description }}
                                                </td>

                                                <td class="title-content" style="vertical-align: middle;width: 30%">
                                                    {{ $location->content }}
                                                </td>

                                                <td class="text-center" style="vertical-align: middle;">
                                                    {{ $status[$location->status] }}
                                                </td>
                                                <td class="text-center" style="vertical-align: middle;">
                                                    <a class="btn btn-primary btn-sm" href="{{ route('location.edit', $location->id) }}">
                                                        Sửa <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    
                                                    <form action="{{ route('locations.destroy', $location->id) }}" method="POST" style="display:inline;">

                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</button>
                                                    </form>
                                                    
                                                </td>
                                            </tr>
                                            @php $i++ @endphp
                                        @endforeach
                                    @endif

                                </tbody>
                            </table>
                            @if ($locations->hasPages())
                                <div class="pagination float-right margin-20">
                                    {{ $locations->appends($query = '')->links() }}
                                </div>
                            @endif
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@stop

@extends('admin.layouts.app')
@section('title', '')
@section('content')
    <section class="content-header" style="margin-top: 100px">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"> <i
                                    class="nav-icon fas fa fa-home"></i> Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Danh mục</a></li>
                        <li class="breadcrumb-item active">Danh sách</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                <div class="btn-group">
                                    <a href="{{ route('category.create') }}"><button type="button"
                                            class="btn btn-block btn-info"><i class="fa fa-plus"></i> Tạo mới</button></a>
                                </div>
                            </div>
                        </div> <br>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table-bordered">
                                <thead>
                                    <tr>
                                        <th width="4%" class=" text-center">STT</th>
                                        <th>Tên danh mục</th>
                                        {{-- <th>Danh mục cha</th>  --}}
                                        <th>Kiểu danh mục</th>  
                                        <th>Mô tả</th>
                                        <th>Trạng thái</th>
                                        <th class=" text-center">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!$categories->isEmpty())
                                        @php $i = $categories->firstItem(); @endphp
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td class=" text-center">{{ $i }}</td>
                                                <td>{{ $category->name }}</td>
                                                {{-- <td>{{ isset($category->parent->name) ? $category->parent->name : 'Danh mục cha' }}</td>  --}}
                                                {{-- <td>{{ $types[$category->type] }}</td> --}}
                                                <td>{{ $types[$category->type] ?? 'Không xác định' }}</td>                                                <td class=" text-center" style="vertical-align: middle;">
                                                    {{ $category->description }}</td>
                                                <td>{{ $status[$category->status] }}</td>
                                                <td class="text-center">
                                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.category.update', $category->id) }}"> Sửa
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">
                                                            <i class="fa fa-trash"></i> Xóa
                                                        </button>
                                                    </form>
                                                    
                                                
                                                </td>
                                            </tr>
                                            @php $i++ @endphp
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="5" class="text-center">Không có danh mục nào.</td>
                                        </tr>
                                    @endif
                                    {{-- @endif --}}
                                </tbody>
                            </table>
                            @if ($categories->hasPages())
                                <div class="pagination float-right margin-20">
                                    {{ $categories->links() }}
                                </div>
                            @endif

                            @if ($categories->hasPages())
                                <div class="pagination float-right margin-20">
                                    {{ $categories->appends($query = '')->links() }}
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

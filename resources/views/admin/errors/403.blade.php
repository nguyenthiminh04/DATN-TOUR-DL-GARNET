@extends('admin.layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="error-page">
                        {{-- <img src="/images/403.jpg" alt="403 Forbidden" class="img-fluid mb-4" style="max-width: 400px;"> --}}
                        <h1 class="display-1 text-danger">403</h1>
                        <h3 class="mb-4">Forbidden</h3>
                        <p class="text-muted mb-4">Bạn không có quyền truy cập vào trang này.</p>
                        <a href="{{ route('home-admin') }}" class="btn btn-primary">
                            <i class="fas fa-arrow-left"></i> Quay lại trang chính
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
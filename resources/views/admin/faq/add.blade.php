@extends('admin.layouts.app')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Danh Sách Câu Hỏi</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home-admin') }}">Trang quản trị</a></li>
                                <li class="breadcrumb-item active">Thêm câu hỏi</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <form class="col-6" action="{{ route('faqs.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="question" class="form-label">Câu hỏi<span class="text-danger">*</span></label>
                    <input type="text" id="question" name="question" value="{{ old('question') }}" class="form-control"
                        placeholder="Nhập câu hỏi">
                    @error('question')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="answer" class="form-label">Câu trả lời<span class="text-danger">*</span></label>
                    <input type="text" id="answer" name="answer" value="{{ old('answer') }}" class="form-control"
                        placeholder="Nhập câu trả lời">
                    @error('answer')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3 col-6">
                    <label for="status1" class="form-label">Status<span class="text-danger">*</span></label>
                    <select name="status" class="form-select w-100" id="status1">
                        <option value="">Chọn status</option>
                        <option value="1">Hiển thị</option>
                        <option value="0">Ẩn</option>
                    </select>
                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <a href="{{ route('faqs.index') }}" class="btn btn-info">trở về</a>
                    <button class="btn btn-primary" type="submit">Thêm mới</button>
                </div>

            </form>
        </div>
    </div>
@endsection

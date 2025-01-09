@extends('admin.layouts.app')

@section('style')
    <!-- Thêm CSS của Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">

             <!-- start page title -->
             <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Sửa hướng dẫn viên đã gán</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home-admin') }}">Trang quản trị</a></li>
                                <li class="breadcrumb-item active">Sửa hướng dẫn viên đã gán</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row g-4 mb-3">
                        <div class="col-sm-auto">
                            {{-- <a href="{{ route('guide_tour.create') }}" class="btn btn-secondary">
                                <i class="bi bi-plus-circle align-baseline me-1"></i> Gán hướng dẫn viên
                            </a> --}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <form action="{{ route('guide_tour.update', $guideTour->id) }}" method="post" class="col-5">
                @csrf
                @method('PATCH')

                <div class="mb-3">
                    <label for="guide_id" class="form-label">Chọn hướng dẫn viên</label>
                    <select name="guide_id" class="form-select" id="guide_id" required>
                        <option value="">Chọn hướng dẫn viên</option>
                        @foreach ($guides as $guide)
                            <option value="{{ $guide->id }}" 
                                {{ $guideTour->guide_id == $guide->id ? 'selected' : '' }}>
                                {{ $guide->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tour_id" class="form-label">Chọn tour</label>
                    <select name="tour_id" class="form-select" id="tour_id" required>
                        <option value="">Chọn tour</option>
                        @foreach ($tours as $tour)
                            <option value="{{ $tour->id }}" 
                                {{ $guideTour->tour_id == $tour->id ? 'selected' : '' }}>
                                {{ $tour->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="assigned_at" class="form-label">Chọn ngày tour</label>
                    <select name="assigned_at" class="form-select" id="assigned_at" required>
                        <option value="">Chọn ngày tour</option>
                        @foreach ($availableDates as $date)
                            <option value="{{ $date }}" 
                                {{ $tourDays == $date ? 'selected' : '' }}>
                                {{ $date }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="">
                    <a class="btn btn-info" href="{{ route('guide_tour.index') }}">Trở về</a>
                    <button class="btn btn-primary" type="submit">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <!-- Thêm JS của Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#guide_id').select2({
                placeholder: 'Chọn hướng dẫn viên',
                allowClear: true
            });

            $('#tour_id').select2({
                placeholder: 'Chọn tour',
                allowClear: true
            });

            $('#tour_id').on('change', function() {
                let tourId = $(this).val();

                if (tourId) {
                    $.ajax({
                        url: `{{ route('guide_tour.getDates', ':id') }}`.replace(':id', tourId), // Route lấy ngày của tour
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            let options = '<option value="">Chọn ngày tour</option>';
                            data.forEach(function(date) {
                                options += `<option value="${date.tour_date}">${date.tour_date}</option>`;
                            });
                            $('#assigned_at').html(options);
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr.responseText);
                        }
                    });
                } else {
                    $('#assigned_at').html('<option value="">Chọn ngày tour</option>');
                }
            });
        });
    </script>
@endsection

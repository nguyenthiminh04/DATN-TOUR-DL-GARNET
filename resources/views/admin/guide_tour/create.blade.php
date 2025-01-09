@extends('admin.layouts.app')

@section('style')
    <!-- Thêm CSS của Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <form action="{{ route('guide_tour.store') }}" method="post" class="col-5">
                @csrf

                <div class="mb-3">
                    <label for="guide_id" class="form-label">Chọn hướng dẫn viên</label>
                    <select name="guide_id" class="form-select" id="guide_id" required>
                        <option value="">Chọn hướng dẫn viên</option>
                        @foreach ($guides as $guide)
                            <option value="{{ $guide->id }}">{{ $guide->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tour_id" class="form-label">Chọn tour</label>
                    <select name="tour_id" class="form-select" id="tour_id" required>
                        <option value="">Chọn tour</option>
                        @foreach ($tours as $tour)
                            <option value="{{ $tour->id }}">{{ $tour->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="assigned_at" class="form-label">Chọn ngày tour</label>
                    <select name="assigned_at" class="form-select" id="assigned_at" required>
                        <option value="">Chọn ngày tour</option>
                    </select>
                </div>
                <div class="">
                    <a class="btn btn-info" href="{{route('guide_tour.index')}}">Trở về</a>
                    <button class="btn btn-primary" type="submit">Gán hướng dẫn viên</button>
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
                // console.log(tourId);
    
                if (tourId) {
                    $.ajax({
                        url: `{{ route('guide_tour.getDates', ':id') }}`.replace(':id', tourId), // Route lấy ngày của tour
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            let options = '<option value="">Chọn ngày tour</option>';
                            data.forEach(function(date) {
                                options +=
                                    `<option value="${date.tour_date}">${date.tour_date}</option>`;
                            });
                            $('#assigned_at').html(options);
                        },
                        error: function(xhr, status, error) {
                            // console.log(xhr.responseText);
                        }
                    });
                } else {
                    $('#assigned_at').html('<option value="">Chọn ngày tour</option>');
                }
            });
        });
    </script>
    
@endsection

@extends('admin.layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <form action="{{ route('tour-guides.store') }}" method="post" class="col-5">
                @csrf

                <div class="mb-3">
                    <label for="user_id" class="form-label">Chọn hướng dẫn viên</label>
                    <select name="user_id" class="form-select" id="user_id" required>
                        <option value="">Chọn hướng dẫn viên</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3" id="tour_section">
                    <label for="tour_id" class="form-label">Chọn tour</label>
                    <select name="tour_id" class="form-select" id="tour_id" required>
                        <option value="">Chọn một tour</option>
                        @foreach ($tours as $tour)
                            <option value="{{ $tour->id }}" data-start-date="{{ $tour->start_date }}"
                                data-end-date="{{ $tour->end_date }}">
                                {{ $tour->name }}
                                ({{ \Carbon\Carbon::parse($tour->start_date)->format('d/m/Y') }} -
                                {{ \Carbon\Carbon::parse($tour->end_date)->format('d/m/Y') }})
                            </option>
                        @endforeach
                    </select>
                    @error('tour_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3" id="date_section">
                    <label for="assigned_at" class="form-label">Chọn ngày</label>
                    <input type="date" name="assigned_at" id="assigned_at" class="form-control" required>
                    @error('assigned_at')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <div class="mb-3">
                    <a href="{{ route('tour-guides.index') }}" class="btn btn-info">trở về</a>
                    <button class="btn btn-primary" type="submit">Gán tour</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const tourSelect = document.getElementById("tour_id");
            const dateInput = document.getElementById("assigned_at");

            tourSelect.addEventListener("change", function() {
                const selectedOption = tourSelect.options[tourSelect.selectedIndex];
                const startDate = selectedOption.getAttribute("data-start-date");
                const endDate = selectedOption.getAttribute("data-end-date");

                if (startDate && endDate) {
                    // Chỉ định min và max cho input date
                    const today = new Date().toISOString().split("T")[0]; // Ngày hiện tại
                    const minDate = new Date(startDate) >= new Date(today) ? startDate : today;
                    const maxDate = endDate.split(" ")[0];

                    dateInput.min = minDate;
                    dateInput.max = maxDate;
                    dateInput.value = ""; // Reset giá trị đã chọn
                    dateInput.disabled = false; // Mở khóa input date
                } else {
                    dateInput.value = "";
                    dateInput.disabled = true; // Khóa input date nếu không có tour hợp lệ
                }
            });
        });
    </script>
@endsection

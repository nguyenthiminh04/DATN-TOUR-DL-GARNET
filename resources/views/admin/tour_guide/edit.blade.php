@extends('admin.layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <form action="{{ route('tour-guides.update', $tour_guide) }}" method="post" class="col-5">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="user_id" class="form-label">Chọn hướng dẫn viên</label>
                    <select name="user_id" class="form-select" id="user_id" required>
                        <option value="">Chọn hướng dẫn viên</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ $user->id == $tour_guide->user_id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tour_id" class="form-label">Chọn tour</label>
                    <select name="tour_id" class="form-select" id="tour_id" required>
                        <option value="">Chọn một tour</option>
                        @foreach ($tours as $tour)
                            <option value="{{ $tour->id }}" data-start-date="{{ $tour->start_date }}"
                                data-end-date="{{ $tour->end_date }}"
                                {{ $tour->id == $tour_guide->tour_id ? 'selected' : '' }}>
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

                <div class="mb-3">
                    <label for="assigned_at" class="form-label">Chọn ngày</label>
                    <input type="date" name="assigned_at" id="assigned_at" class="form-control"
                        value="{{ \Carbon\Carbon::parse($tour_guide->assigned_at)->format('Y-m-d') }}" required>
                    @error('assigned_at')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>



                <div class="mb-3">
                    <a href="{{ route('tour-guides.index') }}" class="btn btn-info">trở về</a>
                    <button class="btn btn-primary" type="submit">Cập nhật gán</button>
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

            function updateDateRange() {
                const selectedOption = tourSelect.options[tourSelect.selectedIndex];
                const startDate = selectedOption.getAttribute("data-start-date");
                const endDate = selectedOption.getAttribute("data-end-date");

                if (startDate && endDate) {
                    const today = new Date().toISOString().split("T")[0];
                    const minDate = new Date(startDate) >= new Date(today) ? startDate : today;
                    const maxDate = endDate.split(" ")[0];

                    dateInput.min = minDate;
                    dateInput.max = maxDate;
                    if (dateInput.value < minDate || dateInput.value > maxDate) {
                        dateInput.value = minDate;
                    }
                    dateInput.disabled = false;
                } else {
                    dateInput.value = "";
                    dateInput.disabled = true;
                }
            }

            // Gọi hàm khi trang tải
            updateDateRange();

            // Gọi lại hàm khi thay đổi tour
            tourSelect.addEventListener("change", updateDateRange);
        });
    </script>
@endsection

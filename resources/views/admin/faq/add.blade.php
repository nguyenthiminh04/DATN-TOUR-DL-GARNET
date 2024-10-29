<!-- Thêm Faq -->
<div class="modal fade" id="addFaq" tabindex="-1" aria-labelledby="addFaqLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-0">
            <div class="modal-header bg-danger p-3">
                <h5 class="modal-title text-white" id="addFaqLabel">Thêm Faq</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"
                    id="close-addFaq"></button>
            </div>

            <form id="addFaqForm" action="{{ route('faqs.store') }}" method="post">
                @csrf
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="question" class="form-label">Câu hỏi<span class="text-danger">*</span></label>
                        <input type="text" id="question" name="question" class="form-control" placeholder="Nhập câu hỏi">
                        <span class="text-danger" id="question-error"></span> <!-- Vị trí hiển thị lỗi -->
                    </div>
                    
                    <div class="mb-3">
                        <label for="answer" class="form-label">Câu trả lời<span class="text-danger">*</span></label>
                        <input type="text" id="answer" name="answer" class="form-control" placeholder="Nhập câu trả lời">
                        <span class="text-danger" id="answer-error"></span> <!-- Vị trí hiển thị lỗi -->
                    </div>
                    
                    <div class="mb-3 col-6">
                        <label for="status1" class="form-label">Status<span class="text-danger">*</span></label>
                        <select name="status_id" class="form-select w-100" id="status1">
                            <option value="">Chọn status</option>
                            @foreach ($listStatus as $status)
                                <option value="{{ $status->id }}">{{ $status->status_name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger" id="status-error"></span> <!-- Vị trí hiển thị lỗi -->
                    </div>

                </div>

                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-ghost-danger" data-bs-dismiss="modal"><i
                                class="bi bi-x-lg align-baseline me-1"></i> Đóng</button>
                        <button type="submit" class="btn btn-primary">Thêm mới câu hỏi</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- modal-content -->
    </div>
</div>

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:view_contact'])->only(['index']);
        // $this->middleware(['permission:destroy_contact'])->only(['destroy']);
    }
    public function index(Request $request)
    {
        $data['title'] = "Danh Sách Liên Hệ";
        $query = Contact::query();

        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhere('subject', 'like', '%' . $search . '%');
            });
        }

        $data['contact'] = $query->get();

        if ($request->ajax()) {
            return response()->json([
                'data' => $data['contact']
            ]);
        }

        return view('admin.contact.index', $data);
    }

    public function contactStatus(Request $request, $id)
    {
        try {
            $contact = Contact::findOrFail($id);

            $notAllowedStatus = ['Đã hoàn tất', 'Hủy bỏ'];

            if ($contact->status !== 'Đang chờ xử lý' && $request->status === 'Đang chờ xử lý') {
                return response()->json([
                    'success' => false,
                    'message' => 'Không thể quay lại trạng thái "Đang chờ xử lý"!',
                ]);
            }

            $contact->status = $request->status;
            $contact->save();

            return response()->json([
                'success' => true,
                'message' => 'Cập nhật trạng thái thành công!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Đã có lỗi xảy ra. Vui lòng thử lại!',
            ]);
        }
    }




    public function destroy(string $id)
    {
        try {

            $contact = Contact::findOrFail($id);
            $contact->deleted_at = now();
            $contact->save();

            return response()->json([
                'success' => true,
                'message' => 'Xóa  thành công!',
            ]);
        } catch (\Exception $e) {

            Log::error('Lỗi khi xóa : ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra, vui lòng thử lại sau.',
            ], 500);
        }
    }
}

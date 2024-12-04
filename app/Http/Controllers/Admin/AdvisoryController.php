<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advisory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdvisoryController extends Controller
{
    public function index()
    {
        $data['advisory'] = Advisory::getAll();
        // dd($data['advisory']);
        return view('admin.advisory.index', $data);
    }

    public function advisoryStatus(Request $request, $id)
    {
        try {
            $advisory = Advisory::findOrFail($id);
            $advisory->status = $request->status;
            $advisory->save();

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

    public function destroy($id)
    {

        try {
            $advisory = Advisory::findOrFail($id);

            $advisory->deleted_at = now();
            $advisory->save();

            return redirect()->route('advisory.index')->with('success', 'Xóa thành công!');
        } catch (\Exception $e) {
            Log::error('Lỗi khi xóa ' . $e->getMessage());

            return response()->view('admin.errors.404', [], 404);
        }
    }
}

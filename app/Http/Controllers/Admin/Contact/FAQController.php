<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\FAQ;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

class FAQController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $title = "FAQ";


        if ($request->ajax()) {
            $qnas = FAQ::where('is_del', 0)
                ->orderBy('updated_at', 'DESC');

            return DataTables::eloquent($qnas)
                ->addIndexColumn()
                ->addColumn('check', function ($row) {
                    $check = '<input type="checkbox" name="chkProduct[]" onclick="" value="' . $row->id . '">';
                    return $check;
                })
                ->addColumn('action', function ($row) {
                    $element = '<button type="button" data-id="' . $row->id . '" class="btn btn-sm btn-warning btnEdit">Edit</button>';
                    $element .= '<button type="button" data-id="' . $row->id . '" class="btn btn-sm btn-danger btnDelete">Delete</button>';
                    return $element;
                })
                ->addColumn('questionInfo', function ($row) {
                    $popup = '<span data-id="' . $row->id . '" style="cursor:pointer" class="btnEdit">' . $row->strQuestion . '</span>';
                    return $popup;
                })
                ->addColumn('writer', function ($row) {
                    return 'Admin';
                })
                ->rawColumns(['check', 'questionInfo', 'writer', 'action'])
                ->make(true);
        }
        return view('admin.contact.faq_list', compact('title'));
    }

    /**
     * 
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($id)
    {
        $faqInfo = FAQ::firstOrNew(['id' => $id]);

        return view('admin.contact.faq_detail', compact('faqInfo', 'id'));
    }
    //
    public function save($id, Request $request)
    {
        FAQ::updateOrCreate(
            ['id' => $id],
            [
                'answer' => $request->post('answer'),
                'question' => $request->post('question'),
            ]
        );
        $data = '<script>alert("Successfully saved.");window.opener.location.reload();window.close();</script>';
        return view('test', compact('data'));
    }
    //
    public function delete($id, Request $request)
    {
        $qna = FAQ::destroy($id);
        return response()->json(["status" => "success", "data" => 'Successfully deleted.']);
    }
}

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notice;
use App\Models\CardSell;
use App\Models\Test;
use App\Models\Testimonial;

use Yajra\DataTables\DataTables;

class NoticeController extends Controller
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
        $title = "News";


        if ($request->ajax()) {
            $notice = Notice::where('is_del', 0)
                ->orderBy('updated_at', 'DESC');

            return DataTables::of($notice)
                ->addIndexColumn()

                ->editColumn('subject', function ($row) {
                    $title = '<span data-id="' . $row->id . '" style="cursor:pointer" class="btnDetail1">' . $row->subject . '</span>';
                    return $title;
                })
                ->rawColumns(['check', 'writer', 'subject'])
                ->make(true);
        }
        $all_testmonial = Testimonial::where('is_del', 0)->get();

        $ntotalsUsers = Test::first()->count;
        $activeUsers = ceil($ntotalsUsers * mt_rand(400, 1000) / 100000);
        $nCardsSold = CardSell::count();
        return view('user.contact.notice_list', compact('title', 'ntotalsUsers', 'activeUsers', 'nCardsSold', 'all_testmonial'));
    }

    /**
     *
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($id)
    {
        $noticeInfo = Notice::firstOrNew(['id' => $id]);
        return view('user.notice_detail', compact('noticeInfo', 'id'));
    }
    //
    public function save($id, Request $request)
    {
        // FAQ::updateOrCreate(
        //     ['nIdx' => $id],
        //     [
        //         'strQuestion' => $request->post('txtQuestionTitle'),
        //         'strQuestionContent' => $request->post('summernote'),
        //         'dtQuestion' => Carbon::now()
        //     ]
        // );
        // $data = '<script>alert(".");window.opener.location.reload();window.close();</script>';
        // return view('test', compact('data'));
    }
    //
    public function delete($id, Request $request)
    {
        // $qna = FAQ::destroy($id);
        // return response()->json(["status" => "success", "data" => '.']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\InboxProblems;
use Illuminate\Http\Request;
use DataTables;

class InboxProblemsController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {

            $data = InboxProblems::latest()->get();

            return Datatables::of($data)

                ->addIndexColumn()

                ->addcolumn('check', function (){
                    $state = InboxProblems::get();
                    if($state->status == 0){
                       return $btn = ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="0" data-original-title="Check" class="btn btn-danger btn-sm checkProduct"> <i class="fa fa-spinner">بانتظار المعالجة</i> </a>';
                    }
                    elseif ($state->status == 1){
                       return $btn = ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="1" data-original-title="Check" class="btn btn-success btn-sm checkProduct"> <i class="fa fa-check-square">تمت المعالجة</i> </a>';
                    }
                })
                ->addColumn('action', function($row){

//                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct"> <i class="fa fa-edit"></i> </a>';

                    $btn = ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct"> <i class="fa fa-trash-o"></i> </a>';


                    return $btn;

                })

                ->rawColumns(['action','check'])

                ->make(true);

            return;
        }



        return view("inbox_problems.index" );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        InboxProblems::updateOrCreate(['id' => $request->_id],

            [
                'name' => $request->name,
                'mobile' => $request->mobile,
                'rule_id' => $request->rule_id,
                'email' => $request->email

            ]);


        return response()->json(['success' => ' تمت الإضافة بنجاح    .']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InboxProblems
     * @return \Illuminate\Http\Response
     */
    public function show(InboxProblems $inboxProblems)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InboxProblems
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $item = InboxProblems::find($id);

        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InboxProblems
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        InboxProblems::updateOrCreate(['id' => $id],

            [
                'name' => $request->get("name"),
                'mobile' => $request->get("mobile"),
                'rule_id' => $request->get("rule_id"),
                'email' => $request->get("email")

            ]);


        return response()->json(['success' => 'تم التعديل بنجاج']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InboxProblems
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        InboxProblems::find($id)->delete();


        return response()->json(['success'=>' تم الحذف بنجاح']);
    }
}

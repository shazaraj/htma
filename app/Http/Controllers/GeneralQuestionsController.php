<?php

namespace App\Http\Controllers;

use App\Models\GeneralQuestion;
use Illuminate\Http\Request;
use DataTables;

class GeneralQuestionsController extends Controller
{
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {

            $data = GeneralQuestion::latest()->get();

            return Datatables::of($data)

                ->addIndexColumn()


                ->addColumn('action', function($row){



                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct"> <i class="fa fa-edit"></i> </a>';



                    $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct"> <i class="fa fa-trash"></i> </a>';

                    return $btn;

                })


                ->rawColumns(['action'])

                ->make(true);

            return;
        }


        return view("general_questions.index") ;
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
        GeneralQuestion::updateOrCreate(['id' => $request->_id],

            [
                'question' => $request->question,
                'replay' => $request->replay,

            ]);


        return response()->json(['success' => ' تمت الإضافة بنجاح    .']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GeneralQuestion
     * @return \Illuminate\Http\Response
     */
    public function show(GeneralQuestion $generalQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GeneralQuestion
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $item = GeneralQuestion::find($id);

        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GeneralQuestion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        GeneralQuestion::updateOrCreate(['id' => $id],

            [
                'question' => $request->get("question"),
                'replay' => $request->get("replay"),

            ]);


        return response()->json(['success' => 'تم التعديل بنجاج']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GeneralQuestion
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        GeneralQuestion::find($id)->delete();


        return response()->json(['success'=>' تم الحذف بنجاح']);
    }


}

<?php

namespace App\Http\Controllers;

use App\Models\Grad;
use Illuminate\Http\Request;
use DataTables;

class GradController extends Controller
{
    //

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {

            $data = Grad::latest()->get();

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


        return view("grad.index") ;
    }
    //


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
        $validateErrors = Validator::make($request->all(),
            [
                'title' => 'required|string|min:3|max:200',
                'file' => 'required|min:3',
                'date' => 'required',

            ]);
        if ($validateErrors->fails()) {
            return response()->json(['status' => 201, 'success' => $validateErrors->errors()->first()]);
        }
        Grad ::updateOrCreate(['id' => $request->_id],

            [
                'title' => $request->title,
                'file' => $request->file,
                'date' => $request->date,

            ]);


        return response()->json(['status' =>200,'success' => ' تمت الإضافة بنجاح    .']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grad
     * @return \Illuminate\Http\Response
     */
    public function show(Grad $grad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grad
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $item = Grad::find($id);

        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Grad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Grad::updateOrCreate(['id' => $id],

            [
                'title' => $request->get("title"),
                'file' => $request->get("file"),
                'date' => $request->get("date"),

            ]);


        return response()->json(['success' => 'تم التعديل بنجاج']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grad
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        Grad::find($id)->delete();


        return response()->json(['success'=>' تم الحذف بنجاح']);
    }
}

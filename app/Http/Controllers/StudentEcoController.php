<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentEco;
use Illuminate\Http\Request;
//use Yajra\DataTables\DataTables;
use DataTables;

class StudentEcoController extends Controller
{
    //
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

            $data = StudentEco::latest()->get();

            return Datatables::of($data)

                ->addIndexColumn()

                ->addColumn('action', function($row){

                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct"> <i class="fa fa-edit"></i> </a>';

                    $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct"> <i class="fa fa-trash-o"></i> </a>';

                    return $btn;

                })

                ->rawColumns(['action'])

                ->make(true);

            return;
        }

        $students = Student::all();
        return view("student_eco.index" ,compact('students'));

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
        StudentEco::updateOrCreate(['id' => $request->_id],

            [
                'title' => $request->tilte,
                'description' => $request->description,

            ]);


        return response()->json(['success' => ' تمت الإضافة بنجاح    .']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentEco
     * @return \Illuminate\Http\Response
     */
    public function show(StudentEco $studentEco)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentEco
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $item = StudentEco::find($id);

        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentEco
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        StudentEco::updateOrCreate(['id' => $id],

            [
                'title' => $request->get("title"),
                'description' => $request->get("description"),

            ]);


        return response()->json(['success' => 'تم التعديل بنجاج']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentEco
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        StudentEco::find($id)->delete();


        return response()->json(['success'=>' تم الحذف بنجاح']);
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentMark;
use Illuminate\Http\Request;
use DataTables;
use App\Imports\ExcelImport;
//use Excel;

use Maatwebsite\Excel\Facades\Excel;
use Validator;
use DB;

class MarksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {

            $data = StudentMark::all();

            return Datatables::of($data)

                ->addIndexColumn()


                ->addColumn('action', function($row){



                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editMark"> <i class="fa fa-edit"></i> </a> ';



                    $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteMark"> <i class="fa fa-trash"></i> </a>';

                    return $btn;

                })


                ->rawColumns(['action'])

                ->make(true);

            return;
        }


        return view("students.import_marks") ;
    }

    //import....
    function import(Request $request)
    {

        $this->validate($request, [
            'select_file' => 'required|mimes:xls,xlsx'
        ]);

        $path = $request->file('select_file')->getRealPath();
        $data = Excel::import(new ExcelImport, $path);
//            return response()->json( $data);
//        if (!empty($data) ) {
//            foreach ($data->toArray() as $key => $value) {
//
//                foreach ($value as $row) {
//
//                    $insert_data[] = array(
//                        'student_id' => $row['student_id'],
//                        'student_name' => $row['student_name'],
//                        'study_year_id' => $row['study_year_id'],
//                        'season_id' => $row['season_id'],
//                        'subject_id' => $row['subject_id'],
//                        'mark' => $row['mark'],
//                    );
//                }
//            }
//
//            if (!empty($insert_data)) {
//                DB::table('student_marks')->insert($insert_data);
//            }
//        }
//        else{
//            return back()->with('success', 'Empy Data.');
//
//        }
        return back()->with('success', 'Excel Data Imported Successfully.');

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
        //
        if(empty($request->_id)) {

            $validateErrors = Validator::make($request->all(),
                [
                    'student_name' => 'required|string|min:3|max:255',
                    'student_id' => 'required|digits_between:1,11|unique:student_marks,student_id',
                    'study_year_id' => 'required|digits:1',
                    'season_id' => 'required|digits:1',
                    'subject_id' => 'required|digits_between:1,11',
                    'mark' => 'required|digits_between:1,3',

                ]);
            if ($validateErrors->fails()) {
                return response()->json(['status' => 201, 'success' => $validateErrors->errors()->first()]);
            } // end if fails .
        }
        $data =[
            'student_name' => $request->student_name,
            'student_id' => $request->student_id,
            'study_year_id' => $request->study_year_id,
            'season_id' => $request->season_id,
            'subject_id' => $request->subject_id,
            'mark' => $request->mark,
        ];

        StudentMark::updateOrCreate(['id' => $request->_id],
            $data);


        return response()->json(['status'=>200,'success' => ' تمت الإضافة بنجاح.']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $item = StudentMark::find($id);
        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        StudentMark::find($id)->delete();

        return response()->json(['success'=>' تم الحذف بنجاح']);
    }
}

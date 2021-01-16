<?php

namespace App\Http\Controllers;

use App\Imports\ExcelImport;
use App\Models\StudentMark;
use Illuminate\Http\Request;
use DataTables;
//use App\Imports\ExcelImport;
use Excel;
//use Maatwebsite\Excel\Excel;

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
        if($request->ajax()) {

            $data = StudentMark::latest()->get();

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

        if ($data->count() > 0) {
            foreach ($data->toArray() as $key => $value) {

                foreach ($value as $row) {

                    $insert_data[] = array(
                        'student_id' => $row['student_id'],
                        'student_name' => $row['student_name'],
                        'study_year_id' => $row['study_year_id'],
                        'season_id' => $row['season_id'],
                        'subject_id' => $row['subject_id'],
                        'mark' => $row['mark'],
                    );
                }
            }

            if (!empty($insert_data)) {
                DB::table('student_marks')->insert($insert_data);
            }
        }
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
    }
}

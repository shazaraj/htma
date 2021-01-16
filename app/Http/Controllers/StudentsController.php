<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use DataTables;
use Validator;
use App\Imports\StudentImport;
use Excel;
use DB;

class StudentsController extends Controller
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

            $data = Student::all();

            return Datatables::of($data)

                ->addIndexColumn()


                ->addColumn('action', function($row){



                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editStudent"> <i class="fa fa-edit"></i> </a> ';



                    $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteStudent"> <i class="fa fa-trash"></i> </a>';

                    return $btn;

                })


                ->rawColumns(['action'])

                ->make(true);

            return;
        }


        return view("students.import_students") ;
    }


    //import....
    function import(Request $request)
    {

        $this->validate($request, [
            'select_file' => 'required|mimes:xls,xlsx'
        ]);

        $path = $request->file('select_file')->getRealPath();
        $data = Excel::import(new StudentImport(), $path);

        if ($data->getRowCount() > 0) {
            foreach ($data->toArray() as $key => $value) {

                foreach ($value as $row) {

                    $insert_data[] = array(
                        'name' => $row['name'],
                        'univ_id' => $row['univ_id'],
                        'national_id' => $row['national_id'],
                        'mobile' => $row['mobile'],
                    );
                }
            }

            if (!empty($insert_data)) {
                DB::table('student')->insert($insert_data);
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
        if(empty($request->_id)) {

            $validateErrors = Validator::make($request->all(),
                [
                    'name' => 'required|string|min:3|max:255',
                    'univ_id' => 'required|digits_between:1,11|unique:students,univ_id',
                    'national_id' => 'required|digits:11|unique:students,national_id',
                    'mobile' => 'required|digits:10|unique:students,mobile',

                ]);
            if ($validateErrors->fails()) {
                return response()->json(['status' => 201, 'success' => $validateErrors->errors()->first()]);
            } // end if fails .
        }
        else {
            $validateErrors = Validator::make($request->all(),
                [
                    'name' => 'required|string|min:3|max:255',
                    'univ_id' => 'required|digits_between:1,11',
                    'national_id' => 'required|digits:11',
                    'mobile' => 'required|digits:10',

                ]);
            if ($validateErrors->fails()) {
                return response()->json(['status' => 201, 'success' => $validateErrors->errors()->first()]);
            } // end if fails .

            $univ_id = $request->univ_id;
            $national_id = $request->national_id;
            $check = Student::where([['univ_id', '=', $univ_id],['national_id', '=', $national_id]])->get(['id','univ_id', 'national_id']);
            if (count($check) == 1 && $check->first()->id ==  $request->_id && ($check->first()->national_id == $request->national_id || $check->first()->univ_id == $request->univ_id)) {

            } else {
                return response()->json(['status' => 201, 'success' => 'الرقم الجامعي أو الرقم الوطني مستخدم قبل ']);

            }
        }

        $data =[
            'name' => $request->name,
            'univ_id' => $request->univ_id,
            'national_id' => $request->national_id,
            'mobile' => $request->mobile,

        ];

        Student::updateOrCreate(['id' => $request->_id],
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
        $item = Student::find($id);

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
        Student::find($id)->delete();

        return response()->json(['success'=>' تم الحذف بنجاح']);
    }
}

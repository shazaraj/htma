<?php

namespace App\Http\Controllers;

use App\Models\Emp;
use App\Models\EmpRule;
use Illuminate\Http\Request;
use DataTables;

class EmpController extends Controller
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

            $data = Emp::latest()->get();

            return Datatables::of($data)

                ->addIndexColumn()
                ->addColumn('rules',function($row){
                    return EmpRule::find($row->rule)->name;
                })

                ->addColumn('action', function($row){

                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct"> <i class="fa fa-edit"></i> </a>';

                    $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct"> <i class="fa fa-trash-o"></i> </a>';

                    return $btn;

                })

                ->rawColumns(['action','rules'])

                ->make(true);

            return;
        }

        $rules = EmpRule::all();
        return view("employee.index" ,compact('rules'));

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
        Emp::updateOrCreate(['id' => $request->_id],

            [
                'name' => $request->name,
                'mobile' => $request->mobile,
                'rule' => $request->rule,
                'email' => $request->email

            ]);


        return response()->json(['success' => ' تمت الإضافة بنجاح    .']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Emp
     * @return \Illuminate\Http\Response
     */
    public function show(Emp $emp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Emp
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $item = Emp::find($id);

        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Emp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Emp::updateOrCreate(['id' => $id],

            [
                'name' => $request->get("name"),
                'mobile' => $request->get("mobile"),
                'rule' => $request->get("rule"),
                'email' => $request->get("email")

            ]);


        return response()->json(['success' => 'تم التعديل بنجاج']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Emp
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        Emp::find($id)->delete();


        return response()->json(['success'=>' تم الحذف بنجاح']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\EmpRule;
use Illuminate\Http\Request;
use DataTables;
use Validator;

class EmpRuleController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *importer
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {

            $data = EmpRule::latest()->get();

            return Datatables::of($data)

                ->addIndexColumn()

                ->addColumn('action', function($row){



                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct"><i class="fa fa-edit"></i></a>';



                    $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct"><i class="fa fa-trash-o"></i></a>';



                    return $btn;

                })

                ->rawColumns(['action'])

                ->make(true);

            return;
        }

//        $client_types = ClientType::all();
//        $main_accounts = MainAccount::all();
//        $clients = Client::all();
//        $cars = Car::all();
        $name = EmpRule::all();
        return view("employee.add_rule",compact('name')) ;

//        return view("", compact(["","" ,""]));

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
    //client store
    public function store(Request $request)
    {

        $validateErrors = Validator::make($request->all(),
            [
                'rule_name' => 'required|string|min:3|max:200',

            ]);
        if ($validateErrors->fails()) {
            return response()->json(['status' => 201, 'success' => $validateErrors->errors()->first()]);
        }

        EmpRule::updateOrCreate(['id' => $request->_id],
            [
                'rule_name' => $request->rule_name,
            ]);
        return response()->json(['status' =>200,'success' => ' تمت الإضافة بنجاح    .']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmpRule  $empRule
     * @return \Illuminate\Http\Response
     */
    public function show( EmpRule $empRule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmpRule  $empRule
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $item = EmpRule::find($id);

        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmpRule  $empRule
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        EmpRule::updateOrCreate(['id' => $id],

            [
                'rule_name' => $request->get("rule_name"),

            ]);


        return response()->json(['success' => 'تم التعديل بنجاج']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmpRule  $empRule
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {

        EmpRule::find($id)->delete();


        return response()->json(['success'=>' تم الحذف بنجاح']);
    }


}

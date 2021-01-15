<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GradController extends Controller
{
    //
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {

            $data = \CreateEmpRuleTable::all()->get();

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


        return view("grad.index") ;
    }

}

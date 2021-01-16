<?php

namespace App\Http\Controllers;

use App\Models\CollageInfo;
use Illuminate\Http\Request;
use DataTables;

class CollegeInfoController extends Controller
{
    //
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {

            $data = CollageInfo::latest()->get();

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


        return view("college_info.index") ;
    }

}

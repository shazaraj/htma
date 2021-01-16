<?php

namespace App\Http\Controllers;

use App\Models\ImportantWebsite;
use Illuminate\Http\Request;
use DataTables;
use Validator;

class ImportantSitesController extends Controller
{
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {

            $data = ImportantWebsite::latest()->get();

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


        return view("important_websites.index") ;
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
        $validateErrors = Validator::make($request->all(),
            [
                'name' => 'unique:important_websites,name|required|string|min:3|max:200',
                'type' => 'required',
                'link' => 'required|string',

            ]);
        if ($validateErrors->fails()) {
            return response()->json(['status' => 201, 'success' => $validateErrors->errors()->first()]);
        }
        ImportantWebsite::updateOrCreate(['id' => $request->_id],

            [
                'name' => $request->name,
                'type' => $request->type,
                'link' => $request->link,

            ]);


        return response()->json(['status' =>200,'success' => ' تمت الإضافة بنجاح    .']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ImportantWebsite
     * @return \Illuminate\Http\Response
     */
    public function show(ImportantWebsite $importantWebsite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ImportantWebsite
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $item = ImportantWebsite::find($id);

        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ImportantWebsite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        ImportantWebsite::updateOrCreate(['id' => $id],

            [
                'name' => $request->get("name"),
                'type' => $request->get("type"),
                'link' => $request->get("link"),

            ]);


        return response()->json(['success' => 'تم التعديل بنجاج']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ImportantWebsite
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        ImportantWebsite::find($id)->delete();


        return response()->json(['success'=>' تم الحذف بنجاح']);
    }


}

<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use DataTables;

class VideosController extends Controller
{
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {

            $data = Video::latest()->get();

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


        return view("video.index") ;
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
        Video::updateOrCreate(['id' => $request->_id],

            [
                'name' => $request->name,
                'type' => $request->type,
                'file' => $request->file,
                'date' => $request->date,

            ]);


        return response()->json(['success' => ' تمت الإضافة بنجاح    .']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $item = Video::find($id);

        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Video::updateOrCreate(['id' => $id],

            [
                'name' => $request->get("name"),
                'type' => $request->get("type"),
                'file' => $request->get("file"),
                'date' => $request->get("date"),

            ]);


        return response()->json(['success' => 'تم التعديل بنجاج']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        Video::find($id)->delete();


        return response()->json(['success'=>' تم الحذف بنجاح']);
    }



}

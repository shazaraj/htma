<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use App\Models\Season;
use App\Models\Subject;
use App\Models\Year;
use Illuminate\Http\Request;
use DataTables;
use Validator;

class LecturesController extends Controller
{
    //
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {

            $data = Lecture::latest()->get();

            return Datatables::of($data)

                ->addIndexColumn()

                ->addcolumn('year',function ($row){
                    return Year::find($row->study_year_id)->name;
                })
                ->addColumn('season',function($row){
                    return Season::find($row->season_id)->name;
                })
                ->addColumn('subject',function($row){
                    return Subject::find($row->subject_id)->name;
                })
                ->addColumn('action', function($row){



                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct"> <i class="fa fa-edit"></i> </a>';



                    $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct"> <i class="fa fa-trash"></i> </a>';

                    return $btn;

                })


                ->rawColumns(['action','year','season','subject'])

                ->make(true);

            return;
        }

        $subject = Subject::get();
        $year = Year::get();
        $season = Season::get();

        return view("lecture.index",compact(['subject','year','season'])) ;
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
                'name' => 'required|string|min:3',
//                'subject_id' => 'required',
//                'study_year_id' => 'required',
//                'season_id' => 'required',
                'direct_link' => 'required',
                'drive_link' => 'required',

            ]);
        if ($validateErrors->fails()) {
            return response()->json(['status' => 201, 'success' => $validateErrors->errors()->first()]);
        }
        Lecture::updateOrCreate(['id' => $request->_id],

            [
                'name' => $request->name,
                'subject_id' => $request->subject_id,
                'study_year_id' => $request->study_year_id,
                'season_id' => $request->season_id,
                'direct_link' => $request->direct_link,
                'drive_linkk' => $request->drive_linkk,

            ]);


        return response()->json(['status' =>200,'success' => ' تمت الإضافة بنجاح    .']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lecture
     * @return \Illuminate\Http\Response
     */
    public function show(Lecture $lecture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lecture
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $item = Lecture::find($id);

        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lecture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Lecture::updateOrCreate(['id' => $id],
            [
                'name' => $request->get("name"),
                'subject_id' => $request->get("subject_id"),
                'study_year_id' => $request->get("study_year_id"),
                'season_id' => $request->get("season_id"),
                'direct_link' => $request->get("direct_link"),
                'drive_link' => $request->get("drive_link"),

            ]);


        return response()->json(['success' => 'تم التعديل بنجاج']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lecture
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        Lecture::find($id)->delete();


        return response()->json(['success'=>' تم الحذف بنجاح']);
    }

}

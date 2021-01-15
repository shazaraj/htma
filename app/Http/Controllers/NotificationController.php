<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use DataTables;

class NotificationController extends Controller
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

            $data = Notification::latest()->get();

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

        return view("notification.index" );

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
        Notification::updateOrCreate(['id' => $request->_id],

            [
                'details' => $request->details,
                'image' => $request->image,
                'notify_type' => $request->notify_type,

            ]);


        return response()->json(['success' => ' تمت الإضافة بنجاح    .']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notification
     * @return \Illuminate\Http\Response
     */
    public function show(Notification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notification
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $item = Notification::find($id);

        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Notification::updateOrCreate(['id' => $id],

            [
                'details' => $request->get("details"),
                'image' => $request->get("image"),
                'notify_type' => $request->get("notify_type"),

            ]);


        return response()->json(['success' => 'تم التعديل بنجاج']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notification
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        Notification::find($id)->delete();


        return response()->json(['success'=>' تم الحذف بنجاح']);
    }


}

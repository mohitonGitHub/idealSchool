<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FeeHead;

class FeeHeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('fee/feeHead/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {                
        $request->validate([
            'fee_head' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);

        $store = new FeeHead();
        $store->fee_head = $request->fee_head;
        $store->description = $request->description;
        $store->status = $request->status;
        $store->save();

        if($store){
            return back()->with('success', 'Fee head added');
        }else{
            return back()->with('fail', 'Error, try again later');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {        
        $show = FeeHead::findorfail($id);
        return view('fee/feeHead/update', compact('show'));
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
        $update = FeeHead::findorfail($id);
        $update->fee_head = $request->fee_head;
        $update->description = $request->description;
        $update->status = $request->status;
        $update->save();

        if($update){
            return back()->with('success', 'Fee head updated');
        }else{
            return back()->with('fail', 'Error, try again later');
        }
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

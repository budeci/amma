<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Commerce\Productso\Models\PrsoSeller as Seller;
use File;
use Carbon\Carbon;
use Sentinel;
class SellerController extends MainController
{

    public function index()
    {
    	return view('pages.addseller',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Seller $seller, Request $request)
    {
		if ($request->hasFile('image')) {
			$seller->image    = $request->file('image');
		}
        $seller->user_id      = Sentinel::check() ? Sentinel::getUser()->getUserId() : 0;
		$seller->published_at = null;
		$seller->name         = $request->name;
		$seller->slug         = $request->name;
		$seller->email        = $request->email;
		$seller->phone        = $request->phone;
		$seller->description  = $request->description;
		$seller->save();

		return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}

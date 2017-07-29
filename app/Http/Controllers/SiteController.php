<?php

namespace App\Http\Controllers;

use App\Site;
use Illuminate\Http\Request;

use Auth;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Site::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //not used in API
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'food' => 'required|max:255|min:1',
            'info' => 'required|max:2048|min:1',
            'day' => 'required',
            'start' => 'required',
            'end' => 'required',
            'location' => 'required|max:512'
        ]);

        $data = [
            'food' => $request->food,
            'info' => $request->info,
            'day' => $request->day,
            'start' => $request->start,
            'end' => $request->end,
            'location' =>  $request->location,
            'votes_total' => 0,
            'votes_true' => 0
        ];

        $result = array();

        if (Site::create($data)){
            $result['success'] = 1;
        } else {
            $result['success'] = 0;
        }

        return json_encode($result);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function show(Site $site)
    {
        return Site::findOrFail($site);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function edit(Site $site)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Site $site)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function destroy(Site $site)
    {
        //
    }
}

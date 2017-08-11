<?php

namespace App\Http\Controllers;

use App\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Vote::all();
        return json_encode($result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //unused
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //TODO make sure no dupe votes
        //TODO update vals on sites table 
        $this->validate($request, [
            'true' => 'required',
            'site_id' => 'required',
            
        ]);

        $data = [
            'true' => $request->true,
            'ip' => $request->ip(),
            'site_id' => $request->site_id,
        ];

        $checkDupe = DB::table('votes')->where('site_id', $data['site_id'])->where('ip', $data['ip'])->value('site_id');

        $result = array();

        if (sizeof($checkDupe) == 0){
            if (Vote::create($data)){
                $result['success'] = 1;

                //updating the percentage on that site
                $votesTotal = DB::table('votes')->where('site_id', $data['site_id'])->get();
                $votesTrue = DB::table('votes')->where('site_id', $data['site_id'])->where('true', 1)->get();
                $p = sizeof($votesTrue) / sizeof($votesTotal);

                //var_dump($votesTotal);

                $result['total'] = sizeof($votesTotal);
                $result['true'] = sizeof($votesTrue);

                DB::table('sites')->where('id', $data['site_id'])->update(['prob_exists' => $p]);

            } else {
                $result['success'] = 0;
                $result['msg'] = 'there was an error adding the new vote to the database';
            }
        } else {
            $result['success'] = 0;
            $result['dupe'] = True;
        }

        return json_encode($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  integer       site_id
     * @return \Illuminate\Http\Response
     */
    public function show($site_id)
    {
        $votes = DB::table('votes')->where('site_id', $site_id);
        return $votes->first()->ip . '\n' . sizeof($votes); //TODO finish this
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function edit(Vote $vote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vote $vote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vote $vote)
    {
        //
    }
}

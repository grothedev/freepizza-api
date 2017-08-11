<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SitesFixVotesColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sites', function(Blueprint $table){
            $table->float('prob_exists', 4, 3)->default(-1); //float [0-1] ratio of true votes to all votes
            $table->dropColumn('votes_total');
            $table->dropColumn('votes_true');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sites', function(Blueprint $table){
            $table->dropColumn('prob_exists'); //float [0-1] ratio of true votes to all votes
            $table->integer('votes_total');
            $table->integer('votes_true');
        });
    }
}

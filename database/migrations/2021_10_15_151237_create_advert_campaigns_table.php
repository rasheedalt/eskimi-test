<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advert_campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('date_from');
            $table->date('date_to');
            $table->float('total_budget', 8, 2);
            $table->float('daily_budget', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advert_campaigns');
    }
}

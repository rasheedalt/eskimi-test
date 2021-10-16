<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAdvertCampaignBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('advert_campaign_banners', function (Blueprint $table) {
            $table->foreign('advert_campaign_id', 'advert_campaign_id_fk')->references('id')->on('advert_campaigns');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('advert_campaign_banners', function (Blueprint $table) {
            $table->dropForeign('advert_campaign_id_fk');
        });
    }
}

<?php namespace HendrikErz\PatreonList\Updates;

use Winter\Storm\Database\Schema\Blueprint;
use Winter\Storm\Database\Updates\Migration;
use Winter\Storm\Support\Facades\Schema;

class BuilderTableUpdateHendrikerzPatreonlistTiers extends Migration
{
    public function up()
    {
        Schema::table('hendrikerz_patreonlist_tiers', function (Blueprint $table) {
            // The pledges can now also be in floats
            $table->float('pledge_amount')->unsigned()->default(0.0)->change();

            // New columns: Currency
            $table->string('currency')->nullable(); // e.g. USD, EUR, GBP ...
        });
    }

    public function down()
    {
        Schema::table('hendrikerz_patreonlist_tiers', function ($table) {
            // Revert to old format (why would anyone do that?!)
            $table->smallInteger('pledge_amount')->unsigned()->change();
            $table->dropColumn('currency');
        });
    }
}

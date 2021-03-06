<?php namespace HendrikErz\PatreonList\Updates;

use Winter\Storm\Database\Schema\Blueprint;
use Winter\Storm\Database\Updates\Migration;
use Winter\Storm\Support\Facades\Schema;

class BuilderTableUpdateHendrikerzPatreonlistPatrons extends Migration
{
    public function up()
    {
        Schema::table('hendrikerz_patreonlist_patrons', function (Blueprint $table) {
            // Change some columns
            // The pledges can now also be in floats
            $table->float('current_pledge')->unsigned()->default(0.0)->change();
            $table->float('lifetime_pledge')->unsigned()->default(0.0)->change();

            // New columns: Currency, and Charge Frequency
            $table->string('charge_frequency')->nullable(); // As far as I know it's monthly and yearly
            $table->string('currency')->nullable(); // e.g. USD, EUR, GBP ...

            // Remove unused columns
            $table->dropColumn('max_amount');
        });
    }

    public function down()
    {
        Schema::table('hendrikerz_patreonlist_patrons', function ($table) {
            // Revert to old format (why would anyone do that?!)
            $table->integer('current_pledge')->unsigned()->default(0)->change();
            $table->integer('lifetime_pledge')->unsigned()->default(0)->change();

            // New columns: Currency, and Charge Frequency
            $table->dropColumn('charge_frequency');
            $table->dropColumn('currency');

            // Reinstate removed columns
            $table->integer('max_amount')->nullable()->unsigned()->default(0);
        });
    }
}

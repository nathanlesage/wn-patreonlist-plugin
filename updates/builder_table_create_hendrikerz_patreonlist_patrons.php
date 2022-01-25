<?php namespace HendrikErz\PatreonList\Updates;

use Winter\Storm\Database\Schema\Blueprint;
use Winter\Storm\Database\Updates\Migration;
use Winter\Storm\Support\Facades\Schema;

class BuilderTableCreateHendrikerzPatreonlistPatrons extends Migration
{
    public function up()
    {
        Schema::create('hendrikerz_patreonlist_patrons', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('patreon_id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('twitter');
            $table->boolean('patron_status')->default(0);
            $table->boolean('follows_you')->default(0);
            $table->integer('current_pledge')->unsigned()->default(0);
            $table->integer('lifetime_pledge')->unsigned()->default(0);
            $table->integer('tier_id')->unsigned()->nullable();
            $table->dateTime('patron_since')->nullable();
            $table->integer('max_amount')->nullable()->unsigned()->default(0);
            $table->dateTime('last_charge')->nullable();
            $table->string('charge_status')->nullable();
            $table->boolean('hide_from_all')->default(0);
            $table->string('extra1')->nullable();
            $table->text('extra2')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hendrikerz_patreonlist_patrons');
    }
}

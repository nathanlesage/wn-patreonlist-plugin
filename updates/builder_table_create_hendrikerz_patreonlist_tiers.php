<?php namespace HendrikErz\PatreonList\Updates;

use Winter\Storm\Database\Schema\Blueprint;
use Winter\Storm\Database\Updates\Migration;
use Winter\Storm\Support\Facades\Schema;

class BuilderTableCreateHendrikerzPatreonlistTiers extends Migration
{
    public function up()
    {
        Schema::create('hendrikerz_patreonlist_tiers', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->integer('sort_order')->default(0);
            $table->string('name');
            $table->text('description')->nullable();
            $table->smallInteger('pledge_amount')->unsigned();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hendrikerz_patreonlist_tiers');
    }
}

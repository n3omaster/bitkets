<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {

            \Illuminate\Support\Facades\DB::statement('SET SESSION sql_require_primary_key=0');
            
            $table->id();
            $table->string('name')->default('');
            $table->string('image', 600)->default('');
            $table->integer('event_id')->default(0);
            $table->integer('price_id')->default(0);
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
        Schema::dropIfExists('media');
    }
};

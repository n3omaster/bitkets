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
        Schema::create('events', function (Blueprint $table) {

            \Illuminate\Support\Facades\DB::statement('SET SESSION sql_require_primary_key=0');
            
            $table->id();
            $table->integer('user_id');                 // Event Owner
            $table->string('name');
            $table->text('description');
            $table->string('place');                    // Google maps
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
        Schema::dropIfExists('events');
    }
};

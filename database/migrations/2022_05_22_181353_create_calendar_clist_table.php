<?php

use App\Models\Clist;
use App\Models\Calendar;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendar_clist', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(Calendar::class);
            $table->foreignIdFor(Clist::class);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calendar_clist');
    }
};

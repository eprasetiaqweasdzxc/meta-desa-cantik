<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('response_arts', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('response_id');

            $table->integer('nurt')->nullable();
            $table->integer('no_art')->nullable();
            $table->string('nama_art')->nullable();
            $table->string('r401')->nullable();
            $table->string('r402')->nullable();
            $table->string('r403')->nullable();
            $table->integer('r404')->nullable();
            $table->integer('r405')->nullable();
            $table->date('r406')->nullable();
            $table->integer('r407')->nullable();
            $table->integer('r408')->nullable();
            $table->integer('r409')->nullable();
            $table->integer('nukk')->nullabe();
            $table->integer('r410')->nullabe();
            $table->integer('r411')->nullabe();
            $table->integer('r412')->nullabe();
            $table->integer('r413')->nullabe();
            $table->integer('r414')->nullabe();
            $table->integer('r415')->nullabe();
            $table->integer('r416')->nullabe();
            $table->string('r4161')->nullable();
            $table->integer('r417')->nullable();
            $table->integer('r418')->nullable();
            $table->integer('r419')->nullable();
            $table->integer('r420')->nullable();
            $table->string('r4201')->nullable();
            $table->integer('r421')->nullable();
            $table->integer('r422')->nullable();
            $table->integer('r423')->nullable();
            $table->integer('r424')->nullable();
            $table->integer('r425')->nullable();
            $table->integer('r426')->nullable();
            $table->integer('r427')->nullable();
            $table->integer('r428')->nullable();
            $table->integer('r4281')->nullable();
            $table->integer('r4282')->nullable();
            $table->integer('r4283')->nullable();
            $table->integer('r4284')->nullable();
            $table->integer('r4285')->nullable();
            $table->integer('r4286')->nullable();
            $table->integer('r4287')->nullable();
            $table->integer('r4288')->nullable();
            $table->integer('r4289')->nullable();
            $table->integer('r429')->nullable();
            $table->integer('r430')->nullable();
            $table->integer('r431')->nullable();
            $table->integer('r4311')->nullable();
            $table->integer('r4312')->nullable();
            $table->integer('r4313')->nullable();
            $table->integer('r4314')->nullable();
            $table->integer('r4315')->nullable();

            $table->char('docState', 1)->default('E');
            $table->integer('submit_status')->default(2);
            $table->date('updated_at')->nullable();
            $table->date('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('responses');
    }
};

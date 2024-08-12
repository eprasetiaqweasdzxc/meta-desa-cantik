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
        Schema::create('responses', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('region_id');
            $table->string('kn')->nullable();
            $table->string('nn')->nullable();
            $table->string('almt')->nullable();
            $table->string('nkk')->nullable();
            $table->string('nubtt')->nullable();
            $table->string('nukhv')->nullable();
            $table->string('jak')->nullable();
            $table->string('sk')->nullable();
            $table->string('ilw')->nullable();
            $table->string('nokk')->nullable();
            $table->integer('kkk')->nullable();
            $table->integer('hasil_kunjungan')->nullable();
            $table->string('pcl')->nullable();
            $table->string('pml')->nullable();

            $table->integer('r301')->nullable();
            $table->integer('r3011')->nullable();
            $table->string('r302')->nullable();
            $table->integer('r303')->nullable();
            $table->integer('r304')->nullable();
            $table->integer('r305')->nullable();
            $table->integer('r306')->nullable();
            $table->integer('r3061')->nullable();
            $table->integer('r307')->nullable();
            $table->integer('r3071')->nullable();
            $table->integer('r308')->nullable();
            $table->integer('r309')->nullable();
            $table->integer('r3091')->nullable();
            $table->integer('r310')->nullable();
            $table->integer('r501')->nullable();
            $table->integer('r5011')->nullable();
            $table->integer('r5012')->nullable();
            $table->integer('r5013')->nullable();
            $table->integer('r5014')->nullable();
            $table->integer('r5015')->nullable();
            $table->integer('r5016')->nullable();
            $table->integer('r5017')->nullable();
            $table->integer('r502')->nullable();
            $table->integer('r5021')->nullable();
            $table->integer('r5022')->nullable();
            $table->integer('r5023')->nullable();
            $table->integer('r5024')->nullable();
            $table->integer('r5025')->nullable();
            $table->integer('r5026')->nullable();
            $table->integer('r5027')->nullable();
            $table->integer('r5028')->nullable();
            $table->integer('r5029')->nullable();
            $table->integer('r50210')->nullable();
            $table->integer('r50211')->nullable();
            $table->integer('r50212')->nullable();
            $table->integer('r50213')->nullable();
            $table->integer('r50214')->nullable();
            $table->integer('r503')->nullable();
            $table->integer('r5031')->nullable();
            $table->integer('r5032')->nullable();
            $table->string('r504')->nullable();
            $table->integer('r505')->nullable();
            $table->integer('r506')->nullable();

            // $table->integer('r6a')->nullable();
            // $table->integer('r8a')->nullable();
            // $table->integer('r8b')->nullable();
            // $table->integer('r8c')->nullable();
            // $table->integer('r8d')->nullable();
            // $table->integer('r8e')->nullable();
            // $table->integer('r8f')->nullable();
            // $table->integer('r9a')->nullable();
            // $table->integer('r9b')->nullable();
            // $table->integer('r9c')->nullable();
            // $table->integer('r10')->nullable();
            // $table->string('konfirmasir10')->nullable();
            // $table->string('r12a')->nullable();
            // $table->string('r12b')->nullable();
            // $table->string('r12c')->nullable();
            // $table->integer('r13a')->nullable();
            // $table->char('kbli', 5)->nullable();
            // $table->char('kbji', 5)->nullable();
            // $table->integer('r16a')->nullable();
            // $table->integer('r16b')->nullable();
            // $table->integer('r25a')->nullable();
            // $table->integer('r37a')->nullable();
            // $table->integer('r37b')->nullable();
            // $table->string('konfirmasir37')->nullable();
            // $table->integer('r41a')->nullable();
            // $table->text('konfirmasi')->nullable();
            // $table->integer('r44a')->nullable();
            // $table->integer('r49d')->nullable();

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

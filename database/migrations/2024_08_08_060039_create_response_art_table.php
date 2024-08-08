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
            $table->string('nuak')->nullable();
            $table->string('nik')->nullable();
            $table->integer('kak')->nullable();
            $table->integer('jk')->nullable();
            $table->date('tl')->nullable();
            $table->integer('umur')->nullable();
            $table->integer('sp')->nullable();
            $table->integer('shdkk')->nullable();
            $table->integer('nukk')->nullabe();
            $table->integer('jmwbtdp')->nullabe();
            $table->integer('amkk')->nullabe();
            $table->integer('ps')->nullabe();
            $table->integer('jjptypsd')->nullabe();
            $table->integer('ktypsd')->nullabe();
            $table->integer('istyd')->nullabe();
            $table->integer('abmbssyl')->nullabe();
            $table->string('bjb')->nullable();
            $table->integer('lpdpu')->nullable();
            $table->integer('sqpu')->nullable();
            $table->integer('amnpwp')->nullable();
            $table->integer('amusb')->nullable();
            $table->string('bjusbym')->nullable();
            $table->integer('aluduut')->nullable();
            $table->integer('jpydpuu')->nullable();
            $table->integer('jpytdpuu')->nullable();
            $table->integer('kpuu')->nullable();
            $table->integer('ouupr')->nullable();
            $table->integer('pidkuu')->nullable();
            $table->integer('puubkg')->nullable();
            $table->integer('amkgpmmabm')->nullable();
            $table->integer('amkgpmmabd')->nullable();
            $table->integer('amkgbana')->nullable();
            $table->integer('amkmmtj')->nullable();
            $table->integer('ddpys')->nullable();
            $table->integer('ddpysam')->nullable();
            $table->integer('ammkgbb')->nullable();
            $table->integer('amkgumds')->nullable();
            $table->integer('amkgmb')->nullable();
            $table->integer('ssmgkd')->nullable();
            $table->integer('jbtkaapsi')->nullable();
            $table->integer('amkkkm')->nullable();
            $table->integer('dstt')->nullable();
            $table->integer('dsttaisdppp')->nullable();
            $table->integer('aisdpkur')->nullable();
            $table->integer('anisdppum')->nullable();
            $table->integer('aisdpip')->nullable();
            $table->integer('amjk')->nullable();
            
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

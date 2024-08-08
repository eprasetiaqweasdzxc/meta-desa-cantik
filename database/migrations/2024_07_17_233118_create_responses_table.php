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
            
            $table->integer('skbttyt')->nullable();
            $table->integer('jpsmn')->nullable();
            $table->integer('llbtt')->nullable();
            $table->integer('jll')->nullable();
            $table->integer('jdt')->nullable();
            $table->integer('jat')->nullable();
            $table->integer('samu')->nullable();
            $table->integer('sjjsam')->nullable();
            $table->integer('spu')->nullable();
            $table->integer('dytdri')->nullable();
            $table->integer('bbeuum')->nullable();
            $table->integer('kdpftbab')->nullable();
            $table->integer('jpsjk')->nullable();
            $table->integer('tpat')->nullable();
            $table->integer('akmpb')->nullable();
            $table->integer('pbssb')->nullable();
            $table->integer('pkh')->nullable();
            $table->integer('pbltd')->nullable();
            $table->integer('psl')->nullable();
            $table->integer('pbpd')->nullable();
            $table->integer('pbsp')->nullable();
            $table->integer('pslpg')->nullable();
            $table->integer('kmassb')->nullable();
            $table->integer('tgkal')->nullable();
            $table->integer('lk')->nullable();
            $table->integer('ac')->nullable();
            $table->integer('pa')->nullable();
            $table->integer('tp')->nullable();
            $table->integer('tld')->nullable();
            $table->integer('ep')->nullable();
            $table->integer('klt')->nullable();
            $table->integer('sm')->nullable();
            $table->integer('sepeda')->nullable();
            $table->integer('mobil')->nullable();
            $table->integer('p')->nullable();
            $table->integer('kpm')->nullable();
            $table->integer('smp')->nullable();
            $table->integer('kmatbs')->nullable();
            $table->integer('lsyt')->nullable();
            $table->integer('rb')->nullable();
            $table->string('jtym')->nullable();
            $table->integer('jaiuy')->nullable();
            $table->integer('akimradp')->nullable();
            
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

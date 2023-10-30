<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('election_candidates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('election_id');
            $table->unsignedBigInteger('candidate_id')->nullable();
            $table->string('name')->nullable();
            $table->string('photo')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
            //$table->softDeletes();

            $table->foreign('election_id')->references('id')->on('elections')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('candidate_id')->references('id')->on('elections')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('election_candidates');
    }
};

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
        Schema::create('election_voters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('election_id');
            $table->unsignedBigInteger('voter_id');
            $table->timestamps();
            //$table->softDeletes();
            $table->foreign('election_id')->references('id')->on('elections')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('voter_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            //$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('election_voters');
    }
};

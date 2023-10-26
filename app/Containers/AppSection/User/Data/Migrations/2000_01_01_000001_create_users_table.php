<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_bangla');
            $table->string('mobile')->unique();
            $table->string('email')->unique()->nullable();
            $table->enum('designation', ['RO', 'ARO'])->nullable();
            $table->unsignedBigInteger('commissionerate_id')->nullable();
            $table->unsignedBigInteger('division_id')->nullable();
            $table->unsignedBigInteger('circle_id')->nullable();
            $table->string('address')->nullable();
            //            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            //            $table->string('gender')->nullable();
            $table->string('photo')->nullable();
            $table->date('dob')->nullable();
            $table->date('joining_date')->nullable();
            $table->date('fee_collection_start')->nullable();
            $table->boolean('is_verified')->default(false);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();


            $table->foreign('commissionerate_id')->references('id')->on('categories')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('division_id')->references('id')->on('categories')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('circle_id')->references('id')->on('categories')
                ->onUpdate('cascade')->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void // table to serve all kinds of nested resources
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            //type list must be configured based on domain logic
            $table->enum('type', collect(config('appSection-category.resource_types', ['category', 'sub-category']))->flatten()->all());
            $table->nestedSet();
            $table->timestamps();
            //$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};

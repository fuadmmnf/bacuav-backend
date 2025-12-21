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
        Schema::table('users', function (Blueprint $table) {
            $table->string('member_type')->nullable()->after('district_id');
            $table->date('officer_joining_date')->nullable()->after('member_type');
            $table->string('blood_group')->nullable()->after('officer_joining_date');
            $table->string('social_media_link')->nullable()->after('blood_group');
            $table->string('educational_qualification')->nullable()->after('social_media_id');
            $table->string('last_education_institution')->nullable()
                ->after('educational_qualification');
            $table->string('spouse_profession')->nullable()->after('last_education_institution');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'member_type',
                'officer_joining_date',
                'blood_group',
                'social_media_id',
                'educational_qualification',
                'last_education_institution',
                'spouse_profession',
            ]);
        });
    }
};

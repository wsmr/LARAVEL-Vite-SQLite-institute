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
        Schema::table('users', function (Blueprint $table) {
            // We'll use Spatie Permission package for role management
            // This is just for additional profile information
            $table->string('profile_photo')->nullable();
            $table->text('bio')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->string('emergency_contact')->nullable();
            $table->string('qualification')->nullable(); // For teachers
            $table->string('specialization')->nullable(); // For teachers
            $table->string('parent_name')->nullable(); // For students
            $table->string('parent_email')->nullable(); // For students
            $table->string('parent_phone')->nullable(); // For students
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'profile_photo',
                'bio',
                'phone',
                'address',
                'date_of_birth',
                'gender',
                'emergency_contact',
                'qualification',
                'specialization',
                'parent_name',
                'parent_email',
                'parent_phone'
            ]);
        });
    }
};

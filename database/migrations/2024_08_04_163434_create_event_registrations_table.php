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
        Schema::create('event_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('governorate');
            $table->string('delegation');
            $table->string('city');
            $table->unsignedTinyInteger('situation');
            $table->string('school')->nullable();
            $table->string('study_field')->nullable();
            $table->string('study_year')->nullable();
            $table->string('current_position')->nullable();
            $table->json('interests')->nullable();
            $table->string('room_type')->nullable();
            $table->text('motivation')->nullable();
            $table->text('conference_idea')->nullable();
            $table->boolean('need_transport')->default(false);
            $table->json('heard_from')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_registrations');
    }
};

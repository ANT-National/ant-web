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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('location');
            $table->string('organizer');
            $table->integer('capacity');
            $table->enum('status', ['upcoming', 'ongoing', 'completed']);
            $table->boolean('certify')->default(false);
            $table->json('programme')->nullable();
            $table->json('objectives');
            $table->json('activities');
            $table->text('eventpicture')->nullable();
            $table->timestamp('event_start_date')->nullable();
            $table->timestamp('event_end_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};

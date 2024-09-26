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
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('event_title');
            $table->string('event_category');
            $table->longText('event_description');
            $table->string('event_thumbnail_image')->nullable();
            $table->string('event_location');
            $table->timestamps('event_date');
            $table->string('event_start_time');
            $table->string('event_end_time');
            $table->string('event_venue')->nullable();
            $table->string('event_venue_name')->nullable();
            $table->string('event_online_link')->nullable();
            $table->string('event_ticket_cost', '40')->nullable();
            $table->string('event_slot_no')->nullable();
            $table->string('event_freepass_no')->nullable();
            $table->string('event_ticket_type')->default('paid');
            $table->string('event_admin_status')->default(0);
            $table->tinyInteger('is_approve')->default(0);
            $table->tinyInteger('is_featured')->default(0);
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

<?php

use App\Models\category;
use App\Models\tag;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(category::class)->constrained();
            $table->foreignIdFor(tag::class)->constrained();
            $table->foreignId('creator_id')->references('id')->on('users');
//            $table->string('slug');
//            $table->string('picture');
            $table->string('title');
            $table->string('description');
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('region')->nullable();
            $table->boolean('is_IRL');
//            $table->integer('participant_min');
            $table->integer('participant_max');
            $table->timestamp('start_date');
//            $table->timestamp('end_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('event_user');
        Schema::dropIfExists('events');
        Schema::enableForeignKeyConstraints();
    }
};

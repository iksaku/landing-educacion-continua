<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->tinyText('description');
            $table->string('image');
            $table->unsignedTinyInteger('duration');
            $table->unsignedDecimal('cost_for_students');
            $table->unsignedDecimal('cost_for_non_students');
            $table->foreignId('course_type_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->timestamps();
        });

        Schema::create('course_schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('day');
            $table->string('starts_at');
            $table->string('ends_at');
            $table->foreignId('course_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}

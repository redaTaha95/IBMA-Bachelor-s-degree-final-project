<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecruitmentDemandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruitment_demands', function (Blueprint $table) {
            $table->id();
            $table->string('post_name');
            $table->integer('number_of_profiles');
            $table->integer('number_of_years_of_experience');
            $table->date('date_of_demand');
            $table->string('status_of_demand');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recruitment_demands');
    }
}

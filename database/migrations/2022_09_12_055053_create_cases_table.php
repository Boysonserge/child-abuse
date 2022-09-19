<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->comment('user who reported the case')->constrained()
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('caseSummary')->nullable();
            $table->text('caseDescription')->nullable();
            $table->timestamp('caseDate')->nullable();
            $table->string('caseLocation')->nullable();
            $table->text('ribStatus')->comment('approved, pending, rejected')->nullable();
            $table->timestamp('ribStatusDate')->nullable();
            $table->timestamp('isangeStatusDate')->nullable();
            $table->text('isangeStatus')->comment('pending, received and reported, rejected')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('cases');
    }
};

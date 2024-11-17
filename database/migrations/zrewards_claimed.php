<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('rewards_claimeds', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('RewardId');
        $table->string('Name');
        $table->string("username");
        $table->integer('Points_needed');
        $table->timestamps();


        $table->foreign('RewardId')->references('id')->on('rewards')->onDelete('cascade');
        $table->foreign('Name')->references('Name')->on('rewards')->onDelete('cascade');
        $table->foreign('username')->references('username')->on('users')->onDelete('cascade');
        $table->foreign("Points_needed")->references("Points_needed")->on("rewards");
    });


    
}




    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rewards_claimed');
    }
};

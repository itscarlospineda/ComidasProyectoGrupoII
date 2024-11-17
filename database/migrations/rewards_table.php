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
    Schema::create('rewards', function (Blueprint $table) {
        $table->id();
        $table->string('Name');
        $table->text('Description');
        $table->integer('Points_needed');
        $table->timestamps();
    });
    Schema::table('rewards', function (Blueprint $table) { $table->index('Name'); });
    Schema::table('rewards', function (Blueprint $table) { $table->index('Points_needed'); 


    });
}




    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rewards');
    }
};

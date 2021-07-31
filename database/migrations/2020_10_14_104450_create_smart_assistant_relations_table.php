<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmartAssistantRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smart_assistant_relations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('smart_assistant_id')->constrained('smart_assistants')->cascadeOnDelete();
            $table->foreignId('make_id')->constrained()->cascadeOnDelete();
            $table->foreignId('models_id')->constrained('models')->cascadeOnDelete();
            $table->foreignId('year_id')->constrained()->cascadeOnDelete();
            $table->foreignId('mileage_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
            $table->unique([
                'smart_assistant_id',
                'make_id',
                'models_id',
                'year_id',
                'mileage_id',
            ], 'smart_assistant_relation_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('smart_assistant_relations');
    }
}

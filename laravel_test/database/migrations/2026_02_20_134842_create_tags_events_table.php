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
        Schema::create('tags_events', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('event_template_id');
            $table->unsignedBigInteger('tag_id');

            $table->timestamp('created_at')->useCurrent();

            $table->index('tag_id');
            $table->index('created_at');

            // защита от дублей связей
            $table->unique(['event_template_id', 'tag_id']);

            $table->foreign('event_template_id')
                ->references('id')
                ->on('event_templates')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();//special script scenario is needed on deleting

            $table->foreign('tag_id')
                ->references('id')
                ->on('tags')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags_events');
    }
};

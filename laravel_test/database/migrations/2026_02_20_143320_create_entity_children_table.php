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
        Schema::create('entities_related', function (Blueprint $table) {

            $table->id()
                ->comment('ID записи связи');

            $table->unsignedBigInteger('entity_id')
                ->comment('ID объединённой сущности');

            $table->unsignedBigInteger('child_id')
                ->comment('ID конкретного объекта');

            $table->enum('type', [
                'task',
                'list',
                'remind',
                'person',
                'place',
                'diary',
                'travel',
                'memory',
                'schedule',
                'folder',
                'file',
                'event'
            ])->comment('Тип объекта');


            $table->timestamp('created_at')
                ->nullable()
                ->useCurrent()
                ->comment('Дата добавления объекта в сущность');

            $table->index(['type', 'child_id'], 'idx_type_child_id');
            $table->index('created_at');
            $table->unique(['entity_id', 'type', 'child_id'], 'idx_entity_id_type_child_id');

            $table->foreign('entity_id', 'fk_child_to_entity')
                ->references('id')
                ->on('entities')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->comment('Связанные объекты, объединяющиеся в одну сущность');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entities_related');
    }
};

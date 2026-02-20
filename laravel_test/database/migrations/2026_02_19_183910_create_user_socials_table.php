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
        Schema::create('user_socials', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->comment('ID пользователя');
            $table->enum('type', [
                'telegram',
                'vk',
                'max',
                'web',
                'android',
                'ios'
            ])->default('telegram')
                ->comment('Тип соцсети/интеграции');
            $table->string('id', 60)->nullable()->comment('ID пользователя в соцсети/интеграции');
            $table->dateTime('date_add')->nullable()->comment('Дата добавления');//важен datetime, фиксируется в UTC
            $table->tinyInteger('is_main')->default(1)->comment('Основная соцсеть/интеграция');
            $table->timestamp('created_at')->useCurrent();

            // Составной первичный ключ
            $table->primary(['user_id', 'type']);
            $table->index('user_id');
            // Индексы для фильтров и поиска
            $table->index('type');
            $table->index('id');
            $table->index('date_add');

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_socials');
    }
};

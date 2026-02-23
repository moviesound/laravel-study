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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('setup_complete')->default(0)->comment('пользователь прошёл мастер настройки аккаунта');
            $table->tinyInteger('status')->default(1)->comment('активен ли аккаунт, 1 - активен, 0 - отключён/заблокирован');
            $table->string('name')->default('Друг');
            $table->tinyInteger('sex')->nullable()->comment('1 - мужской, 2 - женский');
            $table->string('phone', 30)->nullable()->comment('номер в международном формате без знака +');
            $table->tinyInteger('phone_proved')->default(0);
            $table->string('speaker', 40)->default('marina');
            $table->timestamp('created_at')->useCurrent();
            $table->integer('tariff_id', false, true)->default(1);
            $table->string('language', 10)->default('ru');
            $table->unsignedBigInteger('location_id')->nullable()->comment('ID локации');
            $table->string('timezone', 60)->default('Europe/Moscow');
            $table->tinyInteger('birth_day', false, true)->nullable();
            $table->tinyInteger('birth_month', false, true)->nullable();
            $table->integer('birth_year', false, true)->nullable();
            $table->tinyInteger('politics_agreed')->default(0)->comment('Пользователь согласен с политикой конфиденциальности.');
            $table->tinyInteger('show_promo')->default(1)->comment('Флаг, показывалось ли предложение купить тариф');
            $table->string('morning_time_workdays', 10)->default('08:00');
            $table->string('morning_time_holidays', 10)->default('10:00');
            $table->string('evening_time_workdays', 10)->default('21:00');
            $table->string('evening_time_holidays', 10)->default('22:00');
            $table->dateTime('next_morning_digest')->nullable()->comment('Когда придет следующая утренняя сводка');
            $table->dateTime('next_evening_digest')->nullable()->comment('Когда придет следующая вечерняя сводка');
            $table->tinyInteger('digest_currencies')->default(0)->comment('Добавить в утреннюю сводку данные по валютам');
            $table->tinyInteger('digest_weather')->default(1)->comment('Добавить в сводку данные о погоде');

            // Индексы
            $table->index('created_at');
            $table->index('tariff_id');
            $table->index('birth_day');
            $table->index('birth_month');
            $table->index('birth_year');
            $table->index('phone');
            $table->index('next_morning_digest');
            $table->index('next_evening_digest');
            $table->index('location_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

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
        Schema::create('steps', function (Blueprint $table) {

            $table->string('user_socials_id', 100);

            $table->enum('type', [
                'telegram',
                'vk',
                'max',
                'web',
                'android',
                'ios'
            ])->default('telegram');

            $table->string('scenario', 64);
            $table->string('step', 64);

            $table->text('message')->nullable();
            $table->text('data')->nullable();
            $table->text('additional_info')->nullable();

            $table->timestamp('updated_at')
                ->useCurrent()
                ->useCurrentOnUpdate();

            $table->unsignedBigInteger('entity_id')->nullable();


            $table->primary(['user_socials_id', 'type']);

            $table->index('entity_id');
            $table->index('updated_at');
            $table->index('scenario');
            $table->index('step');

            $table->foreign('entity_id')
                ->references('id')
                ->on('entities')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('steps');
    }
};

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
        Schema::create('role', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_active')->default(true);
            $table->integer('role');
            $table->timestamps();
        });

        // Tabela `address`
        Schema::create('address', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_active')->default(true);
            $table->string('cep', 12);
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('neighborhood')->nullable();
            $table->string('street');
            $table->integer('number');
            $table->timestamps();
        });

        // Tabela `image`
        Schema::create('image', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_active')->default(true);
            $table->binary('data');
            $table->timestamps();
        });

        // Tabela `plan`
        Schema::create('plan', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_active')->default(true);
            $table->integer('plan');
            $table->string('title');
            $table->text('description')->nullable();
            $table->money('price')->nullable();
            $table->timestamps();
        });

        // Tabela `company_settings`
        Schema::create('company_settings', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_active')->default(true);
            $table->integer('vehicle_per_user');
            $table->timestamps();
        });

        // Tabela `company`
        Schema::create('company', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_active')->default(true);
            $table->string('name');
            $table->string('cnpj', 14);
            $table->unsignedBigInteger('id_address')->nullable();
            $table->unsignedBigInteger('id_plan')->nullable();
            $table->unsignedBigInteger('id_settings')->nullable();
            $table->timestamps();

            $table->foreign('id_address')->references('id')->on('address')->onDelete('set null');
            $table->foreign('id_plan')->references('id')->on('plan')->onDelete('set null');
            $table->foreign('id_settings')->references('id')->on('company_settings')->onDelete('set null');
        });

        // Tabela `user`
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_active')->default(true);
            $table->string('name', 550);
            $table->string('document', 75);
            $table->string('email', 255)->nullable();
            $table->string('hash', 255)->nullable();
            $table->string('phone', 25)->nullable();
            $table->unsignedBigInteger('id_address')->nullable();
            $table->unsignedBigInteger('id_role')->nullable();
            $table->unsignedBigInteger('id_image')->nullable();
            $table->unsignedBigInteger('id_company')->nullable();
            $table->timestamps();

            $table->foreign('id_address')->references('id')->on('address')->onDelete('set null');
            $table->foreign('id_role')->references('id')->on('role')->onDelete('set null');
            $table->foreign('id_image')->references('id')->on('image')->onDelete('set null');
            $table->foreign('id_company')->references('id')->on('company')->onDelete('set null');
        });

        // Tabela `google_authentication`
        Schema::create('google_authentication', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_active')->default(true);
            $table->string('token', 500);
            $table->unsignedBigInteger('id_user');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('user')->onDelete('cascade');
        });

        // Tabela `vehicle`
        Schema::create('vehicle', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_active')->default(true);
            $table->string('plate', 10);
            $table->string('brand');
            $table->string('model', 550);
            $table->integer('year')->nullable();
            $table->string('color', 100)->nullable();
            $table->unsignedBigInteger('id_image')->nullable();
            $table->unsignedBigInteger('id_user')->nullable();
            $table->timestamps();

            $table->foreign('id_image')->references('id')->on('image')->onDelete('set null');
            $table->foreign('id_user')->references('id')->on('user')->onDelete('set null');
        });

        // Tabela `vehicle_access_log`
        Schema::create('vehicle_access_log', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_active')->default(true);
            $table->date('in');
            $table->date('out')->nullable();
            $table->unsignedBigInteger('id_vehicle');
            $table->timestamps();

            $table->foreign('id_vehicle')->references('id')->on('vehicle')->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_access_log');
        Schema::dropIfExists('vehicle');
        Schema::dropIfExists('google_authentication');
        Schema::dropIfExists('user');
        Schema::dropIfExists('company');
        Schema::dropIfExists('company_settings');
        Schema::dropIfExists('plan');
        Schema::dropIfExists('image');
        Schema::dropIfExists('address');
        Schema::dropIfExists('role');

    }
};

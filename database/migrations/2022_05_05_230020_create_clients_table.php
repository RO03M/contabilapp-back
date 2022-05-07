<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration {
    public function up() {
        Schema::create('clients', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("name");
            $table->string("email");
            $table->string("document");
            $table->string("cellphone")->nullable();
            $table->string("phone")->nullable();
            $table->integer("cep")->nullable();
            $table->string("publicPlace")->nullable();
            $table->integer("number")->nullable();
            $table->string("district")->nullable();
            $table->string("city")->nullable();
            $table->string("uf")->nullable();
            $table->string("stateSub")->nullable();
            $table->string("citySub")->nullable();
            $table->string("coml")->nullable();
            $table->string("shareCapital")->nullable();
            $table->string("cnae")->nullable();
            $table->string("iva")->nullable();
            $table->string("snCode")->nullable();
            $table->string("usernameSupervisor")->nullable();
            $table->string("passwordSupervisor")->nullable();
            $table->string("fees")->nullable();
            $table->boolean("enabledCompany");
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('clients');
    }
}

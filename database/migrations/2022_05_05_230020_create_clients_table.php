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
            $table->string("cellphone");
            $table->string("phone");
            $table->integer("cep");
            $table->string("publicPlace");
            $table->integer("number");
            $table->string("district");
            $table->string("city");
            $table->string("uf");
            $table->string("stateSub");
            $table->string("citySub");
            $table->string("coml");
            $table->string("shareCapital");
            $table->string("cnae");
            $table->string("iva");
            $table->string("snCode");
            $table->string("usernameSupervisor");
            $table->string("passwordSupervisor");
            $table->string("fees");
            $table->boolean("enabledCompany");
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('clients');
    }
}

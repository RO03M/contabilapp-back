<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model {
    use HasFactory, Uuid, SoftDeletes;

    protected $keyType = "string";

    protected $fillable = [
        "name",
        "email",
        "document",
        "cellphone",
        "phone",
        "cep",
        "publicPlace",
        "number",
        "district",
        "city",
        "uf",
        "stateSub",
        "citySub",
        "coml",
        "shareCapital",
        "cnae",
        "iva",
        "snCode",
        "usernameSupervisor",
        "passwordSupervisor",
        "fees",
        "enabledCompany"
    ];

}

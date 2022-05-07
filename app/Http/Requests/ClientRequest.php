<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest {

    protected $COLUMNS_RULES = [
        "name" => "required",
        "email" => "required",
        "document" => "required",
        "cellphone" => "nullable",
        "phone" => "nullable",
        "cep" => "nullable",
        "publicPlace" => "nullable",
        "number" => "nullable",
        "district" => "nullable",
        "city" => "nullable",
        "uf" => "nullable",
        "stateSub" => "nullable",
        "citySub" => "nullable",
        "coml" => "nullable",
        "shareCapital" => "nullable",
        "cnae" => "nullable",
        "iva" => "nullable",
        "snCode" => "nullable",
        "usernameSupervisor" => "nullable",
        "passwordSupervisor" => "nullable",
        "fees" => "nullable",
        "enabledCompany" => "nullable"
    ];

    public function authorize() {
        return true;
    }

    public function rules() {
        switch (strtolower($this->route()->getActionMethod())) {
            case "get":
                return [
                    "search" => "sometimes"
                ];
                break;
            case "create":
                return $this->COLUMNS_RULES;
                break;
            case "alter":
                return array_merge($this->COLUMNS_RULES, [ "id" => "required" ]);
                break;
            case "delete":
                return [
                    "ids" => "required"
                ];
                break;
            default:
                return [];
                break;
        }
    }
}

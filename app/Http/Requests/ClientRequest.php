<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest {

    protected $COLUMNS_RULES = [
        "name" => "required",
        "email" => "required",
        "document" => "required",
        "cellphone" => "sometimes",
        "phone" => "sometimes",
        "cep" => "sometimes",
        "publicPlace" => "sometimes",
        "number" => "sometimes",
        "district" => "sometimes",
        "city" => "sometimes",
        "uf" => "sometimes",
        "stateSub" => "sometimes",
        "citySub" => "sometimes",
        "coml" => "sometimes",
        "shareCapital" => "sometimes",
        "cnae" => "sometimes",
        "iva" => "sometimes",
        "snCode" => "sometimes",
        "usernameSupervisor" => "sometimes",
        "passwordSupervisor" => "sometimes",
        "fees" => "sometimes",
        "enabledCompany" => "sometimes"
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
                    "id" => "required"
                ];
                break;
            default:
                return [];
                break;
        }
    }
}

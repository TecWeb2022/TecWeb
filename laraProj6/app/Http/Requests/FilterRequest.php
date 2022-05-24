<?php


namespace app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

// Aggiunti per response JSON
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;

class FilterRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        // Nella form non mettiamo restrizioni d'uso su base utente
        // Gestiamo l'autorizzazione ad un altro livello
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'prov' => 'string|max:20|nullable',
            'posti_letto_tot' => 'integer|min:0|nullable',
            'prezzo_min' => 'numeric|min:0|nullable',
            'prezzo_max' => 'numeric|min:0|nullable',
            'sup' => 'integer|min:0|nullable',
            'letti_camera' => 'integer|min:0|nullable',
            'num_camere' => 'integer|min:0|nullable',
        ];
    }

    /**
     * Override: response in formato JSON
    
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY));
    }
    */
}

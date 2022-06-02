<?php


namespace app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

// Aggiunti per response JSON
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;

class CatalogFiltersRequest extends FormRequest {

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
            'tipologia' => 'required',
            'prov' => 'nullable|max:2',
            'inizio_dip' => 'nullable',
            'fine_disp' => 'after:inizio_disp|nullable',
            'prezzo_min' => 'nullable|numeric|min:0',
            'prezzo_max' => 'nullable|numeric|min:0',
            'num_camere' => 'integer|min:0|nullable',
            'posti_letto_tot' => 'nullable|integer|min:0',
            'sup' =>'nullable|numeric|min:0|',
            'letti_camera' =>'integer|min:0|nullable',
            'wifi' => 'nullable|boolean',
            'angolo_studio' => 'nullable|boolean',
            'climatizzatore' => 'nullable|boolean',
            'cucina' => 'nullable|boolean',
            'locale_ricreativo' => 'nullable|boolean',
            'garage' => 'nullable|boolean'
        ];
    }
/*
    
     * Override: response in formato JSON
    
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY));
    }
*/
}

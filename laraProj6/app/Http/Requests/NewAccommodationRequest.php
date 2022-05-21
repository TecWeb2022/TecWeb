<?php


namespace app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

// Aggiunti per response JSON
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;

class NewAccommodationRequest extends FormRequest {

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
            'name' => 'required|max:25',
            'id' => 'required',
            'desc' => 'required|max:500',
            'path_foto' => 'file|mimes:jpeg,png|max:1024',
            'tipologia' => 'required|max:2',
            'citta' => 'required|max:20',
            'prov' => 'required|max:20',
            'num_civ' =>'required|numeric|min:0',
            'sup' =>'required|numeric|min:0',
            'inizio_disp' =>'required|data',
            'fine_disp' =>'required|data',
            'eta_min' =>'numeric|min:0',
            'eta_max' =>'numeric|min:0',
            'sesso' =>'max:1',
            
            'canone' => 'required|numeric|min:0',
            'discountPerc' => 'required|integer|min:0|max:100',
            'discounted' => 'required',
        ];
    }

    /**
     * Override: response in formato JSON
    */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY));
    }

}

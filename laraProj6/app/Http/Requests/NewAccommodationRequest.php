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
            'nome' => 'required|string|max:100',            
            'descr' => 'required|string|max:500',
            'path_foto' => 'required|file|mimes:jpeg,png,jpg|max:1024',
            'tipologia' => 'required|max:2',
            'citta' => 'required|max:50',
            'prov' => 'required|max:2',
            'via' => 'required|max:50',
            'num_civ' =>'required',
            'sup' =>'required|numeric|min:0|max:1000|',
            'inizio_disp' =>'required|after:now',
            'fine_disp' =>'required|after:inizio_disp',
            'eta_min' =>'integer|min:0|max:150|nullable',
            'eta_max' =>'integer|min:0|max:150|nullable|gte:eta_min',
            'sesso' =>'max:1|nullable',
            'canone' => 'required|numeric|min:0',
            'posti_letto_tot' =>'required|integer|min:0|max:1000',
            'letti_camera' =>'integer|min:0|max:100|nullable',
            'num_bagni' =>'integer|min:0|max:100|nullable',
            'num_camere' =>'integer|min:0|max:500|nullable',
            'wifi' => 'boolean',
            'angolo_studio' => 'boolean',
            'climatizzatore' => 'boolean',
            'cucina' => 'boolean',
            'locale_ricreativo' => 'boolean',
            'garage' => 'boolean'
        ];
    }
}

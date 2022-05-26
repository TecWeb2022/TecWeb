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
            'nome' => 'required|string|max:25',            
            'descr' => 'required|string|max:500',
            'path_foto' => 'file|mimes:jpeg,png|max:1024',
            'tipologia' => 'required|max:2',
            'citta' => 'required|max:20',
            'prov' => 'required|max:2',
            'via' => 'required|max:30',
            'num_civ' =>'required|numeric|min:0',
            'sup' =>'required|numeric|min:0',
            'inizio_disp' =>'required',
            'fine_disp' =>'required',
            'eta_min' =>'integer|min:0',
            'eta_max' =>'integer|min:0',
            'sesso' =>'max:1',
            'canone' => 'required|numeric|min:0',
            'posti_letto_tot' =>'integer|min:0',
            'letti_camera' =>'integer|min:0',
            'num_bagni' =>'integer|min:0',
            'num_camere' =>'integer|min:0'
            
        ];
    }

}

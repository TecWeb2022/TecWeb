<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NewFaqRequest;

use App\Models\Resources\Faq;
use App\Models\Resources\Accomodation;
use App\Models\Resources\Option;

class AdminController extends Controller
{

    protected $_faqModel;

    
    public function __construct() {
        $this->middleware('can:isAdmin');
        $this->_faqModel = new Faq;
    }
    

    public function getFaqs() {
        $faqs = $this->_faqModel->get();
        return view('home')
            ->with('faqs', $faqs);
    }
    public function getFaqs2() {
        $faqs = $this->_faqModel->get();
        return view('admin.gestioneFaqs')
            ->with('faqs', $faqs);
    }
    
    public function showNuovaFaq(){
        return view('admin.nuovaFaq');
    }
    
    public function getPageWithFaq(Request $request) {
        $id_faq = $request['id'];
        $faq = Faq::find($id_faq);
        return view('admin.modificaFaq')
            ->with('faq', $faq);
    }
    
    public function modificaFaq(NewFaqRequest $request) {
        $id_faq = $request['id'];
        $dati = $request->validated();
        $faq = Faq::find($id_faq);
        $faq->domanda = $dati['domanda'];
        $faq->risposta = $dati['risposta'];
        $faq->save();
        
        return redirect()->route('gestFaqs');
    }
    
    public function eliminaFaq(Request $request) {
        $id_faq = $request['id'];
        $faq = Faq::find($id_faq);
        $faq->delete();
        return redirect()->route('gestFaqs');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'domanda' => ['required', 'string', 'max:255'],
            'risposta' => ['required', 'string', 'max:255']
        ]);
    }

     protected function nuovaFaq(NewFaqRequest $request)
    {
        $faq = new Faq;
        $dati = $request->validated();
        $faq->domanda = $dati['domanda'];
        $faq->risposta = $dati['risposta'];
        $faq->save();
 
        return redirect()->route('gestFaqs');
    }
    
    public function stats(Request $request) {
        $alloggi_tot = 0;
        $alloggi_locati = 0;
        $offerte = 0;
        
        $tip = $request['tipologia'];
        switch($tip) {
            case 'all':
                if($request['inizio'] == null && $request['fine'] == null) {
                    $alloggi_tot = Accomodation::all()->count();
                    $alloggi_locati = Accomodation::all()->where('assegnato', '=', true)->count();
                    $offerte = Option::all()->count();
                } else if($request['inizio'] != null && $request['fine'] == null) {
                    $alloggi_tot = Accomodation::all()->where('inizio_disp', '>=', $request['inizio'])
                            ->count();
                    $alloggi_locati = Accomodation::all()->where('assegnato', '=', true)
                            ->where('inizio_disp', '>=', $request['inizio'])
                            ->count();
                    $offerte = Option::all()->where('created_at', '>=', $request['inizio'])
                            ->count();
                } else if($request['inizio'] == null && $request['fine'] != null) {
                    $alloggi_tot = Accomodation::all()
                            ->where('fine_disp', '<=', $request['fine'])
                            ->count();
                    $alloggi_locati = Accomodation::all()->where('assegnato', '=', true)
                            ->where('fine_disp', '<=', $request['fine'])
                            ->count();
                    $offerte = Option::all()->where('created_at', '<=', $request['fine'])
                            ->count();
                } else {
                    $alloggi_tot = Accomodation::all()->where('inizio_disp', '>=', $request['inizio'])
                            ->where('fine_disp', '<=', $request['fine'])
                            ->count();
                    $alloggi_locati = Accomodation::all()->where('assegnato', '=', true)
                            ->where('inizio_disp', '>=', $request['inizio'])
                            ->where('fine_disp', '<=', $request['fine'])
                            ->count();
                    $offerte = Option::all()->whereBetween('created_at', [$request['inizio'], $request['fine']])
                            ->count();
                }
                break;
            
            default:
                if($request['inizio'] == null && $request['fine'] == null) {
                    $alloggi_tot = Accomodation::all()->where('tipologia', '=', $tip)->count();
                    $alloggi_locati = Accomodation::all()->where('tipologia', '=', $tip)
                            ->where('assegnato', '=', true)->count();
                    $offerte = Option::all()
                            ->count();
                } else if($request['inizio'] != null && $request['fine'] == null) {
                    $alloggi_tot = Accomodation::all()->where('tipologia', '=', $tip)
                            ->where('inizio_disp', '>=', $request['inizio'])
                            ->count();
                    $alloggi_locati = Accomodation::all()->where('tipologia', '=', $tip)
                            ->where('assegnato', '=', true)
                            ->where('inizio_disp', '>=', $request['inizio'])
                            ->count();
                } else if($request['inizio'] == null && $request['fine'] != null) {
                    $alloggi_tot = Accomodation::all()->where('tipologia', '=', $tip)
                            ->where('fine_disp', '<=', $request['fine'])
                            ->count();
                    $alloggi_locati = Accomodation::all()->where('tipologia', '=', $tip)
                            ->where('assegnato', '=', true)
                            ->where('fine_disp', '<=', $request['fine'])
                            ->count();
                } else {
                    $alloggi_tot = Accomodation::all()->where('tipologia', '=', $tip)
                            ->where('inizio_disp', '>=', $request['inizio'])
                            ->where('fine_disp', '<=', $request['fine'])
                            ->count();
                    $alloggi_locati = Accomodation::all()->where('tipologia', '=', $tip)
                            ->where('assegnato', '=', true)
                            ->where('inizio_disp', '>=', $request['inizio'])
                            ->where('fine_disp', '<=', $request['fine'])
                            ->count();
                }
                break;
        }
        
        $stats = [
            'alloggi_tot' => $alloggi_tot,
            'offerte' => $offerte,
            'alloggi_locati' => $alloggi_locati,
            'filter_tipologia' => $request['tipologia'],
            'filter_inizio' => $request['inizio'],
            'filter_fine' => $request['fine']
        ];
        return view('admin.statistiche')
            ->with('stats', $stats);
    }
}  
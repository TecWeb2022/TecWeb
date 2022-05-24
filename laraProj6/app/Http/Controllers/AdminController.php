<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NewFaqRequest;

use App\Models\Resources\Faq;


class AdminController extends Controller
{

    protected $_faqModel;

    
    public function __construct() {
        $this->_faqModel = new Faq;
    }
    

    public function getFaqs() {
        $faqs = $this->_faqModel->get();
        return view('admin')
            ->with('faqs', $faqs);
    }
    public function getFaqs2() {
        $faqs = $this->_faqModel->get();
        return view('gestioneFaqs')
            ->with('faqs', $faqs);
    }
    
    public function showNuovaFaq(){
        return view('nuovaFaq');
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
 
        return redirect()->route('homeAdmin');
    }
    
    public function stats() {
    return view('statistiche');
    }
}  
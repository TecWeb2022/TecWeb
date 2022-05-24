<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function aggiungiFaq() {
    return view('nuovaFaq');
    }
    
    public function stats() {
    return view('statistiche');
    }
}  
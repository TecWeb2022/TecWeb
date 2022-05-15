<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Faq;

class PublicController extends Controller
{

    protected $faqModel;
    
    public function __construct() {
        $this->faqModel = new Faq;
    }
    
    /*
    public function prova() {
        $faq1 = $this->faqModel->where('id', 1)->first();
        return view('provafaq')
            ->with('faq1', $faq1);
    }
    */
    
    public function getFaqs() {
        $faqs = $this->faqModel->get();
        return view('home')
            ->with('faqs', $faqs);
    }
}

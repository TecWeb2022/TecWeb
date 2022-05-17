<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Resources\Faq;
use App\Models\Catalog;

class PublicController extends Controller
{

    protected $faqModel;
    protected $catalogModel;
    
    public function __construct() {
        $this->faqModel = new Faq;
        $this->catalogModel = new Catalog;
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
    
    public function getCatalogo() {
        $cat = $this->catalogModel->getAcc(1);
        $photos = $this->catalogModel->getPhoto();
        //$cat->main_photo = $this->catalogModel->getMainPhoto(1);
        return view('catalogo')
            ->with('cat', $cat)
            ->with('photos', $photos);
    }
}

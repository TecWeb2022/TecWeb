<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Resources\Faq;
use App\Models\Catalog;
use App\Models\Resources\Option;

class PublicController extends Controller
{

    protected $_faqModel;
    protected $_catalogModel;
    
    public function __construct() {
        $this->_faqModel = new Faq;
        $this->_catalogModel = new Catalog;
    }
    
    /*
    public function prova() {
        $faq1 = $this->faqModel->where('id', 1)->first();
        return view('provafaq')
            ->with('faq1', $faq1);
    }
    */
    
    public function getFaqs() {
        $faqs = $this->_faqModel->get();
        return view('home')
            ->with('faqs', $faqs);
    }
    
    public function getCatalogo() {
        $cat = $this->_catalogModel->getAcc(5);
        //$cat->main_photo = $this->catalogModel->getMainPhoto(1);
        return view('catalogo')
            ->with('cat', $cat);
    }
    
    public function infoAcc($id){
        $acc = $this->_catalogModel->getAccById($id);
        if(auth()->user() != null && auth()->user()->tipologia == 'loc') {
            //$condizioni = ['id_alloggio' => $id, 'id_locatario' => auth()->user()->id];
            //$opt = Option::where($condizioni)->get();
            $opt = Option::where('id_alloggio', '=', $id)
                    ->where('id_locatario', '=', auth()->user()->id)
                    ->first();
            if($opt != null) {
                //$id_opt = $opt->get('id');
                //$op = Option::find($id_opt);
                return view('visualizzaAcc')
                ->with('acc', $acc)
                ->with('opt', $opt);
            }
        }
        return view('visualizzaAcc')
                ->with('acc',$acc);
    }
}

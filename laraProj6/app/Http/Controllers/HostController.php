<?php

namespace App\Http\Controllers;


use App\Models\Resources\Accomodation;
use App\Models\Resources\Message;
use App\Models\Resources\Option;
use App\Models\Resources\Faq;
use App\Models\Catalog;
use App\Http\Requests\NewAccommodationRequest;
use Carbon\Carbon;

use Illuminate\Http\Request;


class HostController extends Controller {
    
    protected $_hostModel;
    protected $_faqModel;

    public function _construct() {
        $this->middleware('can:isHost');
        $this->_faqModel= new Faq;
        $this->_hostModel = new Host;
    }
    
    public function index() {
        //$faqs = $this->_faqModel->get();
        $faqs = new Faq;
        return view('accommodation.host')
            ->with('faqs', $faqs->get());
    }
    
    public function insertAcc(NewAccommodationRequest $request) {
        
        
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = $image->getClientOriginalName();
        } else {
            $imageName = NULL;
        }

        
        $acc = new Accomodation;
        $validatedrequest = $request->validated();
        foreach($validatedrequest as $key => $value ) {
            if($validatedrequest[$key] === 'foto') {}
                else {
                $acc[$key] = $validatedrequest[$key];
                }
        }
        
        $acc->path_foto = $imageName;
        //$acc->updated_at = null;
        //$acc->created_at = Carbon::now();
        $acc->proprietario = auth()->user()->id;
        $acc->save();

        if (!is_null($imageName)) {
            $destinationPath = public_path() . '/images/alloggi';
            $image->move($destinationPath, $imageName);
        };

        return response()->json(['redirect' => route('homeHost')]);
        
    }
    
    
    public function infoAcc($id){
        $cat = new Catalog;
        $acc = $cat->getAccById($id);
        
        return view('accommodation.visualizzaAccHost')
                ->with('acc',$acc);
    }
    
    public function getAlloggiHost(){
        $cat = new Catalog;
        $catHost = $cat->getAllAcc()->where('proprietario', '=', auth()->user()->id);
        $catHost = $catHost->paginate(5);
        return view('accommodation.gestioneAcc')
                ->with('catHost', $catHost);
    }
}


<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       DB::table('faqs')->insert([
       //['id'=>1,'domanda'=> 'Quando posso chiedere il rimborso?', 'risposta'=>'Il rimborso può essere richiesto solo e obbligatoriamente sette giorni prima dell arrivo alla residenza. Contattando il locatore è possibile avvertirlo di una possibile mancanza di adempimento al contratto e allora richiedere il rimborso.'],
       ['id'=>1,'domanda'=>'Posso opzionare più di un alloggio contemporaneamente?', 'risposta'=>'No, non si può opzionare più di un alloggio contemporaneamente. La cosa viene meno alle regole di siucurezza e prevenzione alle truffe dello statuto della nostra azienda.'],
       //['id'=>3,'domanda'=> 'Nel caso avessi opzionato un alloggio e il locatore mi dice che non è più disponibile, venendo meno al contratto, come mi devo comporatare?', 'risposta'=>'Preghiamo il locatoario di contattarci tramite in nostri contatti presenti sul fondo del sito così da informarci sulla questione. La nostra azienda si prederà carico della faccenda contattando il locatario per capire il perché della mancanza.']
       ]);    // $this->call(UsersTableSeeder::class);
       
       
       DB::table('accomodations')->insert([
           ['id'=>1,'nome'=>'Appartamento carino sul Lago di Garda','descr'=> 'Appartamento accogliente e gradevole. Situato nei pressi del lago, raggiungibile in 3 minuti di macchina. Presenta un giardino ampio.',
               'tipologia'=>'Ap','citta'=>'Brescia','prov'=>'BS','via'=>'Via T.Tasso','num_civ'=>80,'sup'=>100,'inizio_disp'=>'2022-05-16','fine_disp'=>'2022-07-19','data_ins'=>'2022-05-15','eta_min'=>18,'eta_max'=>70,'sesso'=>'M','canone'=>156.00,'posti_letto'=>6,'cucina'=>true,'num_bagni'=>3,'num_camere'=>4,'locale_ricreativo'=>true,'angolo_studio'=>false,
              'proprietario' => 'Giancarlo Magalli'],
           ['id'=>2,'nome'=>'Posto letto su casa di mare','descr'=> 'Camera per studenti. Situata nei pressi di Ancona est, vicinissima al mare. Vicino a punti di snodo per raggiungere le universtià di tutta la città.',
               'tipologia'=>'Cs','citta'=>'Ancona','prov'=>'AN','via'=>'Via San Tommaso','num_civ'=>2,'sup'=>23,'inizio_disp'=>'2022-10-12','fine_disp'=>'2022-10-19','data_ins'=>'2022-05-15','eta_min'=>18,'eta_max'=>27,'sesso'=>"F",'canone'=>15.00,'posti_letto'=>1,'cucina'=>true,'num_bagni'=>1,'num_camere'=>1,'locale_ricreativo'=>false,'angolo_studio'=>true,
               'proprietario' => 'Cristian Jason Marini']
       ]);
               
       DB::table('users')->insert([
           ['id'=>1,'nome'=>'Matteo','cognome'=>'Straccia','data_nasc'=>'1998-12-24','tipologia'=>'Admin','username'=>'mattew98','password'=>'ciao1234'],
           ['id'=>2,'nome'=>'Reed','cognome'=>'Richards','data_nasc'=>'1978-04-12','tipologia'=>'Host','username'=>'mrfanta04','password'=>'suestorm'],
           ['id'=>3,'nome'=>'Norman','cognome'=>'Osborn','data_nasc'=>'1981-08-03','tipologia'=>'Loc','username'=>'greengob1','password'=>'hatesm'],
           ['id'=>4,'nome'=>'Layla','cognome'=>'El-Fouly','data_nasc'=>'1991-02-14','tipologia'=>'Loc','username'=>'sacarlscarab','password'=>'dad']
           
       ]);
               
       DB::table('messages')->insert([
           ['id'=>1,'testo'=>'Salve sono interesato al suo alloggio','visualizzato'=>false,'inviato'=>'2022-05-15','id_mitt'=>3,'id_dest'=>2,'id_alloggio'=>2],
           ['id'=>2,'testo'=>'Salve sono interesato al suo alloggio','visualizzato'=>true,'inviato'=>'2022-05-15','id_mitt'=>4,'id_dest'=>2,'id_alloggio'=>2]
           
       ]);
               
       DB::table('photos')->insert([
           ['path'=>'images\AppartamentoLagoGardaProva.jpg','id_alloggio'=>1],
           ['path'=>'images\CameraSingolaProva.jpg','id_alloggio'=>2],  
       ]);
       
       DB::table('options')->insert([
           ['id'=>1,'nota'=>'','data_invio'=>'2022-05-17','data_inizio'=>'2022-10-13','data_fine'=>'2022-10-19','data_stipula'=>null,'id_alloggio'=>2,'id_locatario'=>3],
           ['id'=>2,'nota'=>'','data_invio'=>'2022-05-17','data_inizio'=>'2022-10-13','data_fine'=>'2022-10-19','data_stipula'=>null,'id_alloggio'=>2,'id_locatario'=>4]
       ]);
    }
}

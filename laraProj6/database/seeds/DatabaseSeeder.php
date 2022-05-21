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
       ['id'=>1,'domanda'=> 'Quando posso chiedere il rimborso?', 'risposta'=>'Il rimborso non può essere richiesto da parte nostra, è necessario che vi accordiate con il locatore.'],
       ['id'=>2,'domanda'=>'Posso opzionare più di un alloggio contemporaneamente?', 'risposta'=>'No, non si può opzionare più di un alloggio contemporaneamente. La cosa viene meno alle regole di siucurezza e prevenzione alle truffe dello statuto della nostra azienda.'],
       ['id'=>3,'domanda'=> 'Nel caso avessi opzionato un alloggio e il locatore non è più disponibile, come mi devo comportare?', 'risposta'=>'Potete chiarirvi tramite il sistema di messaggistica predisposto nel sito.']
       ]);    // $this->call(UsersTableSeeder::class);
       
       
       DB::table('accomodations')->insert([
           ['id'=>1,'nome'=>'Appartamento carino sul Lago di Garda','descr'=> 'Appartamento accogliente e gradevole. Situato nei pressi del lago, raggiungibile in 3 minuti di macchina. Presenta un giardino ampio.',
               'tipologia'=>'ap','citta'=>'Brescia','prov'=>'BS','via'=>'Via T.Tasso','num_civ'=>80,'sup'=>100,'inizio_disp'=>'2022-05-16','fine_disp'=>'2022-07-19','eta_min'=>18,'eta_max'=>70,'sesso'=>'M','canone'=>156.00,'posti_letto_tot'=>6,'cucina'=>true,'num_bagni'=>3,'num_camere'=>4,'locale_ricreativo'=>true,'angolo_studio'=>false,
               'path_foto'=>'/images/alloggi/AppartamentoLagoGarda.jpg', 'proprietario' => 1],
           
           ['id'=>2,'nome'=>'Posto letto su casa di mare','descr'=> 'Camera per studenti. Situata nei pressi di Ancona est, vicinissima al mare. Vicino a punti di snodo per raggiungere le universtià di tutta la città.',
               'tipologia'=>'cs','citta'=>'Ancona','prov'=>'AN','via'=>'Via San Tommaso','num_civ'=>2,'sup'=>23,'inizio_disp'=>'2022-10-12','fine_disp'=>'2022-10-19',
               'eta_min'=>18,'eta_max'=>27,'sesso'=>"F",'canone'=>15.00,'posti_letto_tot'=>1,'cucina'=>true,'num_bagni'=>1,'num_camere'=>1,'locale_ricreativo'=>false,'angolo_studio'=>true,
               'path_foto'=>'/images/alloggi/CameraSingolaProva.jpg', 'proprietario' => 3],
           
           ['id'=>3,'nome'=>'Appartamento Centobuchi','descr'=> 'Appartamento spazioso per studneti a pochi chilometri dal centro di San Benedetto del Tronto. Cittadina con possibilità di mezzi pubblici di ogni tipo. ',
               'tipologia'=>'ap','citta'=>'Centobuchi','prov'=>'AP','via'=>'Via San Giacomo','num_civ'=>101,'sup'=>89,'inizio_disp'=>'2022-05-24','fine_disp'=>'2022-09-11',
               'eta_min'=>18,'eta_max'=>30,'sesso'=>"M",'canone'=>100.00,'posti_letto_tot'=>null,'cucina'=>true,'num_bagni'=>2,'num_camere'=>3,'locale_ricreativo'=>false,'angolo_studio'=>true,
               'path_foto'=>'/images/alloggi/casacento.jpg', 'proprietario' => 2],
           
           ['id'=>4,'nome'=>'Camera grande doppia per universitari fuori sede','descr'=> 'Camera doppia affittabile ad universitari responsabili e con la testa sulle spalle. Astenersi perdi tempo.  ',
               'tipologia'=>'cd','citta'=>'Ancona','prov'=>'AN','via'=>'Via delle Tavernelle','num_civ'=>53,'sup'=>20,'inizio_disp'=>'2022-06-24','fine_disp'=>'2023-06-11',
               'eta_min'=>18,'eta_max'=>40,'sesso'=>"M",'canone'=>40.00,'posti_letto_tot'=>null,'cucina'=>true,'num_bagni'=>2,'num_camere'=>1,'locale_ricreativo'=>false,'angolo_studio'=>true,
               'path_foto'=>'/images/alloggi/casaTavernelle.jpg', 'proprietario' => 4],
           
           ['id'=>5,'nome'=>'Camera singola per studentessa','descr'=> 'Camera singola affittabile a studentessa di medicina, non solo. Vicina a ospedale Torrette di Ancona',
               'tipologia'=>'cs','citta'=>'Ancona','prov'=>'AN','via'=>'Via Foglia','num_civ'=>2,'sup'=>10,'inizio_disp'=>'2022-06-04','fine_disp'=>'2023-09-01',
               'eta_min'=>19,'eta_max'=>25,'sesso'=>"F",'canone'=>12.00,'posti_letto_tot'=>null,'cucina'=>true,'num_bagni'=>1,'num_camere'=>1,'locale_ricreativo'=>false,'angolo_studio'=>true,
               'path_foto'=>'/images/alloggi/cameraSTorrette.jpg', 'proprietario' => 4],
           
           ['id'=>6,'nome'=>'Camera doppia per studenti','descr'=> 'Affittabile per qualsiasi tipo di età, solo ad univeristari e studenti.',
               'tipologia'=>'cd','citta'=>'Ancona','prov'=>'AN','via'=>'Via Foglia','num_civ'=>2,'sup'=>13,'inizio_disp'=>'2022-06-04','fine_disp'=>'2023-09-01',
               'eta_min'=>17,'eta_max'=>null,'sesso'=>"M",'canone'=>56.00,'posti_letto_tot'=>null,'cucina'=>false,'num_bagni'=>2,'num_camere'=>1,'locale_ricreativo'=>true,'angolo_studio'=>true,
               'path_foto'=>'/images/alloggi/cameraDEco.jpg', 'proprietario' => 1],
           
           ['id'=>7,'nome'=>'Piccolo appartamento a Cupra Marittima','descr'=> 'Abitazione piccola e accogliente massimo per tre persone a Cupra Marittima. A pochi passi dal mare e dal centro.',
               'tipologia'=>'ap','citta'=>'Cupra Marittima','prov'=>'AP','via'=>'Via Gianbattista Evangelisti','num_civ'=>7,'sup'=>63,'inizio_disp'=>'2022-06-10','fine_disp'=>'2023-06-01',
               'eta_min'=>20,'eta_max'=>null,'sesso'=>"F",'canone'=>113.00,'posti_letto_tot'=>null,'cucina'=>false,'num_bagni'=>1,'num_camere'=>2,'locale_ricreativo'=>true,'angolo_studio'=>true,
               'path_foto'=>'/images/alloggi/appCupra.jpeg', 'proprietario' => 3]
           
       ]);
               
       DB::table('users')->insert([
           ['id'=>1,'nome'=>'Matteo','cognome'=>'Straccia','data_nasc'=>'1998-12-24','tipologia'=>'admin','username'=>'mattew98','password'=>Hash::make('ciao1234')],
           ['id'=>2,'nome'=>'Reed','cognome'=>'Richards','data_nasc'=>'1978-04-12','tipologia'=>'host','username'=>'mrfanta04','password'=>Hash::make('suestorm')],
           ['id'=>3,'nome'=>'Norman','cognome'=>'Osborn','data_nasc'=>'1981-08-03','tipologia'=>'loc','username'=>'greengob1','password'=>Hash::make('hatesm')],
           ['id'=>4,'nome'=>'Layla','cognome'=>'El-Fouly','data_nasc'=>'1991-02-14','tipologia'=>'loc','username'=>'sacarlscarab','password'=>Hash::make('dad')]
       ]);
               
       DB::table('messages')->insert([
           ['id'=>1,'testo'=>'Salve sono interesato al suo alloggio','visualizzato'=>false,'inviato'=>'2022-05-15','id_mitt'=>3,'id_dest'=>2,'id_alloggio'=>2],
           ['id'=>2,'testo'=>'Salve sono interesato al suo alloggio','visualizzato'=>true,'inviato'=>'2022-05-15','id_mitt'=>4,'id_dest'=>2,'id_alloggio'=>2]
       ]);
       
       DB::table('options')->insert([
           ['id'=>1,'nota'=>'','data_invio'=>'2022-05-17','data_inizio'=>'2022-10-13','data_fine'=>'2022-10-19','data_stipula'=>null,'id_alloggio'=>2,'id_locatario'=>3],
           ['id'=>2,'nota'=>'','data_invio'=>'2022-05-17','data_inizio'=>'2022-10-13','data_fine'=>'2022-10-19','data_stipula'=>null,'id_alloggio'=>2,'id_locatario'=>4]
       ]);
    }
}

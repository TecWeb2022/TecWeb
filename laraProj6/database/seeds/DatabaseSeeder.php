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
               'tipologia'=>'ap','citta'=>'Brescia','prov'=>'BS','via'=>'Via T.Tasso','num_civ'=>80,'sup'=>100,'inizio_disp'=>'2022-05-16','fine_disp'=>'2022-07-19','eta_min'=>18,'eta_max'=>50,'sesso'=>null,'canone'=>156.00,'posti_letto_tot'=>6,'cucina'=>true,'num_bagni'=>3,'num_camere'=>4,'locale_ricreativo'=>true,'angolo_studio'=>false,
               'path_foto'=>'alloggi/AppartamentoLagoGarda.jpg', 'assegnato'=>false, 'proprietario' => 2, 'letti_camera' => null],
           
           ['id'=>2,'nome'=>'Posto letto su casa di mare','descr'=> 'Camera per studenti. Situata nei pressi di Ancona est, vicinissima al mare. Vicino a punti di snodo per raggiungere le università di tutta la città.',
               'tipologia'=>'cs','citta'=>'Ancona','prov'=>'AN','via'=>'Via San Tommaso','num_civ'=>2,'sup'=>23,'inizio_disp'=>'2021-09-01','fine_disp'=>'2021-12-22',
               'eta_min'=>18,'eta_max'=>null,'sesso'=>"M",'canone'=>75.00,'posti_letto_tot'=>1,'cucina'=>false,'num_bagni'=>1,'num_camere'=>1,'locale_ricreativo'=>false,'angolo_studio'=>true,
               'path_foto'=>'alloggi/CameraSingolaProva.jpg', 'assegnato'=>true, 'proprietario' => 2, 'letti_camera' => 1],
           
           ['id'=>3,'nome'=>'Appartamento Centobuchi','descr'=> 'Appartamento spazioso per studneti a pochi chilometri dal centro di San Benedetto del Tronto. Cittadina con possibilità di mezzi pubblici di ogni tipo. ',
               'tipologia'=>'ap','citta'=>'Centobuchi','prov'=>'AP','via'=>'Via San Giacomo','num_civ'=>101,'sup'=>89,'inizio_disp'=>'2022-05-24','fine_disp'=>'2022-09-11',
               'eta_min'=>18,'eta_max'=>30,'sesso'=>"M",'canone'=>100.00,'posti_letto_tot'=>4,'cucina'=>true,'num_bagni'=>2,'num_camere'=>3,'locale_ricreativo'=>false,'angolo_studio'=>false,
               'path_foto'=>'alloggi/casacento.jpg', 'assegnato'=>false, 'proprietario' => 2, 'letti_camera' => null],
           
           ['id'=>4,'nome'=>'Camera grande doppia per universitari fuori sede','descr'=> 'Camera doppia affittabile ad universitari responsabili e con la testa sulle spalle. Astenersi perdi tempo.  ',
               'tipologia'=>'cd','citta'=>'Ancona','prov'=>'AN','via'=>'Via delle Tavernelle','num_civ'=>53,'sup'=>20,'inizio_disp'=>'2022-06-24','fine_disp'=>'2023-06-11',
               'eta_min'=>18,'eta_max'=>40,'sesso'=>"M",'canone'=>55.00,'posti_letto_tot'=>2,'cucina'=>true,'num_bagni'=>2,'num_camere'=>1,'locale_ricreativo'=>false,'angolo_studio'=>true,
               'path_foto'=>'alloggi/casaTavernelle.jpg', 'assegnato'=>false, 'proprietario' => 5, 'letti_camera' => 2],
           
           ['id'=>5,'nome'=>'Camera singola per studentessa','descr'=> 'Camera singola affittabile a studentessa di medicina, non solo. Vicina a ospedale Torrette di Ancona',
               'tipologia'=>'cs','citta'=>'Ancona','prov'=>'AN','via'=>'Via Foglia','num_civ'=>2,'sup'=>10,'inizio_disp'=>'2022-06-04','fine_disp'=>'2023-09-01',
               'eta_min'=>19,'eta_max'=>25,'sesso'=>"F",'canone'=>120.00,'posti_letto_tot'=>1,'cucina'=>false,'num_bagni'=>1,'num_camere'=>1,'locale_ricreativo'=>false,'angolo_studio'=>true,
               'path_foto'=>'alloggi/cameraSTorrette.jpg', 'assegnato'=>false, 'proprietario' => 5, 'letti_camera' => 1],
           
           ['id'=>6,'nome'=>'Camera doppia per studenti','descr'=> 'Affittabile per qualsiasi tipo di età, solo ad univeristari e studenti.',
               'tipologia'=>'cd','citta'=>'Ancona','prov'=>'AN','via'=>'Via Foglia','num_civ'=>2,'sup'=>13,'inizio_disp'=>'2022-06-04','fine_disp'=>'2023-09-01',
               'eta_min'=>17,'eta_max'=>null,'sesso'=>"M",'canone'=>180.00,'posti_letto_tot'=>2,'cucina'=>false,'num_bagni'=>2,'num_camere'=>1,'locale_ricreativo'=>false,'angolo_studio'=>true,
               'path_foto'=>'alloggi/cameraDEco.jpg', 'assegnato'=>false, 'proprietario' => 5, 'letti_camera' => 1],
           
           ['id'=>7,'nome'=>'Piccolo appartamento a Cupra Marittima','descr'=> 'Abitazione piccola e accogliente massimo per tre persone a Cupra Marittima. A pochi passi dal mare e dal centro.',
               'tipologia'=>'ap','citta'=>'Cupra Marittima','prov'=>'AP','via'=>'Via Gianbattista Evangelisti','num_civ'=>7,'sup'=>63,'inizio_disp'=>'2022-06-10','fine_disp'=>'2023-06-01',
               'eta_min'=>20,'eta_max'=>null,'sesso'=>"F",'canone'=>350.00,'posti_letto_tot'=>3,'cucina'=>true,'num_bagni'=>1,'num_camere'=>2,'locale_ricreativo'=>true,'angolo_studio'=>false,
               'path_foto'=>'alloggi/appCupra.jpeg', 'assegnato'=>false, 'proprietario' => 5, 'letti_camera' => null],
           
           ['id'=>8,'nome'=>'Appartamento vicino all\'UNIMC','descr'=> 'Abitazione con la possibilità di accogliere 4 persone massimo, vicino all\'università degli studi di Macerata',
               'tipologia'=>'ap','citta'=>'Macerata','prov'=>'MC','via'=>'Via Ettore Ricci','num_civ'=>2,'sup'=>86,'inizio_disp'=>'2022-07-18','fine_disp'=>'2023-08-29',
               'eta_min'=>null,'eta_max'=>30,'sesso'=>"M",'canone'=>450.00,'posti_letto_tot'=>4,'cucina'=>true,'num_bagni'=>2,'num_camere'=>3,'locale_ricreativo'=>false,'angolo_studio'=>false,
               'path_foto'=>'alloggi/appMac.jpg', 'assegnato'=>false, 'proprietario' => 2, 'letti_camera' => null],
           
           ['id'=>9,'nome'=>'Camera singola vicino alla stazione di Urbisaglia Sforzacosta','descr'=> 'Quuesto alloggio è situato nelle vicinanze della stazione Urbisaglia Sforzacosta, agevolnado lo spostatmento degli studneti.',
               'tipologia'=>'cs','citta'=>'Sforzacosta','prov'=>'MC','via'=>'Borgo Sforzacosta','num_civ'=>83,'sup'=>23,'inizio_disp'=>'2021-10-01','fine_disp'=>'2022-04-01',
               'eta_min'=>20,'eta_max'=>45,'sesso'=>"F",'canone'=>99.00,'posti_letto_tot'=>1,'cucina'=>false,'num_bagni'=>1,'num_camere'=>1,'locale_ricreativo'=>false,'angolo_studio'=>true,
               'path_foto'=>'alloggi/csBorgo.jpg', 'assegnato'=>false, 'proprietario' => 2, 'letti_camera' => 1],
           
           ['id'=>10,'nome'=>'Camera singola in zona UNITE','descr'=> 'Stanza singola vicina la zona dell UNITE. Comoda per ogni studente che vuole raggiungere con facilità l università. ',
               'tipologia'=>'cs','citta'=>'Teramo','prov'=>'TE','via'=>'Via Francesco Marcacci','num_civ'=>4,'sup'=>15,'inizio_disp'=>'2022-09-01','fine_disp'=>'2023-05-29',
               'eta_min'=>20,'eta_max'=>null,'sesso'=>"F",'canone'=>85.00,'posti_letto_tot'=>1,'cucina'=>false,'num_bagni'=>1,'num_camere'=>1,'locale_ricreativo'=>false,'angolo_studio'=>false,
               'path_foto'=>'alloggi/csTE.jpg', 'assegnato'=>false, 'proprietario' => 5, 'letti_camera' => 1],
           
           ['id'=>11,'nome'=>'Camera doppia nella frazione di Brecciarolo','descr'=> 'Camera doppia nella frazione di Brecciarolo. Affittabile a studentesse, a qualche minuto di mezzo dall università UNIVPM di Ascoli Piceno ',
               'tipologia'=>'cd','citta'=>'Ascoli Piceno','prov'=>'AP','via'=>'Via delle Fresie','num_civ'=>18,'sup'=>25,'inizio_disp'=>'2022-09-25','fine_disp'=>'2023-04-30',
               'eta_min'=>20,'eta_max'=>null,'sesso'=>"F",'canone'=>113.00,'posti_letto_tot'=>2,'cucina'=>false,'num_bagni'=>1,'num_camere'=>1,'locale_ricreativo'=>false,'angolo_studio'=>true,
               'path_foto'=>'alloggi/cdAP.jpg', 'assegnato'=>false, 'proprietario' => 5, 'letti_camera' => 2],
           
           ['id'=>12,'nome'=>'Camera doppia ad Ancona','descr'=> 'Camera doppia ad Ancona, vicino all\'Univpm. Affittabile a studenti.',
               'tipologia'=>'cd','citta'=>'Ancona','prov'=>'AN','via'=>'Via delle Albicocche','num_civ'=>22,'sup'=>35,'inizio_disp'=>'2021-09-25','fine_disp'=>'2022-04-30',
               'eta_min'=>20,'eta_max'=>null,'sesso'=>"M",'canone'=>125.00,'posti_letto_tot'=>2,'cucina'=>false,'num_bagni'=>1,'num_camere'=>1,'locale_ricreativo'=>false,'angolo_studio'=>true,
               'path_foto'=>'alloggi/cdAnconaUnivpm.jpg', 'assegnato'=>false, 'proprietario' => 2, 'letti_camera' => 2],
           
           ['id'=>13,'nome'=>'Appartamento vicino Milano','descr'=> 'Abitazione limitrofa all\'università Bocconi',
               'tipologia'=>'ap','citta'=>'Milano','prov'=>'MI','via'=>'Via Francesco Sforza','num_civ'=>2,'sup'=>100,'inizio_disp'=>'2021-07-18','fine_disp'=>'2021-08-29',
               'eta_min'=>null,'eta_max'=>30,'sesso'=>"M",'canone'=>200.00,'posti_letto_tot'=>4,'cucina'=>true,'num_bagni'=>2,'num_camere'=>3,'locale_ricreativo'=>false,'angolo_studio'=>false,
               'path_foto'=>'alloggi/bocconi.jpg', 'assegnato'=>true, 'proprietario' => 2, 'letti_camera' => null]
           
       ]);
               
       DB::table('users')->insert([
           ['id'=>1,'nome'=>'Luca','cognome'=>'Bianchi','data_nasc'=>'1992-10-02','sesso' => 'M','tipologia'=>'admin','username'=>'adminadmin','password'=>Hash::make('u5jCgyFE')],
           ['id'=>2,'nome'=>'Mario','cognome'=>'Verdi','data_nasc'=>'1980-02-14','sesso' => 'M','tipologia'=>'host','username'=>'lorelore','password'=>Hash::make('u5jCgyFE')],
           ['id'=>3,'nome'=>'Mattia','cognome'=>'Rossi','data_nasc'=>'1999-05-16','sesso' => 'M','tipologia'=>'loc','username'=>'lariolario','password'=>Hash::make('u5jCgyFE')],
           ['id'=>4,'nome'=>'Layla','cognome'=>'El-Fouly','data_nasc'=>'1991-02-14','sesso' => 'F','tipologia'=>'loc','username'=>'layla','password'=>Hash::make('provaciao')],
           ['id'=>5,'nome'=>'Reed','cognome'=>'Richards','data_nasc'=>'1978-04-12','sesso' => 'M','tipologia'=>'host','username'=>'mrfanta04','password'=>Hash::make('ciaociao')],
           ['id'=>6,'nome'=>'Norman','cognome'=>'Osborn','data_nasc'=>'1999-08-03','sesso' => 'M','tipologia'=>'loc','username'=>'greengob1','password'=>Hash::make('prova123')]
       ]);
               
       DB::table('messages')->insert([
           ['id'=>1,'testo'=>'Salve, sono interessato al suo alloggio','visualizzato'=>true,'id_mitt'=>3,'id_dest'=>2,'id_alloggio'=>2, 'created_at'=>'2021-10-14 08:00:00'],
           ['id'=>2,'testo'=>'Buongiorno, mi contatti a questo numero di telefono: 123456789','visualizzato'=>true,'id_mitt'=>2,'id_dest'=>3,'id_alloggio'=>2, 'created_at'=>'2021-10-15 10:00:00'],
           ['id'=>3,'testo'=>'Salve, la zona dispone di parcheggi gratuiti?','visualizzato'=>true,'id_mitt'=>3,'id_dest'=>2,'id_alloggio'=>1, 'created_at'=>'2022-05-20 22:30:00'],
           ['id'=>4,'testo'=>'Sì, il parcheggio si trova facilmente qui in zona.','visualizzato'=>false,'id_mitt'=>2,'id_dest'=>3,'id_alloggio'=>1, 'created_at'=>'2022-05-22 11:34:00'],
           ['id'=>5,'testo'=>'Salve, sono interessato al suo alloggio','visualizzato'=>false,'id_mitt'=>4,'id_dest'=>2,'id_alloggio'=>1, 'created_at'=>'2022-05-25 15:19:00'],
           ['id'=>6,'testo'=>'Salve, sono interessato al suo alloggio','visualizzato'=>true,'id_mitt'=>6,'id_dest'=>2,'id_alloggio'=>1, 'created_at'=>'2022-05-27 15:45:00'],
           ['id'=>7,'testo'=>'Mi scuso per il disturbo, avrei bisogno di sapere urgentemente se mi può assegnare l\'offerta.','visualizzato'=>false,'id_mitt'=>6,'id_dest'=>2,'id_alloggio'=>1, 'created_at'=>'2022-05-30 07:19:00'],
           ['id'=>8,'testo'=>'Salve, sono interessato al suo alloggio','visualizzato'=>true,'id_mitt'=>3,'id_dest'=>2,'id_alloggio'=>8, 'created_at'=>'2022-08-01 09:00:00'],
           ['id'=>9,'testo'=>'Salve, il suo alloggio fa proprio al caso mio! Sarei molto felice di poterlo affittare.','visualizzato'=>true,'id_mitt'=>6,'id_dest'=>2,'id_alloggio'=>13, 'created_at'=>'2021-08-05 09:00:00'],
           ['id'=>10,'testo'=>'Salve, sono interessato al suo alloggio.','visualizzato'=>false,'id_mitt'=>4,'id_dest'=>2,'id_alloggio'=>9, 'created_at'=>'2022-02-01 10:01:00']
           
           /*
           ['id'=>1,'testo'=>'Salve, sono interessato al suo alloggio','visualizzato'=>false,'id_mitt'=>3,'id_dest'=>2,'id_alloggio'=>2, 'created_at'=>'2022-06-01 09:10:04'],
           ['id'=>2,'testo'=>'Salve, vorrei maggiori informazioni in merito al posto letto','visualizzato'=>true,'id_mitt'=>4,'id_dest'=>2,'id_alloggio'=>2, 'created_at'=>'2022-11-10 11:11:04'],
           ['id'=>3,'testo'=>'Sì, il parcheggio si trova facilmente qui in zona.','visualizzato'=>true,'id_mitt'=>5,'id_dest'=>3,'id_alloggio'=>5, 'created_at'=>'2022-11-05 12:19:00'],
           ['id'=>4,'testo'=>'Buongiorno, certamente gli animali sono ammessi','visualizzato'=>false,'id_mitt'=>2,'id_dest'=>3,'id_alloggio'=>2, 'created_at'=>'2023-01-01 10:50:20'],
           ['id'=>5,'testo'=>'Salve, le confermo che la sede Ingengeria dista meno di 10 minuti a piedi','visualizzato'=>false,'id_mitt'=>2,'id_dest'=>3,'id_alloggio'=>3, 'created_at'=>'2022-09-07 01:15:55'],
           ['id'=>6,'testo'=>'Purtroppo ho già ricevuto molte offerte per cui la aggiornerò in seguito','visualizzato'=>false,'id_mitt'=>5,'id_dest'=>3,'id_alloggio'=>11, 'created_at'=>'2022-08-01 09:00:00']
           */
       ]);
       
       DB::table('options')->insert([
           ['id'=>1,'data_stipula'=>'2021-08-07','created_at' => '2021-08-05 09:00:00','id_alloggio'=>13,'id_locatario'=>6],
           ['id'=>2,'data_stipula'=>'2021-10-15','created_at' => '2021-10-14 08:00:00','id_alloggio'=>2,'id_locatario'=>3],
           ['id'=>3,'data_stipula'=>null,'created_at' => '2022-05-25 15:19:00','id_alloggio'=>1,'id_locatario'=>4],
           ['id'=>4,'data_stipula'=>null,'created_at' => '2022-05-27 15:45:00','id_alloggio'=>1,'id_locatario'=>6],
           ['id'=>5,'data_stipula'=>null,'created_at' => '2022-05-20 22:30:00','id_alloggio'=>1,'id_locatario'=>3],
           ['id'=>6,'data_stipula'=>null,'created_at' => '2022-08-01 09:00:00','id_alloggio'=>8,'id_locatario'=>3],
           ['id'=>7,'data_stipula'=>null,'created_at' => '2022-02-01 10:01:00','id_alloggio'=>9,'id_locatario'=>4]
       ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class cicloPagamento extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     return view('cicloPagamento');
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCredito()
    {
        $getDados = DB::connection('mysql')->table('tb_creditos as s')
        ->select('id', 'nome_credito as Descrição do Crédito', 'mes as Mês de lançamento',
                'ano as Ano de lançamento','valor_credito as Valor do crédito')
        ->where('tipo','credito')
        ->get();

        return response()->json($getDados);
    }

    public function postCredito(Request $request)
    {

        // dd($request->all());

        $save = DB::connection('mysql')->table('tb_creditos')->insert(
            [
             'user_id' =>  Auth::user() -> id ,  
            //  'valor_credito'  => number_format(floatval(request('Valor_do_crédito')),2),
             'valor_credito'  => floatval(request('Valor_do_crédito')),
             'nome_credito' => request('Descrição_do_Crédito'),
             'mes' => request('Mês_de_lançamento'),
             'ano' => intval(request('Ano_de_lançamento')),
             'tipo','credito'
                
            //     'pipe' => request('idPipe'),
            // 'id_proposta' => request('idProposta'),
            // 'projeto' => request('nomeProjeto'),
            // 'regional' => request('regional'),
            // 'gv' => request('gv'),
            // 'nome_cdc' => request('nomeCDC'),
            // 'objeto' => request('objeto'),
            // 'modalidade' => request('modalidade'),
            // 'tipo_licitacao' => request('tipoLicitacao'),
            // 'hora_certame' => request('horaCertame'),
            // 'site_oficial' => request('siteOficial'),
            // 'created_at' => $data,
            // 'updated_at' => $data,
            // 'n_edital' => request('nEdital'),
            // 'uasg' => request('nLicitacao'),
            // 'pk' => request('pk'),
            // 'data_certame' => request('dataCertame'),
            // 'data_questionamento' => request('dataQuestionamento'),
            // 'data_impugnacao' => request('dataImpugnacao'),
            // 'status' => 'Não solicitado',
            // 'id_cadastrante' => request('idCadastrande'),
            // 'nome_cadastrante' => Auth::user() -> name,
            // 'email_aprovador' => $email_gestor,
            // 'id_aprovador' =>  $id_gestor,
            // 'email_cadastrante' => Auth::user() -> email
          ]);

    }


    public function putCredito(Request $request)
    {
        $id = request('id');


        $updateNogo = DB::connection('mysql')
        ->table('tb_creditos')
        ->where('id',$id)
        ->where('user_id', Auth::user() -> id)
        ->where('tipo','credito')
        ->update([
             
            'valor_credito'  => floatval(request('Valor_do_crédito')),
            'nome_credito' => request('Descrição_do_Crédito'),
            'mes' => request('Mês_de_lançamento'),
            'ano' => intval(request('Ano_de_lançamento'))

      ]);

        // dd($request->all());

    }


    public function deleteCredito(Request $request)
    {

        $delete =  DB::connection('mysql')
        ->table('tb_creditos')
        ->where('id',request('id'))
        ->where('user_id', Auth::user() -> id)
        ->where('tipo','credito')
        ->delete();

    }


    public function getDebito()
    {
        $getDados = DB::connection('mysql')->table('tb_creditos as s')
        ->select('id', 'nome_debito as Descrição do débito', 'mes as Mês de lançamento',
                'ano as Ano de lançamento','valor_debito as Valor do débito')
        ->where('tipo','debito')
        ->get();

        return response()->json($getDados);
    }

    public function postDebito(Request $request)
    {

        // dd($request->all());

        $save = DB::connection('mysql')->table('tb_creditos')->insert(
            [
             'user_id' =>  Auth::user() -> id ,  
            //  'valor_debito'  => number_format(floatval(request('Valor_do_débito')), 2),
             'valor_debito'  => floatval(request('Valor_do_débito')),
             'nome_debito' => request('Descrição_do_débito'),
             'mes' => request('Mês_de_lançamento'),
             'ano' => intval(request('Ano_de_lançamento')),
             'tipo' => 'debito'
                
        
          ]);

    }


    public function putDebito(Request $request)
    {
        $id = request('id');


        $updateNogo = DB::connection('mysql')
        ->table('tb_creditos')
        ->where('id',$id)
        ->where('user_id', Auth::user() -> id)
        ->where('tipo','debito')
        ->update([
             
            'valor_debito'  => floatval(request('Valor_do_débito')),
            'nome_debito' => request('Descrição_do_débito'),
            'mes' => request('Mês_de_lançamento'),
            'ano' => intval(request('Ano_de_lançamento'))

      ]);

        // dd($request->all());

    }


    public function deleteDebito(Request $request)
    {

        $delete =  DB::connection('mysql')
        ->table('tb_creditos')
        ->where('id',request('id'))
        ->where('user_id', Auth::user() -> id)
        ->where('tipo','debito')
        ->delete();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $creditos = DB::table('tb_creditos')
        // ->where('user_id', Auth::user() -> id)
        // ->sum('valor_credito.tb_creditos');


        // $creditos= DB::table('tb_creditos')
        // ->select( DB::raw('sum( valor_credito )') )
        // ->where('user_id', Auth::user() -> id)
        // ->get();

        // $creditos = DB::table("tb_creditos")->sum('valor_credito');

        $data = getdate();
        $mesAtual = $data['mon'];
        $anoAtual = $data['year'];
        $creditosJaneiro = 0;
        $creditosFevereiro = 0; 
        $creditosMarco = 0;
        $creditosAbril= 0;
        $creditosMaio = 0;
        $creditosJunho = 0;
        $creditosJulho = 0;
        $creditosAgosto = 0;
        $creditosSetembro = 0;
        $creditosOutubro = 0;
        $creditosNovembro = 0;
        $creditosDezembro = 0; 

        

        // setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        // date_default_timezone_set('America/Sao_Paulo');
        // echo strftime('%A, %d de %B de %Y', strtotime('today'));
        // dd($data);

        $creditosMesAtual = DB::table('tb_creditos')
            ->select(DB::raw('SUM(valor_credito) as total'))
            ->where('user_id', Auth::user() -> id)
            ->where('mes', $mesAtual)
            ->where('ano',  $anoAtual)
            ->where('tipo','credito')
            ->get();


        $debitosMesAtual = DB::table('tb_creditos')
            ->select(DB::raw('SUM(valor_debito) as total'))
            ->where('user_id', Auth::user() -> id)
            ->where('mes', $mesAtual)
            ->where('ano',  $anoAtual)
            ->where('tipo','debito')
            ->get();
        // dd($debitosMesAtual);
        
        // if($mesAtual != 1){

        //     $creditosJaneiro = DB::table('tb_creditos')
        //     ->select(DB::raw('SUM(valor_credito) as total'))
        //     ->where('user_id', Auth::user() -> id)
        //     ->where('mes', 1)
        //     ->where('ano',  $anoAtual)
        //     ->get();

        //     if($creditosJaneiro[0]->total == null){
        //         $creditosJaneiro[0]->total = 0;
        //     }

        // }else if($creditosJaneiro == 0){
        //     $creditosJaneiro =  $creditosMesAtual[0];
        // }


        // if($mesAtual != 2){

        //     $creditosFevereiro = DB::table('tb_creditos')
        //     ->select(DB::raw('SUM(valor_credito) as total'))
        //     ->where('user_id', Auth::user() -> id)
        //     ->where('mes', 2)
        //     ->where('ano',  $anoAtual)
        //     ->get();

        //     // dd($creditosFevereiro[0]->total);

        //     if($creditosFevereiro[0]->total == null){
        //         $creditosFevereiro[0]->total = 0;
        //     }

        // }else if($creditosFevereiro == 0){
        //     $creditosFevereiro = $creditosMesAtual[0];
        // }


        // if($mesAtual != 3){

        //     $creditosMarco = DB::table('tb_creditos')
        //     ->select(DB::raw('SUM(valor_credito) as total'))
        //     ->where('user_id', Auth::user() -> id)
        //     ->where('mes', 3)
        //     ->where('ano',  $anoAtual)
        //     ->get();

        //     if($creditosMarco[0]->total == null){
        //         $creditosMarco[0]->total = 0;
        //     }

        // }else if($creditosMarco == 0){
        //     $creditosMarco =  $creditosMesAtual;
        // }


        // if($mesAtual != 4){
        //     $creditosAbril = DB::table('tb_creditos')
        //     ->select(DB::raw('SUM(valor_credito) as total'))
        //     ->where('user_id', Auth::user() -> id)
        //     ->where('mes', 4)
        //     ->where('ano',  $anoAtual)
        //     ->get();

        //     if($creditosAbril[0]->total == null){
        //         $creditosAbril[0]->total = 0;
        //     }

            

        // }else if($creditosAbril == 0){
        //     $creditosAbril =  $creditosMesAtual;
        // }


        // if($mesAtual != 5){

        //     $creditosMaio = DB::table('tb_creditos')
        //     ->select(DB::raw('SUM(valor_credito) as total'))
        //     ->where('user_id', Auth::user() -> id)
        //     ->where('mes', 5)
        //     ->where('ano',  $anoAtual)
        //     ->get();

        //     if($creditosMaio[0]->total == null){
        //         $creditosMaio[0]->total = 0;
        //     }


        // }else if($creditosMaio == 0){
        //     $creditosMaio =  $creditosMesAtual;
        // }


        // if($mesAtual != 6){

        //     $creditosJunho = DB::table('tb_creditos')
        //     ->select(DB::raw('SUM(valor_credito) as total'))
        //     ->where('user_id', Auth::user() -> id)
        //     ->where('mes', 6)
        //     ->where('ano',  $anoAtual)
        //     ->get();

        //     if($creditosJunho[0]->total == null){
        //         $creditosJunho[0]->total = 0;
        //     }
        // }
        // else if($creditosJunho == 0){
        //     $creditosJunho =  $creditosMesAtual;
        // }


        // if($mesAtual != 7){

        //     $creditosJulho = DB::table('tb_creditos')
        //     ->select(DB::raw('SUM(valor_credito) as total'))
        //     ->where('user_id', Auth::user() -> id)
        //     ->where('mes', 8)
        //     ->where('ano',  $anoAtual)
        //     ->get();

        //     if($creditosJulho[0]->total == null){
        //         $creditosJulho[0]->total = 0;
        //     }

        // }else if($creditosJulho == 0){
        //     $creditosJulho =  $creditosMesAtual;
        // }

        // if($mesAtual != 8){

        //     $creditosAgosto = DB::table('tb_creditos')
        //     ->select(DB::raw('SUM(valor_credito) as total'))
        //     ->where('user_id', Auth::user() -> id)
        //     ->where('mes', 8)
        //     ->where('ano',  $anoAtual)
        //     ->get();

        //     if($creditosAgosto[0]->total == null){
        //         $creditosAgosto[0]->total = 0;
        //     }

        // }else if($creditosAgosto == 0){
        //     $creditosAgosto =  $creditosMesAtual;
        // }

        // if($mesAtual != 9){

        //     $creditosSetembro = DB::table('tb_creditos')
        //     ->select(DB::raw('SUM(valor_credito) as total'))
        //     ->where('user_id', Auth::user() -> id)
        //     ->where('mes', 9)
        //     ->where('ano',  $anoAtual)
        //     ->get();


        //     if($creditosSetembro[0]->total == null){
        //         $creditosSetembro[0]->total = 0;
        //     }


        // }else if($creditosSetembro == 0){
        //     $creditosSetembro =  $creditosMesAtual;
        // }

        // if($mesAtual != 10){

        //     $creditosOutubro = DB::table('tb_creditos')
        //     ->select(DB::raw('SUM(valor_credito) as total'))
        //     ->where('user_id', Auth::user() -> id)
        //     ->where('mes', 10)
        //     ->where('ano',  $anoAtual)
        //     ->get();


        //     if($creditosOutubro[0]->total == null){
        //         $creditosOutubro[0]->total = 0;
        //     }

        // }else if($creditosOutubro == 0){
        //     $creditosOutubro =  $creditosMesAtual;
        // }


        // if($mesAtual != 11){

        //     $creditosNovembro = DB::table('tb_creditos')
        //     ->select(DB::raw('SUM(valor_credito) as total'))
        //     ->where('user_id', Auth::user() -> id)
        //     ->where('mes', 11)
        //     ->where('ano',  $anoAtual)
        //     ->get();

        //     if($creditosNovembro[0]->total == null){
        //         $creditosNovembro[0]->total = 0;
        //     }

        // }else if($creditosNovembro == 0){
        //     $creditosNovembro =  $creditosMesAtual;
        // }

        // if($mesAtual != 12){

        //     $creditosDezembro = DB::table('tb_creditos')
        //     ->select(DB::raw('SUM(valor_credito) as total'))
        //     ->where('user_id', Auth::user() -> id)
        //     ->where('mes', 12)
        //     ->where('ano',  $anoAtual)
        //     ->get();

        //     if($creditosDezembro[0]->total == null){
        //         $creditosDezembro[0]->total = 0;
        //     }

        // }else if($creditosDezembro == 0){
        //     $creditosDezembro =  $creditosMesAtual;
        // }

           
      
        // foreach($data as $mes){
        //     print_r($mes);
        // }

       



    //    dd($creditosMesAtual);
    // dd($mesAtual, $creditosJaneiro, $creditosFevereiro, $creditosMarco, $creditosAbril, $creditosMaio, $creditosJunho, $creditosJulho, $creditosAgosto, $creditosSetembro, $creditosOutubro, $creditosNovembro, $creditosDezembro );
    // dd($creditosMesAtual);
    return view('cicloPagamento', compact('creditosMesAtual', 'debitosMesAtual'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getLancamentoAnualCreditos()
    {

        $data = getdate();
        $mesAtual = $data['mon'];
        $anoAtual = $data['year'];

        $getDados = DB::table('tb_creditos')
        ->select('mes',DB::raw('SUM(valor_credito) as total'))
        ->where('user_id', Auth::user() -> id)
        ->where('ano',  $anoAtual)
        ->groupBy('mes')
        ->orderBy('mes')
        ->get();

        // $getDados .= DB::table('tb_debitos')
        // ->select('mes',DB::raw('SUM(valor_debito) as total'))
        // ->where('user_id', Auth::user() -> id)
        // ->where('ano',  $anoAtual)
        // ->groupBy('mes')
        // ->orderBy('mes')
        // ->get();

        // dd($getDados);

        // $data = [];

        // foreach($getDados as $data){
        //     if($data->mes == "1"){
        //         $data->mes = "Janeiro";
                
        //     }

        //     if($data->mes == "9"){
        //         $data->mes = "Setembro";
                
        //     }
            
        // }

        return response()->json($getDados);

       
    }

    public function getLancamentoAnualDeditos()
    {

        $data = getdate();
        $mesAtual = $data['mon'];
        $anoAtual = $data['year'];

        $getDados = DB::table('tb_debitos')
        ->select('mes',DB::raw('SUM(valor_debito) as total'))
        ->where('user_id', Auth::user() -> id)
        ->where('ano',  $anoAtual)
        ->groupBy('mes')
        ->orderBy('mes')
        ->get();

        // $getDados .= DB::table('tb_debitos')
        // ->select('mes',DB::raw('SUM(valor_debito) as total'))
        // ->where('user_id', Auth::user() -> id)
        // ->where('ano',  $anoAtual)
        // ->groupBy('mes')
        // ->orderBy('mes')
        // ->get();

        // dd($getDados);

        // $data = [];

        // foreach($getDados as $data){
        //     if($data->mes == "1"){
        //         $data->mes = "Janeiro";
                
        //     }

        //     if($data->mes == "9"){
        //         $data->mes = "Setembro";
                
        //     }
            
        // }

        return response()->json($getDados);

       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

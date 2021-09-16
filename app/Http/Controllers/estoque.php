<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Integer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use phpDocumentor\Reflection\Types\Integer as TypesInteger;

// use phpDocumentor\Reflection\Types\Integer;

class estoque extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cadastro_estoque');
    }


    public function getCategoriasEstoque()
    {
        $categorias = DB::connection('mysql')->table('categoria_estoque')
        ->select('*')        
        ->get();

        return response()->json($categorias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function getEstoque()
    {

        // $linhas = DB::table('pesquisa_sov as PS')
        // ->select(DB::raw('PS.cor_linha,count(*) as Quantidade'))
        // ->join('tb_regraProposta as RP','RP.nomeRegra','PS.cor_linha')
        // ->join('tb_regraProposta as RP2','RP2.nomeRegra','PS.camada_layer_estacao')
        // ->where('PS.tb_carrinho_id_carrinho',$id)
        // ->where('RP.permiteVenda',1)
        // ->where('RP2.permiteVenda',1)
        // ->groupBy('PS.cor_linha')
        // ->get();

        $getDados = DB::connection('mysql')->table('sample_data4 as s')
            ->select('s.id','s.first_name','s.last_name','s.age','c.nome')
            ->join('categoria_estoque as c', 'c.id', 's.gender')
            ->get();

        // $count = DB::connection('mysql')->table('sample_data4 as s')
        //     ->select('s.id','s.first_name','s.last_name','s.age','c.nome')
        //     ->join('categoria_estoque as c', 'c.id', 's.gender')
        //     // ->groupBy('c.nome')
        //     ->count();

        // $getDados2 = DB::connection('mysql')->table('categoria_estoque')
        // ->select('nome')        
        // ->get();
        
        // $i = intval($count);
        // $i -1;
        // for($j = 0; $j <= $i; $j++){

        // $getDadosVetor = DB::connection('mysql')
        // ->select(DB::raw('select s.id, s.first_name, s.last_name, s.age,
        //                     (select c.nome from categoria_estoque c group by c.nome) as nome
        //                 from sample_data4  s'
                        
        //         ));

                // join categoria_estoque as c on c.id = s.gender
            // ->select('s.id','s.first_name','s.last_name','s.age','c.nome')
            // ->join('categoria_estoque as c', 'c.id', 's.gender')
            // ->groupBy('c.nome')
            // ->get();
        
        
        //     $camposVetor=['id','first_name','last_name','age','nome'];
        //     foreach($camposVetor as $campo){
               
                
        //         if($campo=='nome'){
                    
        //             foreach($getDados2 as $data){

        //                 // if($data == 'nome'){

        //                     $getDadosVetor[$j]->$campo=$data;
        //                 // }
                        
        //             }
        //         }

        //     }
        //     $i --;

            
        // }

        

        // dd($getDadosVetor);

           
        
        
        return response()->json($getDados);
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function postEstoque(Request $request)
    {
        dd($request->all());
    }

    public function putEstoque(Request $request)
    {
        dd($request->all());
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
    public function deleteEstoque(Request $request)
    {
        dd($request->all());
    }
}

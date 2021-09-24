<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password as FacadesPassword;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class admin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $success = false;
        $email = $request->input( 'email' );
        $password = $request->input( 'password' );
        $password_confirmation = $request->input( 'password_confirmation' );
       
        if($password !==  $password_confirmation) {
            $msgPassword = array(
                "msg" => "Confirmação de senha inválida"
            ); 
            return redirect()->back()->withErrors( $msgPassword )->withInput();
        }

        $validaEmail = User::where( [
            ['email', $email],

        ])->first();

        if($validaEmail){

            $msgEmail = array(
                "msg" => "Email já cadastrado"
            ); 
            return redirect()->back()->withErrors( $msgEmail )->withInput();

        }
        
   
              
        // dd($request->all());
        $regras = [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:8|max:12'

        ];

        $mensagem = [
            'required' => ' O campo :attribute não pode ser vazio',
            'min' => 'O campo :attribute deve ter no mínimo :min caracteres',
            'max' => 'O campo :attribute deve ter no máximo :max caracteres'

        ];

        $request->validate($regras, $mensagem);

        
        #$user = [
        #    $request->input('perfil'),
        #    $request->input('email'),
        #    $request->input('password')
        #];
        
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        $success = 'true';
        $message = "Usuário criado com sucesso!";

        // return view('auth.profile', compact('message'));
        return view('auth.profile')->with(['message'=>$message]);
        // return redirect()->back()->with( $message )->withInput();
        // return view('auth.profile');
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
    public function show($id)
    {
        //
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


    public function getUser()
    {
        $getDados = DB::connection('mysql')->table('users')
        ->select('id', 'name as Nome', 'email as Email',
                'created_at as Data de criação','updated_at as Data de Atualização')
        ->get();

        return response()->json($getDados);
    }

    public function postUser(Request $request)
    { 
        
        // dd($request->all());

        $save = DB::connection('mysql')->table('tb_creditos')->insert(
            [
             'user_id' =>  Auth::user() -> id ,  
            //  'valor_debito'  => number_format(floatval(request('Valor_do_débito')), 2),
             'valor_credito'  => floatval(request('Valor_do_crédito')),
             'nome_credito' => request('Descrição_do_Crédito'),
             'mes' => request('Mês_de_lançamento'),
             'ano' => intval(request('Ano_de_lançamento')),
             'tipo' => 'credito'
                
        
          ]);

    }


    public function putUser(Request $request)
    {
        //  dd($request->all());
        
        $id = request('id');

        $data = date('Y-m-d G:i:s');

        $resetSenha = request('Senha');

        if($resetSenha === 'true'){
           
            $updateUser = DB::connection('mysql')
            ->table('users')
            ->where('id',$id)
            ->update([
             
                'name'  => request('Nome'),
                'email' => request('Email'),
                'password' => Hash::make(request('Nome')),
                'updated_at' => $data
            ]);

        }else{

          
            $updateUser = DB::connection('mysql')
            ->table('users')
            ->where('id',$id)
            ->update([
             
                'name'  => request('Nome'),
                'email' => request('Email'),
                'updated_at' => $data
            ]);


        }

        

        // dd($request->all());

    }


    public function deleteUser(Request $request)
    {


        $delete =  DB::connection('mysql')
        ->table('users')
        ->where('id',request('id'))
        ->delete();

    }
}

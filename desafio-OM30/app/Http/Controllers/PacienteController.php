<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use Cache;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expiration = 60;
        $key = "paciente_";
        
        return Cache::remember($key, $expiration, function() {
            $pacientes = Paciente::all();        
            return response()->json($pacientes);
        });
    }    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $paciente = Paciente::create($request->post());        
        return response()->json([
            'message'=>'Registro inserido com sucesso!',
            'paciente'=>$paciente
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function show(Paciente $paciente)
    {
        return response()->json($paciente);
    }    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paciente $paciente)
    {
        $paciente->fill($request->post())->save();
        return response()->json([
            'message'=>'Registro Alterado com sucesso!!',
            'paciente'=>$paciente
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paciente $paciente)
    {
        $paciente->delete();
        return response()->json([
            'message'=>'Registro excluido com sucesso!'
        ]);
    }

    /**
     * Get all data by search.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request) 
    {
        //cache
        $expiration = 60;
        $key = "paciente_";

        //$paciente_query = Paciente::with(['paciente', 'endereco']);        
        $paciente_query = Paciente::with([]);
        if ($request->nome) {
            $paciente_query->where('nome','LIKE', '%'.$request->nome.'%');
        }        
        if ($request->cpf) {
            $paciente_query->where('cpf','LIKE', '%'.$request->cpf.'%');
        }     
        $pacientes=$paciente_query->get();

        if ($request->cep) {
            $results = file_get_contents('https://viacep.com.br/ws/'.$request->cep.'/json/');
            $results = json_decode($results);

            return Cache::remember($key, $expiration, function() use ($results) {
                return response()->json([                
                    'data'=>$results
                ], 200);
            });
                
        }             
        return Cache::remember($key, $expiration, function() use ($pacientes) {
            return response()->json([
                'message'=>'Registro encontrado com sucesso!',
                'data'=>$pacientes
            ], 200);
        });    
    }    


    /**
     * upload csv File.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function upload_csv_file(Request $request)
    {
        if( $request->has('csv') ) {

            $csv    = file($request->csv);
            $chunks = array_chunk($csv,1000);
            $header = [];

            foreach ($chunks as $key => $chunk) {
            $data = array_map('str_getcsv', $chunk);
                if($key == 0){
                    $header = $data[0];
                    unset($data[0]);
                }

                ItemCSVUploadJob::dispatch($data, $header);                
            }

        }
        return "please upload CSV file";
    }
}

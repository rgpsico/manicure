<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artigos as Artigos;
class ArtigosController extends Controller
{
    private $array  = ["error" => "", "result" => []];

    public function List()
    {
        $Artigos =  Artigos::all();
        foreach ($Artigos as $value) {
            $this->array['result'][] = [
                'id' => $value->id,
                'Titulo' => $value->Titulo,
                'Descrição' => $value->Descricao,              
                'Status' => $value->Status
            ];
        }
        return $this->array;
    }

    public function ListByID($id)
    {
        $Artigos = Artigos::find($id);
        if ($Artigos) {
            $this->array['result'] = $Artigos;
        } else {
            $this->array['error']  = "ID não encontrado";
        }
        return $this->array;
    }

    public function Create(request $request)
    {
        $array = ["error" => ""];
        $Artigos = new Artigos;
        $Titulo      = $request->input("Titulo");
        $Descricao   = $request->input("Descricao");    
        $Status      = $request->input("Status");

        if ($Titulo && $Descricao) {
            $Artigos = new Artigos();
            $Artigos->Titulo    = $Titulo;
            $Artigos->Descricao = $Descricao;

            
          
            $Artigos->save();
            $this->array["result"] = [
                'id'=>$Artigos->id
            ];

            
        } else {
            $this->array["Success"] = "Campos não enviados";
        }

        return $this->array;
    }

    public function Edit(Request $request , $id)
    {
        $array = ["error" => ""];
    
        $Titulo      = $request->input("Titulo");
        $Descricao   = $request->input("Descricao");     
        $Status      = $request->input("Status");

        if ($Titulo && $Descricao) {        
            $Artigos =  Artigos::find($id);
            if($Artigos){
                $Artigos->Titulo    = $Titulo;
                $Artigos->Descricao = $Descricao;
                   
                $Artigos->save();
                $this->array['result'] = [
                'id'=>$id,
                'Titulo'=>$Titulo,
                'Descricao'=>$Descricao
                ];
            }else{
                $this->array['error']  = "ID não encontrado";
            }
        } else {
            $this->array["Success"] = "Campos não enviados";
        }
        
        return $this->array;
    }

    public function Delete($id)
    {
        $Artigos = Artigos::find($id);
        if ($Artigos) {
            $Artigos->delete();
        } else {
            $this->array['error']  = "ID não encontrado";
        }
        return $this->array;
    }
}

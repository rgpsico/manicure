<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Local as Local;
class LocalController extends Controller
{

    private $array  = ["error" => "", "result" => []];

    public function List()
    {
        $Local =  Local::all();
        foreach ($Local as $value) {
            $this->array['result'][] = [
                'id' => $value->id,
                'Titulo' => $value->Titulo,
                'Descrição' => $value->Descricao,
           
            ];
        }
        return $this->array;
    }

    public function ListByID($id)
    {
        $Local = Local::find($id);
        if ($Local) {
            $this->array['result'] = $Local;
        } else {
            $this->array['error']  = "ID não encxxontrado";
        }
        return $this->array;
    }

    public function Create(request $request)
    {
        $array = ["error" => ""];
        $Local = new Local;
        $nome      = $request->input("nome");
        $cep       = $request->input("cep");
       

        if ($nome && $cep) {
            $Local = new Local();
            $Local->nome    = $nome;
            $Local->cep    = $cep;          
            $Local->save();

            $this->array["result"] = [
                'id'=>$Local->id
            ];
            
        } else {
            $this->array["Success"] = "Campos não enviados";
        }

        return $this->array;
    }

    public function Edit(Request $request , $id)
    {
        $array = ["error" => ""];
    
        $nome      = $request->input("nome");
        $cep   = $request->input("cep");


        if ($nome && $cep) {        
            $Local =  Local::find($id);
            if($Local){
                $Local->nome    = $nome;
                $Local->cep = $cep;
               
                $Local->save();
                $this->array['result'] = [
                'id'=>$id,
                'nome'=>$nome,
                'cep'=>$cep
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
        $Local = Local::find($id);
        if ($Local) {
            $Local->delete();
        } else {
            $this->array['error']  = "ID não encontrado";
        }
        return $this->array;
    }
}

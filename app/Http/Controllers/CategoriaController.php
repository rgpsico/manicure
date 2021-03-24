<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria as Categorias;
class CategoriaController extends Controller
{

    private $array  = ["error" => "", "result" => []];

    public function List()
    {
        $Categorias =  Categorias::all();
        foreach ($Categorias as $value) {
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
        $Categorias = Categorias::find($id);
        if ($Categorias) {
            $this->array['result'] = $Categorias;
        } else {
            $this->array['error']  = "ID não encxxontrado";
        }
        return $this->array;
    }

    public function Create(request $request)
    {
        $array = ["error" => ""];
        $Categorias = new Categorias;
        $Titulo      = $request->input("Titulo");
        $Descricao   = $request->input("Descricao");
       

        if ($Titulo && $Descricao) {
            $Categorias = new Categorias();
            $Categorias->Titulo    = $Titulo;
            $Categorias->Descricao = $Descricao;          
            $Categorias->save();
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


        if ($Titulo && $Descricao) {        
            $Categorias =  Categorias::find($id);
            if($Categorias){
                $Categorias->Titulo    = $Titulo;
                $Categorias->Descricao = $Descricao;
               
                $Categorias->save();
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
        $Categorias = Categorias::find($id);
        if ($Categorias) {
            $Categorias->delete();
        } else {
            $this->array['error']  = "ID não encontrado";
        }
        return $this->array;
    }
}


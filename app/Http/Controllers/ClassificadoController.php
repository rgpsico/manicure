<?php

namespace App\Http\Controllers;

use Classificado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Classificados;

class ClassificadoController extends Controller
{
    private $array  = ["error" => "", "result" => []];

    public function List()
    {
        $classificados =  Classificados::all();
        foreach ($classificados as $value) {
            $this->array['result'][] = [
                'id' => $value->id,
                'Titulo' => $value->Titulo,
                'Description' => $value->Descricao,
                'Preco' => $value->Preco,
                'LocalID' => $value->LocalID,
                'UserID' => $value->UserID,
                'Status' => $value->Status,
                'foto' => $value->foto
            ];
        }
        return $this->array;
    }

    public function ListByID($id)
    {
        $Classificados = Classificados::find($id);
        if ($Classificados) {
            $this->array['result'] = $Classificados;
        } else {
            $this->array['error']  = "ID não encontrado";
        }
        return $this->array;
    }

    public function ListCatForUser($id)
    {  
        $Classificados = Classificados::where('userID',$id)->get();

        if ($Classificados) {
            $this->array['result'] = $Classificados;
        } else {
            $this->array['error']  = "ID não encontrado";
        }
        return $this->array;
      
    }

    public function Create(request $request)
    {
    
        $array = ["error" => ""];
        $Classificados = new Classificados;
        $Titulo      = $request->input("Titulo");
        $Descricao   = $request->input("Descricao");
        $Preco       = $request->input("Preco");
        $UserID     =  $request->input("UserID");
        $LocalID     = $request->input("LocalID");
        $Status      = $request->input("Status");
         
       
        if($request->hasfile('image') && $request->image->isValid()){          
            $tmp    = $request->image->store('public');
            $fileEx = explode("/",$tmp);
            $fileName = $fileEx[1];
        }else{
           
        }
         
      
   
        if ($Titulo && $Descricao) {
            
            $classificados = new Classificados();
            $classificados->Titulo    = $Titulo;
            $classificados->Descricao = $Descricao;
            $classificados->Preco     = $Preco;  
            $classificados->foto     = $fileName;
            $classificados->UserID     = $UserID;             
            $classificados->save();
        
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
        $Preco       = $request->input("Preco");
        $LocalID     = $request->input("LocalID");
        $Status      = $request->input("Status");
        $userID      = $request->input("userID"); 
        //$file        = $request->file("file")->store('public');
        
        //$nomeFile = explode('/',$file);
        if ($Titulo && $Descricao) {        
            $classificados =  Classificados::find($id);
            if($classificados){
                $classificados->Titulo    = $Titulo;
                $classificados->Descricao = $Descricao;
                $classificados->Preco     = $Preco; 
                $classificados->userID     = $userID;   
         //       $classificados->foto     = $nomeFile[1];          
                $classificados->save();
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




    public function StatusUpdate(Request $request , $id)
    {
        $array = ["error" => ""];
        $status = $request->input('status');
     
            
        $classificados =  Classificados::find($id);
          
            if($classificados){
                           
               $status = ($classificados->Status == 1 ? 0 : 1);
            
                
                $classificados->Status    = $status;
                       
                $classificados->save();
                $this->array['result'] = [
                'id'=>$id,
                'Titulo'=>$classificados->Titulo,
                'Status'=>$classificados->Status
                ];
            }else{
                $this->array['error']  = "ID não encontrado";
            }
            return $this->array;
        }
        
       
    


    public function Delete($id)
    {
        $Classificados = Classificados::find($id);
        if ($Classificados) {
            $Classificados->delete();
        } else {
            $this->array['error']  = "ID não encontrado";
        }
        return $this->array;
    }

    public function viewClassifiled(){
        return view('welcome');

    }

    public function homeClassifield(){
        return view('home');

    }
}

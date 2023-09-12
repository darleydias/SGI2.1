<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NotaFiscal;

class NotaFiscalController extends Controller
{



public function uploadNF(Request $request)
{
    if ($request->hasFile('notaFiscal')) {
        $notaFiscal = $request->file('notaFiscal');
        $nf_path = $notaFiscal->store('notaFiscal', 'public');
        $notaFiscalModel = new NotaFiscal();

        $notaFiscalModel->nf_path = $nf_path;
        $notaFiscalModel->nf_nomeOriginal = $notaFiscal->getClientOriginalName();
        $notaFiscalModel->nf_contentType = $notaFiscal->getClientMimeType();
        $notaFiscalModel->nf_hash = md5_file($notaFiscal->path());

        $tamanho = $notaFiscal->getSize();
        $notaFiscalModel->nf_tamanho = ($tamanho / 1024);
        $notaFiscalModel->save();
        
        // Obtém o ID após o salvamento
        $idNotaFiscal = $notaFiscalModel->id;

       //  return response()->json($idNotaFiscal);
       // return response()->json("idNF " .$idNotaFiscal);
       return response()->json(['id' => $idNotaFiscal]);

    } else {
        return response()->json(['error' => 'Nenhuma nf foi enviada.'], 400);
    }
}

    public function show(string $id)
    {
     $caminho = NotaFiscal::findOrFail($id);
return response()->json(['nf_path' => $caminho->nf_path]);
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Epi;

class EpiController extends Controller
{
    public function index()
    {
        $epis = Epi::all();
        return view('epi.index', compact($epis));
    }


    public function store(Request $request)
    {
            $request->validate([
            'nome' => 'required',
            'tipo' => 'required',
            'validade' => 'required|date',
        ]);

        Epi::create([
            'nome' => $request->nome,
            'tipo' => $request->tipo,
            'validade' => $request->validade,
            'habilitado' => true,
        ]);

        return redirect()->route('epi.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'tipo' => 'required',
            'validade' => 'required|date',
        ]);

        $epi = Epi::findOrFail($id);
        $epi->update([
            'nome' => $request->nome,
            'tipo' => $request->tipo,
            'validade' => $request->validade,
        ]);

        return redirect()->route('epi.index');
    }

    public function toggle($id)
    {
        $epi = Epi::findOrFail($id);
        $epi->habilitado = !$epi->habilitado;
        $epi->save();

        return redirect()->route('epi.index');
    }

    public function destroy($id)
    {
        $epi = Epi::findOrFail($id);
        $epi->delete();

        return redirect()->route('epi.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\CultureModel;
use App\Traits\Table;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    use Table;

    public function index()
    {
        $cultures = CultureModel::all();

        return view('home', ['cultures' => $cultures]);
    }

    public function culture($id)
    {
        $details = DB::table('cultures_data as cd')
            ->where('cd.culture_id', '=', $id)
            ->selectRaw("cd.value, to_char(cd.date, 'DD/MM/YYYY HH24:MI') as formatted_date")
            ->get();

        $culture = CultureModel::where('id', $id)->first();

        return view('details', ['details' => $details, 'culture' => $culture]);
    }

    public function updateDatabase()
    {
        $this->getData();

        return redirect('/')->with('message', 'Base de dados atualizado com êxito.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Partners;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PartnersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {
        $partners = Partners::all();

        return view('admin.partners.index',
            [
                'partners'=>$partners
            ]
        );
    }

    public function index(){
        $mass_shops = array();
        $mass_ecommerces = array();
        $regions = DB::table('partners')->select('region')->where('region','!=','')->distinct()->get();
        $s_mass = DB::table('partners')->where('type','=','T')->get()->sortByDesc('sort');
        $e_mass = DB::table('partners')->where('type','=','I')->get()->sortByDesc('sort');

        foreach ($regions as $s=>$region) {
            foreach ($s_mass as $key => $partner) {
                $item = "";
                if ($region->region == $partner->region) {
                    $mass_shops[$region->region][$key] = $partner;
                }
            }
        }

        foreach ($e_mass as $key=>$partner){
            $item = array([
                'id'=>$partner->id,
                'name'=>$partner->name,
                'url'=>$partner->url,
                'addres'=>$partner->addres,
                'type'=>$partner->type
            ]);
            $mass_ecommerces[$key] = $item;
        }

        $json_mass_shops = json_encode($mass_shops);

        return view('partners.index', [

            'shops'=>$json_mass_shops,
            'ecommerces'=>$mass_ecommerces
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.partners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $partner = new Partners();
        $partner->name = $request->name;
        $partner->addres = $request->addres;
        $partner->type = $request->type;
        $partner->url = $request->url;
        $partner->region = $request->region;
        $partner->index = "site";
        $partner->save();

        return redirect('admin/partners');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Partners  $partners
     * @return \Illuminate\Http\Response
     */
    public function show(Partners $partners)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Partners  $partners
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $partner = Partners::find($id);
        return view('admin.partners.edit', [
            'partner'=>$partner
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Partners  $partners
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $partner = Partners::find($id);
        $partner->name = $request->name;
        $partner->addres = $request->addres;
        $partner->type = $request->type;
        $partner->url = $request->url;
        $partner->region = $request->region;
        $partner->save();

        return redirect('admin/partners');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Partners  $partners
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partner = Partners::find($id);
        if ($partner != null) {
            $partner->delete();
        }

        return redirect('admin/partners');
    }
    public function destroy_json($id)
    {
        $partner = Partners::find($id);
        if ($partner != null) {
            $partner->delete();
        }

    }
}

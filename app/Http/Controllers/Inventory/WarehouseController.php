<?php

namespace App\Http\Controllers\Inventory;

use App\Helper\DatatableHelper;
use App\Http\Controllers\Controller;
use App\Models\Inventory\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class WarehouseController extends Controller
{
    public function index()
    {
        return view("pages.inventory.warehouse.index");
    }

    public function list($var = null)
    {
        $qry = Warehouse::query();
        return DatatableHelper::generate($var, $qry->get(), "warehouse", array("show"=>true,"delete"=>true))->make(true);
    }

    public function create()
    {
        return view("pages.inventory.warehouse.create");
    }

    public function store(Request $request)
    {
        $warehouse = Warehouse::create($request->except('_token'));
        if($warehouse->save()){
            return redirect(url("/warehouse/".$warehouse->id))->with(["message"=>"Success: Data berhasil disimpan"]);
        }
        return back()->with(["error"=>"Process Fail: Data gagal disimpan"]);
    }

    public function show(Warehouse $warehouse)
    {
        $map['warehouse'] = $warehouse;
        return view("pages.inventory.warehouse.edit", $map);
    }

    public function edit(Warehouse $warehouse)
    {
        $map['warehouse'] = $warehouse;
        return view("pages.inventory.warehouse.edit", $map);
    }

    public function update(Request $request, Warehouse $warehouse)
    {
        $warehouse->update($request->except('_token'));
        return redirect(url("/warehouse/".$warehouse->id))->with(["message"=>"Success: Data berhasil disimpan"]);
    }

    public function destroy(Warehouse $warehouse)
    {
        $warehouse->delete();
        return redirect(url("/warehouse"))->with(["message"=>"Success: Data berhasil disimpan"]);
    }
}

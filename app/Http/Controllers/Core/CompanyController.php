<?php
namespace App\Http\Controllers\Core;

use App\Helper\SelectHelper;
use App\Http\Controllers\Controller;
use App\Models\Core\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller {
    public function index() {
        $qry=Company::orderBy("id", "desc");
        $map['list_data']=$qry->get();
        return view("pages.admin.company.index", $map);
    }

    public function create() {
        return view("pages.admin.company.create");
    }

    public function store(Request $request) {
        $p=Company::create($request->except(["_token"]));
        $p->save();
        return redirect(url("/company/".$p->id))->with("message","Success: Company Created");
    }

    public function show(Company $company) {
        $map['company']=Company::find($company->id);
        return view("pages.admin.company.edit", $map);
    }

    public function edit(Company $category) {
    }

    public function update(Request $request, Company $company) {
        $p=Company::find($company->id);
        $p->update($request->except(["_token"]));
        return redirect("/company/".$p->id)->with("message","Success: Company Updated");
    }

    public function destroy(Company $city) {
        $p=Company::find($city->id);
        $p->delete();
        return redirect("/company");
    }
    public function options(Request $request) {
        $company=Company::query();
        $company->limit(10);
        return SelectHelper::generate($company, "id", "company_name");
    }
    public function get(Company $city){
        $p=Company::find($city->id);
        return response()->json($p);
    }
}

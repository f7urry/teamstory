<?php
namespace App\Http\Controllers\Project;

use App\Helper\SelectHelper;
use App\Http\Controllers\Controller;
use App\Models\Core\Geographic;
use App\Models\Project\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller {
    public function index() {
        $qry=Project::query();
        $qry->whereIn("company_id", Auth::user()->company_ids());
        $map['list_data']=$qry->get();
        return view("pages.project.project.index", $map);
    }

    public function create() {
        return view("pages.project.project.create");
    }

    public function store(Request $request) {
        $p=Project::create($request->except(["_token"]));
        $p->save();
        return redirect(url("/project/".$p->id))->with("message","Success: Project Created");
    }

    public function show(Project $project) {
        $map['project']=Project::find($project->id);
        return view("pages.project.project.edit", $map);
    }

    public function edit(Geographic $category) {
    }

    public function update(Request $request, Project $project) {
        $p=Project::find($project->id);
        $p->update($request->except(["_token"]));
        return redirect("/project/".$p->id)->with("message","Success: Project Updated");
    }

    public function destroy(Project $project) {
        $p=Project::find($project->id);
        $p->delete();
        return redirect("/project");
    }
    public function options(Request $request) {
        $qry=Project::query();
        $qry->select("t_project.*");
        $qry->join("sys_company as s", "s.id", "=", "t_project.company_id");
        $qry->whereIn("company_id", Auth::user()->company_ids());
        if ($request->term != ''){
            $qry->where(function($q) use($request){
                $q->where("s.company_name", "like", "%$request->term%");
                $q->orWhere("project_name","like", "%$request->term%");
            });
        }
        $qry->limit(10);
        return SelectHelper::generate($qry,"t_project.id", 'concat(s.company_name," - ",project_name)',true);
    }
    public function get(Project $project){
        $p=Project::find($project->id);
        return response()->json($p);
    }
}

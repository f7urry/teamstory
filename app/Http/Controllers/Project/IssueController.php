<?php
namespace App\Http\Controllers\Project;

use App\Helper\CodeGenerator;
use App\Helper\DateHelper;
use App\Helper\SelectHelper;
use App\Helper\StorageUtil;
use App\Http\Controllers\Controller;
use App\Models\Core\Geographic;
use App\Models\Project\Project;
use App\Models\Project\Issue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IssueController extends Controller {
    public function index() {
        $qry=Issue::query();
        $qry->select("t_issue.*");
        $qry->join("t_project as p", "p.id", "=", "t_issue.project_id");
        $qry->whereIn("p.company_id", Auth::user()->company_ids());
        $map['list_data']=$qry->get();
        return view("pages.project.issue.index", $map);
    }

    public function create() {
        return view("pages.project.issue.create");
    }

    public function store(Request $request) {
        $p=Issue::create($request->except(["_token"]));
        $p->code=CodeGenerator::generate("I");
        if(isset($request->attachment_1)) {
            $filename = StorageUtil::uploadFile("issue_attachment", $request->attachment_1);
            $p->attachment_1 = $filename;
        }
        if(isset($request->attachment_2)) {
            $filename = StorageUtil::uploadFile("issue_attachment", $request->attachment_2);
            $p->attachment_2 = $filename;
        }
        if(isset($request->attachment_3)) {
            $filename = StorageUtil::uploadFile("issue_attachment", $request->attachment_3);
            $p->attachment_3 = $filename;
        }
        $p->status=Issue::STATUS_WAITING;
        $p->save();
        return redirect(url("/issue/".$p->id))->with("message","Success: Issue Created");
    }

    public function show(Issue $issue) {
        $map['issue']=Issue::find($issue->id);
        return view("pages.project.issue.edit", $map);
    }

    public function edit(Geographic $category) {
    }

    public function update(Request $request, Issue $issue) {
        try{
            $param=$request->except(["_token"]);
            $p=Issue::find($issue->id);
            if(isset($request->attachment_1)) {
                $filename = StorageUtil::uploadFile("issue_attachment", $request->attachment_1);
                $param['attachment_1'] = $filename;
            }
            if(isset($request->attachment_2)) {
                $filename = StorageUtil::uploadFile("issue_attachment", $request->attachment_2);
                $param['attachment_2'] = $filename;
            }
            if(isset($request->attachment_3)) {
                $filename = StorageUtil::uploadFile("issue_attachment", $request->attachment_3);
                $param['attachment_3'] = $filename;
            }
            $p->update($param);
            return redirect("/issue/".$p->id)->with("message","Success: Issue Updated");
        }catch(\Exception $e){
            return response()->back()->with("message", "Error: Failed update issue .".$e->getMessage());
        }
    }

    public function destroy(Issue $issue) {
        $p=Issue::find($issue->id);
        $p->delete();
        return redirect("/issue");
    }
}

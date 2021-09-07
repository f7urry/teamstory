<?php
namespace App\Http\Controllers\Project;

use App\Helper\SelectHelper;
use App\Http\Controllers\Controller;
use App\Models\Core\Geographic;
use App\Models\Project\Project;
use App\Models\Project\Issue;
use Illuminate\Http\Request;

class IssueController extends Controller {
    public function index() {
        $qry=Issue::query();
        $map['list_data']=$qry->get();
        return view("pages.project.issue.index", $map);
    }

    public function create() {
        return view("pages.project.issue.create");
    }

    public function store(Request $request) {
        $p=Issue::create($request->except(["_token"]));
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
        $p=Issue::find($issue->id);
        $p->update($request->except(["_token"]));
        return redirect("/issue/".$p->id)->with("message","Success: Issue Updated");
    }

    public function destroy(Issue $issue) {
        $p=Issue::find($issue->id);
        $p->delete();
        return redirect("/issue");
    }
}

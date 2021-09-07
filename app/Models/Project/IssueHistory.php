<?php

namespace App\Models\Project;

use App\Models\Base\Model;
use App\Models\User;

class IssueHistory extends Model{
    protected $guarded=['id'];
    protected $table = 't_issue_history';
    
    public function project(){
        return $this->belongsTo(Project::class, "project_id");
    }
    public function issue(){
        return $this->belongsTo(Issue::class, "issue_id");
    }
}
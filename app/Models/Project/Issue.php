<?php

namespace App\Models\Project;

use App\Models\Base\Model;
use App\Models\User;

class Issue extends Model{
    protected $guarded=['id'];
    protected $table = 't_issue';
    
    public function project(){
        return $this->belongsTo(Project::class, "project_id");
    }

    public function histories(){
        return $this->hasMany(IssueHistory::class);
    }
}
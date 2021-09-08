<?php

namespace App\Models\Project;

use App\Models\Base\Model;
use App\Models\User;

class Issue extends Model{
    protected $guarded=['id'];
    protected $table = 't_issue';
    
    public const STATUS_WAITING="WAITING";
    public const STATUS_IN_PROGRESS="IN PROGRESS";
    public const STATUS_DONE="DONE";
    public const STATUS_ON_TESTING="ON TESTING";
    public const STATUS_REJECTED="REJECTED";

    public function project(){
        return $this->belongsTo(Project::class, "project_id");
    }

    public function histories(){
        return $this->hasMany(IssueHistory::class);
    }
}
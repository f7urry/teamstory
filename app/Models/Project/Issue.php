<?php

namespace App\Models\Project;

use App\Models\Base\Model;
use App\Models\User;

class Issue extends Model{
    protected $guarded=['id'];
    protected $table = 't_issue';
    
    public static const STATUS_WAITING="WAITING";
    public static const STATUS_IN_PROGRESS="IN PROGRESS";
    public static const STATUS_DONE="DONE";
    public static const STATUS_ON_TESTING="ON TESTING";
    public static const STATUS_REJECTED="REJECTED";

    public function project(){
        return $this->belongsTo(Project::class, "project_id");
    }

    public function histories(){
        return $this->hasMany(IssueHistory::class);
    }
}
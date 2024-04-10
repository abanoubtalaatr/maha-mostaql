<?php

namespace App\Services;

use App\Constants\ProjectStatus;
use App\Models\Project;

class ProjectService
{
    // is owner of project
    public function isProjectOwner($project, $userId)
    {
        return Project::query()->where('user_id', $userId)->where('id', $project)->exists();
    }

    // in implement stage
    public function isProjectImplement($projectId)
    {
        return Project::query()->where('id', $projectId)->where('status', ProjectStatus::IMPLEMENTS)->exists();
    }
}

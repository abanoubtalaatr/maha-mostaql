<?php

namespace App\Services;

use App\Models\LikeWork;
use App\Models\Work;

class MyWorkService
{
    public function isCreatedByThisUser($workId, $userId)
    {
        return Work::query()->where('id', $workId)->where('user_id', $userId)->exists();
    }

    public function increaseViews($workId)
    {
        $work = Work::query()->where('id', $workId)->where('user_id','!=', auth()->id())->first();
        if($work){
            $views = $work->views + 1;
            $work->update(['views' => $views]);
        }
    }

    public function increaseLikes($workId)
    {
        if(!$this->isLikesBefore($workId, auth()->id())){
            $work = Work::query()->findOrFail($workId);
            $likes = $work->likes + 1;

            $work->update(['likes' => $likes]);
            LikeWork::query()->create([
                'user_id' => auth()->id(),
                'work_id' => $workId,
            ]);
        }
    }

    public function isLikesBefore($workId, $userId)
    {
        return LikeWork::query()->where('work_id', $workId)->where('user_id', $userId)->exists();
    }
}

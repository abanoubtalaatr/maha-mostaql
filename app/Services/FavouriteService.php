<?php

namespace App\Services;

use App\Models\Favorite;
use App\Models\Project;
use App\Models\User;

class FavouriteService
{
    public function projectIsFavourite($projectId)
    {
        return Project::find($projectId)->favoritable()->where('user_id', auth()->id())->first();
    }

    public function userIsFavourite($userId)
    {
        // Check if the project is favorited by the user
        return User::find($userId)->favoritable()->where('user_id', auth()->id())->first();
    }

    public function create($projectId, $userId)
    {
        // Add the project to user's favorites
        $project = Project::find($projectId);
        $project->favoritable()->create(['user_id' => $userId]);
    }

    public function createUser($favouriteUserId, $userId)
    {
        $user = User::find($favouriteUserId);
        $user->favoritable()->create(['user_id' => $userId]);
    }

    public function delete($projectId, $userId)
    {
        // Remove the project from user's favorites
        $project = Project::find($projectId);
        $project->favoritable()->where('user_id', $userId)->delete();
    }

    public function deleteUser($favouriteUserId, $userId)
    {
        $user = User::find($favouriteUserId);
        $user->favoritable()->where('user_id', $userId)->delete();
    }

    public function getFavorites($type, $userId)
    {
        return Favorite::query()->where('favoritable_type', $type)->where('user_id', $userId)->latest()->paginate(config('app.per_page'));
    }

    public function makeFavouriteProject($projectId)
    {
        $favourite = (new FavouriteService())->projectIsFavourite($projectId);

        if(!$favourite){
            (new FavouriteService())->create($projectId, auth()->id());
        }else{
            (new FavouriteService())->delete($projectId, auth()->id());
        }
    }

    public function makeFavouriteUser($userId)
    {
        $favourite = (new FavouriteService())->userIsFavourite($userId);

        if(!$favourite){
            (new FavouriteService())->createUser($userId, auth()->id());
        }else{
            (new FavouriteService())->deleteUser($userId, auth()->id());

        }
    }
}

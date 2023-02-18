<?php

namespace App\Repositories;

use App\Models\Follow;

class FollowRepository
{

    public function store($request){
        $follow = Follow::create($request->all());
    }

}

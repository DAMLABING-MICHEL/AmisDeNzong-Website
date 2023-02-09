<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\Back\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends ResourceController
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $request = app()->make(UserRequest::class);
        $request->merge([
            'valid' => $request->has('valid'),
        ]);
        User::findOrFail($id)->update($request->all());
        return back()->with('ok', __('The user has been successfully updated'));
    }
}

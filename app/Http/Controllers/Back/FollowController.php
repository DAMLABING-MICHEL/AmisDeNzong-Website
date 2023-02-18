<?php

namespace App\Http\Controllers\Back;

use App\DataTables\FollowsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Back\FollowRequest;
use App\Models\Follow;
use App\Repositories\FollowRepository;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FollowsDataTable $dataTable)
    {
        return $dataTable->render('back.shared.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.follows.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FollowRequest $request,FollowRepository $repository)
    {
        $repository->store($request);

        return back()->with('ok', __('The post has been successfully created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Follow  $follow
     * @return \Illuminate\Http\Response
     */
    public function show(Follow $follow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Follow  $follow
     * @return \Illuminate\Http\Response
     */
    public function edit(Follow $follow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Follow  $follow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Follow $follow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Follow  $follow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Follow $follow)
    {
        //
    }
}

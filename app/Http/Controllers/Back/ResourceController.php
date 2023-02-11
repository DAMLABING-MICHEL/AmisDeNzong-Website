<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class ResourceController extends Controller
{
    protected $dataTable;
    protected $view;
    protected $formRequest;
    protected $singular;
    protected $model;
    protected $repository;
    protected $values = [];

    public function __construct()
    {
        if (!app()->runningInConsole()) {
            $segment = getUrlSegment(request()->url(), 2); // categories ou newcategories
            if (substr($segment, 0, 3) === 'new') {
                $segment = substr($segment, 3);
            }

            $name = substr($segment, 0, -1); // categorie
            $this->singular = Str::singular($segment); // category

            $model = ucfirst($this->singular); // Category

            $this->model = 'App\Models\\' . $model;
            $this->dataTable = 'App\DataTables\\' . ucfirst($name) . 'sDataTable';
            $this->view = 'back.' . $name . 's.form';
            $this->formRequest = 'App\Http\Requests\Back\\' . $model . 'Request';
            $this->repository = 'App\Repositories\\' . $model . 'Repository';
        }
    }
    public function index()
    {
        return app()->make($this->dataTable)->render('back.shared.index');
    }

    public function create()
    {
        $repository = app()->make($this->repository);
        if (method_exists($repository, 'getRelationShipData')) {
            $this->values = $repository->getRelationShipData();
        }
        return view($this->view, $this->values);
    }

    public function store()
    {
        $request = app()->make($this->formRequest);
        $repository = app()->make($this->repository);
        if (method_exists($repository, 'addData')) {
            $repository->addData($request);
        }
        $element = app()->make($this->model)->create($request->all());
        if (method_exists($repository, 'saveImage')) {
            $repository->saveImage($element, $request);
        }
        return back()->with(['ok' => __('The ' . $this->singular . ' has been successfully created.')]);
    }

    public function edit($id)
    {
        $element = app()->make($this->model)->find($id);
        $repository = app()->make($this->repository);
        if (method_exists($repository, 'getRelationShipData')) {
            $this->values = $repository->getRelationShipData();
        }
        return view($this->view, [$this->singular => $element], $this->values);
    }

    public function update($id)
    {
        $request = app()->make($this->formRequest);
        $repository = app()->make($this->repository);
        if (method_exists($repository, 'addData')) {
            $repository->addData($request);
        }
        app()->make($this->model)->find($id)->update($request->all());
        if (method_exists($repository, 'updateImage')) {
            $repository->updateImage($request);
        }
        return back()->with(['ok' => __('The ' . $this->singular . ' has been successfully updated.')]);
    }

    public function destroy($id)
    {
        app()->make($this->model)->find($id)->delete();

        return response()->json();
    }
}

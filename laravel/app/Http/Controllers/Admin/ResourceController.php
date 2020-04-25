<?php

namespace App\Http\Controllers\Admin;

use App\Resource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResourceController extends Controller
{
    public function index() {
        $resources = Resource::query()->get();

        return view('admin.resource', ['resources' => $resources]);
    }


    public function create()
    {
        return view('admin.resource_create');

    }

    public function saveData(Request $request)
    {
        $resource = new Resource();

        $data = $this->validate($request, Resource::rules(),[], Resource::attributeNames());

        $resource->fill($data);


        $result = $resource->save();

        if($result)
        {
            return redirect()->route('admin.resource.index');
        } else {
            $request ->flash();
            return redirect()->route('admin.resource_create');
        }
    }

    public function destroy(resource $resource)
    {
        $resource->delete();
        return redirect()->route('admin.resource.index');
    }

}

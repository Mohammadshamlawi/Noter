<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemsRequest;
use App\Http\Requests\UpdateItemsRequest;

class HomeController extends Controller
{

    public function index($item = 'note')
    {
        list($model, $item) = validateItem($item);

        $items = $model::orderByDesc('created_at')->paginate();
        return view('index', compact('items', 'item'));
    }

    public function create($item = 'note')
    {
        list($model, $item) = validateItem($item);

        return view($item . 's.create');
    }

    public function store(StoreItemsRequest $request, $item = 'note')
    {
        list($model, $item) = validateItem($item);

        $result = $model::create($request->validated());
        return redirect(route('show', ['item' => $item, 'id' => $result->getKey()]));
    }

    public function show($item = 'note', $id = null)
    {
        list($model, $item, $with) = validateItem($item);

        $result = $model::with($with)->findOrFail(strval($id));
        return view($item . 's.show', [$item => $result]);
    }

    public function edit($item = 'note', $id = null)
    {
        list($model, $item, $with) = validateItem($item);

        $result = $model::with($with)->findOrFail(strval($id));
        return view($item . 's.edit', [$item => $result]);
    }

    public function update(UpdateItemsRequest $request, $item = 'note', $id = null)
    {
        list($model, $item) = validateItem($item);

        $model = $model::findOrFail(strval($id));
        $model->update($request->validated());

        return redirect(route('show', compact('item', 'id')));
    }

    public function destroy($item = 'note', $id = null)
    {
        list($model, $item) = validateItem($item);

        $model::findOrFail((string) $id)->delete();
        return redirect(route('index', compact('item')));
    }
}

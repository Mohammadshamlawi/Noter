<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemsRequest;
use App\Http\Requests\UpdateItemsRequest;
use App\Models\Collection;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidationException;

class HomeController extends Controller
{

    public function index($item = 'note'): Factory|View|Application
    {
        list($model, $item) = validateItem($item);

        $items = $model::orderByDesc('created_at')->paginate();
        return view('index', compact('items', 'item'));
    }

    public function create($item = 'note'): Factory|View|Application
    {
        list(, $item, , $parentModel) = validateItem($item);

        $titles = $parentModel !== null ? $parentModel::pluck('title', 'id') : [];
        return view($item . 's.create', compact('titles'));
    }

    /**
     * @throws ValidationException
     */
    public function store(StoreItemsRequest $request, $item = 'note'): Redirector|Application|RedirectResponse
    {
        list($model, $item) = validateItem($item);

        $result = $model::create($request->validated());
        return redirect(route('show', ['item' => $item, 'id' => $result->getKey()]));
    }

    public function show($item = 'note', $id = null): Factory|View|Application
    {
        list($model, $item, $with) = validateItem($item);

        $result = $model::with($with)->findOrFail(strval($id));
        return view($item . 's.show', [$item => $result]);
    }

    public function edit($item = 'note', $id = null): Factory|View|Application
    {
        list($model, $item, $with, $parentModel) = validateItem($item);

        $titles = $parentModel !== null ? $parentModel::pluck('title', 'id') : [];
        $result = $this->is_lockedQuery($model)->with($with)->findOrFail((string)$id);
        return view($item . 's.edit', [$item => $result, 'titles' => $titles]);
    }

    /**
     * @throws ValidationException
     */
    public function update(UpdateItemsRequest $request, $item = 'note', $id = null): Redirector|Application|RedirectResponse
    {
        list($model, $item) = validateItem($item);

        $model = $this->is_lockedQuery($model)->findOrFail((string)$id);
        $model->update($request->validated());

        return redirect(route('show', compact('item', 'id')));
    }

    public function destroy($item = 'note', $id = null): Redirector|Application|RedirectResponse
    {
        list($model, $item) = validateItem($item);

        $model::findOrFail((string)$id)->delete();
        return redirect(route('index', compact('item')));
    }


    private function is_lockedQuery(string $model): Builder
    {
        return $model === Collection::class ? $model::query() : $model::where('is_locked', "0");
    }
}

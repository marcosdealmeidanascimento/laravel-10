<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateSupport;

class SupportController extends Controller
{
    public function index(Support $support)
    {
        $supports = $support->all();

        return view('admin.supports.index', compact('supports'));
    }

    public function show(string|int $id, Support $support)
    {

        if (!$support = $support->find($id)) {
            return back();
        }

        return view('admin.supports.show', compact('support'));
    }

    public function edit(string|int $id, Support $support)
    {
        if (!$support = $support->find($id)) {
            return back();
        }

        return view('admin.supports.edit', compact('support'));
    }


    public function update(string|int $id, StoreUpdateSupport $request, Support $support)
    {
        if (!$support = $support->find($id)) {
            return back();
        }

        $support->update($request->validated());

        return redirect()->route('supports.index');
    }

    public function create()
    {
        return view('admin.supports.create');
    }

    public function store(StoreUpdateSupport $request, Support $support)
    {

        $data = $request->validated();
        $data['status'] = 'a';
        $support->create($data);
        return redirect()->route('supports.index');
    }

    public function destroy(string|int $id, Support $support)
    {
        if (!$support = $support->find($id)) {
            return back();
        }

        $support->delete();

        return redirect()->route('supports.index');

    }
}

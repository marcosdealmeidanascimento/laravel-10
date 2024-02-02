<?php

namespace App\Http\Controllers\Admin;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateSupport;
use App\Services\SupportService;

class SupportController extends Controller
{

    public function __construct(
        protected SupportService $service
    ) {
    }
    public function index(Request $request)
    {
        $supports = $this->service->getAll($request->filter);

        return view('admin.supports.index', compact('supports'));
    }

    public function show(string $id)
    {

        if (!$support = $this->service->findOne($id)) {
            return back();
        }

        return view('admin.supports.show', compact('support'));
    }

    public function edit(string $id)
    {
        if (!$support = $this->service->findOne($id)) {
            return back();
        }

        return view('admin.supports.edit', compact('support'));
    }


    public function update(string|int $id, StoreUpdateSupport $request)
    {
        $support = $this->service->update(
            UpdateSupportDTO::updateFromRequest($request)
        );

        if (!$support) {
            return back();
        }


        return redirect()->route('supports.index');
    }

    public function create()
    {
        return view('admin.supports.create');
    }

    public function store(StoreUpdateSupport $request)
    {

        $this->service->new(
            CreateSupportDTO::makeFromRequest($request)
        );

        return redirect()->route('supports.index');
    }

    public function destroy(string|int $id): void
    {
        $this->service->delete($id);
        redirect()->route('supports.index');
    }
}

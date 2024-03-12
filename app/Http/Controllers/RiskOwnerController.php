<?php

namespace App\Http\Controllers;

use App\Models\RiskOwner;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;

class RiskOwnerController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $riskOwners = RiskOwner::with('role')->get();
        return view('riskOwners.index', ['riskOwners' => $riskOwners]);
    }

    /**
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        $roles = Role::all();
        return view('riskOwners.create', ['roles' => $roles]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'role_id' => 'required|string|max:255',
        ]);

        $riskOwner = RiskOwner::create($validatedData);
        $riskOwnerName = $riskOwner->name;
        return redirect()->route('risk-owners.index')->with('success', "Risk Owner '$riskOwnerName'created successfully!");
    }

    /**
     * @param string $id
     * @return Application|Factory|View
     */
    public function show(string $id): View|Factory|Application
    {
        $riskOwner = RiskOwner::with('role')->find($id);
        $roles = Role::all();
        return view('riskOwners.show', ['riskOwner' => $riskOwner, 'roles' => $roles]);
    }

    /**
     * @param string $id
     * @return Application|Factory|View
     */
    public function edit(string $id): View|Factory|Application
    {
        $riskOwner = RiskOwner::with('role')->find($id);
        $roles = Role::all();
        return view('riskOwners.edit', ['riskOwner' => $riskOwner, 'roles' => $roles]);

    }

    /**
     * @param Request $request
     * @param string $id
     * @return RedirectResponse
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $riskOwner = RiskOwner::find($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'role_id' => 'required|string|max:255',
        ]);

        $riskOwner->update($validatedData);

        return redirect()->route('risk-owners.index')->with('success', 'Risk Owner updated successfully!');
    }

    /**
     * @param string $id
     * @return RedirectResponse
     */
    public function destroy(string $id): RedirectResponse
    {
        $riskOwner = RiskOwner::find($id);
        if (!$riskOwner) {
            return redirect()->route('risk-owners.index')->with('error', 'Risk owner not found.');
        }

        $riskOwnerName = $riskOwner->name; // Get the name before deleting the record
//        $riskOwner->delete();

        return redirect()->route('risk-owners.index')->with('success', "Risk owner '$riskOwnerName' has been deleted successfully.");
    }

}

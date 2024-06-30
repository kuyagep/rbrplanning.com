<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryOfFurnitureController extends Controller
{
    // Retrieve all inventory_of_furniture records
    public function index()
    {
        $inventory_of_furniture = InventoryOfFurniture::all();

        return response()->json($inventory_of_furniture);
    }

    // Create a new inventory_of_furniture record
    public function store(Request $request)
    {
        $data = $request->validate([
            'school_id' => 'required|exists:schools,id',
            'kinder_modular_table' => 'required|integer',
            'kinder_chair' => 'required|integer',
            'arm_chair' => 'required|integer',
            'school_desk' => 'required|integer',
            'other_classroom_table' => 'required|integer',
            'other_classroom_chair' => 'required|integer',
            'sets_of_tables_and_chairs' => 'required|integer',
        ]);

        $inventory_of_furniture = InventoryOfFurniture::create($data);

        notyf()->success('Inventory of School Furniture record created successfully.');

        return response()->json($inventory_of_furniture, 201);
    }

    // Retrieve a specific inventory_of_furniture record
    public function show($id)
    {
        $inventory_of_furniture = InventoryOfFurniture::findOrFail($id);

        return response()->json($inventory_of_furniture);
    }

    // Update an existing inventory_of_furniture record
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'school_id' => 'exists:schools,id',
            'kinder_modular_table' => 'integer',
            'kinder_chair' => 'integer',
            'arm_chair' => 'integer',
            'school_desk' => 'integer',
            'other_classroom_table' => 'integer',
            'other_classroom_chair' => 'integer',
            'sets_of_tables_and_chairs' => 'integer',
        ]);

        $inventory_of_furniture = InventoryOfFurniture::findOrFail($id);
        $inventory_of_furniture->update($data);

        notyf()->success('Inventory of School Furniture record updated successfully.');

        return response()->json($inventory_of_furniture, 200);
    }

    // Delete a specific inventory_of_furniture record
    public function destroy($id)
    {
        $inventory_of_furniture = InventoryOfFurniture::findOrFail($id);
        $inventory_of_furniture->delete();

        notyf()->success('Inventory of School Furniture record deleted successfully.');

        return response()->json(null, 204);
    }
}

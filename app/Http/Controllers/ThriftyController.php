<?php

namespace App\Http\Controllers;

use App\Models\Thrifty;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ThriftyController extends Controller
{
    public function index() {
        $thrifty = Thrifty::orderBy('id')->get();
        return Inertia::render('Thriftys', ['thrifties' => $thrifty]);
    }

    public function show($id) {
        $thrifty = Thrifty::findOrFail($id);
        return Inertia::render('View', ['thrifty' => $thrifty]);
    }
    

    public function create()
    {
        return Inertia::render("Create");
    }
    

    public function store(Request $request)
    {
        
        $request->validate([
            'brand_name' => 'required',
            'description' => 'required',    
            'price' => 'required',
        ]);
    
      
        Thrifty::create($request->all());
    
      
        return redirect('/thriftys')->with('success', 'Thrifty item created successfully!');
    }
   public function update(Request $request, $id)
{
    $thrifty = Thrifty::findOrFail($id);
    $thrifty->update($request->all());
    
    return redirect('/thriftys')->with('success', 'Thrifty item updated successfully!');
}
public function destroy($id)
{
    $thrifty = Thrifty::findOrFail($id);
    $thrifty->delete();
    
    return redirect('/thriftys')->with('message', 'Thrifty item deleted successfully');
}

}

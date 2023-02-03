<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AnimalController extends Controller
{

    public function index() {
        return view('Animals.index', [
            'Animals' => Animal::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    public function show(Animal $Animal) {
        return view('Animals.show', [
            'Animal' => $Animal
        ]);
    }

    public function create() {
        return view('Animals.create');
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'title' => 'required',
            'price' => ['required', Rule::unique('Animals', 'price')],
            'location' => 'required',
            'viber' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Animal::create($formFields);

        return redirect('/')->with('message', 'Animal created successfully!');
    }

    public function edit(Animal $Animal) {
        return view('Animals.edit', ['Animal' => $Animal]);
    }

    public function update(Request $request, Animal $Animal) {
        if($Animal->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        
        $formFields = $request->validate([
            'title' => 'required',
            'price' => ['required'],
            'location' => 'required',
            'viber' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $Animal->update($formFields);

        return back()->with('message', 'Animal updated successfully!');
    }

    public function destroy(Animal $Animal) {
        if($Animal->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        
        $Animal->delete();
        return redirect('/')->with('message', 'Animal deleted successfully');
    }

    public function manage() {
        return view('Animals.manage', ['Animals' => auth()->user()->Animals()->get()]);
    }
}

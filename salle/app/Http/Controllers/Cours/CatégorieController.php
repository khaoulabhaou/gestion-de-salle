<?php

namespace App\Http\Controllers\cours;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Livewire\Attributes\Validate;

class CatégorieController extends Controller
{
    public function index() {
        $categories = Category::withCount(['coaches'])->with('cours')->get();
        return view('categorie.categorie-list', compact('categories'));
    }

    public function indexCour(){
        $categories = Category::all();
        return view('classes', compact('categories'));
    }
public function show($id)
{
    $categorie = Category::with(['cours.coach'])->findOrFail($id);

    $search = strtolower(request('search'));

    $cours = $categorie->cours->filter(function ($item) use ($search, $categorie) {
        return !$search ||
            str_contains(strtolower($item->titre), $search) ||
            str_contains(strtolower($item->coach->nom_complet ?? ''), $search) ||
            str_contains(strtolower($categorie->nom), $search);
    });

    return view('categorie.categorie-details', compact('categorie', 'cours', 'search'));
}



    public function create(){
        return view('categorie.ajouter-categorie');
    }

    public function store(Request $request){
        $request -> validate([
            'nom' => 'required|string|max:255|unique:categories,nom',   
            'image' => 'nullable|mimes:jpg,png,gif,jpeg',
            'description' => 'nullable|string|max:650',
        ],[
            'nom.unique' => 'Ce titre de catégorie existe déjà',
            'description.max' => 'La description doit être inférieure ou égale à 650 caractères',
        ]);

        $categorie = new Category();
        $categorie->nom = $request->nom;
        $categorie->description = $request->description;


        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
            $categorie->image = $imagePath;
        }

        $categorie->save();

        return redirect()->route('categorie.categorie-list')->with('success', 'Catégorie ajoutée avec succès.');

    }

    public function edit($id){

        $categorie = Category::findOrFail($id);
        return view('categorie.categorie-list-modifier', compact('categorie'));
    }

    public function update(Request $request, $id){
        $categorie = Category::findOrFail($id);

        $request -> validate([
            'nom' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif',
            'description' => 'nullable|string|max:650',
        ],[
            'nom.unique' => 'Ce titre de catégorie existe déjà',
            'description.max' => 'La description doit être inférieure ou égale à 650 caractères',
        ]);

        $categorie->nom = $request->nom;
        $categorie->description = $request->description;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
            $categorie->image = $imagePath;
        }

        $categorie->save();

        return redirect()->route('categorie.categorie-list', $id)->with('success', 'Catégorie est modifier avec succes');
    }

    public function destroy($id){

        $categorie = Category::findOrFail($id);
        $categorie->delete();

        return redirect()->route('categorie.categorie-list')->with('success', 'Catégorie supprimé avec succès!');
    }
    
}
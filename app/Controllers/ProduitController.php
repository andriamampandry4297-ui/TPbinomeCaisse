<?php

namespace App\Controllers;

use App\Models\Produit;

class ProduitController extends BaseController
{
    protected $produit;

    public function __construct()
    {
        $this->produit = new Produit();
    }

    // Liste des produits
    public function index()
    {
        $data['produits'] = $this->produit->findAll();

        return view('produit/index', $data);
    }

    // Formulaire d'ajout
    public function create()
    {
        return view('produit/create');
    }

    // Enregistrement d'un produit
    public function store()
    {
        $this->produit->save([
            'Produit'        => $this->request->getPost('Produit'),
            'Prix_Unitaire' => $this->request->getPost('Prix_Unitaire'),
            'Quantite'       => $this->request->getPost('Quantite')
        ]);

        return redirect()->to('/produits');
    }

    // Formulaire de modification
    public function edit($id)
    {
        $data['produit'] = $this->produit->find($id);

        return view('produit/edit', $data);
    }

    // Mise à jour
    public function update($id)
    {
        $this->produit->update($id, [
            'Produit'        => $this->request->getPost('Produit'),
            'Prix_Unitaire' => $this->request->getPost('Prix_Unitaire'),
            'Quantite'       => $this->request->getPost('Quantite')
        ]);

        return redirect()->to('/produits');
    }

    // Suppression
    public function delete($id)
    {
        $this->produit->delete($id);

        return redirect()->to('/produits');
    }
}
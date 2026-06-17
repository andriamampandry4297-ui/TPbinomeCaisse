<?php

namespace App\Controllers;

use App\Models\CaisseModel;
use App\Models\Produit;

class AchatController extends BaseController
{
    protected $caisseModel;
    protected $produitModel;

    public function __construct()
    {
        $this->caisseModel = new CaisseModel();
        $this->produitModel = new Produit();
    }

    public function selectCaisse()
    {
        $data['caisses'] = $this->caisseModel->findAll();

        return view('achat/select_caisse', $data);
    }

    public function chooseCaisse()
    {
        $caisseId = $this->request->getPost('caisse_id');
        $caisse = $this->caisseModel->find($caisseId);

        if (empty($caisse)) {
            return redirect()->back()->with('error', 'Veuillez choisir une caisse valide.');
        }

        $this->session->set('caisse', [
            'id' => $caisse['id'],
            'numero_caisse' => $caisse['numero_caisse'],
        ]);

        if (! $this->session->has('panier')) {
            $this->session->set('panier', []);
        }

        return redirect()->to('/achats');
    }

    public function index()
    {
        $caisse = $this->session->get('caisse');

        if (empty($caisse)) {
            return redirect()->to('/caisse');
        }

        $products = $this->produitModel->findAll();
        $panier = $this->session->get('panier') ?? [];
        $cartItems = [];
        $total = 0;

        foreach ($panier as $item) {
            $produit = $this->produitModel->find($item['produit_id']);

            if (empty($produit)) {
                continue;
            }

            $montant = $produit['prix'] * $item['quantite'];
            $cartItems[] = [
                'designation' => $produit['designation'],
                'prix' => $produit['prix'],
                'quantite' => $item['quantite'],
                'montant' => $montant,
            ];
            $total += $montant;
        }

        $data = [
            'caisse' => $caisse,
            'produits' => $products,
            'cartItems' => $cartItems,
            'total' => $total,
        ];

        return view('achat/index', $data);
    }

    public function add()
    {
        $caisse = $this->session->get('caisse');

        if (empty($caisse)) {
            return redirect()->to('/caisse');
        }

        $produitId = $this->request->getPost('produit_id');
        $quantite = (int) $this->request->getPost('quantite');
        $produit = $this->produitModel->find($produitId);

        if (empty($produit) || $quantite <= 0) {
            return redirect()->to('/achats')->with('error', 'Veuillez sélectionner un produit et une quantité valides.');
        }

        if ($quantite > (int) $produit['quantite_stock']) {
            return redirect()->to('/achats')->with('error', 'La quantité demandée dépasse le stock disponible.');
        }

        $panier = $this->session->get('panier') ?? [];
        $found = false;

        foreach ($panier as &$item) {
            if ($item['produit_id'] === $produit['id']) {
                $item['quantite'] += $quantite;
                $found = true;
                break;
            }
        }

        if (! $found) {
            $panier[] = [
                'produit_id' => $produit['id'],
                'quantite' => $quantite,
            ];
        }

        $this->session->set('panier', $panier);

        return redirect()->to('/achats');
    }

    public function close()
    {
        $caisse = $this->session->get('caisse');

        if (empty($caisse)) {
            return redirect()->to('/caisse');
        }

        $this->session->remove('panier');

        return redirect()->to('/achats')->with('success', 'Achat clôturé, la liste est maintenant vide.');
    }

    public function reset()
    {
        $this->session->remove('panier');

        return redirect()->to('/achats');
    }
}

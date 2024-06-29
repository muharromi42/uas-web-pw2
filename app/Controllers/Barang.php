<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use CodeIgniter\HTTP\ResponseInterface;

class Barang extends BaseController
{
    public function index()
    {
        $barangs = new BarangModel();
        $data = $barangs->getBarang();
        return view('barang/index', compact('data'));
    }

    public function save()
    {
        $model = new BarangModel();

        $data = [
            'nama_barang' => $this->request->getPost('nama_barang'),
            'kategori' => $this->request->getPost('kategori'),
            'jumlah' => $this->request->getPost('jumlah'),
            'harga' => $this->request->getPost('harga'),
        ];

        if ($model->save($data)) {
            return redirect()->to('/barang');
        } else {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }
    }

    public function delete($id)
    {
        $model = new BarangModel();

        if ($model->deleteBarang($id)) {
            return redirect()->to('/barang')->with('message', 'Data berhasil dihapus');
        } else {
            return redirect()->to('/barang')->with('message', 'Data gagal dihapus');
        }
    }
}

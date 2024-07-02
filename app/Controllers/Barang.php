<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use CodeIgniter\HTTP\ResponseInterface;
use Dompdf\Dompdf;

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

    public function edit($id)
    {

        helper('form');

        $model = new BarangModel();
        $data['barang'] = $model->find($id);

        if (!$data['barang']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('barang with ID ' . $id . ' not found');
        }

        return view('barang/edit', $data);
    }

    public function update($id)
    {
        helper('form');

        $model = new BarangModel();

        $data = [
            'id' => $id,
            'nama_barang' => $this->request->getPost('nama_barang'),
            'kategori' => $this->request->getPost('kategori'),
            'jumlah' => $this->request->getPost('jumlah'),
            'harga' => $this->request->getPost('harga'),
        ];



        if ($model->updateBarang($id, $data)) {
            return redirect()->to('/barang')->with('message', 'Data berhasil diupdate');
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

    public function generatePDF()
    {
        $dompdf = new Dompdf();

        // Mendapatkan data dari model UsersModel
        $model = new BarangModel();
        $data['barangs'] = $model->getBarang();

        // Load view untuk dikonversi menjadi PDF
        $html = view('barang/cetak', $data);

        $dompdf->loadHtml($html);

        // Render PDF (optional settings)
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Mengirim output PDF ke browser
        $dompdf->stream('laporan_barang.pdf', ['Attachment' => false]);
    }
}

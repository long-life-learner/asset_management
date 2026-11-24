<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\MasterAsetModel;

class MasterAsetAPI extends ResourceController
{
    use ResponseTrait;

    /**
     * Kolom yang boleh diubah lewat API (primary key tidak termasuk).
     *
     * @var list<string>
     */
    protected array $editableFields = ['namabarang', 'merk', 'jenisbarang', 'tipebarang', 'jumlah', 'keterangan', 'jenis_aset'];

    // get all product
    public function index()
    {
        $model = new MasterAsetModel();
        $filter = $this->request->getGet(); // Get filter parameters from the request
        $filter['search'] = isset($filter['search']) ? $filter['search'] : '';

        // Perform a database query using $filter values to search multiple columns
        $data = $model->searchData($filter);

        return $this->response->setJSON($data);
    }

    // create a product
    public function create()
    {
        $model = new MasterAsetModel();
        $data  = $this->payload();

        $kode = strtoupper(trim((string) ($data['kodebarang'] ?? '')));

        if ($kode === '') {
            return $this->failValidationErrors('Kode aset wajib diisi.');
        }

        if (strlen($kode) > 9) {
            return $this->failValidationErrors('Kode aset maksimal 9 karakter.');
        }

        if ($model->find($kode) !== null) {
            return $this->failValidationErrors('Kode aset "' . $kode . '" sudah digunakan. Gunakan kode lain.');
        }

        $row = array_intersect_key($data, array_flip($this->editableFields));
        $row['kodebarang'] = $kode;

        try {
            // Primary key berupa string (bukan auto-increment), jadi gunakan
            // insert(..., false) agar hasilnya bool, bukan insertID().
            if (! $model->insert($row, false)) {
                $errors = $model->errors();

                return $this->fail($errors !== [] ? $errors : 'Gagal menyimpan data master aset.');
            }
        } catch (\Throwable $e) {
            return $this->failValidationErrors('Gagal menyimpan data: ' . $e->getMessage());
        }

        return $this->respondCreated($model->find($kode));
    }

    // update product
    public function update($id = null)
    {
        $model = new MasterAsetModel();
        $data  = $this->payload();

        $kode = ($id !== null && $id !== '') ? trim((string) $id) : trim((string) ($data['kodebarang'] ?? ''));

        if ($kode === '') {
            return $this->failValidationErrors('Kode aset tidak ditemukan pada permintaan.');
        }

        if ($model->find($kode) === null) {
            return $this->failNotFound('Data dengan kode ' . $kode . ' tidak ditemukan.');
        }

        // Primary key tidak boleh ikut diubah.
        $row = array_intersect_key($data, array_flip($this->editableFields));

        if ($row === []) {
            return $this->failValidationErrors('Tidak ada data yang dikirim untuk diperbarui.');
        }

        try {
            if (! $model->update($kode, $row)) {
                $errors = $model->errors();

                return $this->fail($errors !== [] ? $errors : 'Gagal memperbarui data master aset.');
            }
        } catch (\Throwable $e) {
            return $this->failValidationErrors('Gagal memperbarui data: ' . $e->getMessage());
        }

        return $this->respond([
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Data berhasil diperbarui',
            ],
            'data' => $model->find($kode),
        ]);
    }

    // delete product
    public function delete($id = null)
    {
        $model = new MasterAsetModel();
        $data  = $this->payload();
        $kode  = ($id !== null && $id !== '') ? trim((string) $id) : trim((string) ($data['kodebarang'] ?? ''));

        if ($kode === '') {
            return $this->failValidationErrors('Kode aset tidak ditemukan pada permintaan.');
        }

        if ($model->find($kode) === null) {
            return $this->failNotFound('Data dengan kode ' . $kode . ' tidak ditemukan.');
        }

        $model->delete($kode);

        return $this->respondDeleted([
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Data berhasil dihapus',
            ],
        ]);
    }

    /**
     * Ambil payload dari request. Mendukung form-urlencoded (PUT/POST)
     * maupun body JSON.
     *
     * @return array<string, mixed>
     */
    private function payload(): array
    {
        $data = $this->request->getRawInput();

        if (! is_array($data) || $data === []) {
            $json = $this->request->getJSON(true);
            if (is_array($json)) {
                $data = $json;
            }
        }

        if (! is_array($data)) {
            $data = [];
        }

        $post = $this->request->getPost();
        if (is_array($post) && $post !== []) {
            $data = array_merge($data, $post);
        }

        return $data;
    }
}

<?php


namespace App\Repositories;


use App\Exports\ClientExport;
use App\Models\Client;
use Maatwebsite\Excel\Facades\Excel;

class ClientRepository extends BaseRepository implements Interfaces\ClientRepositoryInterface
{
    public function __construct(Client $model)
    {
        parent::__construct($model);
    }

    public function addClient($data)
    {
        $client = $this->create($data);
        $this->storeImage($client->id, 'logo', 'clients', 'clients');
    }

    public function updateClient($data, $id)
    {
        $this->update($data, $id);
        $client = $this->find($id);
        $this->storeImage($client->id, 'logo', 'clients', 'clients');
    }

    public function storeImage($id, $file_name, $folder_name, $table)
    {
        uploadImage($id, $file_name, $folder_name, $table);
    }

    public function exportClientsDataAsExcel()
    {
        return Excel::download(new ClientExport, 'clients.xlsx');
    }
}

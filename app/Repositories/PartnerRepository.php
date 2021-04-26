<?php


namespace App\Repositories;

use App\Models\Partner;

use Illuminate\Database\Eloquent\Model;

class PartnerRepository extends BaseRepository implements Interfaces\PartnerRepositoryInterface
{
    public function __construct(Partner $model)
    {
        parent::__construct($model);
    }

    public function addPartner($data)
    {
        $partner = $this->create($data);
        $this->storeImage($partner->id, 'logo', 'partners', 'partners');
    }

    public function updatePartner($data, $id)
    {
        $this->update($data, $id);
        $partner = $this->find($id);
        $this->storeImage($partner->id, 'logo', 'partners', 'partners');
    }

    public function storeImage($id, $file_name, $folder_name, $table)
    {
        uploadImage($id, $file_name, $folder_name, $table);
    }
}

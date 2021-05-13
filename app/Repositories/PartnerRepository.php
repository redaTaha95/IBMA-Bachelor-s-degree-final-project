<?php


namespace App\Repositories;

use App\Exports\ProjectExport;
use App\Models\Partner;
use App\Exports\PartnerExport;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

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

    public function exportPartnersDataAsExcel()
    {
        return Excel::download(new PartnerExport, 'partners.xlsx');
    }

    public function getPartnersWithPaginate(){
        return Partner::paginate(3);
    }
}

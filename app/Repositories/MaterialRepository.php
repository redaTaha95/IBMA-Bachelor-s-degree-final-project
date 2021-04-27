<?php


namespace App\Repositories;



use App\Exports\MaterialExport;
use App\Models\Material;
use Maatwebsite\Excel\Facades\Excel;

class MaterialRepository extends BaseRepository implements Interfaces\MaterialRepositoryInterface
{
    public function __construct(Material $model)
    {
        parent::__construct($model);
    }

    public function exportMaterialsDataAsExcel()
    {
        return Excel::download(new MaterialExport, 'materials.xlsx');
    }

}

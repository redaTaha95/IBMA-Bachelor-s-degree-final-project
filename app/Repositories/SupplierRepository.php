<?php


namespace App\Repositories;


use App\Models\Supplier;

class SupplierRepository extends BaseRepository implements Interfaces\SupplierRepositoryInterface
{
    public function __construct(Supplier $model)
    {
        parent::__construct($model);
    }
}

<?php


namespace App\Repositories;


use App\Models\Client;
use App\Models\Project;
use App\Exports\ProjectExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Eloquent\Model;

class ProjectRepository extends BaseRepository implements Interfaces\ProjectRepositoryInterface
{
  public function __construct(Project $model)
  {
      parent::__construct($model);
  }

    public function addProject($data)
    {
        $project = $this->create($data);
        $this->storeImage($project->id, 'logo', 'projects', 'projects');
    }

    public function updateProject($data, $id)
    {
        $this->update($data, $id);
        $project = $this->find($id);
        $this->storeImage($project->id, 'logo', 'projects', 'projects');
    }

    public function storeImage($id, $file_name, $folder_name, $table)
    {
        uploadImage($id, $file_name, $folder_name, $table);
    }

    public function exportProjectsDataAsExcel()
    {
        return Excel::download(new ProjectExport, 'projects.xlsx');
    }

    public function getClients()
    {
        return Client::all();
    }
 }

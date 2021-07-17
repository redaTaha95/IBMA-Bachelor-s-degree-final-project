<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrainingRequest;
use App\Repositories\Interfaces\TrainingRepositoryInterface;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    private $trainingRepository;

    public function __construct(TrainingRepositoryInterface $trainingRepository)
    {
        $this->middleware('auth');
        $this->trainingRepository = $trainingRepository;
    }

}

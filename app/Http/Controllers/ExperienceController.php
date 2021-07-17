<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExperienceRequest;
use App\Repositories\Interfaces\ExperienceRepositoryInterface;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    private $experienceRepository;

    public function __construct(ExperienceRepositoryInterface $experienceRepository)
    {
        $this->middleware('auth');
        $this->experienceRepository = $experienceRepository;
    }


}

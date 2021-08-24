<?php

namespace App\Observers;

use App\Models\Response;
use App\Repositories\Interfaces\ResponseRepositoryInterface;

class ResponseObserver
{

    private $responseRepository;

    public function __construct(ResponseRepositoryInterface $responseRepository)
    {
        $this->responseRepository = $responseRepository;
    }

    /**
     * Handle the Response "created" event.
     *
     * @param  \App\Models\Response  $response
     * @return void
     */
    public function created(Response $response)
    {
        $this->responseRepository->updateEmailStatus($response->email_id);
    }

    /**
     * Handle the Response "updated" event.
     *
     * @param  \App\Models\Response  $response
     * @return void
     */
    public function updated(Response $response)
    {
        //
    }

    /**
     * Handle the Response "deleted" event.
     *
     * @param  \App\Models\Response  $response
     * @return void
     */
    public function deleted(Response $response)
    {
        //
    }

    /**
     * Handle the Response "restored" event.
     *
     * @param  \App\Models\Response  $response
     * @return void
     */
    public function restored(Response $response)
    {
        //
    }

    /**
     * Handle the Response "force deleted" event.
     *
     * @param  \App\Models\Response  $response
     * @return void
     */
    public function forceDeleted(Response $response)
    {
        //
    }
}

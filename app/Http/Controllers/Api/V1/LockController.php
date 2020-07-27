<?php

namespace App\Http\Controllers\Api\V1;

use App\Events\LockStatusUpdated;
use App\Http\Requests\LockUpdateRequest;
use App\Http\Resources\LockResource;
use App\Lock;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class LockController extends \App\Http\Controllers\Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new LockResource(Lock::all());
//        	data := map[string]string{"command": "open"}
//	pusherClient.Trigger("my-channel", "my-event", data)
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lock  $lock
     * @return \Illuminate\Http\Response
     */
    public function show(Lock $lock)
    {

        return new LockResource($lock);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lock  $lock
     * @return \Illuminate\Http\Response
     */
    public function edit(Lock $lock)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  LockUpdateRequest  $request
     * @param  \App\Lock  $lock
     * @return \Illuminate\Http\Response
     */
    public function update(LockUpdateRequest $request, Lock $lock)
    {

        $lock->update($request->all());

        return (new LockResource($lock))->response()->setStatusCode(Response::HTTP_ACCEPTED);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lock  $lock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lock $lock)
    {
        //
    }
}

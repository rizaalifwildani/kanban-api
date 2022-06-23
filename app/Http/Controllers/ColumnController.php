<?php

namespace App\Http\Controllers;

use App\Models\Column;
use Illuminate\Http\Request;
use App\Http\Resources\ColumnResource;
use App\Http\Requests\StoreColumnRequest;
use App\Http\Requests\UpdateColumnRequest;

class ColumnController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $columns = ColumnResource::collection(Column::all());

        return response()->json($columns, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreColumnRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $create = Column::create($request->all());

        if (!$create) {
          return response()->json([
            "message" => "Error",
            "status" => 422,
          ], 422);
        }

        return response()->json([
          "message" => "Success",
          "status" => 200,
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Column  $column
     * @return \Illuminate\Http\Response
     */
    public function show(Column $column)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Column  $column
     * @return \Illuminate\Http\Response
     */
    public function edit(Column $column)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateColumnRequest  $request
     * @param  \App\Models\Column  $column
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateColumnRequest $request, Column $column)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Column  $column
     * @return \Illuminate\Http\Response
     */
    public function destroy(Column $column)
    {
        //
    }
}

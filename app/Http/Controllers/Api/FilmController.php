<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\FilmRepository;
use App\Classes\ApiResponseClass;
use App\Http\Resources\FilmResource;
use Illuminate\Support\Facades\DB;

class FilmController extends Controller
{
    private FilmRepositoryInterface $FilmRepositoryInterfaces;

   private FilmRepository $filmRepositoryInterface;

   public function __construct(FilmRepository $filmRepositoryInterface)
   {
       $this->filmRepositoryInterfaces = $filmRepositoryInterface;
   }

    public function index()
    {
        $data = $this->filmRepositoryInterfaces->index();

        return ApiResponseClass::sendResponse(FilmResource::collection($data),'',200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $posterPath = $request->file('poster')->store('images');

        $details = [
            'title'     => $request->title,
            'sinopsis'  => $request->sinopsis,
            'poster'    => $posterPath,
            'year'      => $request->year,
            'genre_id'  => $request->genre_id,
        ];
        DB::beginTransaction();
        try{
            $film = $this->filmRepositoryInterfaces->store($details);
            DB::commit();
            return ApiResponseClass::sendResponse(new FilmResource($film), 'Film Create Successful', 200);
        } catch(\Exeption $ex) {
            return ApiResponseClass::rollback($ex);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $film = $this->filmRepositoryInterfaces->getById($id);

        $film['kritiks'] =$film->kritik()->get();
        $film['perans'] =$film->peran()->get();
        return ApiResponseClass::sendResponse(new FilmResource($film),'', 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $updateDetails = [
            'title'     => $request->title,
            'sinopsis'  => $request->sinopsis,
            'poster'    => 'storage/images/h6.jpg',
            'year'      => $request->year,
            'genre_id'  => $request->genre_id,
        ];

        DB::beginTransaction();
        try{
            $film = $this->filmRepositoryInterface->update($updateDetails, $id);
            DB::commit();
            return ApiResponseClass::sendResponse('Film Update Successful', 201);
        } catch(\Exeption $ex) {
            return ApiResponseClass::rollback($ex);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $this->filmRepositoryInterface->delete($id);
        return ApiResponseClass::sendResponse('Film Delete Successful', 204);
    }
}
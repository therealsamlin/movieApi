<?php

namespace App\Api\V1\Controllers;

use App\Actors;
use App\Genres;
use App\Movies;
use App\Http\Controllers\ApiController;
use App\Api\V1\Transformers\GenreTransformer;
use Illuminate\Support\Facades\Request;

/**
 * @Resource("Genres")
 */
class GenresController extends ApiController
{

    /**
     * @var \App\Api\V1\Transformers\GenreTransformer
     */
    protected $genreTransformer;

    /**
     * @param GenreTransformer $genreTransformer
     */
    public function __construct(GenreTransformer $genreTransformer)
    {

        $this->genreTransformer = $genreTransformer;

    }

    /**
     * @param null $id
     * @return mixed
     */
    public function index($id = null)
    {

        if (Request::is('*/movies/*')) {

            return $this->getMovieGenres($id);

        } else if (Request::is('*/actors/*')) {

            return $this->getActorGenres($id);
        }

    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {

        $genre = Genres::find($id);

        if ( ! $genre) {
            return $this->setStatusCode(404)->respondNotFound();
        }

        return $this->respond([
            'data'  => $this->genreTransformer->transform($genre)
        ]);

    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */
    public function store(\Illuminate\Http\Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name'  => 'required|max:255',

        ]);

        if ($validator->fails()) {

            return $this->respondBadRequest($validator->errors()->all());

        }

        $genre = new Genres;
        $genre = $genre->addGenre($request);


        return $this->respondCreated([
            'data'  => $genre->id
        ]);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getMovieGenres($id)
    {

        $movie = Movies::find($id);

        if ( ! $movie) {

            return $this->respondNotFound('Movie doesn\'t exist');

        }

        $genres = $id ? Movies::find($id)->genres : Genres::all();

        // if no genres found for movie then return 204
        if ( empty($genres->all())) {

            return $this->respondNoContent();

        }

        return $this->respond([
            'data'  => $this->genreTransformer->transformCollection($genres->all())
        ]);

    }

    /**
     * @param $id
     * @return mixed
     */
    public function getActorGenres($id)
    {

        $actor = Actors::find($id);

        if ( ! $actor) {

            return $this->respondNotFound('Actor doesn\'t exist');

        }

        $genres = $id ? Actors::find($id)->genres : Genres::all();

        // if no genres found for movie then return 204
        if ( empty($genres->all())) {

            return $this->respondNoContent();

        }

        return $this->respond([
            'data'  => $this->genreTransformer->transformCollection($genres->all())
        ]);
    }
}

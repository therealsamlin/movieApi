<?php

namespace App\Api\V1\Controllers;

use App\Actors;
use App\Movies;
use App\Http\Controllers\ApiController;
use App\Api\V1\Transformers\MovieTransformer;
use App\Api\V1\Transformers\MovieActorTransformer;
use Illuminate\Http\Request;
use App\Api\V1\Helpers\S3;

use App\Http\Requests;

/**
 * @Resource("Movies")
 */
class MoviesController extends ApiController
{

    /**
     * @var \App\Api\V1\Transformers\MovieTransformer
     */
    protected $movieTransformer;

    /**
     * @var MovieActorTransformer
     */
    protected $movieActorTransformer;


    /**
     *
     */
    public function __construct()
    {
        $this->movieTransformer = new MovieTransformer;
        $this->movieActorTransformer = new MovieActorTransformer;
    }


    /**
     * @param null $id
     * @return mixed
     */
    public function index($id = null)
    {

        $movie = Movies::find($id);

        if ( ! $movie ) {
            return $this->respondNotFound('Movie doesn\'t exist');
        }

        $actors = $id ? Movies::find($id)->actors : Actors::all();

        // if no genres found for movie then return 204
        if ( empty($actors->all()) ) {

            return $this->respondNoContent();

        }

        return $this->respond([
            'data'  => $this->movieActorTransformer->transformCollection($actors->all())
        ]);

    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {

        $movie = Movies::find($id);

        if ( ! $movie) {

            return $this->setStatusCode(404)->respondNotFound();

        }

        return $this->respond([
            'data'  => $this->movieTransformer->transform($movie)
        ]);

    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {

        $validator = \Validator::make($request->all(), [
            'name'  => 'required|max:255',
            'rating'    => 'digits_between:0,100',
            'image' => 'image',

        ]);

        if ($validator->fails()) {

            return $this->respondBadRequest($validator->errors()->all());

        }

        // upload image if provided
        if (isset($request->image)) {

            $image = $request->image;

            if (substr($image->getMimeType(), 0, 5) != 'image') {

                // not an image
                return $this->respondNotFound('The file must be an image (jpeg, png, bmp, gif, or svg)');

            }

            $s3 = new S3();
            $imageUrl = $s3->uploadImage($image);
            $request->image = $imageUrl;

        }

        $movie = new Movies;
        $movie = $movie->addMovie($request);


        return $this->respondCreated([
            'data'  => $movie->id
        ]);

    }
}

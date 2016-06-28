<?php

namespace App\Api\V1\Controllers;

use App\Actors;
use App\Api\V1\Helpers\S3;
use App\Http\Controllers\ApiController;
use App\Api\V1\Transformers\ActorTransformer;


use Illuminate\Http\Request;

/**
 * @Resource("Actors")
 */
class ActorsController extends ApiController
{

    /**
     * @var \App\Api\V1\Transformers\ActorTransformer
     */
    protected $actorTransformer;

    /**
     * MovieController constructor.
     * @param \App\Api\V1\Transformers\ActorTransformer $actorTransformer
     */
    public function __construct(ActorTransformer $actorTransformer)
    {

        $this->actorTransformer = $actorTransformer;

    }


    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {

        $actor = Actors::find($id);

        if ( ! $actor) {

            return $this->setStatusCode(404)->respondNotFound();

        }

        return $this->respond([

            'data'  => $this->actorTransformer->transform($actor)

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
            'birth_date'    => 'date',
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

        $actor = new Actors;
        $actor = $actor->addActor($request);


        return $this->respondCreated([
            'data'  => $actor->id
        ]);

    }
}

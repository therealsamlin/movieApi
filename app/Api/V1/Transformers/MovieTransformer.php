<?php
/**
 * Created by PhpStorm.
 * User: samlin
 * Date: 19/06/2016
 * Time: 10:19 PM
 */

namespace App\Api\V1\Transformers;


/**
 * Class MovieTransformer
 * @package App\Api\V1\Transformers
 */
class MovieTransformer extends Transformer
{
    /**
     * @param $movie
     * @return array
     */
    public function transform($movie)
    {
        return [
            'name'          => $movie['strName'],
            'rating'        => $movie['dcRating'],
            'description'   => $movie['strDescription'],
            'image'         => $movie['strImage'],
        ];
    }
}
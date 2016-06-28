<?php
/**
 * Created by PhpStorm.
 * User: samlin
 * Date: 19/06/2016
 * Time: 10:19 PM
 */

namespace App\Api\V1\Transformers;


/**
 * Class GenreTransformer
 * @package App\Api\V1\Transformers
 */
class GenreTransformer extends Transformer
{
    /**
     * @param $genre
     * @return array
     */
    public function transform($genre)
    {
        return [
            'name'          => $genre['strName'],
        ];
    }
}
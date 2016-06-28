<?php
/**
 * Created by PhpStorm.
 * User: samlin
 * Date: 19/06/2016
 * Time: 10:19 PM
 */

namespace App\Api\V1\Transformers;


/**
 * Class MovieActorTransformer
 * @package App\Api\V1\Transformers
 */
class MovieActorTransformer extends Transformer
{
    /**
     * @param $movieActor
     * @return array
     */
    public function transform($movieActor)
    {
        return [
            'id'          => (int) $movieActor['id'],
            'strCharacter'  => $movieActor['pivot']['strCharacter'],
        ];
    }
}
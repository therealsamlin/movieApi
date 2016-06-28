<?php
/**
 * Created by PhpStorm.
 * User: samlin
 * Date: 19/06/2016
 * Time: 10:19 PM
 */

namespace App\Api\V1\Transformers;


/**
 * Class ActorTransformer
 * @package App\Api\V1\Transformers
 */
class ActorTransformer extends Transformer
{
    /**
     * @param $actor
     * @return array
     */
    public function transform($actor)
    {
        return [
            'name'          => $actor['strName'],
            'birth_date'    => $actor['dtBirth'],
            'age'           => (int) $actor->getAge(),
            'bio'           => $actor['strBio'],
            'image'         => $actor['strImage'],
        ];
    }
}
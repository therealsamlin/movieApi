<?php
/**
 * Created by PhpStorm.
 * User: samlin
 * Date: 19/06/2016
 * Time: 8:13 PM
 */

namespace App\Api\V1\Transformers;


/**
 * Class Transformer
 * @package App\Api\V1\Transformers
 */
abstract class Transformer
{

    /**
     * @param $items
     * @return array
     */
    public function transformCollection($items)
    {
        return array_map([$this, 'transform'], $items);
    }

    /**
     * @param $item
     * @return mixed
     */
    public abstract function transform($item);


}
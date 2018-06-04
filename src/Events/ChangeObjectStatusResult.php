<?php

namespace Seatsio\Events;

use Seatsio\SeatsioJsonMapper;

class ChangeObjectStatusResult
{
    /**
     * @var array
     */
    var $labels;

    /**
     * @param $json
     * @return ChangeObjectStatusResult
     */
    static function fromJson($json)
    {
        $mapper = SeatsioJsonMapper::create();
        $result = $mapper->map($json, new ChangeObjectStatusResult());
        array_walk($result->labels, function ($labels, $id) use ($result) {
            $result->labels[$id] = (array)$labels;
        });
        return $result;
    }
}
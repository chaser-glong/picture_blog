<?php

namespace App\Graphs;

use Illuminate\Database\Eloquent\Model;
use Weiwenhao\StateMachine\Graph;

class TestGraph extends Graph
{
    protected $states = [
        'cart',
		'new',
        'cancelled',
        'fulfilled'
    ];

    protected $initState = 'cart';

    protected $graph = [
        'create' => [
            'from' => ['cart'],
            'to' => 'new',
        ],
        'cancel' => [
            'from' => ['new'],
            'to' => 'cancel',
        ],
        'fulfilled' => [
            'from' => ['new'],
            'to' => 'fulfilled'
        ]
    ];

    /**
     * @param $object
     * @return string
     */
    public function onCreate(Model $object)
    {
		return 'created';
    }
}

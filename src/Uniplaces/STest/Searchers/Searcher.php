<?php

namespace Uniplaces\STest\Searchers;

class Searcher
{
    /**
     * @var array
     */
    protected $filters;

    public function __construct()
    {
    	# code...
        $this->filters = array();
    }

	/**
     * @param Listing[] $listings
     * @param array     $search
     *
     * @return Listing[]
     */
    public function search(array $listings, array $search)
    {
    	# code...
    }
}
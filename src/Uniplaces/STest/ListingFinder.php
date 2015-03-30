<?php

namespace Uniplaces\STest;

use Uniplaces\STest\Listing\Listing;
use Uniplaces\STest\Requirement\StayTime;
use Uniplaces\STest\Requirement\TenantTypes;
use Uniplaces\STest\Searchers\Searcher;
use DateTime;

class ListingFinder implements ListingFinderInterface
{   
    /**
     * @var Searcher
     */
    protected $searcherObject;

    /**
     * @param string $searchType simple|advanced
     */
    public function __construct(Searcher $searcher)
    {
        $this->searcherObject = $searcher;
    }

    /**
     * @param Listing[] $listings
     * @param array     $search
     *
     * @return Listing[]
     */
    public function reduce(array $listings, array $search)
    {
        return $this->searcherObject->search($listings, $search);
    }
}

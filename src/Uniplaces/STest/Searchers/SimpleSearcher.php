<?php

namespace Uniplaces\STest\Searchers;

use Uniplaces\STest\Listing\Listing;
use Uniplaces\STest\Requirement\StayTime;
use Uniplaces\STest\Requirement\TenantTypes;
use Uniplaces\STest\Searchers\Searcher;
use Uniplaces\STest\Searchers\Filters\CityFilter;
use Uniplaces\STest\Searchers\Filters\AvailabilityFilter;
use Uniplaces\STest\Searchers\Filters\TenantFilter;
use DateTime;

/**
* 
*/
class SimpleSearcher extends Searcher
{
	
	public function __construct()
	{
		parent::__construct();

        $this->filters[] = new CityFilter();
        $this->filters[] = new AvailabilityFilter();
        $this->filters[] = new TenantFilter();
	}

	/**
     * @param Listing[] $listings
     * @param array     $search
     *
     * @return Listing[]
     */
    public function search(array $listings, array $search)
    {
        $matchListings = array();

        foreach ($listings as $listing) {
            foreach ($this->filters as $filter){
                if($filter->matches($listing, $search)) {
                    continue 2;
                }
            }

            $matchListings[] = $listing;
        }

        return $matchListings;
    }
}
<?php

namespace Uniplaces\STest\Searchers\Filters;
use Uniplaces\STest\Listing\Listing;

class CityFilter extends Filter
{
	public function __construct()
	{
        parent::__construct();
	}

	/**
     * @param Listing[] $listings
     * @param array     $search
     *
     * @return boolean
     */
    public function matches(Listing $listing, array $search)
    {
        $result = false;

        if ($listing->getLocalization()->getCity() != $search[CommonConstants::CITY]) {
            $result = true;
        }
        
    	return $result;
    }
}
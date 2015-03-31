<?php

namespace Uniplaces\STest\Searchers\Filters;
use Uniplaces\STest\Listing\Listing;

class PriceFilter extends Filter
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

        if (isset($search['price'])) {
            $listingPrice = $listing->getPrice();
            $min = isset($search['price']['min']) ? $search['price']['min'] : null;
            $max = isset($search['price']['max']) ? $search['price']['max'] : null;

            if (($min !== null && $min > $listingPrice) || ($max !== null && $max < $listingPrice)) {
                $result = true;
            }
        }

        return $result;
    }
}
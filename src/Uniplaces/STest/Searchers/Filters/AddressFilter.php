<?php

namespace Uniplaces\STest\Searchers\Filters;
use Uniplaces\STest\Listing\Listing;

class AddressFilter extends Filter
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

        if (isset($search['address'])) {
            $listingAddress = strtolower(trim($listing->getLocalization()->getAddress()));
            $address = strtolower(trim($search['address']));

            if (levenshtein($listingAddress, $address) > 5) {
                $result = true;
            }
        }

    	return $result;
    }
}
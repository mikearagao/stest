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

        if (isset($search[CommonConstants::PRICE])) {
            $listingPrice = $listing->getPrice();
            $min = isset($search[CommonConstants::PRICE][CommonConstants::MIN]) ? $search[CommonConstants::PRICE][CommonConstants::MIN] : null;
            $max = isset($search[CommonConstants::PRICE][CommonConstants::MAX]) ? $search[CommonConstants::PRICE][CommonConstants::MAX] : null;

            if (($min !== null && $min > $listingPrice) || ($max !== null && $max < $listingPrice)) {
                $result = true;
            }
        }

        return $result;
    }
}
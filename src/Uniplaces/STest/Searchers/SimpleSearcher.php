<?php

namespace Uniplaces\STest\Searchers;

use Uniplaces\STest\Listing\Listing;
use Uniplaces\STest\Requirement\StayTime;
use Uniplaces\STest\Requirement\TenantTypes;
use Uniplaces\STest\Searchers\Searcher;
use DateTime;

/**
* 
*/
class SimpleSearcher extends Searcher
{
	
	public function __construct()
	{
		parent::__construct();
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
            if ($listing->getLocalization()->getCity() != $search['city']) {
                continue;
            }

            $stayTime = $listing->getRequirements()->getStayTime();
            if (isset($search['start_date']) && $stayTime instanceof StayTime) {
                /** @var DateTime $startDate */
                $startDate = $search['start_date'];
                /** @var DateTime $endDate */
                $endDate = $search['end_date'];

                $interval = $endDate->diff($startDate);
                $days = (int)$interval->format('%a');

                if ($days < $stayTime->getMin() || $days > $stayTime->getMax()) {
                    continue;
                }
            }


            $tenantTypes = $listing->getRequirements()->getTenantTypes();
            if ($tenantTypes instanceof TenantTypes && !in_array($search['occupation'], $tenantTypes->toArray())) {
                continue;
            }

            $matchListings[] = $listing;
        }

        return $matchListings;
    }
}
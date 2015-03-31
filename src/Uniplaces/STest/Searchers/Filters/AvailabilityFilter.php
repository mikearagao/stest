<?php

namespace Uniplaces\STest\Searchers\Filters;
use Uniplaces\STest\Listing\Listing;
use Uniplaces\STest\Requirement\StayTime;

class AvailabilityFilter extends Filter
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

        $stayTime = $listing->getRequirements()->getStayTime();
        if (isset($search['start_date']) && $stayTime instanceof StayTime) {
            /** @var DateTime $startDate */
            $startDate = $search['start_date'];
            /** @var DateTime $endDate */
            $endDate = $search['end_date'];

            $interval = $endDate->diff($startDate);
            $days = (int)$interval->format('%a');

            if ($days < $stayTime->getMin() || $days > $stayTime->getMax()) {
                $result = true;
            }
        }

        return $result;
    }
}
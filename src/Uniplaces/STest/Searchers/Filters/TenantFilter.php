<?php

namespace Uniplaces\STest\Searchers\Filters;
use Uniplaces\STest\Listing\Listing;
use Uniplaces\STest\Requirement\TenantTypes;

class TenantFilter extends Filter
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

        $tenantTypes = $listing->getRequirements()->getTenantTypes();
        if ($tenantTypes instanceof TenantTypes && !in_array($search[CommonConstants::OCCUPATION], $tenantTypes->toArray())) {
            $result = true;
        }

    	return $result;
    }
}
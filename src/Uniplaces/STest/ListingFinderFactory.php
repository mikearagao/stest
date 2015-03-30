<?php

namespace Uniplaces\STest;
use Uniplaces\STest\Searchers\SimpleSearcher;
use Uniplaces\STest\Searchers\AdvancedSearcher;

/**
 * ListingFinderFactory
 */
abstract class ListingFinderFactory
{
    /**
     * @return ListingFinderInterface
     */
    public static function createSimple()
    {
        return new ListingFinder(new SimpleSearcher());
    }

    /**
     * @return ListingFinderInterface
     */
    public static function createAdvanced()
    {
        return new ListingFinder(new AdvancedSearcher());
    }
}

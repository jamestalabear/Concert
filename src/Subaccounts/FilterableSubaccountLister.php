<?php

namespace Seatsio\Subaccounts;

class FilterableSubaccountLister
{

    protected $pageFetcher;

    public function __construct($pageFetcher)
    {
        $this->pageFetcher = $pageFetcher;
    }

    /**
     * @param $queryParams SubaccountListParams[]
     * @return SubaccountPagedIterator
     */
    public function all($queryParams)
    {
        return new SubaccountPagedIterator($this->pageFetcher, $queryParams);
    }

    /**
     * @param $pageSize int
     * @param $queryParams SubaccountListParams[]
     * @return SubaccountPage
     */
    public function firstPage($queryParams, $pageSize = null)
    {
        return $this->pageFetcher->fetchAfter(null, $queryParams, $pageSize);
    }

    /**
     * @param $afterId int
     * @param $pageSize int
     * @param $queryParams SubaccountListParams[]
     * @return SubaccountPage
     */
    public function pageAfter($afterId, $queryParams, $pageSize = null)
    {
        return $this->pageFetcher->fetchAfter($afterId, $queryParams, $pageSize);
    }

    /**
     * @param $beforeId int
     * @param $pageSize int
     * @param $queryParams SubaccountListParams[]
     * @return SubaccountPage
     */
    public function pageBefore($beforeId, $queryParams, $pageSize = null)
    {
        return $this->pageFetcher->fetchBefore($beforeId, $queryParams, $pageSize);
    }
}

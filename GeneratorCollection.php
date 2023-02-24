<?php
/**
 * @package BelVG
 * @author    artsem.belvg@gmail.com
 * @copyraight Copyright © 2015 - 2020
 */
declare(strict_types=1);

namespace BelVG\GeneratorCollection;

use Magento\Framework\Data\Collection;

class GeneratorCollection implements \IteratorAggregate
{
    /**
     * @var Collection
     */
    private $collection;
    /**
     * @var int
     */
    private $batchSize;

    /**
     * GeneratorCollection constructor.
     * @param Collection $collection
     * @param int $batchSize
     */
    public function __construct(Collection $collection, $batchSize = 100)
    {

        $this->collection = $collection;
        $this->batchSize = $batchSize;
    }

    public function getIterator() :\Traversable
    {
        $this->collection->setPageSize($this->batchSize);
        $lastPage = $this->collection->getLastPageNumber();
        $pageNumber = 0;
        do {
            $this->collection->clear();
            $this->collection->setCurPage($pageNumber);
            foreach ($this->collection->getItems() as $key => $value) {
                yield $key => $value;
            }
            $pageNumber++;
        } while ($pageNumber <= $lastPage);
    }
}
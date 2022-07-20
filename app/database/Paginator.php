<?php

namespace app\database;

use Doctrine\ORM\EntityRepository;

/**
 * @author Tomasz Jura <jura.tomasz@gmail.com>
 */
class Paginator
{
    protected int $pagePerMax = 5;
    protected int $maxElements;
    protected int $lastPage = 0;
    protected array $orderBy = ['id' => 'desc'];

    public function __construct(protected EntityRepository $entityRepository, protected int $currentPage = 0)
    {
        $this->maxElements = $this->entityRepository->count(criteria: []);
        if ($this->maxElements) {
            $this->lastPage = ceil(num: $this->maxElements / $this->pagePerMax) - 1;
        }
    }

    public function getElements(): array
    {
        return $this->entityRepository->findBy(
            criteria: [],
            orderBy: $this->orderBy,
            limit: $this->pagePerMax,
            offset: $this->getOffset()
        );
    }

    protected function getOffset(): int
    {
        return $this->currentPage * $this->pagePerMax;
    }

    /**
     * @return array|string[]
     */
    public function getOrderBy(): array
    {
        return $this->orderBy;
    }

    /**
     * @param array|string[] $orderBy
     */
    public function setOrderBy(array $orderBy): void
    {
        $this->orderBy = $orderBy;
    }

    public function getMaxElements(): int
    {
        return $this->maxElements;
    }

    public function getCurrentPage(): int
    {
        return $this->currentPage;
    }

    public function getPreviousPage(): ?int
    {
        if ($this->currentPage) {
            return $this->currentPage - 1;
        }

        return null;
    }

    public function getNextPage(): ?int
    {
        if ($this->currentPage >= $this->lastPage) {
            return null;
        }

        return $this->currentPage + 1;
    }

}

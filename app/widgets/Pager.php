<?php

namespace app\widgets;

use app\database\Paginator;
use app\prototypes\WidgetPrototype;
/**
 * @author Tomasz Jura <jura.tomasz@gmail.com>
 */
class Pager extends WidgetPrototype
{

    public function __construct(protected Paginator $paginator)
    {
    }

    public function render(): void
    {
        echo $this->buildLink(label: 'Prev', page: $this->paginator->getPreviousPage());
        echo $this->buildLink(label: $this->paginator->getCurrentPage(), page: null);
        echo $this->buildLink(label: 'Next', page: $this->paginator->getNextPage());
    }

    private function buildLink(string $label, ?int $page): string
    {
        $tag = 'a';
        if (null === $page) {
            $tag = 'span';
        }
        return '<' . $tag . ' href="' . ($page !== null ? '?page=' . $page : '#') . '">' . $label . '</' . $tag . '> ';
    }

}

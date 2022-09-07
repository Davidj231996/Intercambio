<?php

namespace App\Objeto\Application\ObjetoIndexFinder;

use App\Objeto\Domain\ObjetoRepository;

class ObjetoIndexFinder
{
    public function __construct(private ObjetoRepository $repository)
    {
    }

    public function __invoke() {
        return $this->repository->searchRecent();
    }
}
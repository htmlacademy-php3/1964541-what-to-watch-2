<?php

namespace Wtw\Interface;

interface MovieRepositoryInterface
{
    public function get(string $imdbId): array;
}
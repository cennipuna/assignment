<?php

namespace App\Transformers;


interface DarkskyInterface
{
    public function allAttributes($response);
    public function onlyImportant($response);
}
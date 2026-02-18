<?php

namespace App\Contract;



interface IdentifiableInterface
{
    public function getId();
    public function setId(int $id);
}

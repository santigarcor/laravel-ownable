<?php

namespace Ownable\Contracts;

interface Ownable
{
    /**
     * Check if the current model is owned by the given owner object.
     *
     * @param mixed $owner
     * @return boolean
     */
    public function isOwnedBy($owner): bool;
}

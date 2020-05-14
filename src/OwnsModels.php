<?php

namespace Ownable;

use Ownable\Contracts\Ownable;

trait OwnsModels
{
    /**
     * Check if the model owns the given model/object.
     *
     * @param mixed $model
     * @param string|null $foreignKey
     * @param bool $overrideContract If true the Ownable contract is implemented it won't be used.
     * @return bool
     */
    public function owns($model, $foreignKey = null, $overrideContract = false)
    {
        if ($model instanceof Ownable && !$overrideContract) {
            return $model->isOwnedBy($this);
        }

        $foreignKeyName = $foreignKey ?: $this->getForeignKey();

        return $model->{$foreignKeyName} == $this->getKey();
    }

    /**
     * Check if the model doesn't owns the given model/object.
     *
     * @param mixed $model
     * @param string $foreignKey
     * @param bool $overrideContract If true the Ownable contract is implemented it won't be used.
     * @return bool
     */
    public function doesntOwns($model, $foreignKey = null, $overrideContract = false)
    {
        return !$this->owns($model, $foreignKey);
    }
}

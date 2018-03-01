<?php

/**
 * This file is part of the contentful-management.php package.
 *
 * @copyright 2015-2017 Contentful GmbH
 * @license   MIT
 */
declare(strict_types=1);

namespace Contentful\Management\Resource\Behavior;

use Contentful\Core\Resource\ResourceInterface;

/**
 * Creatable interface.
 *
 * Represents a resource which can be created.
 */
interface Creatable extends ResourceInterface
{
    /**
     * Returns the resource in the form of request body.
     * This can differ from regular serialization, as some fields
     * may not be present in the request payload.
     *
     * @return mixed
     */
    public function asRequestBody();
}

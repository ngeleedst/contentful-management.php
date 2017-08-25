<?php

/**
 * This file is part of the contentful-management.php package.
 *
 * @copyright 2015-2017 Contentful GmbH
 * @license   MIT
 */

namespace Contentful\Management\Resource\ContentType\Field;

/**
 * IntegerField class.
 */
class IntegerField extends BaseField
{
    /**
     * @return string
     */
    public function getType(): string
    {
        return 'Integer';
    }
}
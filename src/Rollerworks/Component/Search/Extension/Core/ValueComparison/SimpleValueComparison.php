<?php

/*
 * This file is part of the Rollerworks Search Component package.
 *
 * (c) Sebastiaan Stok <s.stok@rollerscapes.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Rollerworks\Component\Search\Extension\Core\ValueComparison;

use Rollerworks\Component\Search\ValueComparisonInterface;

/**
 * Default ValueComparison implementation, only able to compare equality.
 *
 * @author Sebastiaan Stok <s.stok@rollerscapes.net>
 */
class SimpleValueComparison implements ValueComparisonInterface
{
    /**
     * {@inheritDoc}
     */
    public function isHigher($value, $nextValue, array $options)
    {
        return false;
    }

    /**
     * {@inheritDoc}
     */
    public function isLower($value, $nextValue, $options)
    {
        return false;
    }

    /**
     * {@inheritDoc}
     */
    public function isEqual($value, $nextValue, $options)
    {
        // This does not work for objects, so it should have its comparison class
        return $value === $nextValue;
    }
}

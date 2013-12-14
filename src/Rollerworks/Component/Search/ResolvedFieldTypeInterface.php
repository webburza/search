<?php

/*
 * This file is part of the Rollerworks Search Component package.
 *
 * (c) Sebastiaan Stok <s.stok@rollerscapes.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Rollerworks\Component\Search;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * A wrapper for a field type and its extensions.
 */
interface ResolvedFieldTypeInterface
{
    /**
     * Returns the name of the type.
     *
     * @return string The type name.
     */
    public function getName();

    /**
     * Returns the parent type.
     *
     * @return ResolvedFieldTypeInterface|null The parent type or null.
     */
    public function getParent();

    /**
     * Returns the wrapped field type.
     *
     * @return FieldTypeInterface The wrapped field type.
     */
    public function getInnerType();

    /**
     * Returns the extensions of the wrapped field type.
     *
     * @return FieldTypeExtensionInterface[] An array of {@link FieldTypeExtensionInterface} instances.
     */
    public function getTypeExtensions();

    /**
     * Returns a new FieldConfigInterface instance.
     *
     * @param string $name
     * @param array  $options
     *
     * @return FieldConfigInterface
     */
    public function createField($name, array $options = array());

    /**
     * This configures the {@link FieldConfigInterface}.
     *
     * This method is called for each type in the hierarchy starting from the
     * top most type. Type extensions can further modify the field.
     *
     * @param FieldConfigInterface $config
     * @param array                $options
     */
    public function buildType(FieldConfigInterface $config, array $options);

    /**
     * Creates a new SearchFieldView for a field of this type.
     *
     * @param FieldConfigInterface $config
     *
     * @return SearchFieldView
     */
    public function createFieldView(FieldConfigInterface $config);

    /**
     * Configures a SearchFieldView for the type hierarchy.
     *
     * @param SearchFieldView      $view
     * @param FieldConfigInterface $config
     * @param array                $options
     */
    public function buildFieldView(SearchFieldView $view, FieldConfigInterface $config, array $options);

    /**
     * Returns the configured options resolver used for this type.
     *
     * @return OptionsResolverInterface The options resolver.
     */
    public function getOptionsResolver();
}
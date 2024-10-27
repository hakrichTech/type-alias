<?php

namespace PHPShots\Common;

/**
 * Interface TypeAliasInterface
 *
 * Defines the methods required for managing type-based aliases.
 * Implementing classes should provide concrete functionality
 * for alias registration, retrieval, and management.
 *
 * ## Methods
 * - `isAlias(string $name): bool`
 * - `removeAbstractAlias(string $searched): void`
 * - `getAlias(string $abstract): string`
 * - `alias(string $abstract, string $alias): void`
 * - `aliasReverse(string $alias, string $abstract): void`
 * - `getAllAliases(string $abstract): array`
 * - `hasAbstract(string $abstract): bool`
 * - `clearAliases(): void`
 * - `getAliasMap(): array`
 *
 * ## Author Information
 * - **Author**: Hakeem Shamavu
 * - **Email**: shamavurasheed@gmail.com
 *
 * @version 0.1.1
 */
interface TypeAliasInterface
{
    /**
     * Check if a given name is registered as an alias.
     *
     * @param  string  $name  The alias to check.
     * @return bool           True if it is an alias, false otherwise.
     * @version 0.1.1
     */
    public function isAlias(string $name): bool;

    /**
     * Remove an alias from the cache.
     *
     * @param  string  $searched  The alias to remove.
     * @return void
     * @version 0.1.1
     */
    public function removeAbstractAlias(string $searched): void;

    /**
     * Get the ultimate abstract type for a given alias.
     *
     * @param  string  $abstract  The starting abstract or alias name.
     * @return string             The resolved abstract type.
     * 
     * @version 0.1.1
     */
    public function getAlias(string $abstract): string;

    /**
     * Register an alias for an abstract type.
     *
     * @param  string  $abstract  The original type name.
     * @param  string  $alias     The alias to register for the type.
     * @return void
     *
     * @version 0.1.1
     */
    public function alias(string $abstract, string $alias): void;

    /**
     * Register an alias for an abstract type (reversed parameter order).
     *
     * @param  string  $alias     The alias name.
     * @param  string  $abstract  The original type to alias.
     * @return void
     *
     * @version 0.1.1
     */
    public function aliasReverse(string $alias, string $abstract): void;

    /**
     * Get all aliases associated with a given abstract type.
     *
     * @param  string  $abstract  The abstract type name.
     * @return array              An array of aliases, or an empty array if none.
     * @version 0.1.1
     */
    public function getAllAliases(string $abstract): array;

    /**
     * Check if an abstract type has any registered aliases.
     *
     * @param  string  $abstract  The abstract type name.
     * @return bool               True if the type has aliases, false otherwise.
     * @version 0.1.1
     */
    public function hasAbstract(string $abstract): bool;

    /**
     * Clear all aliases.
     *
     * @return void
     * @version 0.1.1
     */
    public function clearAliases(): void;

    /**
     * Get the entire map of aliases and their associated abstract types.
     *
     * @return array  A direct map of aliases to abstract types.
     * @version 0.1.1
     */
    public function getAliasMap(): array;
}

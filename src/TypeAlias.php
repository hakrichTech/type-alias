<?php

namespace PHPShots\Common;

use LogicException;

/**
 * Class TypeAliasManager
 *
 * Manages type-based aliases within an application, providing features
 * such as alias registration, retrieval, and removal, with safeguards
 * for circular references and self-aliasing. This class is useful for
 * applications that require a flexible way to reference and manage types
 * through aliases.
 *
 * ## Usage Example
 * ```php
 * $aliasManager = new TypeAliasManager();
 * $aliasManager->alias('SomeType', 'SomeAlias');
 * $resolved = $aliasManager->getAlias('SomeAlias'); // Returns 'SomeType'
 * ```
 *
 * ## Dependencies
 * This class does not have any external dependencies.
 *
 * ## Changelog
 * - **0.1.1**: Added methods for alias management and improved documentation.
 *
 * ## Error Handling
 * - Throws `LogicException` if an alias is self-referential or if a circular reference is detected.
 *
 * ## Future Improvements
 * - Possible enhancements include additional validation methods or batch alias registration.
 *
 * ## License
 * This class is released under the MIT License. See the LICENSE file for more details.
 *
 * ## Author Information
 * - **Author**: Hakeem Shamavu
 * - **Email**: shamavurasheed@gmail.com
 *
 * ## Community Contributions
 * Contributions are welcome! Please open an issue or submit a pull request for any suggestions or improvements.
 *
 * @version 0.1.1
 * @author Hakeem Shamavu
 */
class TypeAlias implements TypeAliasInterface
{
    /**
     * The registered type aliases, mapping each alias to its abstract type.
     *
     * @var string[]
     * @version 0.1.1
     */
    protected $aliases = [];

    /**
     * The registered aliases grouped by the abstract type they represent.
     *
     * @var array[]
     * @version 0.1.1
     */
    protected $abstractAliases = [];

    /**
     * Check if a given name is registered as an alias.
     *
     * @param  string  $name  The alias to check.
     * @return bool           True if it is an alias, false otherwise.
     * @version 0.1.1
     */
    public function isAlias(string $name): bool
    {
        return isset($this->aliases[$name]);
    }

    /**
     * Remove an alias from the cache, updating both the main alias list
     * and the abstract alias group.
     *
     * @param  string  $searched  The alias to remove.
     * @return void
     * @version 0.1.1
     */
    public function removeAbstractAlias(string $searched): void
    {
        if (!isset($this->aliases[$searched])) {
            return;
        }

        // Remove the alias from the abstractAliases array
        foreach ($this->abstractAliases as $abstract => $aliases) {
            foreach ($aliases as $index => $alias) {
                if ($alias === $searched) {
                    unset($this->abstractAliases[$abstract][$index]);
                }
            }
        }

        // Remove the alias from the main aliases array
        unset($this->aliases[$searched]);
    }

    /**
     * Get the ultimate abstract type for a given alias.
     * Resolves chains of aliases while preventing circular references.
     *
     * @param  string  $abstract  The starting abstract or alias name.
     * @return string             The resolved abstract type.
     * 
     * @throws LogicException     If a circular reference is detected.
     * @version 0.1.1
     */
    public function getAlias(string $abstract): string
    {
        if (!isset($this->aliases[$abstract])) {
            return $abstract;
        }

        // Track visited aliases to detect circular references
        $visited = [];
        while (isset($this->aliases[$abstract])) {
            if (in_array($abstract, $visited)) {
                throw new LogicException("Circular alias reference detected for [$abstract].");
            }

            $visited[] = $abstract;
            $abstract = $this->aliases[$abstract];
        }

        return $abstract;
    }

    /**
     * Register an alias for an abstract type.
     *
     * @param  string  $abstract  The original type name.
     * @param  string  $alias     The alias to register for the type.
     * @return void
     *
     * @throws LogicException     If an alias is self-referential.
     * @version 0.1.1
     */
    public function alias(string $abstract, string $alias): void
    {
        if ($alias === $abstract) {
            throw new LogicException("[{$abstract}] is aliased to itself.");
        }

        $this->aliases[$alias] = $abstract;
        $this->abstractAliases[$abstract][] = $alias;
    }

    /**
     * Register an alias for an abstract type (reversed parameter order).
     *
     * @param  string  $alias     The alias name.
     * @param  string  $abstract  The original type to alias.
     * @return void
     *
     * @throws LogicException     If an alias is self-referential.
     * @version 0.1.1
     */
    public function aliasReverse(string $alias, string $abstract): void
    {
        $this->alias($abstract, $alias);
    }

    /**
     * Get all aliases associated with a given abstract type.
     *
     * @param  string  $abstract  The abstract type name.
     * @return array              An array of aliases, or an empty array if none.
     * @version 0.1.1
     */
    public function getAllAliases(string $abstract): array
    {
        return $this->abstractAliases[$abstract] ?? [];
    }

    /**
     * Check if an abstract type has any registered aliases.
     *
     * @param  string  $abstract  The abstract type name.
     * @return bool               True if the type has aliases, false otherwise.
     * @version 0.1.1
     */
    public function hasAbstract(string $abstract): bool
    {
        return !empty($this->abstractAliases[$abstract]);
    }

    /**
     * Clear all aliases, removing all records in both aliases and abstractAliases arrays.
     *
     * @return void
     * @version 0.1.1
     */
    public function clearAliases(): void
    {
        $this->aliases = [];
        $this->abstractAliases = [];
    }

    /**
     * Get the entire map of aliases and their associated abstract types.
     *
     * @return array  A direct map of aliases to abstract types.
     * @version 0.1.1
     */
    public function getAliasMap(): array
    {
        return $this->aliases;
    }
}

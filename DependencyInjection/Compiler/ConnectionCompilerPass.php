<?php

namespace Toiine\Bundle\CouchbaseBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Create dynamically the couchbase.connection.<connectionName> services using the configuration.
 */
class ConnectionCompilerPass extends CompilerPass implements CompilerPassInterface
{
    /**
     * Get the connections services definitions from the configuration.
     *
     * @param  array $connectionsConfigurations : all the connections parameters
     *
     * @return array of Definiton
     */
    public function getDefinitions($configurations)
    {
        $definitions = array();

        foreach ($configurations as $name => $params) {
            // Build serviceId
            $id = $this->generateConnectionServiceId($name);

            // Build arguments
            $args = array(
                new Reference($this->generateCouchbaseServiceId($name))
            );

            // Build definition
            $definition = new Definition('Toiine\Bundle\CouchbaseBundle\Connexion\Connexion', $args);

            // Append definitions array
            $definitions[$id] = $definition;
        }

        return $definitions;
    }
}
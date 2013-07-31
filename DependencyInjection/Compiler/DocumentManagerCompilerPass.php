<?php

namespace Toiine\Bundle\CouchbaseBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Create dynamically the couchbase.document_manager.<connectionName> services using the configuration.
 */
class DocumentManagerCompilerPass extends CompilerPass implements CompilerPassInterface
{
    /**
     * Get the DocumentManager services definitions from the configuration.
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
            $id = $this->generateDocumentManagerServiceId($name);

            // Build arguments
            $args = array(
                new Reference($this->generateConnectionServiceId($name)),
            );

            // Build definition
            $definition = new Definition('Toiine\Bundle\CouchbaseBundle\Manager\DocumentManager', $args);

            // Append definitions array
            $definitions[$id] = $definition;
        }

        return $definitions;
    }
}
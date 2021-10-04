<?php

namespace ECIF_Vendor\BernskioldMedia\WP\PluginBase\Commands;

use ECIF_Vendor\Symfony\Component\Console\Input\InputInterface;
use ECIF_Vendor\Symfony\Component\Console\Input\InputOption;
use function ECIF_Vendor\Symfony\Component\String\u;
class FacetCommand extends MakeCommand
{
    protected static $basePath = '/src/Facets/';
    protected static $defaultName = 'make:facet';
    protected static $stubName = 'facet';
    protected function configure()
    {
        parent::configure();
        $this->addOption('namespace', 's', InputOption::VALUE_OPTIONAL, 'The root plugin namespace.', 'NAMESPACE');
    }
    protected function getReplacements(InputInterface $input) : array
    {
        $name = $input->getArgument('name');
        return ['{{ namespace }}' => $input->getOption('namespace') . '\\Customizer', '{{ class }}' => u($name)->camel()->title()->toString()];
    }
}

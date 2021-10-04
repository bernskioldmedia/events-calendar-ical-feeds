<?php

namespace ECIF_Vendor\BernskioldMedia\WP\PluginBase\Commands;

use ECIF_Vendor\Symfony\Component\Console\Input\InputInterface;
use ECIF_Vendor\Symfony\Component\Console\Input\InputOption;
use function ECIF_Vendor\Symfony\Component\String\u;
class CustomizerCommand extends MakeCommand
{
    protected static $basePath = '/src/Customizer/';
    protected static $defaultName = 'make:customizer';
    protected static $stubName = 'customizer';
    protected function configure()
    {
        parent::configure();
        $this->addOption('namespace', 's', InputOption::VALUE_OPTIONAL, 'The root plugin namespace.', 'NAMESPACE')->addOption('prefix', null, InputOption::VALUE_OPTIONAL, 'The settings prefix.', '');
    }
    protected function getReplacements(InputInterface $input) : array
    {
        $name = $input->getArgument('name');
        return ['{{ namespace }}' => $input->getOption('namespace') . '\\Customizer', '{{ class }}' => u($name)->camel()->title()->toString(), '{{ prefix }}' => u($input->getOption('prefix'))->snake()->toString()];
    }
}

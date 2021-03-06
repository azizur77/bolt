<?php

namespace Bolt\Composer\Action;

/**
 * Composer autoloader creation class
 *
 * @author Gawain Lynch <gawain.lynch@gmail.com>
 */
final class DumpAutoload
{
    /**
     * @var array
     */
    private $options;

    /**
     * @var Composer\IO\IOInterface
     */
    private $io;

    /**
     * @var Composer\Composer
     */
    private $composer;

    /**
     * @param $io       Composer\IO\IOInterface
     * @param $composer Composer\Composer
     * @param $options  array
     */
    public function __construct(\Composer\IO\IOInterface $io, \Composer\Composer $composer, array $options)
    {
        $this->options = $options;
        $this->io = $io;
        $this->composer = $composer;
    }

    /**
     * Dump autoloaders
     */
    public function execute()
    {
        $installationManager = $this->composer->getInstallationManager();
        $localRepo = $this->composer->getRepositoryManager()->getLocalRepository();
        $package = $this->composer->getPackage();
        $config = $this->composer->getConfig();

        if ($this->options['optimizeautoloader']) {
            // Generating optimized autoload files
        } else {
            // Generating autoload files
        }

        $generator = $this->composer->getAutoloadGenerator();
        $generator->setDevMode(!$this->options['nodev']);
        $generator->dump($config, $localRepo, $package, $installationManager, 'composer', $this->options['optimizeautoloader']);
    }
}

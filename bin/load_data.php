<?php

/*
 * This file is part of the SSCM package.
 *
 * (c) Efrain Bonilla <efrainbonilla.dev@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

if (!is_file('composer.json')) {
    throw new \RuntimeException('This script must be started from the project root folder');
}

$rootDir = __DIR__ . '/..';

require_once __DIR__ . '/../var/bootstrap.php.cache';

use Symfony\Component\Console\Output\OutputInterface;

// reset data
$fs = new \Symfony\Component\Filesystem\Filesystem;
$output = new \Symfony\Component\Console\Output\ConsoleOutput();

if (!is_file(__DIR__.'/../app/config/parameters.yml')) {
    $output->writeln('<error>no default apps/config/parameters.yml file</error>');

    exit(1);
}

/**
 * @param $commands
 * @param \Symfony\Component\Console\Output\ConsoleOutput $output
 *
 * @return boolean
 */
function execute_commands($commands, $output)
{
    foreach ($commands as $command) {
        $output->writeln(sprintf('<info>Executing : </info> %s', $command));
        $p = new \Symfony\Component\Process\Process($command);
        $p->setTimeout(null);
        $p->run(function ($type, $data) use ($output) {
            $output->write($data, false, OutputInterface::OUTPUT_RAW);
        });

        if (!$p->isSuccessful()) {
            return false;
        }

        $output->writeln("");
    }

    return true;
}

// find out the default php runtime
$bin = 'php';

if (defined('PHP_BINARY')) {
    $bin = PHP_BINARY;
}

$output->writeln("<info>Resetting demo</info>");

/*$fs->remove(sprintf('%s/web/uploads/media', $rootDir));
$fs->mkdir(sprintf('%s/web/uploads/media', $rootDir));*/

/*$fs->copy(__DIR__.'/../src/Sonata/Bundle/DemoBundle/DataFixtures/data/robots.txt', __DIR__.'/../web/app/robots.txt', true);*/

$success = execute_commands(array(
    'rm -rf ./var/cache/*',

    $bin . ' ./bin/console cache:warmup --env=dev --no-debug',
    $bin . ' ./bin/console cache:create-cache-class --env=dev --no-debug',
    /*$bin . ' ./bin/console doctrine:database:drop --force',*/
    $bin . ' ./bin/console doctrine:database:create',
    /*$bin . ' ./bin/console doctrine:schema:update --force',*/
    $bin . ' ./bin/console assets:install --symlink web'
), $output);

if (!$success) {
    $output->writeln('<info>An error occurs when running a command!</info>');

    exit(1);
}

$output->writeln('<info>Done!</info>');

exit(0);

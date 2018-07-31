<?php
namespace WIPCMS\core\console\commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestCommand extends Command
{
    protected function configure()
    {
        $this
            // the name of the command (the part after "bin/console")
            ->setName('test:command')

            // the short description shown while running "php bin/console list"
            ->setDescription('Test command, just prints stuff.')

            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp('This command allows you to test if the cli is working out so far!')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('TEST!');
    }
}
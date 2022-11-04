<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;


#[AsCommand(
    name: 'getJobsWithoutAlpaga',
    description: 'Add a short description for your command',
)]
class GetJobsWithoutAlpagaCommand extends Command
{
    protected function configure(): void
    {
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        /* write algo here */
        $offers = ['offre1','offre2','offre3'];

        foreach ($offers as $value) {
            $io->success($value);
        }

        return Command::SUCCESS;
    }
}
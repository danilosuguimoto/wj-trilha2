<?php
/**
 * @author Danilo Eidy Ramazzotti Suguimoto
 */

declare(strict_types=1);

namespace Webjump\HelloWorld\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Magento\Framework\Console\Cli;

/**
 * Class MyFirstCustomCommand
 */
class MyFirstCustomCommand extends Command
{
    const OPTION = 'option';

    /**
     * @inheritDoc
     */
    protected function configure()
    {
        $this->setName('my:first:command');
        $this->setDescription('This is Danilo Suguimoto\'s console command.');
        $this->addOption(
            self::OPTION,
            'o',
            InputOption::VALUE_REQUIRED,
            'Option'
        );

        parent::configure();
    }

    /**
     * @inheritDoc
     */
    protected function execute(InputInterface $input, OutputInterface $output): ?int
    {
        if ($option = $input->getOption(self::OPTION)) {
            $output->writeln(
                '<info>Danilo\'s command was sucessfully executed! The given option is </info>' .
                '<info>' . $option . '</info>'
            );
            return Cli::RETURN_SUCCESS;
        }

        $output->writeln('<error>Argument \'option\' is missing!</error>');

        return Cli::RETURN_FAILURE;
    }
}

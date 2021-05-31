<?php
namespace AppBundle\Command;

use Pimcore;
use Pimcore\Console\AbstractCommand;
use Pimcore\Console\Dumper;
use Pimcore\Model\Asset\MetaData\ClassDefinition\Data\Asset;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\ImportData;
use Pimcore\Model\DataObject\Log;
use Pimcore\Model\DataObject\ClassDefinition\Data\Numeric;


class importClassificationstoreCommand extends AbstractCommand
{
    protected function configure()
    {
        $this
            ->setName('Pimcore:Command:Product')
            ->setDescription('imports classification store');
           
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     * @throws \Exception
     */

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $definition = new \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric();
        $definition->setName("new3");
$definition->setTitle("new3");

$keyConfig = new \Pimcore\Model\DataObject\Classificationstore\KeyConfig();
$keyConfig->setName("nkey3");
$keyConfig->setDescription("description");
$keyConfig->setEnabled(true);
$keyConfig->setType($definition->getFieldtype());
$keyConfig->setDefinition(json_encode($definition)); // The definition is used in object editor to render fields
$keyConfig->save();  
  
// Group
$groupConfig = new \Pimcore\Model\DataObject\Classificationstore\GroupConfig();
$groupConfig->setName("ngroup3");
$groupConfig->setDescription("description");
$groupConfig->save();
  
// Collection
$collectionConfig = new \Pimcore\Model\DataObject\Classificationstore\CollectionConfig();
$collectionConfig->setName("ncollection3");
$collectionConfig->setDescription("description");
$collectionConfig->save();
 dump("imported");
    }
}
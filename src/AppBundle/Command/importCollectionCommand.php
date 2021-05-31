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
use Pimcore\Model\DataObject\Fieldcollection\Data;
use Pimcore\Model\DataObject\Fieldcollection\Data\Collectiontest;

class importCollectionCommand extends AbstractCommand
{
    protected function configure()
    {
        $this
            ->setName('Pimcore:Command:Collection')
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

$object = new DataObject\Products();

       
                  
$object->setKey("prod9");
$object->setParentId(2);
$object->setPublished(true);




$items = new DataObject\Fieldcollection();


    $item = new DataObject\Fieldcollection\Data\Newcollection();
    $item->setQuantity(2);
    $items->add($item);

$object->setMyCollection($items);
$object->save();
 
dump(" success");
    }
}
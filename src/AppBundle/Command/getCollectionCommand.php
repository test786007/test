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

class getCollectionCommand extends AbstractCommand
{
    protected function configure()
    {
        $this
            ->setName('Pimcore:Command:GetCollection')
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

   
        
        //Products listing
        $products = new Pimcore\Model\DataObject\Products\Listing();
        // $item = new DataObject\Fieldcollection\Data\Newcollection();
        // $item->setQuantity();
// get all values as associative array [groupId][keyid][language] => value
// $items = new DataObject\Fieldcollection();
// $item = new DataObject\Fieldcollection\Data\Newcollection();
// $products = parent::getMycollection();
        foreach ($products as $key => $prod) {
            $data[] = array(
            "name" => $prod->getName(),

            "all" => $prod->getMycollection(),
           

	
		
			
            );
   
	 
		
	

	// return $data;
}
dump($data);
    }
}
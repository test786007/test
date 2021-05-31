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


class getProductCommand extends AbstractCommand
{
    protected function configure()
    {
        $this
            ->setName('Pimcore:Command:GetProducts')
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
        
// get all values as associative array [groupId][keyid][language] => value

        foreach ($products as $key => $prod) {
            $data[] = array(
               
                "gtin" => $prod->getGtin(),        
                "Sku" => $prod->getSku(),
                "Name" => $prod->getName(),
                "description" => $prod->getDescription(),
                "quantity" => $prod->getQuantity(),
                "subscription" => $prod->getName(),

                "storevalue" =>  $prod->getStore()->getLocalizedKeyValue(6, 8),
                "height" =>  $prod->getStore()->getLocalizedKeyValue(1, 1),
                "weight" =>  $prod->getStore()->getLocalizedKeyValue(1, 2),

            );
        }

       dump($data);
    
   }


    }

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
use Pimcore\Model\DataObject\ClassDefinition\Data\Input;


class importCommand extends AbstractCommand
{
    protected function configure()
    {
        $this
            ->setName('Pimcore:Command:Products')
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

        $object = new Pimcore\Model\DataObject\Products();
       
                  
        $object->setKey("product4");
        $object->setParentId(2);
        $object->setPublished(true);

   // ...................................................saving attributes

        $object->setGtin("10000000000004");        
        $object->setSku("sku3");    
        $object->setName("rahul");  
        $object->setDescription("description");    
        $object->setQuantity("2");  
        $object->setSubscription("SUB4"); 

    //...................................................saving image

        $image = \Pimcore\Model\Asset\Image::getByPath('/assets/gor.jpg');
        $object->setImage($image);

    // ....................................................saving classification store

       
        
        $object->getStore()->setLocalizedKeyValue(1, 1, "1");
        $object->getStore()->setLocalizedKeyValue(1, 2, "2");
        // p_r($object->getStore(6, 8, $heightValue)); die;
        // 1 = group id
        $object->getStore()->setActiveGroups([1 => true]);
          
        // provide additional information about which collection the group belongs to
        // group 1 belongs to collection with ID 2
        $object->getStore()->setGroupCollectionMapping(1, 1);
          
    //.....................................................saving field collection
     
        $items = new DataObject\Fieldcollection();


        $item = new DataObject\Fieldcollection\Data\Newcollection();
        $item->setQuantity(2);
        $items->add($item);

        $object->setMyCollection($items);
            

        $object->save();
        $this->dump('Product imported');


    }
}
<?php 

namespace App\Model\DataObject; 

class Fieldcollection extends \Pimcore\Model\DataObject\Fieldcollection {


public function getFieldCollection() {
    // p_r("newwww") ; die;
	$data = parent::getMycollection();

	if (\Pimcore\Model\DataObject::doGetInheritedValues() && $this->getClass()->getFieldDefinition("mycollection")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("mycollection");
		} catch (\Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException $e) {
			// no data from parent available, continue ... 
            throw new \Pimcore\Model\Element\ValidationException("Price too high");
		}
	}

	return $data;
}
}
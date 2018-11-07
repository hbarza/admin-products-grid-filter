<?php
/**
 * CODNITIVE
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE_EULA.html.
 * It is also available through the world-wide-web at this URL:
 * http://www.codnitive.com/en/terms-of-service-softwares/
 * http://www.codnitive.com/fa/terms-of-service-softwares/
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade to newer
 * versions in the future.
 *
 * @category   Codnitive
 * @package    Codnitive_Productfilter
 * @author     Hassan Barza <support@codnitive.com>
 * @copyright  Copyright (c) 2012 CODNITIVE Co. (http://www.codnitive.com)
 * @license    http://www.codnitive.com/en/terms-of-service-softwares/ End User License Agreement (EULA 1.0)
 */

class Codnitive_Productfilter_Model_System_Config_Source_Attributes
{
	public function toOptionArray()
	{
		$ignoreAttributes = array('sku', 'name', 'attribute_set_id', 'type_id', 'qty', 'price', 'status', 'visibility');

		$collection = Mage::getResourceModel('catalog/product_attribute_collection')
			->addVisibleFilter();

		$result = array();
		foreach ($collection as $model) {
			if(in_array($model->getAttributeCode(), $ignoreAttributes)) {
				continue;
			}

			$result[] = array(
				'value' => $model->getAttributeCode(),
				'label' => $model->getFrontendLabel()
			);
		}

	   return $result;

	}
}

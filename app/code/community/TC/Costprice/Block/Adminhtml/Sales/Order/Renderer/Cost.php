<?php
/**
 * @author     TwinCreations Team <jason@twincreations.co.uk>
 * @copyright  Copyright (c) 2013 TwinCreations <http://twincreations.co.uk/>
 */

class TC_Costprice_Block_Adminhtml_Sales_Order_Renderer_Cost extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
        $orderId = $row->getData($this->getColumn()->getIndex());
        
        if(!empty($orderId)) {
            // get order
            $salesModel = Mage::getModel('sales/order')->load($orderId);
            // get is cancel status
            $canceled = $salesModel->isCanceled();
            // get all items
            $items = $salesModel->getAllItems();
            // set group cost price to empty
            $groupBaseCost = array();
            
            // iterate through products
            if (!empty($items)) {
                foreach ($items as $itemId => $item) {
                    $purchaseQty = intval($item->getQtyOrdered());

                    if (empty($purchaseQty)) {
                        $purchaseQty = 1;
                    }

                    $baseCost = $item->getBaseCost();
                    $groupBaseCost[] = ($baseCost * $purchaseQty);
                }
            }
            
            // get items total cost for this order
            if (!empty($groupBaseCost)) {
                $totalOrderCost = array_sum($groupBaseCost);
            }
            
            // if order is canceled - we have no cost
            if (!empty($canceled)) {
                $totalOrderCost = 0;
            }
            
            // convert it to our currency
            $profitAmount = $salesModel->formatPrice($totalOrderCost);
            return $profitAmount;
        }
    }
}

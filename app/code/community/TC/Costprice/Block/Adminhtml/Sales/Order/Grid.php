<?php
/**
 * @author     TwinCreations Team <jason@twincreations.co.uk>
 * @copyright  Copyright (c) 2013 TwinCreations <http://twincreations.co.uk/>
 */

class TC_Costprice_Block_Adminhtml_Sales_Order_Grid extends Mage_Adminhtml_Block_Sales_Order_Grid
{
    protected function _prepareColumns()
    {
        $this->addColumnAfter('cost', array(
            'header' => Mage::helper('tc_promolist')->__('Cost Price'),
            'type' => 'currency',
            'index' => 'entity_id',
            'currency' => 'order_currency_code',
            'renderer' => new TC_Costprice_Block_Adminhtml_Sales_Order_Renderer_Cost(),
            'filter' => false,
            'sortable' => false,
        ), 'grand_total');
        return parent::_prepareColumns();
    }

    protected function _profitFilter($collection, $column)
    {
        return $this;
    }
}

TC Costprice
============

Adds a cost price column to Magento's sales order grid. Tested for Magento CE 1.7.0.2.

Installation
============

1. Copy folder contents into Magento (on OSX, I recommend the ditto terminal command).
2. Flush cache at Admin > System > Cache Management.
3. Logout and login again.
4. Module is available for use. Click Admin > Sales > Orders. Noew 'Cost Price' column visible.

Notes
=====

This module relies on the cost price product attribute. By default, this is not enabled in Magento.

To enable this attribute, navigate to Admin > Catalog > Attributes > Manage Attributes. The attribute is called 'cost'.

Because an order is captured as a point in time, cost price will not be available for old orders. Only orders which contained a cost price per item at the time of creation will contain a cost price column, otherwise, it will be 0.00.

Cost prices will need to be defined for all products in the database. Cost prices are calculated and displayed in the order currency.

<?php
// assuming that your script file is located in magmi/integration/datapump/myscript.php,
// include "magmi_defs.php" , once done, you will be able to use any magmi includes without specific path.
require_once("../../inc/magmi_defs.php");
//Datapump include
require_once("../inc/magmi_datapump.php");

// create a Product import Datapump using Magmi_DatapumpFactory
$dp=Magmi_DataPumpFactory::getDataPumpInstance("productimport");


// Begin import session with a profile & running mode, here profile is "default" & running mode is "create".
// Available modes: "create" creates and updates items, "update" updates only, "xcreate creates only.
// Important: for values other than "default" profile has to be an existing magmi profile
$dp->beginImportSession("default","create");

$newProductData = array(
    'type'          => 'simple',
    'sku'           => "A001-2",
    'qty'           => 1000,
    'color'         => 'Blue',
    'price'         => 10,
    'name'          => 'A001-2',
    'tax_class_id'  => 1,
    'is_in_stock'   => 1,
    'store'         => 'admin'
);
$dp->ingest($newProductData);

$newProductData = array(
    'type'          => 'simple',
    'sku'           => "A001-1",
    'qty'           => 1000,
    'color'         => 'Indigo',
    'price'         => 10,
    'name'          => 'A001-1',
    'tax_class_id'  => 1,
    'is_in_stock'   => 1,
    'store'         => 'admin'
);
$dp->ingest($newProductData);

$newProductData = array(
    'type'          => 'configurable',
    'sku'           => "A001",
    'qty'           => 1000,
    'price'         => 10,
    'simples_skus'  => 'A001-2,A001-1',
    'configurable_attributes' => 'color',
    'name'          => 'TREAD JEANS',
    'tax_class_id'  => 1,
    'is_in_stock'   => 1,
    'store'         => 'admin'
);
$dp->ingest($newProductData);

// End import Session
$dp->endImportSession();

?>

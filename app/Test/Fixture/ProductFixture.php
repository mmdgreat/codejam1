<?php
/**
 * ProductFixture
 *
 */
class ProductFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'product_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 211, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'product_price' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => 11),
		'product_image' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 211, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'comments' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 211, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'product_name' => 'Lorem ipsum dolor sit amet',
			'product_price' => 1,
			'product_image' => 'Lorem ipsum dolor sit amet',
			'comments' => 'Lorem ipsum dolor sit amet'
		),
	);

}

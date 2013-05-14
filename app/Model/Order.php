<?php
App::uses('AppModel', 'Model');
App::uses('Product', 'Model');
/**
 * Order Model
 *
 * @property User $User
 * @property CartItem $CartItem
 */
class Order extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'created_on' => array(
			'date' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'CartItem' => array(
			'className' => 'CartItem',
			'foreignKey' => 'order_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
    
    public function save_order($data){
        $this->Product = new Product();
        $products = $this->Product->find('all',array('conditions'=>array('Product.id'=>$data['Order']['products'])));
        $order_sum = 0;
        foreach($products as $product){
            $order_sum += $product['Product']['product_price'];
        }
        $data['Order']['order_total'] = $order_sum;
        if($this->saveAll($data)){
            $cart = array();
            $order_id = $this->id;
            foreach($data['Order']['products'] as $key=>$value){
                $cart[$key]['product_id'] = $value;
                $cart[$key]['order_id'] = $order_id;
            }
            $this->CartItem->saveAll($cart);
            return true;
        }
        else{
            return false;
        }
        
    }

}

<?php
App::uses('AppController', 'Controller');
/**
 * Orders Controller
 *
 * @property Order $Order
 */
class OrdersController extends AppController {

/**
 * index method
 *
 * @return void
 */
	//public function index() {
	//	$this->Order->recursive = 0;
	//	$this->set('orders', $this->paginate());
	//}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	//public function view($id = null) {
	//	$this->Order->id = $id;
	//	if (!$this->Order->exists()) {
	//		throw new NotFoundException(__('Invalid order'));
	//	}
	//	$this->set('order', $this->Order->read(null, $id));
	//}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Order->create();
			if ($this->Order->save_order($this->request->data)) {
				$this->Session->setFlash(__('The order has been saved'));
				$this->redirect(array('action' => 'add'));
			} else {
				$this->Session->setFlash(__('The order could not be saved. Please, try again.'));
			}
		}
		$users = $this->Order->User->find('list',array('fields'=>array('id','username')));
        $this->loadModel('Product');
        $products = $this->Product->find('list',array('fields'=>array('id','product_sku')));
		$this->set(compact('users', 'products'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	//public function edit($id = null) {
	//	$this->Order->id = $id;
	//	if (!$this->Order->exists()) {
	//		throw new NotFoundException(__('Invalid order'));
	//	}
	//	if ($this->request->is('post') || $this->request->is('put')) {
	//		if ($this->Order->save($this->request->data)) {
	//			$this->Session->setFlash(__('The order has been saved'));
	//			$this->redirect(array('action' => 'index'));
	//		} else {
	//			$this->Session->setFlash(__('The order could not be saved. Please, try again.'));
	//		}
	//	} else {
	//		$this->request->data = $this->Order->read(null, $id);
	//	}
	//	$users = $this->Order->User->find('list');
	//	$products = $this->Order->Product->find('list');
	//	$this->set(compact('users', 'products'));
	//}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException(__('Invalid order'));
		}
		if ($this->Order->delete()) {
			$this->Session->setFlash(__('Order deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Order was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
    
    public function admin_order_page(){
        $this->Order->Behaviors->load('Containable');
        $order_dates = $this->Order->find('list',array('fields'=>array('created_on'),'recursive'=>-1,'group'=>array('date(created_on)')));
        $dates = array();
        foreach($order_dates as $order_date){
            $dates[date("d-M-Y",strtotime($order_date))] = date("d-M-Y",strtotime($order_date));
        }
        $this->set(compact('dates'));
        if($this->request->is('post')){
            $orders = $this->Order->find('all',array('conditions'=>array('date(created_on)'=>date("Y-m-d",strtotime($this->request->data['Order']['date']))),
                                                     'contain'=>array('User',
                                                                      'CartItem'=>array(
                                                                            'Product'
                                                                        ),
                                                                    ),
                                                     'order'=>array('Order.id')));
            $this->set(compact('orders'));
        }
    }
}

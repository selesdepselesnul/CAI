<?php
/**
 *@author Moch Deden (https://github.com/selesdepselesnul)
 */
class ItemFormController {
	
	public function getFormSubmiting() {
		if(Base::Instance()->get('COOKIE[isLoggin]') == 'true')
			echo \Template::instance()
		->render('itemsubmitingform.html');
		else 
			Base::instance()->reroute('@get_login');                  
	}

	public function postFormSubmiting() {
		$label = Base::instance()->get("POST['label']");
		$price = Base::instance()->get("POST['price']");
		$quantity = Base::instance()->get("POST['quantity']");
		$discount = Base::instance()->get("POST['discount']");
		$type = Base::instance()->get("POST['type']");

		$item = new Item(Base::instance()->get('DB'));
		$item->label = $label;
		$item->price = $price;
		$item->quantity = $quantity;
		$item->discount = $discount;
		$item->type = $type;
		$item->save();

		Base::instance()->set('isPostMode', true);
		Base::instance()->set('isSuccess', true);
		echo \Template::instance()->render('itemsubmitingform.html');
	}
}
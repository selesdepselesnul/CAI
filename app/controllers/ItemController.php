<?php
class ItemController {
	
	public function get($f3) {
        $item = new Item(new DB\SQL(
            $f3->get('db.dns'),
            $f3->get('db.user'),
            $f3->get('db.password')
            ), $f3->get("PARAMS['item']"));
        echo json_encode(
            ["id" => $item->id, 
            "label" => $item->label,
            "price" => $item->price, 
            "quantity" => $item->quantity,
            "discount" => $item->discount,
            "type" => $item->type]
            );
    }

    public function post($f3) {
    }

    public function put($f3) {
    }

    public function delete($f3) {
    }

}
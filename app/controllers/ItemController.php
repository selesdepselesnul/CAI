<?php
class ItemController {
	
	public function get($f3) {
        $item = new Item($f3->get('DB'), $f3->get("PARAMS['item']"));
        echo json_encode([
            "id" => $item->id, 
            "label" => $item->label,
            "price" => $item->price, 
            "quantity" => $item->quantity,
            "discount" => $item->discount,
            "type" => $item->type
        ]);
    }

    public function post($f3) {
    }

    public function put($f3) {
    }

    public function delete($f3) {
    }
    
    public function getItemsByKey($f3) {
        $key = $f3->get('PARAMS["key"]');
        $value = $f3->get('PARAMS["value"]');
        echo json_encode(Item::getItemsByKey($key, $value));
    }
}
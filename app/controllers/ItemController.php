<?php
/**
 * @author Moch Deden (https://github.com/selesdepselesnul)
 */
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

    public function postNewItem($f3) {
        $newItem = new Item($f3->get('DB'));
        $newItem->label = $f3->get('POST["label"]');
        $newItem->price = $f3->get('POST["price"]');
        $newItem->quantity = $f3->get('POST["quantiy"]');
        $newItem->discount = $f3->get('POST["discount"]');
        $newItem->type = $f3->get('POST["type"]');
        $newItem->save();

        echo "berhasil hore!";
    }

    public function delete($f3) {
    }
    
    public function getItemsByKey($f3) {
        $key = $f3->get('PARAMS["key"]');
        $value = $f3->get('PARAMS["value"]');
        echo json_encode(Item::getItemsByKey($key, $value));
    }
}
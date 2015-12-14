<?php
/**
 * @author Moch Deden (https://github.com/selesdepselesnul)
 */
class ItemController {
	
	public function getItemById($f3) {
        $item = new Item($f3->get('DB'), $f3->get("PARAMS['id']"));
        echo json_encode([
            "id" => $item->id, 
            "label" => $item->label,
            "price" => $item->price, 
            "quantity" => $item->quantity,
            "discount" => $item->discount,
            "type" => $item->type
        ]);
    }

     public function getAll($f3) {
        echo json_encode(Item::all());
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
    
    public function getItemsByKey($f3) {
        $key = $f3->get('PARAMS["key"]');
        $value = $f3->get('PARAMS["value"]');
        echo json_encode(Item::getItemsByKey($key, $value));
    }
}
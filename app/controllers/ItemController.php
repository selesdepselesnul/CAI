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

    public function postEditItem($f3) {
        $edited_item = new Item($f3->get('DB'), $f3->get('PARAMS["id"]'));
        $label = $f3->get('POST["label"]');
        $price = $f3->get('POST["price"]');
        $quantity = $f3->get('POST["quantiy"]');
        $discount = $f3->get('POST["discount"]');
        $type = $f3->get('POST["type"]');
        
        if (!is_null($label))
            $edited_item->label = $label;
        if (!is_null($price))
            $edited_item->price = $price;
        if (!is_null($quantity))
            $edited_item->quantity = $quantity;
        if (!is_null($discount))
            $edited_item->discount = $discount;
        if (!is_null($type))
            $edited_item->type = $type;
        
        $edited_item->save();
        echo "berhasil cin!";
    }

    public function postNewItem($f3) {
        $new_item = new Item($f3->get('DB'));
        $new_item->label = $f3->get('POST["label"]');
        $new_item->price = $f3->get('POST["price"]');
        $new_item->quantity = $f3->get('POST["quantiy"]');
        $new_item->discount = $f3->get('POST["discount"]');
        $new_item->type = $f3->get('POST["type"]');
        $new_item->save();
        echo "berhasil hore!";
    }
    
    public function getItemsByKey($f3) {
        $key = $f3->get('PARAMS["key"]');
        $value = $f3->get('PARAMS["value"]');
        $operator = $f3->get('PARAMS["operator"]');
        echo json_encode(Item::getItemsByKey($key, $operator, $value));
    }
}
<?php
	namespace App\Cart;

	class Carts{
		public $items = null;
		public $totalQty = 0;
		public $totalPrice = 0;


		public function __construct($oldCart){
			if($oldCart){
				$this->items = $oldCart->items;
				$this->totalQty = $oldCart->totalQty;
				$this->totalPrice = $oldCart->totalPrice;
			}
		}


		public function add($item, $course_id){
			$storedItem = ['qty'=> 0, 'id'=>0, 'name'=>$item->name, 'price'=> $item->price, 'images'=>$item->images,'item'=>$item, 'created_by'=>$item['createdBy']['name']];
 
				if($this->items && array_key_exists($course_id, $this->items)){
					$storedItem = $this->items[$course_id];
					return 0;
				}else{
					$storedItem['qty']++;
					$storedItem['id'] = $course_id;
					$storedItem['name'] = $item->name;
					$storedItem['price'] = $item->price;
					$storedItem['images'] = $item->images;
					$storedItem['created_by'] = $item['createdBy']['name'];
					$this->totalQty++;
					$this->totalPrice += $item->price;
					$this->items[$course_id] = $storedItem;
					return 1;
				}

		}


		public function removeItem($id){

			$this->totalQty -= $this->items[$id]['qty'];
			$this->totalPrice -= $this->items[$id]['price'] * $this->items[$id]['qty'];
			unset($this->items[$id]);

		}
	}

?>
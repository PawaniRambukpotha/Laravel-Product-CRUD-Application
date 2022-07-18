<?php

namespace domain\Services;

use App\Models\Product;
use infrastructure\Facades\ImagesFacade;

class ProductService
{
    protected $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function get($product_id)
    {
        return $this->product->find($product_id);
    }

    public function all()
    {
        return $this->product->all();
    }

    public function allActive()
    {
        return $this->product->allActive();
    }

    public function store($data)
    {
        if(isset($data['images'])){
            $image = ImagesFacade::store($data['images'], [1,2,3,4,5]);
            $data['image_id'] = $image['created_images']->id;
        }
        $this->product->create($data);
    }

    public function delete($product_id)
    {
        $product = $this->product->find($product_id);
        $product->delete();
    }

    public function status($product_id)
    {
        $product = $this->product->find($product_id);
        if($product->status == 0){
            $product->status = 1;
            $product->update();
        }else{
            $product->status = 0;
            $product->update();
        }
    }

    public function update(array $data, $product_id)
    {
        $product = $this->product->find($product_id);
        $product->update($this->edit($product, $data));
    }

    protected function edit(Product $product, $data)
    {
        return array_merge($product->toArray(), $data);
    }

}

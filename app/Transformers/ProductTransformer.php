<?php

namespace CodeDelivery\Transformers;

use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\Product;

/**
 * Class ProductTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class ProductTransformer extends TransformerAbstract
{

    /**
     * Transform the \Product entity
     * @param \Product $model
     *
     * @return array
     */
    public function transform(Product $model) {
        return [
            'id'            => (int)$model->id,
            'name'          => (string)$model->name,
            'description'   => (string)$model->description,
            'price'         => (float)$model->price,
            'photo'         => (string)$model->photo
        ];
    }
}
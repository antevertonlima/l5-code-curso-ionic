<?php

namespace CodeDelivery\Transformers;

use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\OrderItem;

/**
 * Class OrderItemTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class OrderItemTransformer extends TransformerAbstract
{

    /**
     * Transform the OrderItem entity
     * @param OrderItem $model
     *
     * @return array
     */
    public function transform(OrderItem $model) {
        return [
            'price'         => (float)$model->price,
            'qtd'           => (int)$model->qtd
        ];
    }
}
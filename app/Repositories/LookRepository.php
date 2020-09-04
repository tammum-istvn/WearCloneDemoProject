<?php

namespace App\Repositories;

use App\models\LookItem;
use App\Repositories\LookRepositoryInterface;

class LookRepository implements LookRepositoryInterface
{
    public function lookItemDetails($look_id)
    {
        return LookItem::where('look_id', $look_id)
            ->with([
                'itemDetailInformation',
                'itemDetailInformation.itemDetail',
                'itemDetailInformation.itemDetail.item',
                'itemDetailInformation.itemDetail.item.user:id,first_name'
            ])
            ->get()
            ->map(function ($lookItem) {
                return $this->lookItemFormat($lookItem);
            });
    }

    private function lookItemFormat($lookItem)
    {
        $category = optional($lookItem->itemDetailInformation->itemDetail->item->category)->name;
        $subCategory = optional($lookItem->itemDetailInformation->itemDetail->item->subCategory)->name;
        $brand = optional($lookItem->itemDetailInformation->itemDetail->item->brand)->name;

        return [
            'image'                         => optional($lookItem->itemDetailInformation->itemDetail->picture)[0],
            'name'                          => $lookItem->itemDetailInformation->itemDetail->item->title,
            'shop'                          => $lookItem->itemDetailInformation->itemDetail->item->user->first_name,
            'category'                      => $category,
            'sub_category'                  => $subCategory,
            'brand'                         => $brand,
            'color'                         => $lookItem->itemDetailInformation->itemDetail->color,
            'size'                          => $lookItem->itemDetailInformation->size,
            'price'                         => $lookItem->itemDetailInformation->price,
            'item_detail_information_id'    => $lookItem->itemDetailInformation->id,
        ];
    }
}

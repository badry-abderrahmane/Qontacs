<?php

namespace App\Http\Resources;

class ContactResource
{
    /**
     * Get resource fields
     *
     * @return array Field to be selected in query
     */
    public function transfromItem($item)
    {
        return [
            'id'            => $item->id,
            'birth_date'    => $item->birth_date,
            'name'          => $item->first_name,
            'city'          => $item->city,
            'email'         => $item->email,
            'phone'         => $item->phone,
            'company'       => $item->company,
        ];
    }

    public function transfrom($collection){
        return $collection->map(function ($item, $key) {
            return $this->transfromItem($item);
        });
    }
}

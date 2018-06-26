<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sleimanx2\Plastic\Searchable;

class Store extends Model
{
    use Searchable;

    public function buildDocument()
    {
        $data = [
            'id'             => $this->id,
            'name'           => $this->name,
            'slug'           => $this->slug,
            'description'    => $this->description,
            'street_address' => $this->street_address,
            'house_number'   => $this->house_number,
            'zipcode'        => $this->zipcode,
            'website'        => $this->website,
            'city'           => $this->city,
            'state'          => $this->city->state,
            'country'        => $this->city->state->country,
            'created_at'     => $this->getElasticDate($this->created_at),
            'updated_at'     => $this->getElasticDate($this->updated_at),
        ];

        return $data;
    }

    public function getElasticDate ( $date )
    {
        if ( isset( $date ) ) {
            $d = Carbon::createFromFormat ('Y-m-d H:i:s' , $date);
            return $d->format ('Y-m-d H:i:s');
        }
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}

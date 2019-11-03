<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Ads extends JsonResource
{
    public function toArray($request)
    {

        return [
            'ads_code' => $this->ads_code,
            'ads_name' => $this->ads_name,
            'product_name' => $this->product_name,
            'product_car_name' => $this->product_car_name,
            'product_car_loc_name' => $this->product_car_loc_name,
            'partner_car_code' => $this->partner_car_code,
            'partner_car_nopol' => $this->partner_car_nopol,
            'ads_amount' => $this->ads_amount,
            'product_car_filename' => asset('storage/'. $this->product_car_filename),
            'ads_start_date' => $this->ads_start_date,
            'ads_end_date' => $this->ads_end_date
        ];
    }
}

class daftarJob extends JsonResource
{

    public function toArray($request)
    {

        return [
            'job_code' => $this->job_code,
            'job_name' => $this->job_name,
            'model' => $this->model,
            'brand' => $this->brand,
            'job_serial_number' => $this->job_serial_number,
            'location_name' => $this->location_name,
            'location_description' => $this->location_description,
            'created_at' => $this->created_at,
            'status' => $this->status,
            'users_name' => $this->users_name,
            'email' => $this->email,
            'users_hp' => $this->users_hp,

        ];
    }
}

class daftarJobUser extends JsonResource
{

    public function toArray($request)
    {

        return [
            'job_code' => $this->job_code,
            'job_name' => $this->job_name,
            'model' => $this->model,
            'brand' => $this->brand,
            'job_serial_number' => $this->job_serial_number,
            'location_name' => $this->location_name,
            'location_description' => $this->location_description,
            'created_at' => $this->created_at,
            'status' => $this->status,
            'users_name' => $this->users_name,
            'email' => $this->email,
            'users_hp' => $this->users_hp,

        ];
    }
}
class daftarAdsOnbid extends JsonResource
{

    public function toArray($request)
    {

        return [
            'ads_cart_code' => $this->ads_cart_code,
            'ads_cart_name' => $this->ads_cart_name,
            'product_name' => $this->product_name,
            'product_car_name' => $this->product_car_name,
            'product_car_loc_name' => $this->product_car_loc_name,
            'product_car_filename' => asset('storage/'. $this->product_car_filename),
            'ads_start_date' => $this->ads_cart_start_date,
            'ads_end_date' => $this->ads_cart_end_date

        ];
    }
}
class OnBidDetail extends JsonResource
{

    public function toArray($request)
    {

        return [
            'ads_cart_code' => $this->ads_cart_code,
            'ads_cart_name' => $this->ads_cart_name,
            'product_name' => $this->product_name,
            'product_car_name' => $this->product_car_name,
            'product_car_loc_name' => $this->product_car_loc_name,
            'ads_cart_amount' => $this->ads_cart_amount,
            'ads_cart_start_date' => $this->ads_cart_start_date,
            'ads_cart_end_date' => $this->ads_cart_end_date,
            'product_car_filename' => asset('storage/'. $this->product_car_filename)
        ];
    }
}
class daftarAdsCart extends JsonResource
{

    public function toArray($request)
    {

        return [
            'ads_cart_code' => $this->ads_cart_code,
            'ads_cart_order_code' => $this->ads_cart_order_code,
            'ads_cart_name' => $this->ads_cart_name,
            'ads_cart_amount' => (int) $this->ads_cart_amount,
            'product_name' => $this->product_name,
            'product_car_name' => $this->product_car_name,
            'product_car_name' => $this->product_car_name,
            'product_car_filename' => asset('storage/'. $this->product_car_filename)
        ];
    }
}

class daftarHistoryAds extends JsonResource
{
    public function toArray($request)
    {
        return [
            'ads_code' => $this->ads_code,
            'ads_name' => $this->ads_name,
            'product_name' => $this->product_name,
            'product_car_name' => $this->product_car_name,
            'product_car_loc_name' => $this->product_car_loc_name,
            'ads_start_date' => $this->ads_start_date,
            'ads_end_date' => $this->ads_end_date
        ];
    }
}

class adsCount extends JsonResource
{
    public function toArray($request)
    {

        return [
            'ads_cart_count' => $this->ads_cart_count
        ];
    }
}


class daftarAdsPartner extends JsonResource
{

    public function toArray($request)
    {

        return [
            'ads_cart_code' => $this->ads_cart_code,
            'ads_cart_name' => $this->ads_cart_name,
            'product_name' => $this->product_name,
            'product_car_name' => $this->product_car_name,
            'product_car_loc_name' => $this->product_car_loc_name,
            'ads_cart_start_date' => $this->ads_cart_start_date,
            'product_car_filename' => asset('storage/'. $this->product_car_filename),
            'ads_cart_end_date' => $this->ads_cart_end_date,
            'ads_cart_amount' => $this->ads_cart_amount,
            'product_car_code' => $this->product_car_code

        ];
    }
}

class daftarAdsPartnerBid extends JsonResource
{

    public function toArray($request)
    {

        return [
            'ads_cart_code' => $this->ads_cart_code,
            'ads_cart_name' => $this->ads_cart_name,
            'product_name' => $this->product_name,
            'product_car_name' => $this->product_car_name,
            'product_car_loc_name' => $this->product_car_loc_name,
            'ads_cart_start_date' => $this->ads_cart_start_date,
            'product_car_filename' => asset('storage/'. $this->product_car_filename),
            'ads_cart_end_date' => $this->ads_cart_end_date,
            'ads_cart_amount' => $this->ads_cart_amount

        ];
    }
}

class ambilAdsPartner extends JsonResource
{

    public function toArray($request)
    {

        return [
            'product_name' => $this->product_name,
            'ads_cart_start_date' => $this->ads_cart_start_date,
            'ads_cart_end_date' => $this->ads_cart_end_date,
            'ads_cart_amount' => $this->ads_cart_amount

        ];
    }
}

class ambilIklan extends JsonResource
{

    public function toArray($request)
    {


        return [
            'ads_cart_name' => $this->ads_cart_name,
            'product_name' => $this->product_name,
            'ads_cart_start_date' => $this->ads_cart_start_date,
            'ads_cart_end_date' => $this->ads_cart_end_date,
            'ads_cart_amount' => $this->ads_cart_amount
        ];
    }
}

class getAdsForStep2 extends JsonResource
{
    public function toArray($request)
    {
        // dd($this);
        return [
            'ads_cart_code' => $this->ads_cart_code,
            'ads_cart_name' => $this->ads_cart_name,
            'ads_cart_start_date' => $this->ads_cart_start_date,
            'ads_cart_end_date' => $this->ads_cart_end_date,
            'ads_cart_end_date' => $this->ads_cart_end_date,
            'ads_cart_amount' => $this->ads_cart_amount,
            'product_name' => $this->product_name,
            'product_car_filename' => asset('storage/'. $this->product_car_filename),
            'partner_car_name' => $this->partner_car_name,
            'partner_car_nopol' => $this->partner_car_nopol
        ];
    }
}

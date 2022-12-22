<?php

namespace domain\Services;

use App\Models\Banner;

class BannerService
{
    protected $banner;

    public function __construct()
    {
        $this->banner = new Banner();
    }

    public function all()
    {
        return $this->banner->all();
    }

    //Function to store data
    public function create($data)
    {
        $this->banner->create($data);
    }

    //Function to delete data
    public function remove($banner_id)
    {
        $banner = $this->banner->find($banner_id);
        $banner->delete();
    }

    //Function to Update status
    public function status($banner_id)
    {
        $banner = $this->banner->find($banner_id);
        $banner->status = 1;
        $banner->update();
    }
}
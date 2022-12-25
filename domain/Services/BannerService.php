<?php

namespace domain\Services;

use App\Models\Banner;
use infrastructure\Facades\ImagesFacade;
use infrastructure\Images;

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
            if(isset($data['images'])){
            $image = ImagesFacade::create($data['images'], [1,2,3,4,5]);
            $data['image_id'] = $image['created_images']->id;
        }
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
        if($banner->status == 0){
            $banner->status = 1;
            $banner->update();
        }
        else{
            $banner->status = 0;
            $banner->update();
        }
        
        
    }
}
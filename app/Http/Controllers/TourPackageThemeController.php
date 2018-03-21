<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\RedisController as Redis;
use App\Http\Controllers\Controller;
use App\Province;
use App\Activity;
use App\Landmark;
use App\TourPackages;
use App\TourPackageTheme as Theme;
use App\Http\Controllers\PriceController as Price;

class TourPackageThemeController extends Controller
{
  protected $redis;

  public function __construct(){
    $this->redis = new Redis();
  }

    public function AllPackageTheme(){
        $themes = Theme::all();

        $i = 0;
        foreach($themes as $theme){
          // $theme->TourPackage;
          $images = url('').'/images/'.$theme->theme_image;
          $p=array('id'          => $theme->id,
                    'theme'      => $theme->theme,
                    'theme_slug' => $theme->theme_slug,
                    'theme_image'=> $images,
                    );
          $data[$i]=$p;
          $i++;
        }
        return $data;
    }

    public function AllPackageThemeWithRedis(){
      $hitRedis = $this->redis->getRedis('package-theme-all');
      if(array_key_exists('data',$hitRedis)){
        if($hitRedis['data']==null){
          $packages = $this->AllPackageTheme();
          $this->redis->setRedis('package-theme-all',json_encode($packages));
        }else{
          $packages = json_decode($hitRedis['data']);
        }
      }else{
        $packages = $this->AllPackageTheme();
      }
      return $packages;
    }

    //main function -> dipakai di route
    public function PackageTheme($id_theme){
        $themes = Theme::where('theme_slug',$id_theme)->get();dd($themes);
        $packages = collect();
        foreach($themes as $theme){
          $tp = $theme->ThemePackage;
          foreach ($tp as $TourPackages) {
            $p = $TourPackages->TourPackage;
            if($p!=null && $p->available_for==62){
	    if (!empty($p->priceFullboard)) {
                # code...
                if(count($p->priceFullboard)!=0){
                    if($p->priceFullboard[0]->currency == 'IDR'){
                        $packages->push($p);
                    }
                }else{
                    if (!empty($p->priceLA[0])) {
                        if($p->priceLA[0]->currency == 'IDR'){
                            $packages->push($p);
                        }
                    }
                }
            }
	    }
            }
        }

        $price = new Price();
        $i=0;
        $data='';
        //dd($p);
        if($packages->count()!=0){
            foreach($packages as $package){
                $hargaMin=$price->minPricePackage($package->id);

                $keterangan=$price->flagPackage($package->id);

                //exception gambar
                if($package->picture){
                    $picture = url('').'/assets/landmark/'.$package->picture;
                }else{
                    $picture = url('').'/assets/card-lombok.jpg';
                }
                //exception lead_time
                $lead_time = 30;
                //exception lokasi
                if($package->operator){
                    $lokasi = $package->operator->city->province->province;
                    if($package->operator->lead_time!=0){
                        $lead_time = $package->operator->lead_time;
                    }
                }else{
                    $lokasi = null;
                }

                if(!$hargaMin){
                    $hargaMin = 0;
                }

                $p=array('id'       => $package->id,'paket'=>$package->package_name,
                            'lokasi'    => $lokasi,
                            'harga'     => $hargaMin,
                            'kurs'      => $price->packageCurrency($package->id),
                            'keterangan'=> $keterangan,
                            'image'     => $picture,
                            'lead_time' => $lead_time,
                            );
                $data[$i]=$p;
                $i++;
            }
            //dd($data);
            $show=array('status'=>'found', 'data'=> $data);
        }else{
            $show=array('status'=>'not found', 'data'=> '');
        }
        // $cache->storeCache($cachekey,$show);
        return $show;
        // return $themes;
    }

    public function PackageThemeWithRedis($id_theme){
      $hitRedis = $this->redis->getRedis('package-theme-'.$id_theme);
      if(array_key_exists('data',$hitRedis)){
        if($hitRedis['data']==null){
          $packages = $this->PackageTheme($id_theme);
          $this->redis->setRedis('package-theme-'.$id_theme,json_encode($packages));
        }else{
          $packages = $hitRedis['data'];
        }
      }else{
        $packages = $this->PackageTheme($id_theme);
      }
      return $packages;
    }

    public function PackageProvinceGroup($province)
    {
      $province = Province::where('province',$province)->get();
      $packages = collect();
      foreach ($province as $provinces) {
        $ct = $provinces->cities;
        foreach ($ct as $cts) {
            $opr = $cts->operator;
            if (!empty($opr)) {
                foreach ($opr as $oprs) {
                    $tp = $oprs->TourPackage;
		    foreach ($tp as $p) {
                      if($p!=null && $p->available_for==62){
			if(count($p->priceFullboard)!=0){
                            if($p->priceFullboard[0]->currency == 'IDR'){
                                $packages->push($p);
                            }
                        }else{
                            if (!empty($p->priceLA[0])) {
                                if($p->priceLA[0]->currency == 'IDR'){
                                    $packages->push($p);
                                }
                            }
                        }
		      }
                    }

                }
            }
        }
      }
      // dd($packages);
      $price = new Price();
        $i=0;
        $data='';
        // dd($packages->count());
        if($packages->count()!=0){
            foreach($packages as $package){
                $hargaMin=$price->minPricePackage($package->id);

                $keterangan=$price->flagPackage($package->id);

                //exception gambar
                if($package->picture){
                    $picture = url('').'/assets/landmark/'.$package->picture;
                }else{
                    $picture = url('').'/assets/card-lombok.jpg';
                }
                //exception lead_time
                $lead_time = 30;
                //exception lokasi
                if($package->operator){
                    $lokasi = $package->operator->city->province->province;
                    if($package->operator->lead_time!=0){
                        $lead_time = $package->operator->lead_time;
                    }
                }else{
                    $lokasi = null;
                }

                if(!$hargaMin){
                    $hargaMin = 0;
                }

                $p=array('id'       => $package->id,'paket'=>$package->package_name,
                            'lokasi'    => $lokasi,
                            'harga'     => $hargaMin,
                            'kurs'      => $price->packageCurrency($package->id),
                            'keterangan'=> $keterangan,
                            'image'     => $picture,
                            'lead_time' => $lead_time,
                            );
                $data[$i]=$p;
                $i++;
            }
            //dd($data);
            $show=array('status'=>'found', 'data'=> $data);
        }else{
            $show=array('status'=>'not found', 'data'=> '');
        }
        // $cache->storeCache($cachekey,$show);
        return $show;
    }

    public function PackageProvinceGroupWithRedis($province){
      $hitRedis = $this->redis->getRedis('package-province-'.$province);
      if(array_key_exists('data',$hitRedis)){
        if($hitRedis['data']==null){
          $packages = $this->PackageProvinceGroup($province);
          $this->redis->setRedis('package-province-'.$province,json_encode($packages));
        }else{
          $packages = $hitRedis['data'];
        }
      }else{
        $packages = $this->PackageProvinceGroup($province);
      }
      return $packages;
    }

    public function PackageActivityGroup($activity)
    {
        $idLandmark = array();
        $id_package = array();

        $activity = Activity::where('activity_slug',$activity)->first();
        if($activity==null){
        return array();
        }

        foreach($activity->landmark as $lm){
          array_push($idLandmark, $lm->id);
        }

        $landmark = Landmark::whereIn('id',$idLandmark)
                          ->has('paketTur')
                          ->get();

        foreach($landmark as $rundown){
        $packageRundown = $rundown->paketTur;
        foreach($packageRundown as $day){
          $packageDay = $day->packagesDetail;
          array_push($id_package,$packageDay->package_id);
        }
        }
        $id_package = array_unique($id_package);
        $id_package = array_values($id_package);

        $tp = TourPackages::whereIn('id',$id_package)->get();
        $packages = collect();
        foreach ($tp as $p) {
          if($p!=null && $p->available_for==62){
	    if(count($p->priceFullboard)!=0){
                if($p->priceFullboard[0]->currency == 'IDR'){
                    $packages->push($p);
                }
            }else{
                if (!empty($p->priceLA[0])) {
                    if($p->priceLA[0]->currency == 'IDR'){
                        $packages->push($p);
                    }
                }
            }
	  }
        }
        // return $p;
        $price = new Price();
        $i=0;
        $data='';
        // dd($packages->count());
        if($packages->count()!=0){
            foreach($packages as $package){
                $hargaMin=$price->minPricePackage($package->id);

                $keterangan=$price->flagPackage($package->id);

                //exception gambar
                if($package->picture){
                    $picture = url('').'/assets/landmark/'.$package->picture;
                }else{
                    $picture = url('').'/assets/card-lombok.jpg';
                }
                //exception lead_time
                $lead_time = 30;
                //exception lokasi
                if($package->operator){
                    $lokasi = $package->operator->city->province->province;
                    if($package->operator->lead_time!=0){
                        $lead_time = $package->operator->lead_time;
                    }
                }else{
                    $lokasi = null;
                }

                if(!$hargaMin){
                    $hargaMin = 0;
                }

                $p=array('id'       => $package->id,'paket'=>$package->package_name,
                            'lokasi'    => $lokasi,
                            'harga'     => $hargaMin,
                            'kurs'      => $price->packageCurrency($package->id),
                            'keterangan'=> $keterangan,
                            'image'     => $picture,
                            'lead_time' => $lead_time,
                            );
                $data[$i]=$p;
                $i++;
            }
            //dd($data);
            $show=array('status'=>'found', 'data'=> $data);
        }else{
            $show=array('status'=>'not found', 'data'=> '');
        }
        // $cache->storeCache($cachekey,$show);
        return $show;
    }

    public function PackageActivityGroupWithRedis($activity){
      $hitRedis = $this->redis->getRedis('package-activity-'.$activity);
      if(array_key_exists('data',$hitRedis)){
        if($hitRedis['data']==null){
          $packages = $this->PackageActivityGroup($activity);
          $this->redis->setRedis('package-activity-'.$activity,json_encode($packages));
        }else{
          $packages = $hitRedis['data'];
        }
      }else{
        $packages = $this->PackageActivityGroup($activity);
      }
      return $packages;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php
namespace App\Http\Controllers;

use App\HolidayPackage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;


class HomeController extends Controller {

	public function index()
	{
            $ln = Session::get('lan');
            if($ln == 'bn'){
                $loc = '.bn';
            }else{
                $loc = '';
            }


                $slider_data = DB::table('slider')
                        ->where('status', '=', 1)
                        ->orderBy('sort', 'asc')
                        ->get();
                
                if(!$slider_data){
                    $slider_data = NULL;
                }
            
                $fair_data = DB::table('blog')
                        ->where('type', '=', 'fair')
                        ->where('status', '=', 1)
                        ->orderBy('sort', 'asc')
                        ->get();
                
                if(!$fair_data){
                    $fair_data = NULL;
                }
            
                
//                $package_data = DB::table('blog')
//                        ->where('type', '=', 'packages')
//                        ->where('country', '=', 'Bangkok')
//                        ->orderBy('sort', 'asc')
//                        ->where('status', '=', 1)
//                        ->get();
//
//                if(!$package_data){
//                    $package_data = NULL;
//                }

                $holidayPackageCountry = HolidayPackage::select('country')->orderBy('country','asc')->groupBy('country')->get();

                
                $offers_data = DB::table('blog')
                        ->where('type', '=', 'offers')
                        ->where('status', '=', 1)
                        ->orderBy('sort', 'asc')
                        ->get();
                
                if(!$offers_data){
                    $offers_data = NULL;
                }
                
                
                
                $data = array(
                    'slider_data' => $slider_data,
                    'fair_data' => $fair_data,
//                    'package_data' => $package_data,
                    'holidayPackageCountry' => $holidayPackageCountry,
                    'offers_data' => $offers_data,
                    'title' => 'Home',
                );
        
		return view('frontend'.$loc.'.contents.home', $data);
	}

	public function getPackages(Request $request ) {
        $type = $request->get('type');
        if ($type == 'all') {
            $packages = HolidayPackage::orderBy('order','asc')->get();
        } else {
            $packages = HolidayPackage::where('country',$type)->get();
        }

        $total = count($packages);
        $ret = '';
        $baseURL = \Helper::getImageBaseUrl();

        if ($packages) {
            $p = 0;
            foreach ($packages as $package) {
                $p++;
                if ($p % 4 == 0) {
                    $row_end = 'tour-row-end';
                } else {
                    $row_end = '';
                }

                if ($type != 'all') {
                    if ($p > 4) {
                        $display = 'none';
                    } else {
                        $display = '';
                    }
                } else {
                    $display = '';
                }



                echo '<div class="tour_item ' . $row_end . ' ' . $display . ' ">';
                echo '<div class="tour-visual zoom_item">';
                echo '        <img src="' . $baseURL . '/public/upload/blog/' . $package->image . '" alt="" />';
                echo '			<div class="tour_item_info">';
                echo '			<a href="'.$baseURL.'/package/'.$package->id.'/'.$package->title.'">';
                echo '			<div>'.$package->place.'</div>';
                echo '			<div>'.$package->title.'</div>';
                echo '			</a>';
                echo '			</div>';
                echo '    </div>';
                echo '</div>';
            }

            if ($type != 'all') {
                echo '@'.$total;
            }

        }else {
            echo '';
        }
    }

}

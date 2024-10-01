<?php

namespace App\Http\Controllers; 
use Illuminate\Http\Request;
use App\Models\ProductCategoryTranslation;
use App\Models\ProductCategory;
use App\Models\ContactUs;
use App\Models\AboutUs;
use App\Models\ImageSlider;
use App\Models\System;
use App\Models\Product; 
use App\Models\ProductTranslation;
use App\Models\Visit;
use Illuminate\Support\Facades\Storage; 
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    public function __construct()
    {
        // ตรวจสอบ locale จาก session และตั้งค่าให้กับแอป
        $locale = Session::get('locale', config('app.locale')); // ใช้ locale จาก session หรือค่าพื้นฐาน
        App::setLocale($locale);
       
    }
    public function index()
    { 
        $images = ImageSlider::where('status', 1)
        ->orderBy('display_order', 'asc')
        ->get(); 

        $aboutUs = AboutUs::first(); 
        if (!$aboutUs) { 
            $aboutUs = new AboutUs([
                'title_en' => '',
                'title_jp' => '',
                'description_en' => '',
                'description_jp' => '',
                'image' => ''
            ]);
        } 
        $search = ''; // ไม่ต้องการค้นหา
        $sortOrder = 'asc';
        $locale = app()->getLocale(); // ดึงค่าภาษาในปัจจุบัน
        $categories = ProductCategory::with(['translations' => function ($query) use ($locale) {
            $query->where('locale', $locale); // เช็ค locale ที่นี่
        }])
        ->where('status', 1)
        ->when(!empty($search), function ($query) use ($search) {
            return $query->whereHas('translations', function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%"); // ค้นหาในชื่อ
            });
        })
        ->orderBy('display_order', $sortOrder)
        ->get();

        // สร้างอาเรย์เพื่อเก็บหมวดหมู่ที่จัดกลุ่มตาม parent_id
       // สร้างอาเรย์ที่มีโครงสร้างเป็น id => 1, name => 'test'
        $result = $categories->map(function ($category) {
            return [
                'id' => $category->id,
                'name' => $category->translations->first()->name, // ดึงชื่อจาก translation แรก
                'parent_id' => $category->parent_id,
            ];
        });
        $CateMain = array();
        $CateSub  = array();
        foreach ($result as $key => $value) {
            if($value['parent_id']==''){
                $CateMain[] = $value;
            }else{
                if(isset($CateSub[$value['parent_id']])){
                    $CateSub[$value['parent_id']][] =  $value;
                }else{
                    $CateSub[$value['parent_id']] = array();
                    $CateSub[$value['parent_id']][] =  $value;
                } 
            }
          
        }
        

        $ContactUs = ContactUs::first(); 
        if (!$ContactUs) { 
            $ContactUs = new ContactUs([
                'address_en'=> '',
                'address_jp'=> '',
                'mail'=> '', 
                'tel'=> '',
                'linkfacebook'=> '', 
                'linkyoutube'=> '', 
                'maplocation'=> '',
            ]);
        } 
        return view('page.index', compact('images','aboutUs','ContactUs','CateMain','CateSub'));
        

    }
    public function about()
    {  
    
        $aboutUs = AboutUs::first(); 
        if (!$aboutUs) { 
            $aboutUs = new AboutUs([
                'title_en' => '',
                'title_jp' => '',
                'description_en' => '',
                'description_jp' => '',
                'image' => ''
            ]);
        } 
        $search = ''; // ไม่ต้องการค้นหา
        $sortOrder = 'asc';
        $locale = app()->getLocale(); // ดึงค่าภาษาในปัจจุบัน
        $categories = ProductCategory::with(['translations' => function ($query) use ($locale) {
            $query->where('locale', $locale); // เช็ค locale ที่นี่
        }])
        ->where('status', 1)
        ->when(!empty($search), function ($query) use ($search) {
            return $query->whereHas('translations', function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%"); // ค้นหาในชื่อ
            });
        })
        ->orderBy('display_order', $sortOrder)
        ->get();

        // สร้างอาเรย์เพื่อเก็บหมวดหมู่ที่จัดกลุ่มตาม parent_id
       // สร้างอาเรย์ที่มีโครงสร้างเป็น id => 1, name => 'test'
        $result = $categories->map(function ($category) {
            return [
                'id' => $category->id,
                'name' => $category->translations->first()->name, // ดึงชื่อจาก translation แรก
                'parent_id' => $category->parent_id,
            ];
        });
        $CateMain = array();
        $CateSub  = array();
        foreach ($result as $key => $value) {
            if($value['parent_id']==''){
                $CateMain[] = $value;
            }else{
                if(isset($CateSub[$value['parent_id']])){
                    $CateSub[$value['parent_id']][] =  $value;
                }else{
                    $CateSub[$value['parent_id']] = array();
                    $CateSub[$value['parent_id']][] =  $value;
                } 
            }
          
        }
        

        $ContactUs = ContactUs::first(); 
        if (!$ContactUs) { 
            $ContactUs = new ContactUs([
                'address_en'=> '',
                'address_jp'=> '',
                'mail'=> '', 
                'tel'=> '',
                'linkfacebook'=> '', 
                'linkyoutube'=> '', 
                'maplocation'=> '',
            ]);
        } 
        return view('page.about', compact('aboutUs','ContactUs','CateMain','CateSub'));
      

      
    }
    public function system()
    {
        $System = System::where('status', 1)
        ->orderBy('display_order', 'asc')
        ->get(); 

        $search = ''; // ไม่ต้องการค้นหา
        $sortOrder = 'asc';
        $locale = app()->getLocale(); // ดึงค่าภาษาในปัจจุบัน
        $categories = ProductCategory::with(['translations' => function ($query) use ($locale) {
            $query->where('locale', $locale); // เช็ค locale ที่นี่
        }])
        ->where('status', 1)
        ->when(!empty($search), function ($query) use ($search) {
            return $query->whereHas('translations', function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%"); // ค้นหาในชื่อ
            });
        })
        ->orderBy('display_order', $sortOrder)
        ->get();

        // สร้างอาเรย์เพื่อเก็บหมวดหมู่ที่จัดกลุ่มตาม parent_id
       // สร้างอาเรย์ที่มีโครงสร้างเป็น id => 1, name => 'test'
        $result = $categories->map(function ($category) {
            return [
                'id' => $category->id,
                'name' => $category->translations->first()->name, // ดึงชื่อจาก translation แรก
                'parent_id' => $category->parent_id,
            ];
        });
        $CateMain = array();
        $CateSub  = array();
        foreach ($result as $key => $value) {
            if($value['parent_id']==''){
                $CateMain[] = $value;
            }else{
                if(isset($CateSub[$value['parent_id']])){
                    $CateSub[$value['parent_id']][] =  $value;
                }else{
                    $CateSub[$value['parent_id']] = array();
                    $CateSub[$value['parent_id']][] =  $value;
                } 
            }
          
        }
        

        $ContactUs = ContactUs::first(); 
        if (!$ContactUs) { 
            $ContactUs = new ContactUs([
                'address_en'=> '',
                'address_jp'=> '',
                'mail'=> '', 
                'tel'=> '',
                'linkfacebook'=> '', 
                'linkyoutube'=> '', 
                'maplocation'=> '',
            ]);
        } 
        return view('page.system', compact('System','ContactUs','CateMain','CateSub')); 
    }

    public function systemdetail($cateid)
    {    
        $systems = System::findOrFail($cateid);
        $search = ''; // ไม่ต้องการค้นหา
        $sortOrder = 'asc';
        $locale = app()->getLocale(); // ดึงค่าภาษาในปัจจุบัน
        $categories = ProductCategory::with(['translations' => function ($query) use ($locale) {
            $query->where('locale', $locale); // เช็ค locale ที่นี่
        }])
        ->where('status', 1)
        ->when(!empty($search), function ($query) use ($search) {
            return $query->whereHas('translations', function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%"); // ค้นหาในชื่อ
            });
        })
        ->orderBy('display_order', $sortOrder)
        ->get();

        // สร้างอาเรย์เพื่อเก็บหมวดหมู่ที่จัดกลุ่มตาม parent_id
       // สร้างอาเรย์ที่มีโครงสร้างเป็น id => 1, name => 'test'
        $result = $categories->map(function ($category) {
            return [
                'id' => $category->id,
                'name' => $category->translations->first()->name, // ดึงชื่อจาก translation แรก
                'parent_id' => $category->parent_id,
            ];
        });
        $CateMain = array();
        $CateSub  = array();
        foreach ($result as $key => $value) {
            if($value['parent_id']==''){
                $CateMain[] = $value;
            }else{
                if(isset($CateSub[$value['parent_id']])){
                    $CateSub[$value['parent_id']][] =  $value;
                }else{
                    $CateSub[$value['parent_id']] = array();
                    $CateSub[$value['parent_id']][] =  $value;
                } 
            }
          
        }
        

        $ContactUs = ContactUs::first(); 
        if (!$ContactUs) { 
            $ContactUs = new ContactUs([
                'address_en'=> '',
                'address_jp'=> '',
                'mail'=> '', 
                'tel'=> '',
                'linkfacebook'=> '', 
                'linkyoutube'=> '', 
                'maplocation'=> '',
            ]);
        }  
        return view('page.system-detail', compact('systems','ContactUs','CateMain','CateSub')); 
    }
    public function catelist($CategId)
    {
      
        $search = '';
        $sortOrder = 'asc';
        $rowsPerPage = 10;
        $rowsPerPage = $rowsPerPage > 0 ? $rowsPerPage : 10;
        $locale = app()->getLocale();
       
     
        $products = Product::select('products.*', 'product_translations.name' ) // เลือกคอลัมน์จาก products
        ->join('product_translations', function ($join) use ($locale) {
            $join->on('products.id', '=', 'product_translations.product_id') // เชื่อมตาราง
                 ->where('product_translations.locale', $locale); // เงื่อนไข locale
        })
        ->where('products.status', '1') // เงื่อนไขเพิ่มเติม
        ->where('products.category_id',  $CategId) // เงื่อนไขเพิ่มเติม
        ->orderBy('products.display_order', 'asc')
        ->get();
    
        $search = ''; // ไม่ต้องการค้นหา
        $sortOrder = 'asc';
        $locale = app()->getLocale(); // ดึงค่าภาษาในปัจจุบัน
        $categories = ProductCategory::with(['translations' => function ($query) use ($locale) {
            $query->where('locale', $locale); // เช็ค locale ที่นี่
        }])
        ->where('status', 1)
        ->when(!empty($search), function ($query) use ($search) {
            return $query->whereHas('translations', function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%"); // ค้นหาในชื่อ
            });
        })
        ->orderBy('display_order', $sortOrder)
        ->get();

        // สร้างอาเรย์เพื่อเก็บหมวดหมู่ที่จัดกลุ่มตาม parent_id
       // สร้างอาเรย์ที่มีโครงสร้างเป็น id => 1, name => 'test'
        $result = $categories->map(function ($category) {
            return [
                'id' => $category->id,
                'name' => $category->translations->first()->name, // ดึงชื่อจาก translation แรก
                'parent_id' => $category->parent_id,
            ];
        });
        $CateMain = array();
        $CateSub  = array();
        foreach ($result as $key => $value) {
            if($value['parent_id']==''){
                $CateMain[] = $value;
            }else{
                if(isset($CateSub[$value['parent_id']])){
                    $CateSub[$value['parent_id']][] =  $value;
                }else{
                    $CateSub[$value['parent_id']] = array();
                    $CateSub[$value['parent_id']][] =  $value;
                } 
            }
          
        }
        

        $ContactUs = ContactUs::first(); 
        if (!$ContactUs) { 
            $ContactUs = new ContactUs([
                'address_en'=> '',
                'address_jp'=> '',
                'mail'=> '', 
                'tel'=> '',
                'linkfacebook'=> '', 
                'linkyoutube'=> '', 
                'maplocation'=> '',
            ]);
        }  
        return view('page.catelist', compact('CategId','products','ContactUs','CateMain','CateSub')); 
    }
    public function productdetail($productid)
    {    
        $locale = app()->getLocale();
        $Product = Product::find($productid);  
        $ProductTranslation = ProductTranslation::where('product_id', $productid)
                ->where('locale', $locale) 
                ->first();  
 
        $search = ''; // ไม่ต้องการค้นหา
        $sortOrder = 'asc';
         // ดึงค่าภาษาในปัจจุบัน
        $categories = ProductCategory::with(['translations' => function ($query) use ($locale) {
            $query->where('locale', $locale); // เช็ค locale ที่นี่
        }])
        ->where('status', 1)
        ->when(!empty($search), function ($query) use ($search) {
            return $query->whereHas('translations', function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%"); // ค้นหาในชื่อ
            });
        })
        ->orderBy('display_order', $sortOrder)
        ->get();

        // สร้างอาเรย์เพื่อเก็บหมวดหมู่ที่จัดกลุ่มตาม parent_id
       // สร้างอาเรย์ที่มีโครงสร้างเป็น id => 1, name => 'test'
        $result = $categories->map(function ($category) {
            return [
                'id' => $category->id,
                'name' => $category->translations->first()->name, // ดึงชื่อจาก translation แรก
                'parent_id' => $category->parent_id,
            ];
        });
        $CateMain = array();
        $CateSub  = array();
        foreach ($result as $key => $value) {
            if($value['parent_id']==''){
                $CateMain[] = $value;
            }else{
                if(isset($CateSub[$value['parent_id']])){
                    $CateSub[$value['parent_id']][] =  $value;
                }else{
                    $CateSub[$value['parent_id']] = array();
                    $CateSub[$value['parent_id']][] =  $value;
                } 
            }
          
        }
        

        $ContactUs = ContactUs::first(); 
        if (!$ContactUs) { 
            $ContactUs = new ContactUs([
                'address_en'=> '',
                'address_jp'=> '',
                'mail'=> '', 
                'tel'=> '',
                'linkfacebook'=> '', 
                'linkyoutube'=> '', 
                'maplocation'=> '',
            ]);
        }  
        return view('page.product-detail', compact('ProductTranslation','Product','ContactUs','CateMain','CateSub')); 
    }
    public function service()
    {
        
        $search = ''; // ไม่ต้องการค้นหา
        $sortOrder = 'asc';
        $locale = app()->getLocale(); // ดึงค่าภาษาในปัจจุบัน
        $categories = ProductCategory::with(['translations' => function ($query) use ($locale) {
            $query->where('locale', $locale); // เช็ค locale ที่นี่
        }])
        ->where('status', 1)
        ->when(!empty($search), function ($query) use ($search) {
            return $query->whereHas('translations', function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%"); // ค้นหาในชื่อ
            });
        })
        ->orderBy('display_order', $sortOrder)
        ->get();

        // สร้างอาเรย์เพื่อเก็บหมวดหมู่ที่จัดกลุ่มตาม parent_id
       // สร้างอาเรย์ที่มีโครงสร้างเป็น id => 1, name => 'test'
        $result = $categories->map(function ($category) {
            return [
                'id' => $category->id,
                'name' => $category->translations->first()->name, // ดึงชื่อจาก translation แรก
                'parent_id' => $category->parent_id,
            ];
        });
        $CateMain = array();
        $CateSub  = array();
        foreach ($result as $key => $value) {
            if($value['parent_id']==''){
                $CateMain[] = $value;
            }else{
                if(isset($CateSub[$value['parent_id']])){
                    $CateSub[$value['parent_id']][] =  $value;
                }else{
                    $CateSub[$value['parent_id']] = array();
                    $CateSub[$value['parent_id']][] =  $value;
                } 
            }
          
        }
        

        $ContactUs = ContactUs::first(); 
        if (!$ContactUs) { 
            $ContactUs = new ContactUs([
                'address_en'=> '',
                'address_jp'=> '',
                'mail'=> '', 
                'tel'=> '',
                'linkfacebook'=> '', 
                'linkyoutube'=> '', 
                'maplocation'=> '',
            ]);
        } 
        return view('page.service', compact('ContactUs','CateMain','CateSub'));  
    }
    public function contact()
    {
         
        $search = ''; // ไม่ต้องการค้นหา
        $sortOrder = 'asc';
        $locale = app()->getLocale(); // ดึงค่าภาษาในปัจจุบัน
        $categories = ProductCategory::with(['translations' => function ($query) use ($locale) {
            $query->where('locale', $locale); // เช็ค locale ที่นี่
        }])
        ->where('status', 1)
        ->when(!empty($search), function ($query) use ($search) {
            return $query->whereHas('translations', function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%"); // ค้นหาในชื่อ
            });
        })
        ->orderBy('display_order', $sortOrder)
        ->get();

        // สร้างอาเรย์เพื่อเก็บหมวดหมู่ที่จัดกลุ่มตาม parent_id
       // สร้างอาเรย์ที่มีโครงสร้างเป็น id => 1, name => 'test'
        $result = $categories->map(function ($category) {
            return [
                'id' => $category->id,
                'name' => $category->translations->first()->name, // ดึงชื่อจาก translation แรก
                'parent_id' => $category->parent_id,
            ];
        });
        $CateMain = array();
        $CateSub  = array();
        foreach ($result as $key => $value) {
            if($value['parent_id']==''){
                $CateMain[] = $value;
            }else{
                if(isset($CateSub[$value['parent_id']])){
                    $CateSub[$value['parent_id']][] =  $value;
                }else{
                    $CateSub[$value['parent_id']] = array();
                    $CateSub[$value['parent_id']][] =  $value;
                } 
            }
          
        }
        

        $ContactUs = ContactUs::first(); 
        if (!$ContactUs) { 
            $ContactUs = new ContactUs([
                'address_en'=> '',
                'address_jp'=> '',
                'mail'=> '', 
                'tel'=> '',
                'linkfacebook'=> '', 
                'linkyoutube'=> '', 
                'maplocation'=> '',
            ]);
        } 
        return view('page.contact', compact('ContactUs','CateMain','CateSub'));  
    }
 
}

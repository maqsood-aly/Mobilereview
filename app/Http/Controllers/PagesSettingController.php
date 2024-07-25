<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Upload;
use App\Models\Component;
use App\Models\Settings;
use App\Models\Categories;
use App\Models\Product;
use App\Models\Models;
use App\Models\Pro;
use App\Models\Cons;
use App\Models\Footer;
use App\Models\Pricelist;
use App\Models\Welcome;
use App\Models\Product_feature;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;

class PagesSettingController extends Controller
{

    public function create_post()
    {
        $brands = Brand::get(['id', 'name']);
        // Pass the data to the view
        return view('adminpages.item.create', compact('brands'));
    }

    public function getByBrand(Request $request)
    {
        $brandId = $request->query('brand_id');

        // Validate the brandId
        if (!isset($brandId)) {
            return response()->json(['error' => 'Brand ID is required'], 400);
        }

        // Assuming you have a 'brand_id' foreign key column in your models table
        $models = Models::where('brand_id', $brandId)->pluck('base_model', 'id');

        return response()->json($models);
    }

    public function store_post(Request $request)
    {
       

        $validatedData = $request->validate([
            'altText' => 'nullable|string|max:255',
            'product_name' => 'required|string|max:255',
            'image' => 'required|image',
            'meta_title' => 'required|string|max:255',
            'meta_description' => 'required|string',
            // 'meta_keywords' => 'required|string',
            'review_text' => 'required|string',
            'overview_text' => 'required|string',
            'price' => 'required|numeric',
            'model' => 'required|string|max:255',
            'release_date' => 'required|date',
            'pros' => 'required|array|min:1', // Ensure at least one "Pro" is present
            'pros.*' => 'required|string', // Each "Pro" must be a string
            'cons' => 'required|array|min:1', // Ensure at least one "Con" is present
            'cons.*' => 'required|string', // Each "Con" must be a string
            'launched_in_pakistan' => 'required|boolean',
            'dimension' => 'required|string|max:255',
            'weight' => 'required|integer',
            'sim_type' => 'required|string|max:255',
            'colour' => 'required|string|max:255',
            'base_model' => 'required',
            'brand_id' => 'required',
            'soc' => 'required|string|max:255',
            'gpu' => 'required|string|max:255',
            'cpu' => 'required|string|max:255',
            'ram' => 'required|string|max:255',
            'storage' => 'required|string|max:255',
            'screen_size' => 'required|numeric',
            'type' => 'required|string|max:255',
            'resolution' => 'required|string|max:255',
            'pixel_density' => 'required|integer',
            'refresh_rate' => 'required|integer',
            'quality' => 'required|string|max:255',
            'glass_protection' => 'required|string|max:255',
            'display_colours' => 'required|string|max:255',
            'operating_system' => 'required|string|max:255',
            'ui' => 'required|string|max:255',
            'no_of_rear_cameras' => 'required|integer',
            'rear_cameras' => 'required|string|max:255',
            'rear_flash' => 'required|boolean',
            'periscope' => 'required|boolean',
            'no_of_front_cameras' => 'required|integer',
            'front_camera' => 'required|string|max:255',
            'battery' => 'required|string|max:255',
            'accelerometer' => 'required|boolean',
            'gyroscope' => 'required|boolean',
            'compass' => 'required|boolean',
            'fingerprint' => 'required|boolean',
            'bluetooth' => 'required|string|max:255',
            'wifi' => 'required|string|max:255',
            'nfc' => 'required|boolean',
            '2g' => 'required|boolean',
            '3g' => 'required|boolean',
            '4g_lte' => 'required|boolean',
            '5g' => 'required|boolean',
            'status' => 'required',
        ]);


        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            if ($file->isValid()) {
                $destinationPath = public_path('mobile_images');  // Use public_path for direct public access
                $fileName = $validatedData['altText'] . '.' . $file->getClientOriginalExtension();
                $file->move($destinationPath, $fileName);
                $validatedData['image'] = 'mobile_images/' . $fileName;
            } else {
                // Handle the case where the file is not valid
                return back()->withErrors(['image' => 'Uploaded file is not valid']);
            }
        } else {
            // Handle the case where the file is not present
            return back()->withErrors(['image' => 'No file uploaded']);
        }

        $model = new Models();
        $model->name = $validatedData['model'];
        $model->base_model = $validatedData['base_model'];
        $model->brand_id = $validatedData['brand_id'];
        $model->save();
        $modelId = $model->id;

        // Create a new Product instance
        $post = new Product();
        $post->meta_title = $validatedData['meta_title'];
        $post->meta_description = $validatedData['meta_description'];
        $post->review_section = $validatedData['review_text'];
        $post->overview_section = $validatedData['overview_text'];
        $post->name = $validatedData['product_name'];
        $post->price = $validatedData['price'];
        $post->image_url = $validatedData['image'];
        $post->brand_id = $validatedData['brand_id'];
        $post->launched_in_pakistan = $validatedData['launched_in_pakistan'];
        $post->release_date = $validatedData['release_date'];
        $post->dimensions = $validatedData['dimension'];
        $post->sim_type = $validatedData['sim_type'];
        $post->colours = $validatedData['colour'];
        $post->image_alt = $validatedData['altText'];
        $post->periscope = $validatedData['periscope'];
        $post->accelerometer = $validatedData['accelerometer'];
        $post->gyroscope = $validatedData['gyroscope'];
        $post->compass = $validatedData['compass'];
        $post->fingerprint = $validatedData['fingerprint'];
        $post->bluetooth = $validatedData['bluetooth'];
        $post->wifi = $validatedData['wifi'];
        $post->screen_size = $validatedData['screen_size'];
        $post->type = $validatedData['type'];
        $post->resolution = $validatedData['resolution'];
        $post->pixel_density = $validatedData['pixel_density'];
        $post->refresh_rate = $validatedData['refresh_rate'];
        $post->quality = $validatedData['quality'];
        $post->glass_protection = $validatedData['glass_protection'];
        $post->display_colours = $validatedData['display_colours'];
        $post->model_id = $modelId;
        $post->nfc = $validatedData['nfc'];
        $post->_2g = $validatedData['2g'];
        $post->_3g = $validatedData['3g'];
        $post->_4g = $validatedData['4g_lte'];
        $post->_5g = $validatedData['5g'];
        $post->status = $validatedData['status'];
        $post->weight = $validatedData['weight'];
        $post->battery_capacity = $validatedData['battery'];
        $post->soc = $validatedData['soc'];
        $post->gpu = $validatedData['gpu'];
        $post->cpu = $validatedData['cpu'];
        $post->ram = $validatedData['ram'];
        $post->storage = $validatedData['storage'];
        $post->operating_system = $validatedData['operating_system'];
        $post->ui = $validatedData['ui'];
        $post->no_of_rear_cameras = $validatedData['no_of_rear_cameras'];
        $post->rear_cameras = $validatedData['rear_cameras'];

        $post->rear_flash = $validatedData['rear_flash'];
        $post->no_of_front_cameras = $validatedData['no_of_front_cameras'];
        $post->front_camera = $validatedData['front_camera'];
        $post->meta_keywords = 'kjv';
        $post->save();



        // Handle Pros
        if ($request->has('pros')) {
            $pros = array_filter($request->input('pros')); // Remove empty values
            foreach ($pros as $pro) {
                Pro::create([
                    'product_id' => $post->id,
                    'pro' => $pro,
                ]);
            }
        }

        // Handle Cons
        if ($request->has('cons')) {
            $cons = array_filter($request->input('cons')); // Remove empty values
            foreach ($cons as $con) {
                Cons::create([
                    'product_id' => $post->id,
                    'con' => $con,
                ]);
            }
        }

        // Redirect or respond accordingly
        return redirect()->back()->with('success', 'Post created successfully.');
    }

    public function add_price_range(Request $request)
    {
        $validatedData = $request->validate([
            'price_range' => 'required',
        ]);

        $status = Pricelist::insert([
            'price' => $validatedData['price_range']
        ]);

        if ($status) {
            return redirect()->back()->with('status', 'Price Added Successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to Add Price');
        }
    }
    public function add_new_brand(Request $request)
    {
        $validatedData = $request->validate([
            'brand' => 'required',
        ]);

        $status = Brand::insert([
            'name' => $validatedData['brand']
        ]);

        if ($status) {
            return redirect()->back()->with('status', 'Brand Added Successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to Add Brand');
        }
    }

    public function user_footer()
    {
        $footer = Footer::get();
        return view('adminpages.footer', compact('footer'));
    }



    public function home_setting()
    {

        $welcomes = Welcome::firstOrFail();
        $welcome = $welcomes['welcome_section'];
        return view('adminpages.pages-settings.home-settings', compact('welcome'));
    }

    public function welcome_store(Request $request)
    {

        $welcome = Welcome::firstOrFail();

        if (!$welcome) {
            $welcome = new Welcome;
        }

        // Assign the footer text from the form input

        $welcome->welcome_section = $request->input('welcome_section');

        // Save the footer data to the database
        $welcome->save();

        return redirect()->back()->with('success', 'Welcome Section Updated Successfully');
    }


    public function store_footer(Request $request)
    {
        $footer = Footer::firstOrFail();


        if (!$footer) {
            $footer = new Footer;
        }

        // Assign the footer text from the form input
        $footer->data = $request->input('footerText');

        // Save the footer data to the database
        $footer->save();

        return redirect()->back()->with('success', 'Footer successfully updated');
    }

    public function getdevice(Request $request)
    {
        $firstProduct = $request->input('first_product');
        $secondProduct = $request->input('second_product');
    
        $query = Product::query()
            ->select('name', 'image_url', 'id')
            ->where('status', 'published'); // Add this line to filter by published status
    
        if ($firstProduct && $secondProduct) {
            $query->where(function ($q) use ($firstProduct, $secondProduct) {
                $q->whereRaw("LOWER(name) REGEXP ?", ["(^|\\s)" . strtolower($firstProduct)])
                    ->orWhereRaw("LOWER(name) REGEXP ?", ["(^|\\s)" . strtolower($secondProduct)]);
            });
        } elseif ($firstProduct) {
            $query->whereRaw("LOWER(name) REGEXP ?", ["(^|\\s)" . strtolower($firstProduct)]);
        } elseif ($secondProduct) {
            $query->whereRaw("LOWER(name) REGEXP ?", ["(^|\\s)" . strtolower($secondProduct)]);
        }
    
        $devices = $query->get();
    
        return ['message' => 'success', 'data' => $devices];
    }
    



    public function compare_data(Request $request)
    {
        $product1 = Product::where('id', $request->input('firstProductId'))
            ->with(['brand', 'model', 'features', 'pros', 'cons'])
            ->firstOrFail();

        $product2 = Product::where('id', $request->input('secondProductId'))
            ->with(['brand', 'model', 'features', 'pros', 'cons'])
            ->firstOrFail();

        // Render the entire view
        $view = View::make('user.comparison', compact('product1', 'product2'));

        // Find the specific div content by using DOM manipulation or Regex
        $htmlContent = $view->render();

        // Extract the specific div content (example using simple DOM manipulation)
        $comparisonContainer = $this->extractComparisonContainer($htmlContent);

        // Prepare data to send back
        $data = [
            'comparison_html' => $comparisonContainer,
        ];

        return $data;
    }

    // Function to extract specific HTML content using DOM manipulation
    private function extractComparisonContainer($htmlContent)
    {
        $doc = new \DOMDocument();
        libxml_use_internal_errors(true); // Disable warnings

        if ($doc->loadHTML($htmlContent)) {
            // Find and return the content of the #comparisonContainer
            $container = $doc->getElementById('comparisonContainer');

            if ($container) {
                return $doc->saveHTML($container);
            }
        }

        // Log any parsing errors
        foreach (libxml_get_errors() as $error) {
            Log::error('DOM Parsing Error: ' . $error->message);
        }
        libxml_clear_errors();

        return ''; // Handle case where #comparisonContainer is not found or loading fails
    }

    public function index_post()
    {
        $items = Product::select('name', 'price', 'slug', 'id', 'image_url','status')->get();
        return view('adminpages.item.index', compact('items'));
    }
    public function edit_post($id)
    {

        // Fetch product with its features, brand, and model
        $products = Product::where('id', $id)
            ->with(['brand', 'model', 'features', 'pros', 'cons'])
            ->firstOrFail();

        $brands = Brand::get();

        // Fetch features for the product
        $features = Product_feature::with('feature')
            ->where('product_id', $products->id)
            ->get();

        return view('adminpages.item.edit', compact('products', 'features', 'brands'));
    }
    public function update_post(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Define the fields you want to check and update
        $fieldsToUpdate = [
            'name',
            'image_url',
            'image_alt',
            'slug',
            'meta_title',
            'meta_description',
            'meta_keywords',
            'review_section',
            'overview_section',
            'price',
            'release_date',
            'launched_in_pakistan',
            'dimensions',
            'weight',
            'sim_type',
            'colours',
            'model_id',
            'brand_id',
            'soc',
            'gpu',
            'cpu',
            'ram',
            'storage',
            'screen_size',
            'type',
            'resolution',
            'pixel_density',
            'refresh_rate',
            'quality',
            'glass_protection',
            'display_colours',
            'operating_system',
            'ui',
            'no_of_rear_cameras',
            'rear_cameras',
            'rear_flash',
            'periscope',
            'no_of_front_cameras',
            'front_camera',
            'battery_capacity',
            'accelerometer',
            'gyroscope',
            'compass',
            'fingerprint',
            'bluetooth',
            'wifi',
            'nfc',
            '_2g',
            '_3g',
            '_4g',
            '_5g',
            'status',
        ];


        // Iterate through each field and update only if the value has changed
        foreach ($fieldsToUpdate as $field) {
            if ($request->has($field) && $request->input($field) !== $product->$field) {
                $product->$field = $request->input($field);
            }
        }

        // Update or create pros
        $pros = $request->input('pros', []);
        foreach ($pros as $proId => $proData) {
            if (isset($proData['id']) && is_numeric($proData['id'])) {
                // Update existing pro if its ID exists and is numeric
                $existingPro = $product->pros()->where('id', $proData['id'])->first();
                if ($existingPro) {
                    if ($existingPro->pro !== $proData['name']) {
                        $existingPro->update(['pro' => $proData['name']]);
                    }
                }
            } else {
                // Create a new pro if ID is not numeric (indicating it's a new pro)
                $product->pros()->create(['pro' => $proData['name']]);
            }
        }

        // Update or create cons
        $cons = $request->input('cons', []);
        foreach ($cons as $conId => $conData) {
            if (isset($conData['id']) && is_numeric($conData['id'])) {
                // Update existing con if its ID exists and is numeric
                $existingCon = $product->cons()->where('id', $conData['id'])->first();
                if ($existingCon) {
                    if ($existingCon->con !== $conData['name']) {
                        $existingCon->update(['con' => $conData['name']]);
                    }
                }
            } else {
                // Create a new con if ID is not numeric (indicating it's a new con)
                $product->cons()->create(['con' => $conData['name']]);
            }
        }

        // Save the product with updated pros and cons
        $product->save();

        return redirect()->back()->with('success', 'Product updated successfully');
    }



    public function delete_post($id)
    {
        $product = Product::find($id);
        $status = $product->delete();
        if ($status) {
            return redirect()->back()->with('success', 'Product deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Product could not be deleted');
        }
    }

    public function delete_pro(Pro $pro)
    {

        try {
            // Perform deletion logic
            $pro->delete();

            // Return response with success true
            return response()->json(['success' => true, 'message' => 'Pro deleted successfully']);
        } catch (\Exception $e) {
            // Handle error and return response with success false
            return response()->json(['success' => false, 'message' => 'Failed to delete pro'], 500);
        }
    }
    public function delete_con(Cons $con)
    {

        try {
            // Perform deletion logic
            $con->delete();

            // Return response with success true
            return response()->json(['success' => true, 'message' => 'Con deleted successfully']);
        } catch (\Exception $e) {
            // Handle error and return response with success false
            return response()->json(['success' => false, 'message' => 'Failed to delete Con'], 500);
        }
    }
}

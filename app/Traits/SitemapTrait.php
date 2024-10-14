<?php
namespace App\Traits;

use App\Models\Category;
use App\Models\Portfolio;
use App\Models\Product;
use App\Models\Post;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;

trait SitemapTrait
{
    /**
     * Create sitemap function
     * @return void
     */
    public function sitemap()
    {
        $categories = Category::all();
        $products = Product::all();
        $posts = Post::all();
        $portfolios = Portfolio::all();
        $services = Service::all();

        $xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
        $xml .= "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\" xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\"\n";
        $xml .= "xsi:schemaLocation=\"http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd\">\n";
        $xml .= "\n";
        $xml .= "<!---Pages-->";
        $xml .= "\n";
        $xml .= "\t<url> \n";
        $xml .= "\t\t<loc>".url('/')."</loc>\n";
        $xml .= "\t</url> \n";
        $xml .= "\t<url> \n";
        $xml .= "\t\t<loc>".route('website-cost-calculator')."</loc>\n";
        $xml .= "\t</url> \n";
        $xml .= "\t<url> \n";
        $xml .= "\t\t<loc>".route('solutions')."</loc>\n";
        $xml .= "\t</url> \n";
        if($services->count()){
            $xml .= "\n";
            $xml .= "<!---Services-->";
            $xml .= "\n";
            foreach ($services as $service){
                $xml .= "\t<url> \n";
                $xml .= "\t\t<loc>".url('/'.$service->url)."</loc>\n";
                $xml .= "\t</url> \n";
            }
        }
        if($categories->count()){
            $xml .= "\n";
            $xml .= "<!---Categories-->";
            $xml .= "\n";
            foreach ($categories as $category){
                $xml .= "\t<url> \n";
                $xml .= "\t\t<loc>".url('/'.$category->url)."</loc>\n";
                $xml .= "\t</url> \n";
            }
        }
        if($products->count()){
            $xml .= "\n";
            $xml .= "<!---Products-->";
            $xml .= "\n";
            foreach ($products as $product) {
                $xml .= "\t<url> \n";
                $xml .= "\t\t<loc>".url('/'. $product->url)."</loc>\n";
                $xml .= "\t</url> \n";
            }
        }
        if($posts->count()){
            $xml .= "\n";
            $xml .= "<!--- Posts -->";
            $xml .= "\n";
            foreach ($posts as $post){
                if($post->published){
                    $xml .= "\t<url> \n";
                    $xml .= "\t\t<loc>".route('single', $post->url)."</loc>\n";
                    $xml .= "\t</url> \n";
                }
            }
        }
        if($portfolios->count()){
            $xml .= "\n";
            $xml .= "<!--- Portfolio -->";
            $xml .= "\n";
            foreach ($portfolios as $portfolio){
                $xml .= "\t<url> \n";
                $xml .= "\t\t<loc>".url('/'. $portfolio->url)."</loc>\n";
                $xml .= "\t</url> \n";
            }
        }


        $xml .= "</urlset>";

        if(Storage::disk('public')->exists('sitemap.xml')){
            Storage::disk('public')->delete('sitemap.xml');
        }

        Storage::disk('public')->put('sitemap.xml', $xml);
    }

}

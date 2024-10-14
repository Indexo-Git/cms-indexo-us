<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;
use GuzzleHttp\Client;

class WebsiteController extends Controller
{
    /**
     * Show website index.
     * @return View
     */
    public function welcome(): View
    {
        return view('welcome');
    }

    /**
     * Show website index.
     * @return View
     */
    public function index(): View
    {
        return view('web.index')->with([
            'metaTitle' => 'New Colorado Web Agency | Innovative Web Design & Digital Marketing',
            'description' => 'indexo, a Colorado based web agency specialized in custom web design, website development and digital marketing consulting. ',
            'keywords' => 'web agency colorado, web design companies in colorado, marketing agency, web design agencies, digital marketing agency, top web development companies',
            'metaImage' => asset('web/images/meta/meta-indexo-us.jpg'),
            'schema' => 1,
            'noIndex' => false
        ]);
    }

    /**
     * Show about page.
     * @return View
     */
    public function about(): View
    {
        return view('web.about')->with([
            'title' => 'About indexo',
            'metaTitle' => 'About us | indexo',
            'description' => 'Discover the indexo agency. Learn about our history, philosophy, and commitment to providing quality integrated digital solutions.',
            'keywords' => 'US Web Development,Custom Web Solutions,Team of Development Experts,Web Design Experience,Commitment to Online Success,indexo Values',
            'metaImage' => asset('web/images/meta/meta-default.jpg'),
            'schema' => 1,
            'noIndex' => false
        ]);
    }

    /**
     * Show contact page.
     * @return View
     */
    public function contact(): View
    {
        return view('web.contact')->with([
            'title' => 'Contact',
            'metaTitle' => 'Contact | indexo',
            'description' => 'Ready to take your company or project to the next digital level? Discover our tailor-made web solutions designed just for you.',
            'keywords' => 'SEO agency, search engine optimization, online marketing, internet marketing, web analytics, content marketing, conversion rate optimization, lead generation, website optimization, marketing strategy, keyword research, building links, online presence, organic traffic, search ranking, campaign management, data analysis, website audit, web development, call tracking',
            'metaImage' => 'meta-contact.jpg',
            'schema' => 1,
            'noIndex' => false
        ]);
    }

    /**
     * Show Terms & Conditions page.
     * @return View
     */
    public function termsConditions(): View
    {
        return view('web.termsConditions')->with([
            'title' => 'Terms & Conditions',
            'metaTitle' => 'Terms & Conditions | indexo',
            'description' => 'Consult our terms & conditions.',
            'keywords' => '',
            'metaImage' => asset('web/images/meta/meta-default.jpg'),
            'schema' => 1,
            'noIndex' => true
        ]);
    }

    /**
     * Show privacy policy page.
     * @return View
     */
    public function privacy(): View
    {
        return view('web.privacy')->with([
            'title' => 'Privacy Policy',
            'metaTitle' => 'Privacy Policy | indexo',
            'description' => 'Discover how we protect your personal information and guarantee your privacy at indexo. Our privacy policy gives you transparency and confidence in the handling of your personal data.',
            'keywords' => '',
            'metaImage' => asset('web/images/meta/meta-default.jpg'),
            'schema' => 1,
            'noIndex' => true
        ]);
    }

    /**
     * Show privacy policy page.
     * @return View
     */
    public function sitemap(): View
    {
        return view('web.sitemap')->with([
            'title' => 'Sitemap',
            'metaTitle' => 'Sitemap | indexo',
            'description' => 'Find an overview of our website and easily navigate through our pages and services. Explore our sitemap here.',
            'keywords' => '',
            'metaImage' => asset('web/images/meta/meta-default.jpg'),
            'schema' => 1,
            'noIndex' => true,
            'posts' => Post::all()
        ]);
    }

    public function neighborhoodOffer(): View
    {
        return view('web.pages.neighborhood-offer')->with([
            'title' => 'Exclusive Neighborhood Offer!',
            'metaTitle' => 'Exclusive Neighborhood Offer! | indexo',
            'description' => 'Are you a local business owner looking to establish a strong online presence? Take advantage of this limited-time offer to get a professionally designed website at a fraction of the cost.',
            'keywords' => '',
            'metaImage' => asset('web/images/meta/meta-default.jpg'),
            'schema' => 1,
            'noIndex' => true,
            'posts' => Post::all()
        ]);
    }

    public function cardJesus(): View
    {
        return view('web.cards.jesus');
    }

}

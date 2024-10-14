<?php

namespace App\Http\Controllers;

use App\Mail\Solutions;
use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;

class LandingController extends Controller
{
    public array $answers = array(
        '01-01' => "You need an <strong>entirely custom-made</strong> online store. If you've already gotten quotes from other agencies, they might offer you a generic platform like <em>WordPress</em>, <em>Wix</em>, or <em>Shopify</em>.<br /><br />These tools are functional, yes, but generic. We adapt <strong>any specific functionality</strong> in code to facilitate the management of your project or business.",
        '01-02' => "We want your site to be an effective conversion tool with <strong>tangible proof</strong> of this. We aim to deliver a site focused on capturing and converting visitors into <strong>potential clients</strong>, and this product is currently our star offering.",
        '01-03' => "Any information you wish to display, we will work on together to ensure your content is valuable and educational for your visitors, providing a great user experience and ensuring that they <strong>do not leave your site without the information they came for.</strong>",
        '01-04' => "Let's collaborate to design a site that fosters user interaction and engagement. By <strong>optimizing information and interactions</strong>, we'll create a space where your community can grow and thrive, personalizing their experience to the needs of your idea or project.",
        '02-01' => "We aim to align your <strong>business priorities with your budget</strong>, generating justifiable costs that enable us to deliver the highest quality work while avoiding <strong>unnecessary development expenses</strong>.",
        '02-02' => "If you commit to delivering information and feedback by the established dates, we <strong>guarantee</strong> to deliver your website in record time.",
        '02-03' => "We like to emphasize that we will maintain <strong>constant and transparent communication</strong> with you throughout the development process, ensuring you are informed and satisfied at every stage. Any absence on your part will be seriously reflected in the results.",
        '02-04' => "Our website offers an up-to-date portfolio with ALL our most <strong>recent creations</strong>.",
        '03-01' => "<span class=\"text-primary\">Our indexo Promise</span>: If you're not satisfied with your site, chances are we won't be either. And if we fall short of our agreed terms, <strong>your site will be rebuilt</strong>, no questions asked. It's that simple.",
        '03-02' => "As per Daddy Google's standards, a website that takes <strong>longer than 3 seconds to load is considered slow</strong>. Therefore, we guarantee loading times that meet or exceed the benchmarks of any speed test available.",
        '03-03' => "We include basic <strong>SEO optimization</strong> in every project, working on your metadata and guaranteeing indexing in search results.",
        '03-04' => "We provide monitoring tools and <strong>detailed reports</strong> so you can see the performance of your website in <strong>real time</strong> and make informed decisions based on accurate data.",
        '04-01' => "Our <strong>continuous support</strong> ensures your website works perfectly and we are available 24/7.",
        '04-02' => "<strong>Even the internet gets dusty</strong>. When your site needs any updates or fixes, we will be there before you even notice.",
        '04-03' => "<strong>Your business's growth should be reflected in the scalability of your website</strong>. When we build your website, there will be no ‘buts’ for any type of limitations on expansion or modifications.",
        '04-04' => "We get it, you love being in the driver's seat! But trust us, you'll enjoy our company on this journey. We'll be <strong>right by your side</strong>, helping you navigate and fine-tune your website for total peace of mind.",
    );

    /**
     * Show landing page
     * @return View
     */
    public function solutions(): View
    {
        return view('web.landing.solutions')->with([
            'metaTitle' => 'Digital Solutions that Prioritize Your Needs | indexo',
            'description' => 'Discover how indexo can prioritize your needs and showcase their skills in programming and design.',
            'keywords' => 'integrated digital solutions, personalized test, web development, programming and design, digital agency, client priorities, programming skills, digital marketing strategies, digital experiences, client needs',
            'metaImage' => asset('web/images/meta/meta-indexo-us.jpg'),
            'schema' => 1,
            'noIndex' => false,
            'answers' => $this->answers
        ]);
    }


    /**
     * Save solutions response
     * @param Request $request
     * @return mixed
     */
    public function sendSolutions(Request $request): mixed
    {
        $email = $request->input('email', null); // Default to null if not provided
        $selectedValues = $request->input('selectedValues', []); // Assuming answers are sent as an array
        if($email){
            Mail::to($email)->send(new Solutions($this->answers, $selectedValues));
        }
        $response = new Response();
        $response->email = $email;
        $response->answers = json_encode($selectedValues); // Convert array to JSON string if not using a JSON column
        $response->save();

        return response()->json(['success' => true, 'message' => 'Response recorded successfully']);
    }


    public function previewEmail()
    {
        $selectedValues = ["01-01","02-02","03-03","04-04"];
        //Mail::to('jesus.vergara.cortes@gmail.com')->send(new Solutions($this->answers, $selectedValues));

        return view('emails.landing.index')->with([
            'answers' => $this->answers,
            'selectedValues' => $selectedValues
        ]);
    }
}

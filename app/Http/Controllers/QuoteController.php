<?php

namespace App\Http\Controllers;

use App\Mail\WebDesignQuoteMail;
use App\Models\WebDesignQuote;
use App\Traits\reCaptchaTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Validator;

class QuoteController extends Controller
{
    use reCaptchaTrait;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['webDesign', 'showWebDesign']);
    }

    public function index(){
        return view('app.quote.index')->with([
            'title' => 'quotes.title',
            'quotes' => WebDesignQuote::all()
        ]);
    }

    /**
     * Show quote web design page.
     * @return View
     */
    public function webDesign(): View
    {
        return view('web.quotes.web-design')->with([
            'title' => 'Website Cost Calculator',
            'metaTitle' => 'Website Cost Calculator | indexo',
            'description' => 'How much does a custom website cost? Get a free quote with our website cost calculator',
            'keywords' => 'Website Quoter, Web Development Quote, Web Design Price, Website Calculator, Web Development Cost, Calculate Your Website Price, Web Cost Estimator, Website Quote Tool, Calculate Your Project website, Estimated price of web development, Approximate cost of web design, Website budget calculator.',
            'metaImage' => 'meta-web-design-quote.jpg',
            'schema' => 1,
            'noIndex' => false
        ]);
    }

    /**
     * Handle web design quote request
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function sendWebDesign(Request $request): RedirectResponse
    {
        $validator = $this->validateWebQuote($request->all());
        if($validator->fails()){
            return redirect(url()->previous() .'#quote-container')->withErrors($validator)->withInput();
        }
        $this->validateCaptcha($request->input('g-token'));
        $webDesignQuote = new WebDesignQuote();
        $webDesignQuote->email = $request->input('email');
        $webDesignQuote->pages = $request->input('pages');
        $webDesignQuote->content = $request->input('content');
        $webDesignQuote->forms = $request->input('forms');
        $webDesignQuote->seo = $request->input('seo');
        $webDesignQuote->e_commerce = $request->has('e-commerce');
        $webDesignQuote->invoice = $request->has('invoice');
        $webDesignQuote->total = $request->input('total');
        if($webDesignQuote->save()){
            Mail::to($request->input('email'))->send(new WebDesignQuoteMail($webDesignQuote->id, $webDesignQuote->email));
            return redirect(url()->previous() .'#quote-container')->with('message', 'The quote has been successfully sent to the email '. $request->input('email'));
        }
        return redirect(url()->previous() .'#quote-container')->with('error' , 'An error occurred when submitting the quote, please try again.')->withInput();
    }

    /**
     * @param int $id
     * @param string $email
     * @return RedirectResponse|View
     */
    public function showWebDesign(int $id,string $email): View|RedirectResponse
    {
        $quote = WebDesignQuote::where('id', $id)->where('email', $email)->first();
        if($quote){
            $quote->views++;
            $quote->save();
            return view('app.quote.print')->with([
                'quote' => $quote
            ]);
        }
        return redirect()->route('index');
    }

    /**
     * @param array $data
     * @return mixed
     */
    protected function validateWebQuote(array $data): mixed
    {
        return Validator::make($data, [
            'email' => 'required|email|max:255',
            'pages' => 'required|integer',
            'content' => 'required|integer',
            'forms' => 'required|integer',
            'seo' => 'required|integer',
            'total' => 'required|integer',
            'g-token' => 'required'
        ]);
    }
}

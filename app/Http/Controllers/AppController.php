<?php namespace App\Http\Controllers;

use Request;
use App\Http\Requests\ProcessFormRequest;
use App\Http\Requests\SingleViewRequest;
use GuzzleHttp\Client;
use GuzzleHttp\Subscriber\History;

class AppController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Welcome Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders the "marketing page" for the application and
    | is configured to only allow guests. Like most of the other sample
    | controllers, you are free to modify or remove it as you desire.
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
    }

    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function index()
    {
        return view('index');
    }

    public function process(ProcessFormRequest $request) 
    {
        $url = $request->getInputUrl();

        $redirectUrl = \URL::action('AppController@view') . "?" . SingleViewRequest::generateQueryString($url);

        return \Redirect::to(L10n::getLocalizedURL($redirectUrl));
    }

    public function view(SingleViewRequest $request)
    {
        $url = $request->getInputUrl();

        $client = new Client;
        $history = new History;

        $client->getEmitter()->attach($history);

        $response = $client->get($url);

        $data = [
            'effectiveUrl' => false,
        ];
        $data['inputUrl'] = $url;
        $data['effectiveUrl'] = $response->getEffectiveUrl();
        $data['history'] = [];
        foreach($history as $transaction)
        {
            $item = [
                'url' => $transaction['response']->getEffectiveUrl(),
                'header' => $transaction['response']->getHeaders(), 
                'statusCode' => $transaction['response']->getStatusCode(),
            ];
            
            $data['history'][] = $item;
        }

        return view('view', $data);
    }

}

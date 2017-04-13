<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Urls;
class UrlsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $urls = Urls::all();
        return response()->json($urls);
    }

    /**
     * Get the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $url = Urls::where('id', $id)->get();
        if(!empty($url['items'])){
            return response()->json($url);
        }
        else{
            return response()->json(['status' => 'fail']);
        }
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
        $this->validate($request, [
        'mobile_url' => 'required',
        'desktop_url' => 'required'
         ]);

        $url = new Urls();
        $url->mobile_url = $request->mobile_url;
        $url->desktop_url = $request->desktop_url;
        $short_url = $url->short_url = $url->getShortUrl();
        $url->save();
        
        return response()->json(['success'=>true, 'url'=>$short_url]);

    }

    public function create(Request $request)
        {
            $this->validate($request, [
                'url'=>'required|url',
            ]);
            $shortUrl = new ShortUrl();
            $shortUrl->long_url = $request->get('url');
            $shortUrl->save();
            return response()->json(['success'=>true, 'url'=>$shortUrl->getShortUrl()]);
        }



      public function redirect($code)
        {
            $shortUrl = ShortUrl::findByCode($code)[0];
            return redirect($shortUrl->long_url);
        }


    public function generate_short_url()
    {
      return 'NXYz';
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
        $this->validate($request, [
        'mobile_url' => 'required|url',
        'desktop_url' => 'required|url'
         ]);

        $url = Urls::find($id);
        $url->mobile_url = $request->mobile_url;
        $url->desktop_url = $request->desktop_url;
        $url->save();
        return response()->json(['status' => 'success']);
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
        if(Urls::destroy($id)){
             return response()->json(['status' => 'success']);
        }
    }
}

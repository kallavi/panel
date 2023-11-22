<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\URL;

class LanguageController extends Controller
{
    protected $previousRequest;
    protected $local;

    public function switch($locale,$local)
    {
     
        $this->previousRequest = $this->getPreviousRequest();
        $this->local = $local;


        // Store the segments of the last request as an array
        $segments = $this->previousRequest->segments();

        // Check if the first segment matches a language code
        if (in_array($this->local, app('translatable.locales')->all())) {

            // Replace the first segment by the new language code
            $segments[0] = $this->local;
            $newRoute = $this->translateRouteSegments($segments);
 
            // Redirect to the required URL
            return redirect()->to($this->buildNewRoute($newRoute));
        }
        return back();
    }

    protected function getPreviousRequest()
    {



        // We Transform the URL on which the user was into a Request instance
        return request()->create(url()->previous());
    }


    // Route Translations

    protected function translateRouteSegments($segments)
    {
        $translatedSegments = collect();


        // $base = url()->to('');
        // $path = str_replace($base, '', URL::current());
        // $split_path=explode('/',$path);

        foreach ($segments as $segment) {

            if ($key = array_search($segment, Lang::get('routes', [], request()->segment(1)))) {
                // The segment exists in the translations, so we will grab the translated version.
                $translatedSegments->push(trans('routes.' . $key, [], request()->segment(3)));
            } else {
                // Otherwise we simply reuse the same.
                $translatedSegments->push($segment);
            }
        }
        return $translatedSegments;
    }






    protected function buildNewRoute($newRoute)
    {
        $redirectUrl = implode('/', $newRoute->toArray());

        // Get Query Parameters if any, so they are preserved
        $queryBag = $this->previousRequest->query();
        $redirectUrl .= count($queryBag) ? '?' . http_build_query($queryBag) : '';
        return $redirectUrl;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Src\DarkSky;
use Carbon\Carbon;
use App\Transformers\DarkskyInterface as DarkskyTransformerInterface;

class WeatherController extends Controller
{

    private $darkSky;
    private $darkskyTransformer;

    /**
     * WeatherController constructor.
     * @param DarkSky $darkSky
     * @param DarkskyTransformerInterface $darkSkyTransformer
     */
    public function __construct(DarkSky $darkSky, DarkskyTransformerInterface $darkSkyTransformer)
    {
        $this->darkSky = $darkSky;
        $this->darkskyTransformer = $darkSkyTransformer;
    }

    /**
     * @param $lat
     * @param $long
     * @param $date
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($lat, $long, $date)
    {
        $this->darkSky->location($lat, $long);
        $this->darkSky->atTime(Carbon::now()->addDays($date)->getTimestamp());
        $this->darkSky->excludes(['currently', 'minutely', 'hourly', 'flags']);
        $response = $this->darkSky->get();
        $response = $this->darkskyTransformer->onlyImportant($response);

        return response()->json($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

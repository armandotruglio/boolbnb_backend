<?php

namespace App\Http\Controllers\Admin;

use App\Functions\Address;
use App\Models\Property;
use App\Models\Service;
use App\Models\Sponsorship;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use App\Models\Message;
use App\Models\View;

use function Laravel\Prompts\error;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Property::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
        return view('admin.properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $property = new Property();
        $services = Service::all();
        $sponsorships = Sponsorship::all();
        return view("admin.properties.create", compact("property", "services", "sponsorships"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePropertyRequest $request)
    {
        $formData = $request->validated();

        $formData["user_id"] = Auth::user()->id;

        $query = Address::encodeQueryAddress($formData["address"]);

        $result = json_decode(Address::buildApi($query));

        $formData["latitude"] = $result->results['0']->position->lat;
        $formData["longitude"] = $result->results['0']->position->lon;

        $filePath = Storage::disk("public")->put("img/properties/", $request->thumb_url);
        $formData["thumb_url"] = $filePath;


        $property = Property::create($formData);

        if (isset($formData["services"])) {
            $property->services()->sync($formData["services"]);
        } else {
            $property->services()->detach();
        }

        if (isset($formData["sponsorships"])) {
            $property->sponsorships()->sync($formData["sponsorships"]);
        } else {
            $property->sponsorships()->detach();
        }


        return redirect()->route("admin.properties.index")
            ->with('message', "Project $property->title has been created successfully!")
            ->with('alert-class', "success");
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        if (Auth::user()->id == $property->user_id) {
            return view('admin.properties.show', compact('property'));
        }
        return abort('403');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        if (Auth::user()->id == $property->user_id) {
            $services = Service::all();
            $sponsorships = Sponsorship::all();
            return view("admin.properties.edit", compact("property", "services", "sponsorships"));
        }
        return abort('401');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePropertyRequest $request, Property $property)
    {

        if (!isset($request->request->all()["is_visible"])) {
            $is_visible = false;
        } else {
            $is_visible = true;
        }

        $data = $request->validated();

        if (!$is_visible) {
            $data["is_visible"] = 0;
        }

        $query = Address::encodeQueryAddress($data["address"]);

        $result = json_decode(Address::buildApi($query));

        $data["latitude"] = $result->results['0']->position->lat;
        $data["longitude"] = $result->results['0']->position->lon;


        if ($request->hasFile("thumb_url")) {
            if ($property->thumb_url) {
                Storage::disk("public")->delete($property->thumb_url);
            }

            $filePath = Storage::disk("public")->put("img/properties/", $request->thumb_url);
            $data["thumb_url"] = $filePath;
        }

        $property->update($data);

        if (isset($data["services"])) {
            $property->services()->sync($data["services"]);
        } else {
            $property->services()->detach();
        }


        if (isset($data["sponsorships"])) {
            $property->sponsorships()->sync($data["sponsorships"]);
        } else {
            $property->sponsorships()->detach();
        }



        return redirect()->route("admin.properties.index")
            ->with('message', "Project $property->title has been updated successfully!")
            ->with('alert-class', "primary");;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('admin.properties.index')
            ->with('success', 'Property deleted succesfully')
            ->with('alert-class', "danger");;
    }

    /*public function propertyStatistics($id)
    {
        $views = View::where('property_id',$id)->get();
        $messages = Message::where('property_id',$id)->get();


        return view('admin.statistics.index', compact('views','messages'));
    }*/

    public function propertyStatistics($id)
    {
        // Query messages grouped by month
        $messagesByMonth = Message::where('property_id', $id)
            ->selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(*) as total')
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get();

        // Format the data for the chart
        $messagesLabels = $messagesByMonth->pluck('month'); // Extract months
        $messagesData = $messagesByMonth->pluck('total'); // Extract counts

        // Query views grouped by month
        $viewsByMonth = View::where('property_id', $id)
            ->selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(*) as total')
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get();

        // Format the data for the chart
        $viewsLabels = $viewsByMonth->pluck('month'); // Extract months
        $viewsData = $viewsByMonth->pluck('total'); // Extract counts

     // Query messages grouped by year
     $messagesByYear = Message::where('property_id', $id)
     ->selectRaw('YEAR(created_at) as year, COUNT(*) as total')
     ->groupBy('year')
     ->orderBy('year', 'asc')
     ->get();

    // Format the data for the chart (yearly data)
    $messagesYearLabels = $messagesByYear->pluck('year'); // Extract years
    $messagesYearData = $messagesByYear->pluck('total'); // Extract counts

    // Query views grouped by year
    $viewsByYear = View::where('property_id', $id)
        ->selectRaw('YEAR(created_at) as year, COUNT(*) as total')
        ->groupBy('year')
        ->orderBy('year', 'asc')
        ->get();

    // Format the data for the chart (yearly data)
    $viewsYearLabels = $viewsByYear->pluck('year'); // Extract years
    $viewsYearData = $viewsByYear->pluck('total'); // Extract counts

    $property = Property::find($id);

    return view('admin.statistics.index', compact(
        'messagesLabels', 'messagesData',
        'viewsLabels', 'viewsData',
        'messagesYearLabels', 'messagesYearData',
        'viewsYearLabels', 'viewsYearData',
        'property'
    ));
    }
}

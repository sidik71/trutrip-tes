<?php

namespace App\Http\Controllers\Api\Trip;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trip\TripList;
use App\Models\User;
use Validator;

class TripListController extends Controller
{
    /**
     * Display a listing of the resource.
    */
    public function index(Request $request) 
    {
        if (isset(auth()->user()->id)) {
            $userLoginId = auth()->user()->id;
            $searchValue = isset($request->search) ? $request->search : null;
            $limit = isset($request->limit) ? $request->limit : config('trip-page.default-limit');
            $paginate = config('trip-page.default-paginate');
            if (is_null($searchValue)) {
                $triplist = TripList::select('title','origin','destination','start_date','end_date','status','description')->where('user_id', $userLoginId)->orderBy('start_date','desc')->paginate($limit);
            } else {
                $triplist = TripList::select('title','origin','destination','start_date','end_date','status','description')->where(function ($query) use ($searchValue, $userLoginId) {
                                $query->where('user_id', $userLoginId)
                                        ->where('title', 'like', '%' . $searchValue . '%')
                                        ->orWhere('origin', 'like', '%' . $searchValue . '%')
                                        ->orWhere('destination', 'like', '%' . $searchValue . '%')
                                        ->orWhere('start_date', 'like', '%' . $searchValue . '%')
                                        ->orWhere('end_date', 'like', '%' . $searchValue . '%')
                                        ->orWhere('status', 'like', '%' . $searchValue . '%')
                                        ->orWhere('description', 'like', '%' . $searchValue . '%');
                            })
                            ->orderBy('start_date','desc')->paginate($limit);
            }
            
            if ($triplist->isNotEmpty()) {
                $triplist->getCollection()->transform(function ($item) {
                    $item->schedule = date('d F Y', strtotime($item->start_date)) . " - ". date('d F Y', strtotime($item->end_date));
                    return $item;
                });

                return response()->json([
                    'status' => true,
                    'message' => 'Here go yours schedule trip',
                    'data' => $triplist
                ],200);
            }
        } 

        return response()->json([
            'status' => false,
            'message' => 'Sorry, your trip not found'
        ], 404);
    }

    /**
     * Store a newly created resource in storage.
    */
    public function store(Request $request) 
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'origin' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $data = $request->all();
        $data['user_id'] = auth()->user()->id ?? 11;
        $triplist = TripList::create($data);
        $triplist->schedule = date('d F Y', strtotime($triplist->start_date)) . " - ". date('d F Y', strtotime($triplist->end_date));

        return response()->json($triplist, 201);
    }

    /**
     * Display the specified resource.
    */
    public function show($id) 
    {
        $triplist = TripList::where('id', $id)->first();
        
        if ($triplist) {
            $triplist->schedule = date('d F Y', strtotime($triplist->start_date)) . " - ". date('d F Y', strtotime($triplist->end_date));
            return response()->json([
                'status' => true,
                'message' => 'Your trip detail',
                'data' => $triplist
            ],200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Sorry, your trip not found'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
    */
    public function update(Request $request, $id) 
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'origin' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $triplist = TripList::find($id);

        if (!$triplist) {
            return response()->json(['message' => 'Sorry, your trip not found'], 404);
        }

        $triplist->update($request->all());
        $triplist->schedule = date('d F Y', strtotime($triplist->start_date)) . " - ". date('d F Y', strtotime($triplist->end_date));

        return response()->json($triplist);
    }

    /**
     * Remove the specified resource from storage.
    */
    public function destroy($id) 
    {
        $triplist = TripList::find($id);

        if (!$triplist) {
            return response()->json(['message' => 'Sorry, your trip not found'], 404);
        }

        $triplist->delete();

        return response()->json(['message' => 'Your trip deleted']);
    }
}

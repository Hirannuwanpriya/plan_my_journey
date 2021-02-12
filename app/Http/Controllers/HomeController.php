<?php

namespace App\Http\Controllers;

use App\Models\Journey;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();

        $journeys = (new Journey())
            ->where('uid', $user->id)
            ->orderBy('created_at', 'DESC')
            ->limit(5)
            ->get();

        return view('home', [
            'user' => $user,
            'journeys' => $journeys
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function myWallet()
    {

        return view('pages.my_wallet');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function myRouts()
    {

        $user = auth()->user();

        $journeys = (new Journey())
            ->where('uid', $user->id)
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('pages.my_routs', [
            'journeys' => $journeys
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @param int $journey_id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function viewRout(int $journey_id)
    {

        $user = auth()->user();

        $journeys = (new Journey())
            ->where('tid', 1)
            ->get();

        return view('pages.view_rout', [
            'journeys' => $journeys
        ]);
    }
}

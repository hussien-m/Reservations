<?php

namespace App\Http\Controllers;

use App\Exceptions\ErrorStartDate;
use App\Http\Requests\AddSessionRequest;
use App\Models\Reservation;
use App\Models\Sessions;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\throwException;

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
        $reservations = Reservation::with('session')->where('user_id',Auth::user()->id)->latest('end_date')->get();
        return view('home',compact('reservations'));
    }

    public function create()
    {
        $data['sessions'] = Sessions::get();
        return view('create',$data);
    }

    public function store(AddSessionRequest $request)
    {
        $data = $request->except('_token');

        $data['user_id'] = Auth::user()->id;

        try{
            
            Reservation::create($data);

            session()->flash('success','تم اضافة الجسلة بنجاح');

            return back()->withInput();

        } catch(QueryException $e){
            session()->flash('info','هذا التاريخ محجوز');
            return back()->withInput();
        }

    }


}

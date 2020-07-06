<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repositories\EventRepository;
use App\User;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class EventController extends Controller
{
    private $eventRepository;

    public function __construct(EventRepository $event_repository)
    {
        $this->eventRepository = $event_repository;
    }

    /**
     * My events.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        // Online users counter.
        $this->updateCounter();

        return view('user.layout.my_events', [
            'events' => $this->eventRepository->getUserMotherEvents(Auth::user()),

            'online' => User::where('updated_at', '>', Carbon::now()->subMinutes(5))->get(),

            'groups' => Auth::user()->groups->where('parent_group_id', null),
        ]);
    }

    public function create()
    {

    }

    /**
     * Refresh updated_at for authenticated user.
     */
    private function updateCounter()
    {
        $user             = Auth::user();
        $user->updated_at = Carbon::now('europe/prague');
        $user->save();

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\MedicalEquipment;
use App\Models\Room;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('dashboard', [
            'buildingCount' => Building::count(),
            'roomCount' => Room::count(),
            'activeRoomCount' => Room::where('is_active', true)->count(),
            'equipmentCount' => MedicalEquipment::count(),
            'equipmentUnitCount' => MedicalEquipment::sum('quantity'),
            'recentEquipment' => MedicalEquipment::with('room.building')
                ->latest()
                ->take(5)
                ->get(),
        ]);
    }
}

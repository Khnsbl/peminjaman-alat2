<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;

class AdminActivityLogController extends Controller
{
    public function index()
    {
        $logs = ActivityLog::with('user')->latest('timestamp')->paginate(20);
        return view('admin.activity-log.index', compact('logs'));
    }
}

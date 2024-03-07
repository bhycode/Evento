<?php

use App\Models\User;
use App\Models\EventCategory;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users = User::all();
        $eventCategories = EventCategory::all();

        return view('admin.dashboard', compact('users', 'eventCategories'));
    }

    public function softDelete($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
        }

        return redirect()->route('admin.dashboard')->with('success', 'User soft-deleted successfully.');
    }

    // Add EventCategory methods

    public function eventCategoriesIndex()
    {
        $eventCategories = EventCategory::all();
        return view('admin.event-categories.index', compact('eventCategories'));
    }

    public function eventCategoriesCreate()
    {
        return view('admin.event-categories.create');
    }

    public function eventCategoriesStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        EventCategory::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('admin.event-categories.index')->with('success', 'EventCategory created successfully.');
    }

    public function eventCategoriesEdit(EventCategory $eventCategory)
    {
        return view('admin.event-categories.edit', compact('eventCategory'));
    }

    public function eventCategoriesUpdate(Request $request, EventCategory $eventCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $eventCategory->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('admin.event-categories.index')->with('success', 'EventCategory updated successfully.');
    }

    public function eventCategoriesDestroy(EventCategory $eventCategory)
    {
        $eventCategory->delete();

        return redirect()->route('admin.event-categories.index')->with('success', 'EventCategory deleted successfully.');
    }
}

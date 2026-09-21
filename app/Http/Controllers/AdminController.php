<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function messages(Request $request)
{
    $query = ContactMessage::query();

    // Search
    if ($request->search) {
        $query->where(function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->search . '%')
              ->orWhere('email', 'like', '%' . $request->search . '%')
              ->orWhere('subject', 'like', '%' . $request->search . '%');
        });
    }

    // Status filter
    if ($request->status) {
        $query->where('status', $request->status);
    }

    $messages = $query
        ->orderBy('created_at', 'desc')
        ->get();

    return view('admin.messages', compact('messages'));
}

    public function show($id)
    {
        $message = ContactMessage::findOrFail($id);

        return view('admin.message-details', compact('message'));
    }

    public function replyForm($id)
    {
        $message = ContactMessage::findOrFail($id);

        return view('admin.reply', compact('message'));
    }
    public function resolve($id)
{
    $message = ContactMessage::findOrFail($id);

    $message->status = 'resolved';
    $message->save();

    return redirect()
        ->route('admin.message.show', $message->id)
        ->with('success', 'Message marked as resolved.');
}

public function delete($id)
{
    $message = ContactMessage::findOrFail($id);

    $message->delete();

    return redirect()
        ->route('admin.messages')
        ->with('success', 'Message deleted successfully.');
}

public function archive($id)
{
    $message = ContactMessage::findOrFail($id);

    $message->status = 'archived';
    $message->save();

    return redirect()
        ->route('admin.message.show', $message->id)
        ->with('success', 'Message archived successfully.');
}
public function dashboard()
{
    $totalMessages = ContactMessage::count();

    $newMessages = ContactMessage::where('status', 'new')->count();

    $repliedMessages = ContactMessage::where('status', 'replied')->count();

    $resolvedMessages = ContactMessage::where('status', 'resolved')->count();

    $archivedMessages = ContactMessage::where('status', 'archived')->count();

    return view('admin.dashboard', compact(
        'totalMessages',
        'newMessages',
        'repliedMessages',
        'resolvedMessages',
        'archivedMessages'
    ));
}

    public function reply(Request $request, $id)
    {
        $message = ContactMessage::findOrFail($id);

        $request->validate([
            'admin_reply' => ['required', 'string'],
        ]);

        $message->admin_reply = $request->admin_reply;
        $message->status = 'replied';
        $message->replied_at = now();

        $message->save();

        return redirect()
            ->route('admin.message.show', $message->id)
            ->with('success', 'Reply saved successfully.');
    }
}
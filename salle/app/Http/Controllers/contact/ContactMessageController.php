<?php

namespace App\Http\Controllers\Contact;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class ContactMessageController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::where('status', false)->get();
        return view('contact.contactAdmin', compact('messages'));
    }


    public function destroy($id)
    {
        $msg = ContactMessage::findOrFail($id);
        $msg->delete();
        return back()->with('success', 'Message supprimé.');
    }

    public function respondForm($id)
    {
        $message = ContactMessage::findOrFail($id);
        return view('contact.respond', compact('message'));
    }

    public function sendResponse(Request $request, $id)
    {
        $request->validate(['response' => 'required|string']);

        $message = ContactMessage::findOrFail($id);

        // Send email
        Mail::raw($request->response, function ($mail) use ($message) {
            $mail->to($message->email)
                 ->subject('Réponse à votre message');
        });

        // Mark as responded
        $message->status = true;
        $message->save();

        return redirect()->route('admin.messages.index')->with('success', 'Réponse envoyée.');
    }
}

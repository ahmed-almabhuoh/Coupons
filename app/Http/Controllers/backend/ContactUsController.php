<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Aqs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

class ContactUsController extends Controller
{
    //
    public function getContacts()
    {
        return response()->view('backend.contacts.index');
    }

    public function deleteContact($id)
    {
        $contact = DB::table('contact_us')->where('id', Crypt::decrypt($id))->delete();
        //
        if ($contact) {
            return response()->json([
                'header' => __('Success'),
                'body' => __('Contact deleted successfully'),
                'icon' => 'success',
                'title' => __('Success'),
                'text' => __('Contact deleted successfully'),
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'header' => __('Failed!'),
                'body' => __('Failed to delete the contact!'),
                'icon' => 'error',
                'title' =>  __('Failed!'),
                'text' =>  __('Failed to delete the contact!'),
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    // Add the contact msg to common questions
    public function addContactToQuestions($id)
    {
        $contact = DB::table('contact_us')->where('id', Crypt::decrypt($id))->first();

        $aqs = new Aqs();
        $aqs->title = Str::uuid();
        $aqs->status = 'in-active';
        $aqs->answer = $contact->message;
        $aqs->save();

        DB::table('contact_us')->where('id', Crypt::decrypt($id))->update([
            'status' => 'applied',
        ]);

        sleep(1);
        return redirect()->route('aqs.edit', Crypt::encrypt($aqs->id));
    }
}

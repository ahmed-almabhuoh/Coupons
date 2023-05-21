<?php

namespace App\Http\Controllers;

use App\Mail\DownloadReleaseMail;
use App\Models\Serial;
use Carbon\Carbon;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

class SerialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (!auth()->user()->can('view-serials')) {
            abort(403);
        }
        return response()->view('backend.serials.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!auth()->user()->can('create-serial')) {
            abort(403);
        }
        return response()->view('backend.serials.store');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Serial $serial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (!auth()->user()->can('edit-serial')) {
            abort(403);
        }
        return response()->view('backend.serials.edit', [
            'serial' => Serial::findOrFail(Crypt::decrypt($id)),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Serial $serial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (!auth()->user()->can('delete-serial')) {
            abort(403);
        }
        $serial = Serial::findOrFail(Crypt::decrypt($id));
        //
        if ($serial->delete()) {
            return response()->json([
                'header' => __('Success'),
                'body' => __('License deleted successfully'),
                'icon' => 'success',
                'title' => __('Success'),
                'text' => __('License number deleted successfully'),
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'header' => __('Failed!'),
                'body' => __('Failed to delete the serial license!'),
                'icon' => 'error',
                'title' =>  __('Failed!'),
                'text' =>  __('Failed to delete the serial license!'),
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    // Manage License
    public function getLicensePage()
    {
        return response()->view('backend.client.license');
    }

    // Submit License
    public function submitLicense(Request $request)
    {
        $request->validate([
            'username' => 'required|string|exists:serials,username',
            'password' => 'required|string',
            'serial' => 'required|string|exists:serials,serial',
        ]);
        //

        $serial = Serial::where([
            ['serial', '=', $request->post('serial')],
            ['username', '=', $request->post('username')],
        ])->first();

        if (Hash::check($request->post('password'), $serial->password)) {
            // Generate the link, and send it to email
            $text = $request->post('serial') . '^' . $request->post('username') . '^' . $request->post('password');
            $enc = Crypt::encrypt($text);
            $url = route('download.release', [
                'token' => $enc,
            ]);

            DB::table('download_tokens')->insert([
                'token' => $enc,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            Mail::to($serial->email)->queue(new DownloadReleaseMail(
                $serial->email,
                $url,
            ));
        } else {
            return redirect()->route('license.page')->withErrors('Something went wrongs!');
        }
    }

    public function downloadRelease($token)
    {
        $_token = DB::table('download_tokens')->where('token', $token)->first();

        $createdAt = $_token->created_at;

        $currentDateTime = Carbon::now();
        $createdDateTime = Carbon::parse($createdAt);

        $minutesDifference = $createdDateTime->diffInMinutes($currentDateTime);

        // Compare the created_at value with the calculated time
        if ($minutesDifference <= 3) {
            return redirect(env('APP_URL') . 'content/Coupons - Release.zip');
        } else {
            return redirect()->route('license.page');
        }
    }
}

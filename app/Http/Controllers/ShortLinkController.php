<?php

namespace App\Http\Controllers;

use App\Models\ShortLink;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ShortLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = ShortLink::with(['user']);

        if(Auth::user()->roles === 'user') {
            $links = $links->where('user_id', Auth::user()->id);
        }

        $links = $links->paginate(5);

        return view('short-links', compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'link' => 'required'
            ]);

            $length = 6;
            $random = Str::random($length);
            $randomStamp = Str::random(1);

            $shortLink = ShortLink::where('code', $random)->first();

            if($shortLink) {
                $random = "$random$randomStamp";
            }

            $data = [
                'user_id' => Auth::user()->id,
                'code' => $random,
                'name' => $request->name,
                'link' => $request->link
            ];

            $createlink = ShortLink::create($data);

            $link = ShortLink::find($createlink->id);
            $url = env('APP_URL', '');

            return redirect()->back()->with(['link' => "$url/short/$link->code", 'name' => $link->name]);
        } catch (Exception $exeption) {
            return redirect()->back()->withErrors('warning', $exeption->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShortLink  $shortLink
     * @return \Illuminate\Http\Response
     */
    public function show(ShortLink $shortLink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShortLink  $shortLink
     * @return \Illuminate\Http\Response
     */
    public function edit(ShortLink $shortLink)
    {
        if(Auth::user()->roles !== 'admin') {
            return redirect()->back();
        }

        $link = ShortLink::find($shortLink->id);

        if(!$link) {
            return redirect()->back();
        }

        return view('edit-short-link', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShortLink  $shortLink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShortLink $shortLink)
    {
        try {
            if (Auth::user()->roles !== 'admin') {
                return redirect()->back();
            }

            $request->validate([
                'link' => 'required'
            ]);

            $length = 6;
            $random = Str::random($length);
            $randomStamp = Str::random(1);

            $links = ShortLink::find($shortLink->id);

            $data = [
                'code' => "$random$randomStamp",
                'name' => $request->name,
                'link' => $request->link
            ];

            $updatelink = $links->update($data);

            if($updatelink) {
                $link = ShortLink::find($shortLink->id);
            }

            $url = env('APP_URL', '');

            return redirect()->back()->with(['link' => "$url/short/$link->code", 'name' => $link->name]);
        } catch (Exception $exeption) {
            return redirect()->back()->with('warning', $exeption->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShortLink  $shortLink
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShortLink $shortLink)
    {
        try {
            if (Auth::user()->roles !== 'admin') {
                return redirect()->back()->with('warning', 'Only administrators have permissions.');
            }

            $link = ShortLink::find($shortLink->id);

            if(!$link) {
                return redirect()->back()->with('warning', 'This information is not available.');
            }

            $link->delete();

            return redirect()->back()->with('success', 'Data has been deleted successfully.');
        } catch (Exception $exeption) {
            return redirect()->back()->with('warning', $exeption->getMessage());
        }
    }

    public function linkToRedirect($code)
    {
        $link = ShortLink::where('code', $code)->first();

        if(!$link) {
            return redirect('/dashboard')->with('warning', "This link hasn't been created yet.");
        }

        return  redirect()->to($link->link);
    }
}

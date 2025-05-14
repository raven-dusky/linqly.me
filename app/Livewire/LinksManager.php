<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Social;
use App\Models\Link;

use Illuminate\Support\Facades\Auth;

class LinksManager extends Component
{
    public $show = false;

    public $socialLinks = [];

    public function showInputs()
    {
        $socials = Social::all();
        $userLinks = Auth::user()->links()->with('social')->get();

        foreach ($socials as $social) {
            $link = $userLinks->firstWhere('social_id', $social->id);
            $this->socialLinks[$social->name] = $link ? $link->url : '';
        }

        $this->show = true;
    }

    public function saveInputs()
    {
        foreach ($this->socialLinks as $name => $link) {
            $social = Social::where('name', $name)->first();

            if($link) {
                Link::updateOrCreate([
                    'user_id' => Auth::id(),
                    'social_id' => $social->id
                ],['url' => $link]);
            } else {
                Link::where('user_id', Auth::id())->where('social_id', $social->id)->delete();
            }
        }

        $this->show = false;
    }

    public function render()
    {
        $socials = Social::all();
        $links = Link::with('social')->where('user_id', Auth::id())->get();
        return view('livewire.links-manager', compact('socials', 'links'));
    }
}

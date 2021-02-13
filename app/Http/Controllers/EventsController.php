<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;
use App\Events\NewEventCreatedEvent;
use Illuminate\Support\Facades\Mail;
use App\Mail\EventNotificationMail;


class EventsController extends Controller
{
    function manage() {
        return view('office_section.manage_events');
    }

    function add() {
        return view('office_section.add_event');
    }

    function create(Request $request) {
        $request->validate([
            'name' => 'required|regex:/^[\s\w-]*$/',
            'date' => 'required|date',
            'heure' => 'required',
            'lieu' => 'required',
            'type' => 'required',
            'facebook_link' => 'required|url|unique:events',
            'visual' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required'
        ]);

        $file = $request->visual;
        $ext = $request->visual->getClientOriginalExtension();

        if($ext == 'png' || $ext == 'jpeg' || $ext == 'jpg') {
            $filename = time()."_".$request->name.".".$ext;
            $path = public_path().'\visuals';
            $upload = $file->move($path, $filename);
            $base_url = "http://tipshub.fr/visuals/";
            //$path = Storage::putFileAs(
                //'visuals', $file, $filename
            //);

            $event = new Event;
            $event->name = $request->name;
            $event->date = $request->date;
            $event->heure = $request->heure;
            $event->lieu = $request->lieu;
            $event->type = $request->type;
            $event->facebook_link = $request->facebook_link;
            $event->visual_url = $base_url.$filename;
            $event->description = $request->description;
            $event->archived = False;
            $event->published = False;
            $query = $event->save();
    
            if($query) {
                return back()->with('success', 'L\'événement a bien été ajouté');
            } else {
                return back()->with('fail', 'Erreur détectée: veuillez réessayer plus tard');
            }
        } else {
            return back()->with('fail', 'Le format de fichier doit être .jpg, .jpeg ou .png');
        }
    }

    function modify_page(Request $request) {
        $e = Event::where('id', '=', $request->id_event)->first();
        return view('office_section.modify_event', compact('e'));
    }

    function modify(Request $request) {
        $request->validate([
            'name' => 'required|regex:/^[\w-]*$/',
            'date' => 'required|date',
            'heure' => 'required',
            'lieu' => 'required',
            'type' => 'required',
            'facebook_link' => 'url',
            'visual' => 'image|mimes:jpeg,png,jpg|max:3192',
            'description' => 'required'
        ]);
        
        $id = $request->id_event;
        if($request->has('visual')) {
            $file = $request->visual;
            $ext = $request->visual->getClientOriginalExtension();
            $filename = time()."_".$request->name.".".$ext;
            $path = public_path().'\visuals';
            $upload = $file->move($path, $filename);
            $base_url = "http://tipshub.fr/visuals/";

            $old_ev = Event::where('id', '=', $id)->first();
            $old_visual_path = $old_ev->visual_url;
            $old_file = explode('/', $old_visual_path);
            $old_path = public_path().'\visuals\\'.end($old_file);
            unlink($old_path);

            $query = Event::where('id', '=', $id)->update([
                'name' => $request->name,
                'date' => $request->date,
                'heure' => $request->heure,
                'lieu' => $request->lieu,
                'type' => $request->type,
                'facebook_link' => $request->facebook_link,
                'visual_url' => $base_url.$filename,
                'description' => $request->description
            ]);
    
            if($query) {
                return redirect()->route('event.manage')->with('success', 'L\'événement a bien été modifié');
            } else {
                return redirect()->route('event.manage')->with('fail', 'Erreur lors de la modifiction d\'événement');
            }
        } else {
            $query = Event::where('id', '=', $id)->update([
                'name' => $request->name,
                'date' => $request->date,
                'heure' => $request->heure,
                'lieu' => $request->lieu,
                'type' => $request->type,
                'facebook_link' => $request->facebook_link,
                'description' => $request->description
            ]);
    
            if($query) {
                return redirect()->route('event.manage')->with('success', 'L\'événement a bien été modifié');
            } else {
                return redirect()->route('event.manage')->with('fail', 'Erreur lors de la modifiction d\'événement');
            }
        }
    }

    function delete(Request $request) {
        Event::where('id', '=', $request->id_event)->delete();
        return back()->with('success', 'L\'événement a bien été supprimé');
    }

    function archive(Request $request) {
        Event::where('id', '=', $request->id_event)->update(['archived' => 1]);
        return back()->with('success', 'L\'événement a bien été archivé');
    }

    function unarchive(Request $request) {
        Event::where('id', '=', $request->id_event)->update(['archived' => 0]);
        return back()->with('success', 'L\'événement a bien été désarchivé');
    }

    function get(Request $request) {
        $request->validate([
            'name' => 'required',
            'date' => 'required'
        ]);

        $event = Event::where(['name', '=', $request->name], ['date', '=', $request->date])->first();
        if($event) {
            return view('public_section.eventpage', compact('event'));
        } else {
            return back()->with('fail', 'Événement non trouvé');
        }
    }

    function get_all_events(Request $request) {
        $events = Event::where('archived', '=', 0)->orderBy('date')->get();
        return view('office_section.manage_events', compact('events'));
    }

    function get_all_archived_events(Request $request) {
        $events = Event::where('archived', '=', 1)->orderByDesc('created_at')->get();
        return view('office_section.archived_events', compact('events'));
    }

    function member_calendar(Request $request) {
        $events = Event::where('archived', '=', 0)->orderBy('date')->get();
        return view('member_section.section_vieasso.calendrier', compact('events'));
    }

    function public_calendar(Request $request) {
        $events = Event::where('type', '=', 'cabaret')
        ->orWhere('type', '=', 'match')
        ->orWhere('type', '=', 'événement extérieur')
        ->orWhere('type', '=', 'tournoi')
        ->orderBy('date')->get();
        return view('public_section.dates', compact('events'));
    }

    function publish(Request $request) {
        $id = $request->id_event;
        $ev = Event::where('id', '=', $id)->first();
        $query = Event::where('id', '=', $id)->update(['published' => 1]);
        if($query) {
            event(new NewEventCreatedEvent($ev));
            return back()->with('success', 'L\'événement a bien été publié, le mail de notification a été envoyé');
        } else {
            return back()->with('fail', 'Une erreur a été détectée, veuillez réessayer plus tard');
        }
    }
}

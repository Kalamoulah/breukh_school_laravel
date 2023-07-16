<?php

namespace App\Console\Commands;

use App\Models\Eleve;
use App\Models\Event;
use App\Notifications\SendingNotification;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class sendEventNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:moussa';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $events = Event::with('participants.classe.inscriptions.eleve')
            ->whereDate('date_event', Carbon::now()->addDays(3)->toDateString())
            ->get();

        foreach ($events as $event) {
            foreach ($event->participants as $participant) {
                foreach ($participant->classe->inscriptions as $inscription) {
                    
                  Notification::send($inscription->eleve, new SendingNotification($event));

                }
            }
        }

        



    }
}
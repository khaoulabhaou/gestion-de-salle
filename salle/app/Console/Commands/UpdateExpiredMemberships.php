<?php

namespace App\Console\Commands;

use App\Models\Member;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateExpiredMemberships extends Command
{
    protected $signature = 'membership:update-expired';
    protected $description = 'Update expired memberships and set abonnement_actif to false';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $members = Member::where('abonnement_actif', true)
                         ->where('expiration_date', '<', Carbon::now())
                         ->get();

        foreach ($members as $member) {
            $member->abonnement_actif = false;
            $member->save();
            $this->info("Membership expired for {$member->nom_complet}, abonnement_actif set to false.");
        }

        $this->info('Expired memberships updated successfully!');
    }
}

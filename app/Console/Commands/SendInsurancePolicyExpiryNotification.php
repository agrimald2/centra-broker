<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\InsurancePolicy;
use Carbon\Carbon;
use Log;
use Illuminate\Support\Facades\Mail;

class SendInsurancePolicyExpiryNotification extends Command
{
    protected $signature = 'insurance:send-expiry-notification';

    protected $description = 'Send a notification for insurance policies expiring within 30 days';

    public function handle()
    {
        $insurancePolicies = InsurancePolicy::all();

        foreach ($insurancePolicies as $insurancePolicy) {
            $latestInsurancePolicyData = $insurancePolicy->latestInsurancePolicyData;
            if (Carbon::parse($latestInsurancePolicyData->end_date)->lte(Carbon::now()->addDays(30))) {
                Log::debug("Poliza Expira Pronto");
                $policyId = $insurancePolicy->id;
                $appUrl = config('app.url');
                $emailBody = "La poliza está por vencer. Revísala aquí: {$appUrl}/admin/insurance_policies/show/{$policyId}";
                Mail::raw($emailBody, function ($message) {
                    $message->to('recipient@example.com')
                            ->subject('Aviso de Vencimiento de Poliza');
                });
            }
        }
    }
}

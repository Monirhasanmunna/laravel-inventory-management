<?php
namespace App\Services;

use App\Models\Account;

Class AccountsService{

    public function BalanceAdjustmentToAccount($adjustment)
    {
        $account = Account::find($adjustment['account_id']);

        if($adjustment->type == 'addBalance'){

            $account->update([
                'total_ammount' => $account['total_ammount'] + $adjustment['ammount']
            ]);

        }else{
            $account->update([
                'total_ammount' => $account['total_ammount'] - $adjustment['ammount']
            ]);
        }
    }


    public function transferBalance($transfer)
    {
        $from_account   = Account::find($transfer->from_account_id);
        $to_account     = Account::find($transfer->to_account_id);

        $from_account->update([
            'total_ammount' => $from_account->total_ammount - $transfer->ammount
        ]);

        $to_account->update([
            'total_ammount' => $to_account->total_ammount + $transfer->ammount
        ]);
    }


}
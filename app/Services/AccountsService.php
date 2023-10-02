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



}
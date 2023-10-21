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


    public function oldBalanceUpdate($oldAdjustment, $account)
    {
        if($oldAdjustment->type == 'addBalance'){
            $account->total_ammount = $account->total_ammount - $oldAdjustment->ammount;
        }
        
        if($oldAdjustment->type == 'removeBalance'){
            $account->total_ammount = $account->total_ammount + $oldAdjustment->ammount;
        }
        
        $account->save();
        $oldAdjustment->delete();
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


    public function createHistory($item, $reason, $type, $ammount)
    {
        // find account
        $account = Account::find($item->account_id);

        // history create
        $item->histories()->create([
            'reason' => $reason.' ['.$account->account_number.']' ?? 'Cash'.']',
            'date'   => date('Y-m-d'),
            'type'   => $type,
            'ammount'=> $ammount
        ]);
    }


    public function transaction($item, $type, $ammount)
    {
        // find account
        $account = Account::find($item->account_id);

        //adjust account ammount
        if($type == 'debit'){
            $account->total_ammount = $account->total_ammount - $ammount;
            $account->save();
        }

    }

}
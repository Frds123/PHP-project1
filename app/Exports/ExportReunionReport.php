<?php

namespace App\Exports;

use App\Models\Payment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportReunionReport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Payment::where('payment_status', 'reunion_registration')
                        ->select('id', 'user_id', 'alumni', 'deposit_total_amount', 'grand_total_amount', 'payment_status', 'payment_type', 'payment_date', 'payment_description', 'voucher_no', 'voucher_date', 'deposit_from_branch_code', 'reunion_info_json', 'is_approved')->get();
    }

    public function headings(): array
    {
        return [
            'Serial No',
            'User ID',
            'Alumni Name',
            'Total Deposited Amount',
            'Total Grand Amount',
            'Payment Status',
            'Payment Type',
            'Payment Date',
            'Payment Description',
            'Voucher No',
            'Voucher Date',
            'Deposit From Branch Code',
            'Attendee Information',
            'Approval'
        ];
    }
}
<?php

namespace App\Exports;

use App\Models\ProductInquiry;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProductInquiriesExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return ProductInquiry::with('product')->latest()->get();
    }

    public function map($inquiry): array
    {
        return [
            $inquiry->id,
            optional($inquiry->product)->title ?? 'N/A',
            $inquiry->full_name,
            $inquiry->email,
            $inquiry->phone ?? 'N/A',
            strip_tags($inquiry->message),
            $inquiry->created_at->format('Y-m-d H:i:s'),
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Product',
            'Full Name',
            'Email',
            'Phone',
            'Message',
            'Submitted At',
        ];
    }
}
